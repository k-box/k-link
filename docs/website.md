# K-Link Explore

K-Link Explore is a static landing page, used as default entrypoint for a K-Link deployment.

**Browser Support**

Target browser support includes modern web browsers: Edge 15+, Chrome, Firefox, Safari, Opera together with their mobile counterparts.

In addition to modern browsers we support IE10 (on best effort) and IE11. IE 9 and below are not supported.


### Site Usage

Suggested usage is with the Docker image. The Docker image contains an NGINX proxy, which will serve all the static content on port 80.

```
docker pull docker.klink.asia/images/k-link
```

> This will pull the latest version, if you want a specific version append the version tag to the Docker image name, e.g. `docker.klink.asia/images/k-link:0.1.0`

## Development

The website content is located in the `/source` directory. The `index.html` file is the main entrypoint. 

### Preview your site

You can preview your local development with any webserver.

## Docker image

The website can be generated and browsed via a Docker image.
 
```bash
# Building the image
docker build -t k-link .

# Running it (this will only run the static website)
docker run --rm -p 8000:80 k-link
```

