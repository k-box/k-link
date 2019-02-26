# K-Link Website

K-Link Website is a static landing page, used as default entry-point for a K-Link deployment.
The web pages are generated using [Jigsaw](https://jigsaw.tighten.co/), a PHP based static site generator.

**Browser Support**

Target browser support includes modern web browsers: Edge 15+, Chrome, Firefox, Safari, Opera
together with their mobile counterparts. In addition to modern browsers we support IE11.
IE 10 and below are not officially supported.


### Site Usage

Suggested usage is with the Docker image. The Docker image contains an NGINX proxy and a general purpose build,
which will serve all the static content on port 80.

```
docker pull docker.klink.asia/images/k-link
```

> This will pull the latest version, if you want a specific version append the version tag to the Docker image name, e.g. `docker.klink.asia/images/k-link:0.1.0`

If you want to personalize the website content you can still [build a Docker image](#docker-image) that includes
your content


## Development

**preliminary steps**

In order to change content and or style, we first need to pull the development dependencies.
Since the website is based on [Jigsaw](https://jigsaw.tighten.co/) it means do a Composer install
and then use Yarn or NPM to pull javascript related dependencies.

```bash
composer install

yarn
# or npm install
```

**building and previewing**

Once all dependencies are installed you can build a local version by running

```bash
yarn local
# or npm run local
```

This will compile the CSS, the Javascript and create the HTML output for each defined page.

The result will be available inside the `build_local` folder.


If you want to immediately see and browse the output using a web browser you could execute

```bash
yarn watch
# or npm run watch
```

This will create a local build, starts a webserver and open the browser

> More details can be found in the [Jigsaw documentation](https://jigsaw.tighten.co/docs/building-and-previewing/)


**configuration**

The website default configuration is stored in the `config.php` file. This file define the website title,
description and general options.

Different configuration files are present for the [defined environments](https://jigsaw.tighten.co/docs/environments/)

- `config.staging.php` define the changes/addition to the configuration for generating a staging preview (`yarn staging`)
- `config.production.php` define the changes/addition to the configuration for the production build (`yarn production`)

**content creation**

The website content is located in the `/source` directory. You can customize the website content by 
following the official [Jigsaw documentation](https://jigsaw.tighten.co/docs/content/)


In addition to the default configuration we offer

- [Tailwind CSS](https://tailwindcss.com/), a utility CSS framework that allows you to customize your design without touching a line of CSS
- [Purgecss](https://www.purgecss.com/) to remove unused selectors from your CSS, resulting in smaller CSS files

## Docker image

The website can be generated and browsed via a Docker image.

```bash
# Building the image
docker build -t k-link .

# Running it (this will only run the static website)
docker run --rm -p 8000:80 k-link
```
