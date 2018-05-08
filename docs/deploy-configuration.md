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
- A freely definable application key for the K-Link Registry (`APP_SECRET`);
- The domain the K-Link is running: (`KREGISTRY_DOMAIN`).

The default configuration, contained in the `docker-compose.yml` file, exposes the K-Box on localhost, without https and on port `8181`.

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

> **The password must be specified encrypted using bcrypt**. When inserting it, escape the `$`, by adding another `$` char before, e.g. `$` become `$$`.

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
