"""An example of a simple HTTP server."""
import json
import mimetypes
import pickle
import socket
from os.path import isdir
from urllib.parse import unquote_plus

# Pickle file for storing data
PICKLE_DB = "db.pkl"

# Directory containing www data
WWW_DATA = "www-data"

# Header template for a successful HTTP request
HEADER_RESPONSE_200 = """HTTP/1.1 200 OK\r
content-type: %s\r
content-length: %d\r
connection: Close\r
\r
"""

# Represents a table row that holds user data
TABLE_ROW = """
<tr>
    <td>%d</td>
    <td>%s</td>
    <td>%s</td>
</tr>
"""

# Template for a 301 (Moved Permanently)
RESPONSE_301 = """HTTP/1.1 301 Moved Permanently\r
content-type: %s\r
content-length: %d\r
location: *url*\r
connection: Close\r
\r
<!doctype html>
<h1>301 Moved Permanently</h1>
\r
"""

# Template for a 400 (Bad request) error
RESPONSE_400 = """HTTP/1.1 400 Bad request\r
content-type: %s\r
content-length: %d\r
connection: Close\r
\r
<!doctype html>
<h1>400 Bad Request</h1>
   <p>Your browser sent a request that this server could not understand.</p>
   <p>The request line contained invalid characters following the protocol string.</p>
"""

# Template for a 404 (Not found) error
RESPONSE_404 = """HTTP/1.1 404 Not found\r
content-type: %s\r
content-length: %d\r
connection: Close\r
\r
"""

# Template for a 405 (Method not allowed)
RESPONSE_405 = """HTTP/1.1 405 Method Not Allowed\r
content-type: %s\r
content-length: %d\r
connection: Close\r
\r
<!doctype html>
<h1>405 Method Not Allowed</h1>
<p>Request is not allowed.</p>
<p>Try another method!.</p>
"""

# chosen header
selected_header = HEADER_RESPONSE_200


def save_to_db(first, last):
    """Create a new user with given first and last name and store it into
    file-based database.

    For instance, save_to_db("Mick", "Jagger"), will create a new user
    "Mick Jagger" and also assign him a unique number.

    Do not modify this method."""

    existing = read_from_db()
    existing.append({
        "number": 1 if len(existing) == 0 else existing[-1]["number"] + 1,
        "first": first,
        "last": last
    })
    with open(PICKLE_DB, "wb") as handle:
        pickle.dump(existing, handle)


def read_from_db(criteria=None):
    """Read entries from the file-based DB subject to provided criteria

    Use this method to get users from the DB. The criteria parameters should
    either be omitted (returns all users) or be a dict that represents a query
    filter. For instance:
    - read_from_db({"number": 1}) will return a list of users with number 1
    - read_from_db({"first": "bob"}) will return a list of users whose first
    name is "bob".

    Do not modify this method."""
    if criteria is None:
        criteria = {}
    else:
        # remove empty criteria values
        for key in ("number", "first", "last"):
            if key in criteria and criteria[key] == "":
                del criteria[key]

        # cast number to int
        if "number" in criteria:
            criteria["number"] = int(criteria["number"])

    try:
        with open(PICKLE_DB, "rb") as handle:
            data = pickle.load(handle)

        filtered = []
        for entry in data:
            predicate = True

            for key, val in criteria.items():
                if val != entry[key]:
                    predicate = False

            if predicate:
                filtered.append(entry)

        return filtered
    except (IOError, EOFError):
        return []


def process_request(connection, address, port):
    """Process an incoming socket request.

    :param connection is a socket of the client
    :param address is a 2-tuple (address(str), port(int)) of the client
    """

    # Make reading from a socket like reading/writing from a file
    # Use binary mode, so we can read and write binary data. However,
    # this also means that we have to decode (and encode) data (preferably
    # to utf-8) when reading (and writing) text
    # socket connection preoblikujemo tako, da se obnasa kot datoteka.
    client = connection.makefile("wrb")

    try:
        protocol = "http"
        hostname, _ = address
        if hostname == '127.0.0.1':
            hostname = "localhost"

        # Read and parse the request line
        line = client.readline().decode("utf-8").strip()
        method, uri, version, params = parse_request_line(line)

        # Read and parse headers
        headers = parse_headers(client, method)

        # parse parameters
        params = parse_params(params, method, client, headers)

        # Read and parse the body of the request (if applicable)
        body, uri = parse_body(uri, method, params, protocol, hostname, port)

        # create the response
        head = create_response(uri, body)

        # Write the response back to the socket
        write(client, head, body)

    except (PermissionError, AttributeError) as e:
        client.write(RESPONSE_405.encode("utf-8"))
    except (ValueError, AssertionError) as e:
        client.write(RESPONSE_400.encode("utf-8"))
    except IOError as e:
        client.write(RESPONSE_404.encode("utf-8"))

    finally:
        client.close()

    client.close()


# Read and parse the request line
def parse_request_line(line):
    params = {}

    method, uri, version = line.split()

    if "?" in uri:
        uri, params = uri.split("?")

    try:
        assert method == "GET" or method == "POST", "Invalid request method"
    except AssertionError as e:
        raise AttributeError(e)

    assert len(uri) > 0 and uri[0] == "/", "Invalid request URI"
    assert version == "HTTP/1.1", "Invalid HTTP version"

    return method, uri, version, params


