### Run
`nc -C localhost 80`

### GET without cookies
```
GET /ex7/cookies/index.php HTTP/1.1
Host: localhost
```

### GET request with an arbitrary cookie value
```
GET /ex7/cookies/index.php HTTP/1.1
Host: localhost
Cookie: counter=1000
```