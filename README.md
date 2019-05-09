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

### Creating the database

```bash
$ bin/console db setup
```

The db setup command will :

- Create the database
- Load the schema from `config/db/schema.sql` file
- Seed the database with records from the `config/db/seed.sql` file 

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