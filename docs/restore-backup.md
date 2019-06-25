---
Title: Restore backup
Description: How to restore a K-Link backup
---

Assuming that you have a full backup, as presented in the [backup section](./backup.md), 
restoring it means create a new K-Link installation and place the storage and configuration options 
in the correct place.

**notices**

- If you used a tool to create backup archives, like Restic, please ensure that the data are available
and can be copied on the machine.
- Make sure to use the same K-Link version as the one that was running at the time of the backup
- Restore a backup on the same domain as it was created on. Transfer of domain is not supported and must 
  be done manually. See [Transfer to another domain](./transfer-to-another-domain.md) for further information

**before start**

- Ensure that the server/machine you are restoring the backup on meet the [installation requirements](./requirements.md).
- Ensure that the backup contains at least
  - a Docker compose file, e.g. `docker-compose.yml`, and 
  - two folders `database` and `index`
- Ensure that you can manage the domain under which the K-Link was previously available

### Preparing to restore the backup

Create a folder for the configuration and a folder structure based on 
the volumes configuration in the `docker-compose.yml` file.

The volume folders can be found in the docker-compose.yml in 
the volume configuration for each service. Volumes could be
defined on separate partitions or in the same directory
as the configuration file.

```yaml
# Case 1, storage on separate partition
volumes:
 - "/mnt/data/index:/opt/solr/k-search/k-search/data"

# Case 2, storage inside the same directory as the configuration
volumes:
 - "./storage/k-Link/database:/var/lib/mysql"
```

Proceed to create the same folder structure as presented in the docker compose file 
or change the local folder for the volume configuration according to your needs. 

Usually the folder names have this meaning:

- `data`, the storage directory of the K-Link (`/var/www/k-search/var/data-downloads` inside the `ksearch` container)
- `database`, the storage directory of the MySql/MariaDB database (`/var/lib/mysql` inside the `registry-db` container)
- `index`, the storage directory for the Apache Solr index (`/opt/solr/k-search/k-search/data` inside the `engine` container)

Now transfer the backup content into the created folder structure.

> Change of file owner or group owner might be necessary


### Pulling the docker images

Pull the docker images by executing the following command

```
docker-compose pull
```

### Reverse proxy

If the K-Link was deployed behind a reverse proxy, the configuration might contain additional lines. 
For example the Traefik configuration could appear as follows:

```yml
labels:
 - "traefik.enable=true"
 - "traefik.frontend.rule=Host: my.domain.com"
 - "traefik.docker.network=reverseproxy_web"
```

Before starting up the K-Link ensure that the [proxy service is properly configured](./reverse-proxy.md). 


### Start-up

Now the K-Link can be start.

```
docker-compose up -d
```

For K-Link startup problems and errors check the logs using `docker-compose logs --follow`.

If the startup procedure complete without errors you can browse the K-Link at its original domain.

### Importing a dump of the data descriptors

If you want to import data descriptors from a previous export, you can do it using the [K-Link Import/Export tool](https://github.com/k-box/k-link-import-export).

## Additional resources

- [Transfer to another domain](./transfer-to-another-domain.md)
