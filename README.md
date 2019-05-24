# Lewis Watson IFB102 19S1


This is the repository for the IFB102 mini-project.

## Prerequisites
Ensure you are running on Linux, with `docker` and `docker-compose` installed.

## Setup
`$ ./launch.sh`

This will automatically shut down any running containers gracefully, before rebuilding them and launching the application in the foreground.

## Commands
Ensure you are at the project root first!


`docker-compose build` => Build the application and its components

`docker-compose up` => Launch the application in the foreground

`docker-compose up -d` => Launch the application in the background (as a daemon)

`docker-compose down` => Shutdown the application gracefully

`docker exec -it <container-name> bash` => Open a terminal within the specified container, where `<container-name>` is the name of a container


## Containers
`server2` => API tokens and access

`mysql` => Database

... More to come ...

## Directory structure

Each module lives in its own directory (ie `mysql/` and `server2/`).