"""An example of a simple HTTP server."""
import json
import mimetypes
import pickle
import socket
from os.path import isdir
from urllib.parse import unquote_plus
from mimetypes import guess_type

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
<!doctype html>
<h1>200 OK</h1>
<p>Hello, world.</p>
"""

# Represents a table row that holds user data
TABLE_ROW = """
<tr>
    <td>%d</td>
    <td>%s</td>
    <td>%s</td>
</tr>
"""

# Template for a 404 (Not found) error
RESPONSE_404 = """HTTP/1.1 404 Not found\r
content-type: text/html\r
connection: Close\r
\r
<!doctype html>
<h1>404 Page not found</h1>
<p>Page cannot be found.</p>
"""

# Template for a 400 (Bad request) error
RESPONSE_400 = """HTTP/1.1 400 Bad request\r
content-type: text/html\r
connection: Close\r
\r
<!doctype html>
<h1>400 Bad Request</h1>
   <p>Your browser sent a request that this server could not understand.</p>
   <p>The request line contained invalid characters following the protocol string.</p>
"""

# Template for a 301 (Moved Permanently)
RESPONSE_301 = """HTTP/1.1 301 Moved Permanently\r
content-type: text/html\r
connection: Close\r
\r
"""

# Template for a 405 (Method not allowed)
RESPONSE_405 = """HTTP/1.1 405 Method Not Allowed\r
content-type: text/html\r
connection: Close\r
\r
<!doctype html>
<h1>405 Method Not Allowed</h1>
<p>Request is not allowed.</p>
<p>Try another method!.</p>
"""


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


def process_request(connection, address):
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

    #  Rabimo try-catch blok zaradi morebitnih nepravilnih argumentov
    # Read and parse the request line
    try:
        # Read one line, decode it to utf-8 and strip leading and trailing spaces
        # prebere eno vrstico odjemalca in jo moramo dekodirat, ker je to seznam bajtov. Odstranimo morebite presledek na
        # zacetku in na koncu
        line = client.readline().decode("utf-8").strip()

        method, uri, version, params = parse_request_line(line)

        headers = parse_headers(client)
        print(method, uri, version, headers)

        # with je podobno kot new scanner v javi - ni treba zapirat toka
        # zacne se s slashom, zato beremo od 1 naprej
        # binarno branje
        with open(uri[1:], "rb") as handle:
            # preberemo vse
            body = handle.read()

        # sestavmo zaglavje
        # header_response je šablona, moramo vnesit value notr

        # Better -> Guess the type of a file based on its filename or URL, given by url.
        type, encoding = guess_type(uri)
        head = HEADER_RESPONSE_200 % (
            type,
            len(body)
        )

        #     pošljemo vsebino in zakodiramo
        client.write(head.encode("utf-8"))
        #     pošljemo še body, je že zakodiran
        client.write(body)


        # print(method, uri, version, headers)

        # Read and parse headers

        # Read and parse the body of the request (if applicable)

        # create the response

        # Write the response back to the socket


    # Lahko imamo 3 različne napaki
    except (ValueError, AssertionError) as e:
        # print("Invalid request %s (%s)" % (line, e))
        client.write(RESPONSE_400.encode("utf-8"))
    except IOError:
        client.write(RESPONSE_404.encode("utf-8"))
    finally:
        client.close()

    # Create a response: the same text, but in upper case
    # Vse male crcke spremeni v velike
    # response = line.upper()
    #
    # Write the response to the socket
    # Rezultat poslje nazaj odjmelcu - zakodiran
    # client.write(response.encode("utf-8"))

    # Closes file-like object
    client.close()


# Read and parse the request line
def parse_request_line(line):
    # vrstico moramo razbit v 3 dele

    params = {}
    method = ""
    uri = ""
    version = ""

    try:
        method, uri, version, params = line.split()
    except ValueError:
        method, uri, version = line.split()

    assert method == "GET" or method == "POST", "Invalid request method"
    assert len(uri) > 0 and uri[0] == "/", "Invalid request URI"
    assert version == "HTTP/1.1", "Invalid HTTP version"

    return method, uri, version, params


# Read and parse headers
# prejme objket connection - socket, address in port.
def parse_headers(client):
    headers = dict()
    while True:
        line = client.readline().decode("utf-8").strip()
        # vrstica je prazna
        if not line:
            return headers
        # ta split razbije samo prvo dvopičje v vrstici, ostale pusti
        key, value = line.split(":", 1)
        headers[key.strip()] = value.strip()

    # Read and parse the body of the request (if applicable)

    # create the response

    # Write the response back to the socket




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
        process_request(connection, address)
        connection.close()
        print("[%s:%d] DISCONNECTED" % address)


if __name__ == "__main__":
    main(8080)
