# Installation

The K-Link components are available as a [Docker](https://www.docker.com/) images. 

This guide will walk you through the installation and configuration of a K-Link instance on a Linux based OS.

## Prerequisites

- meet the [hardware requirements](./requirements.md)
- a clean new installation of Debian 9 (64 bit), Ubuntu or other [Docker supported OS](https://docs.docker.com/install/#server)
- [Docker](https://docs.docker.com/install/linux/docker-ce/debian/) and [Docker Compose](https://docs.docker.com/compose/install/) installed
- a properly configured DNS that resolves requests to your domain name, e.g. `my.box.tld`, is required if you want to expose the K-Link on the internet.


## Environment preparation

Once [Docker](https://docs.docker.com/install/linux/docker-ce/debian/) and [Docker Compose](https://docs.docker.com/compose/install/) are installed, the directory that will contain the installation can be created.

In the setup directory, called `~/deploy/k-link/`, we are going to create the configuration file, called `docker-compose.yml`, that contain the specific setup, and the sub-folders to contain the data.

The folder structure should look like

```
|-- deploy/k-link/
    |-- storage
        |-- data
        |-- index
        |-- database
    |-- docker-compose.yml
```

The K-Link repository offers an example [`docker-compose.yml`](../docker-compose.example.yml) file that includes the required services.

```bash
cd deploy/k-link/
curl -o docker-compose.yml https://github.com/k-box/k-link/blob/master/docker-compose.example.yml
```

The docker compose file defines 5 services:

1. `klink`, the K-Link courtesy website
2. `registry`, the [K-Link Registry](https://github.com/k-box/k-link-registry)
3. `registry-db`, the MariaDB database of the K-Link Registry
4. `ksearch`, the [K-Search API](https://github.com/k-box/k-search) layer
5. `engine`, the [K-Search Engine](https://github.com/k-box/k-search-engine) layer

Each service indicate which Docker Image to use and the basic environment variables. Per default configuration the data saved in each service is not persisted on disk and uses the Docker dynamic volumes.

First, we want to make the stored document, the database and the search engine persistent accross restart and upgrades.
For each service we uncomment the `volumes` configuration

```yml
 volumes:
 - "./storage/data:/var/www/k-search/var/data-downloads"
```

> `./` means that the same level as the `docker-compose.yml` file

## Configuration

The example Docker Compose file contains suitable defaults for most of the configuration, but sometimes you might want to change those defaults.
In particular is mandatory to change:

- The database password (`MYSQL_ROOT_PASSWORD`,`MYSQL_PASSWORD`,`DATABASE_PASSWORD`)
- The K-Registry admin user and password (`KREGISTRY_ADMIN_USERNAME`, `KREGISTRY_ADMIN_PASSWORD`)
- The K-Registry App Key (`APP_SECRET`)
- The K-Registry domain (`KREGISTRY_DOMAIN`)

### Database

The `database` requires two passwords, the first is the root password and the second is the user password for accessing the specific new database.

```yaml
MYSQL_ROOT_PASSWORD: "238..."
MYSQL_PASSWORD: "b25..."
```

The `MYSQL_PASSWORD` password must be copied in the `kregistry` service configuration as `DATABASE_PASSWORD`

```yaml
DATABASE_PASSWORD: "b25..."
```

### K-Registry

The K-Registry component has some configuration parameters that depend on the deployment.

All the configuration can be done using environment variables attached to the `registry` service.

#### Administrator account

The default administrator account of the K-Registry is configured at startup, the username and the password are specified in the configuration file as

```yaml
KREGISTRY_ADMIN_USERNAME: "admin@registry.local"
KREGISTRY_ADMIN_PASSWORD: "*******"
```

> **The password must be specified encrypted using bcrypt**

> The minimum password length is 8 characters.

#### Application Key

The application key serve to secure user sessions and other encrypted data. It must be set to a 32 characters string.

```yaml
APP_SECRET: "32 characters string"
```

#### K-Registry URL

The K-Registry needs to know the public URL that will be used to access it.

If the K-Registry will be exposed through a secure connection, specify here the HTTPS protocol

```yaml
KLINK_DMS_APP_URL: "https://my.box.tld/"
```

The default configuration, contained in the `docker-compose.yml` file, exposes the K-Registry on localhost, without https and on port `8080`.

#### K-Registry email configuration

The K-Registry requires a valid email SMTP configuration, as user registration requires email validation.

```yaml
MAILER_HOST: "smtp.registry.local"
MAILER_PORT: "587"
MAILER_USER: "user@registry.local"
MAILER_PASSWORD: "test"
MAILER_SENDER_ADDRESS: "kregistry@registry.local"
MAILER_SENDER_NAME: "K-Registry"
```

### K-Link

The K-Link does not have specific configuration.

It worth mention that by default, the docker-compose.yml example file, exposes the port 8080 as the main communication port. 

The `klink` service is realized using NGINX and proxies calls to other services according to:

- K-Search api will be available on `/api`
- K-Search Swagger documentation will be available on `/docs`
- K-Registry will be available on `/registry`

## First startup

Once the configuration file is saved, we can start pulling the required Docker images. We can do it with

```bash
docker-compose pull
```

This operation might take a while.

After all images are downloaded the K-Link can be started with

```bash
docker-compose up --detach
```

This will execute the [startup in detached mode](https://docs.docker.com/compose/reference/up/).

The startup process can be followed with

```bash
docker-compose ps
```

Some services might take some time to startup, using the command `docker-compose logs --follow {service}` will print and follow the log of the specified `{service}`.

> if `docker-compose ps` shows containers, e.g. `klink_registry_1`, terminated with `Exit 1` (or other) codes means that something in the `registry` startup failed.

Once the startup process is complete, open the browser and navigate to http://localhost:8080.

## Next

- [First use](./first-use.md)
- [Running behind a reverse proxy](./reverse-proxy.md)

