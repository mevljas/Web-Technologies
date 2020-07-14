from urllib.request import urlopen


def get(url, port, resource):
    return urlopen("http://%s:%d%s" % (url, port, resource)).read().decode("utf-8")


if __name__ == "__main__":
    print(get("localhost", 8080, "/index.html"))
