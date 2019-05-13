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

### Configure the Database Connection

Open the file `config/database.php.default` in your IDE, I recommend [Visual Studio Code](https://code.visualstudio.com/). Set the host, database, username and password as follows and then save a copy as `database.php`.

```php
ConnectionManager::config('default', [
    'host' => 'db', // Docker MySQL container
    'database' => 'origin',
    'username' => 'root',
    'password' => 'root'
]);
```

> To access the MySQL server from within the Docker container, we need to use its name which is `db` and not `localhost`.

Even though the container is running, you will want to access the command line.


```linux
$ docker-compose run app bash
```

Then run the db console to set everything up for you.

```linux
$ bin/console db setup
```

The db setup command will :

- Create the database
- Load the schema from `db/schema.sql` file
- Seed the database with records from the `/db/seed.sql` file 

If all went well when you go to [http://localhost:8000](http://localhost:8000)  it should now say that it is connected to the database.

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