### Run
`nc -C localhost 80`

### GET request without specifying a SID
```
GET /ex7/session/index.php HTTP/1.1
Host: localhost
```

### GET request with a valid session
```
GET /ex7/session/index.php HTTP/1.1
Host: localhost
Cookie: PHPSESSID=
```