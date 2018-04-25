FROM nginx:1.12-alpine

ENV LOCATION '/usr/share/nginx/html'

## Copy NGINX configuration
COPY docker/nginx/nginx-default.conf /etc/nginx/conf.d/default.conf

## Copy the static site
COPY ./source "$LOCATION"

WORKDIR $LOCATION

EXPOSE 80