# Read and parse headers
def parse_headers(client, method):
    headers = dict()

    while True:
        line = client.readline().decode("utf-8").strip()

        # line is empty
        if not line:
            if method == "GET" or "Content-Length" in headers:
                return headers
            else:
                raise ValueError('Content-Length is missing.')

        # Splits just the first colon
        key, value = line.split(":", 1)
        headers[key.strip()] = value.strip()


# parse parameters
def parse_params(params, method, client, headers):
    if params == {}:
        params = ""
    param_dict = {}
    if method == "GET":
        params = unquote_plus(params)
    else:
        params = unquote_plus(client.read(int(headers["Content-Length"])).decode("utf-8").strip())

    if params:
        for param in params.split("&"):
            key, value = param.split("=")
            param_dict[key] = value

    return param_dict


# Read and parse the body of the request (if applicable)
def parse_body(uri, method, params, protocol, hostname, port):
    global selected_header

    # index.html
    if uri.endswith("/"):
        with open(WWW_DATA + uri + "index.html", "rb") as handle:
            body = handle.read()
        selected_header = RESPONSE_301.replace("*url*", "{}://{}:{}{}index.html".format(protocol, hostname, port, uri))
        uri += "index.html"
        return body, uri

    elif "." not in uri and "/" in uri:
        if uri == "/app-add":
            if method == "POST":
                if params.get("first", False) and params.get("last", False):
                    save_to_db(params.get("first"), params.get("last"))
                    selected_header = HEADER_RESPONSE_200

                    with open(WWW_DATA + "/app_add.html", "rb") as handle:
                        body = handle.read()

                    return body, uri

                else:
                    raise ValueError("Wrong arguments.")
            else:
                raise PermissionError("Wrong method.")
        elif uri == "/app-index":
            if method == "GET":
                # filter data
                if params.get("number", False) or params.get("first", False) or params.get("last", False):
                    criteria = {}
                    if params.get("number", False):
                        criteria["number"] = params["number"]

                    if params.get("first", False):
                        criteria["first"] = params["first"]

                    if params.get("last", False):
                        criteria["last"] = params.get("last")

                    data = read_from_db(criteria)
                # read all
                else:
                    data = read_from_db()

                rows = ""
                selected_header = HEADER_RESPONSE_200
                for row in data:
                    number, first, last = row.values()
                    rows += TABLE_ROW % (
                        int(number),
                        first,
                        last
                    )
                with open(WWW_DATA + "/app_list.html", "r") as handle:
                    body = handle.read()

                body = body.replace("{{students}}", rows)

                return body.encode("utf-8"), "app_list.html"

            else:
                raise PermissionError("Wrong method.")

        elif uri == "/app-json":
            # filter data
            if method == "GET":
                if params.get("number", False) or params.get("first", False) or params.get("last", False):
                    criteria = {}
                    if params.get("number", False):
                        criteria["number"] = params["number"]

                    if params.get("first", False):
                        criteria["first"] = params["first"]

                    if params.get("last", False):
                        criteria["last"] = params.get("last")

                    data = json.dumps(read_from_db(criteria))
                # read all
                else:
                    data = json.dumps(read_from_db())
                selected_header = HEADER_RESPONSE_200
                return data.encode("utf-8"), "app-json"

            else:
                raise PermissionError("Wrong method.")
        else:
            try:
                with open(WWW_DATA + uri, "rb") as handle:
                    body = handle.read()

                selected_header = HEADER_RESPONSE_200
                return body, uri

            except IOError:
                if isdir(WWW_DATA + uri):
                    with open(WWW_DATA + uri + "/index.html", "rb") as handle:
                        body = handle.read()

                    selected_header = RESPONSE_301.replace("*url*",
                                                           "{}://{}:{}/index.html".format(protocol, hostname, port))
                    return body, uri + "/index.html"

                else:
                    raise IOError('File does not exist')
    # relative path
    else:
        try:
            with open(WWW_DATA + uri, "rb") as handle:
                body = handle.read()

            selected_header = HEADER_RESPONSE_200
            return body, uri

        except IOError:
            raise IOError('File does not exist')


# create the response
def create_response(uri, body):
    if uri.endswith("app-json"):
        content_type = "application/json"

    else:
        content_type, encoding = mimetypes.guess_type(uri) or "application/octet-stream"

    head = selected_header % (
        content_type,
        len(body)
    )
    return head


# Write the response back to the socket
def write(client, head, body):
    client.write(head.encode("utf-8"))
    client.write(body)


def main(port):
    """Starts the server and waits for connections."""

    server = socket.socket(socket.AF_INET, socket.SOCK_STREAM)
    server.setsockopt(socket.SOL_SOCKET, socket.SO_REUSEADDR, 1)
    server.bind(("", port))
    server.listen(1)

    print("Listening on %d" % port)

    while True:
        connection, address = server.accept()
        print("[%s:%d] CONNECTED" % address)
        process_request(connection, address, port)
        connection.close()
        print("[%s:%d] DISCONNECTED" % address)


if __name__ == "__main__":
    main(8080)
