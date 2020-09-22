# To-do api using Lumen + Laravel on DOCKER.
To-do app with Lumen/Laravel

Server: NGINX

PHP-fpm: Alpine

This will require Lumen/Laravel 8.0+
This api will have Login function (create, authenticate) and To-do list.

Login with generate random Tokens, this tokens will be used to compare with To-do list.

First of all you can clone this with: sudo git clone https://github.com/saleto/app2.com.git .

For usage, you gonna need COMPOSER INSTALL in the SRC folder.

Run Docker: Docker-compose up -d --build

Port will be: 8081

Database config will be:

user: homestead

password: secret

port: 33061 or 3306

RUN: docker-compose exec php php artisan migrate 
or (php artisan migrate) to migrate database with your mysql

Please remeber to kill Apache2 and Mysql running on local, will be only using mysql that already on Docker. This will help us not get in trouble with same port used.
(Ubuntu: Sudo service apach2 stop, sudo service mysql stop)

Test it out on localhost:8081/ (main Lumen page)

Localhost:8081/api/login/

Localhost:8081/api/todo/
