# Readme

## You will need
 - Docker Desktop on the Mac or Windows, or Docker in Linux (you miss some graphical tools)

## How to use this application

### 1. Create The Docker Environment
1. Go to the docker folder and either run create.sh or.. ```docker image build -t php7 .``` to build the docker image.
2. Back to root and run docker-compose up to create. Close it after and you can now turn bits on and off from the Docker Desktop GUI.

This gets you an Apache HTTPD environment for your application (web-1), a MySQL database (db-1) and PhpMyAdmin (phpmyadmin-1).

### 2. Check the environment
Fire up the above, and go to http://localhost:8080 with username root and password root_password (or whatever you changed it to) to make sure the database is working.

### 3. Set up the web packages
This application uses dependencies from Composer (think PHP's version of npm) - install them with:

```composer install```

This will get us a skeleton Symfony 4 project with annotations, Twig (templating engine) and all the Doctrine bits you need for database actions.

### 4. Set up the database content
Go to http://localhost:8080 and log in, create an app database, and add the data from app.sql into your database.

### 5. Run the site
Go to http://localhost:80 and you should be greeted with the first screen listing 4 horses.