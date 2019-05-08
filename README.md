# Bookmarks Demo Application

This is the OriginPHP demo application

## Installation

### Create Bookmarks Project
Download and install [Composer](https://getcomposer.org/doc/00-intro.md), then run the following command to create the bookmarks project

```linux
$ composer create-project originphp/bookmarks bookmarks
```

OriginPHP comes with a dockerized development environment.

Install [Docker Desktop](https://www.docker.com/products/docker-desktop) then build the docker containers, this must be done from within the project folder

```linux
$ cd bookmarks
$ docker-compose build
```

The container only needs to be built once, after this you will use the `up` and `down` commands to start and stop the docker container.

```linux
$ docker-compose up
```

Then open your web browser and go to [http://localhost:8000](http://localhost:8000)  which will show you a status page that all is working okay.

### Create the Database

Lets create the database on the server, from the command line type in the following to access the container and then the MySQL server.

```bash
$ docker-compose run app bash
$ mysql -h db -uroot -p
```

To access the MySQL server from within the docker the container, you need to use the host name `db`.

When it asks you for the password type in **root**, then copy and paste the following sql to create the database called bookmarks and a user called origin with the password **secret**.

```sql
CREATE DATABASE bookmarks CHARACTER SET utf8mb4;
GRANT ALL ON bookmarks.* TO 'origin' IDENTIFIED BY 'secret';
FLUSH PRIVILEGES;
QUIT
```

> You can also acces the MySql server using any database management application using `localhost` port `3306`. Windows users can use [Sequel Pro](https://www.sequelpro.com/) or Mac users can use [Heidi SQL](https://www.heidisql.com/).

### Configure the Database

Open the `database.php.default` in your IDE, I recommend [Visual Studio Code](https://code.visualstudio.com/). Set the host, database, username and password as follows and then save a copy as `database.php`.

```php
ConnectionManager::config('default', [
    'host' => 'db', // Docker MySQL container
    'database' => 'bookmarks',
    'username' => 'origin',
    'password' => 'secret'
]);
```
> To access the MySQL server from within the Docker container, we need to use its name which is `db` and not `localhost`.

If all went well when you go to [http://localhost:8000](http://localhost:8000)  it should now say that it is connected to the database.

### Import the Database Schema

Finally, we need to import the tables, this information is in a file called `schema.sql` located in the `config` folder. From within the Docker container type in the following.

```bash
$ bin/console schema import
```

### Ready
Now that this has been done  goto [http://localhost:8000/users/login](http://localhost:8000/users/login) use the username `demo@example.com` and password `origin` to login.

The bookmarks app also has its own console application, which shows you some features of the CLI.

Run the following command to show the available options, one of those is uninstall which you can use later to remove all the Bookmarks files. First you should look around the source and get a feel for everything.

```bash
$ bin/console bookmarks
```

To uninstall the bookmarks files

```bash
$ bin/console bookmarks uninstall
```