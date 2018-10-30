# Simple JSON editor #

The json is fetched from the database and injected into user friendly json editor where it can be changed and saved

![alt text](https://github.com/aleksmark/simple-json-editor/blob/master/public/screen.png)

## Environment

- PHP 7.0
- Laravel 5.5
- Mysql 5.7

## Prerequisites

Docker

https://docs.docker.com/engine/installation/

Docker-compose

https://docs.docker.com/v1.11/compose/install/

##### Note: you should be able to run docker without sudo

## Installation

Clone the project
```
$ git clone git@github.com:aleksmark/simple-json-editor.git
$ cd simple-json-editor
```

Setup the laravel env
```
$ cp .env.example .env
```

Build the docker environment
```
$ docker-compose up -d
```

Provision the application
```
$ ./post-deploy.sh
```

## Usage

Access the laravel app on your local machine

http://localhost
