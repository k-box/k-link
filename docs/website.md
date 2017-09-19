# K-Link Explore Static landing page

K-Link Explore is a static website used as default entrypoint for a K-Link deployment.

**Browser Support**

Target browser support includes modern web browsers: Edge 15+, Chrome, Firefox, Safari, Opera together with their mobile counterparts.

In addition to modern browsers we support IE10 (on best effort) and IE11. IE 9 and below are not supported.


### Site Usage

Suggested usage is with the Docker image. The Docker image contains an NGINX proxy, which will serve all the static content on port 80.

```
docker pull docker.klink.asia/alessio.vertemati/klink-explore-static
```

## Development

The website is generate using a single html file, called `index.html`

### Preview your site

You can preview your local development with any webserver.

## Docker image

The website can be generated and browsed via a Docker image.
 
```bash
# Building the image
docker build -t klink-explore-static .

# Running it
docker run --rm -p 8000:80 klink-explore-static
```

