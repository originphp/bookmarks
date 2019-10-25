# Bookmarks Demo Application

This is the OriginPHP demo application

Make sure your database is configured.

If you are using Docker, start the container, if its not already started.

```linux
$ docker-compose up
```

Then connect to the container 

```linux
$ docker-compose run app bash
```

## Creating the database using schema

Create and seed the database

```linux
$ bin/console db:setup
```

## Creating the database using migrations 

This app also contains the migration version of the database setup to demonstrate the functionality.

First create the db

```linux
$ bin/console db:create
```

Load the schema for migrations

```linux
$ bin/console db:load:schema migrations
```

Run the migrations 

```linux
$ bin/console db:migrate
```

Seed the database

```linux
$ bin/console db:seed
```

## Install Dependencies

This is used by one of the console commands.

```linux
$ composer require originphp/yaml
```