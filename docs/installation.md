---
Title: Installation
Description: How to install the K-Link
---

# Installation

The K-Link components are available as a [Docker](https://www.docker.com/) images.

This guide will walk you through the installation and configuration of a K-Link instance on a Linux based OS.

## Prerequisites

- meet the [hardware requirements](./requirements.md);
- Use an operating system [supported by Docker](https://docs.docker.com/install/#server) (we recommend GNU/Linux; we use [Debian](https://debian.org) 9);
- [Docker](https://docs.docker.com/install/linux/docker-ce/debian/) and [Docker Compose](https://docs.docker.com/compose/install/) installed.

## Installation

### Environment

First create a directory, which will contain all files needed for the installation. For example, we use `~/deploy/k-link/`.

In this directory we are going to create a configuration file with the name `docker-compose.yml`. It will contain the specific setup, and the sub-folders to hold all the data. For an easy start, the K-Link code comes with an [example file](../docker-compose.example.yml), which already includes all required services. You can just copy it over and rename it:

```bash
curl -o docker-compose.yml https://raw.githubusercontent.com/k-box/k-link/master/docker-compose.example.yml
```

Within this docker compose file, there are five services defined:

1. `klink`, [K-Link Website](./website.md);
2. `registry`, [K-Link Registry](https://github.com/k-box/k-link-registry);
3. `registry-db`, a database (MariaDB) for the K-Link Registry;
4. `ksearch`, the [K-Search](https://github.com/k-box/k-search) API;
5. `engine`, the [K-Search Engine](https://github.com/k-box/k-search-engine) based on Apache SOLR.

Each service indicate which Docker image to use and some basic environment variables.

**Please note:** Per default configuration, the data is saved inside the same directory you located the `docker-compose.yml`, inside a directory called `storage`.

## Configuration

The example `docker-compose.yml` file contains already suitable defaults for most of the configuration and if you want to test the Software locally, just go ahead without any modification: You will be able to login to the K-Link Registry with `admin` and the password `123456789`.

When running this K-Link on a server make sure you adjust at least the following variables:

- The domain the K-Link is running: `KREGISTRY_DOMAIN`
- Admin user and password for the K-Link Registry: `KREGISTRY_ADMIN_USERNAME`, `KREGISTRY_ADMIN_PASSWORD`
- Alter the used database passwords: `MYSQL_ROOT_PASSWORD`, `MYSQL_PASSWORD`, `DATABASE_PASSWORD`
- Define freely a different application key for the K-Link Registry: `APP_SECRET`

Learn more about the [deployment configuration](./deploy-configuration.md).

### Download and start

Once the configuration file has been saved, you can make Docker to download the required images and start up the services.

Just execute in your directory:

```bash
docker-compose up --detach
```

_Running this for the first time, this step will download quite a lot of data and might take a while._

Afterwards K-Link will be available:

- the K-Link Website on: http://localhost:8181/
- the interface of the K-Link Registry on: http://localhost:8181/registry
- the endpoint of the K-Search API on: http://localhost:8181/api
- and the K-Search API Swagger documentation on: http://localhost:8181/docs

### Useful commands

There are some handy commands you can use to manage your K-Link:

| Function | Command |
|----------|---------|
| Start K-Link | `docker-compose up --detach` |
| Stop K-Link | `docker-compose stop` |
| Check status of running instances | `docker-compose ps` |
| See logs | `docker-compose logs --follow` |

**Please note**: Make sure you execute all these commands inside the directory you placed the `docker-compose.yml` file.

For more information see complete [documentation on Docker Compose](https://docs.docker.com/compose/reference/up/).

## Upgrade

Check the [upgrade guide](./upgrade.md) if you have an already running K-Link that needs to be
upgraded to the latest version.

## Next

- [Running behind a reverse proxy](./reverse-proxy.md)
- [Public facing website](./website.md)
