# To-do api using Lumen + Laravel on DOCKER.
To-do app with Lumen/Laravel

Server: NGINX
PHP-fpm: Alpine

This will require Lumen/Laravel 8.0+
This api will have Login function (create, authenticate) and To-do list.

Login with generate random Tokens, this tokens will be used to compare with To-do list.

For usage, you gonna need COMPOSER INSTALL in the SRC folder.

Run Docker: Docker-compose up -d --build

Port will be: 8081

Database config will be:
user: homestead
password: secret
port: 33061 or 3306
