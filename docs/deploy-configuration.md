# Deployment configuration

## Persistency

**Please note:** Per default configuration, the data is saved inside the same directory you located the `docker-compose.yml`, inside a directory called `storage`:

```
|-- deploy/k-link/
    |-- storage
        |-- data
        |-- index
        |-- database
    |-- docker-compose.yml
```

## Configuration values

The example Docker Compose file contains suitable defaults for most of the configuration, however some values are mandatory to change:

- Define the used database passwords (`MYSQL_ROOT_PASSWORD`,`MYSQL_PASSWORD`,`DATABASE_PASSWORD`);
- Admin user and password for the K-Link Registry (`KREGISTRY_ADMIN_USERNAME`, `KREGISTRY_ADMIN_PASSWORD`);
- The domain the K-Link is running: (`REGISTRY_HTTP_DOMAIN`, `REGISTRY_HTTP_BASE_PATH`).

The default configuration, contained in the `docker-compose.yml` file, exposes the K-Link on localhost, without https and on port `8181`.

### Database

The `database` requires two passwords, the first is the root password and the second is the user password for accessing the specific new database.

```yaml
MYSQL_ROOT_PASSWORD: "238..."
MYSQL_PASSWORD: "b25..."
```

The `MYSQL_PASSWORD` password must be copied in the `kregistry` service configuration as `REGISTRY_DB_PASS`

```yaml
REGISTRY_DB_PASS: "b25..."
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

> The minimum password length is 8 characters.


#### K-Registry URL

The K-Registry needs to know the public domain that will be used to access it and, if required, the path

```yaml
REGISTRY_HTTP_DOMAIN: "klink.example.example"
REGISTRY_HTTP_BASE_PATH: "/registry"
```

#### K-Registry email configuration

The K-Registry requires a valid email SMTP configuration, as user registration requires email validation.

```yaml
REGISTRY_SMTP_HOST: "smtp.registry.local"
REGISTRY_SMTP_PASS: "****"
REGISTRY_SMTP_FROM: "K-Link <fake@klink.example.example>"
REGISTRY_SMTP_PORT: "587"
```
