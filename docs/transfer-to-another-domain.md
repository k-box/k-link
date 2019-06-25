---
Title: Transfer a K-Link to another domain
Description: How to move the K-Link to another domain
---

To change the domain of K-Link all documents needs to be reindexed and the registry configuration needs to be changed.

> If the K-Link is running, stop it and clean any docker container `docker-compose down` 
> (make sure data is persisted, otherwise you will loose it).

First change the domain of the Registry service in the deploy configuration file (usually `docker-compose.yml`):

```yml
"REGISTRY_HTTP_DOMAIN=new.domain.com"
```

Now the K-Link can be restarted

```
docker-compose up -d
```

Now you can update the configuration of all the connected applications.
