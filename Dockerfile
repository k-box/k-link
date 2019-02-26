
## Build step
FROM edbizarro/gitlab-ci-pipeline-php:7.1 AS builder
COPY --chown=php:php . /var/www/html
RUN composer install --prefer-dist &&\
    yarn config set cache-folder .yarn && \
    yarn && yarn production

## Build the production image
FROM nginx:1.14-alpine

ENV LOCATION '/usr/share/nginx/html'

## Copy NGINX configuration
COPY docker/nginx/nginx-default.conf /etc/nginx/conf.d/default.conf

## Copy the build of the site
COPY --from=builder /var/www/html/build_production/ "$LOCATION"

WORKDIR $LOCATION

EXPOSE 80

