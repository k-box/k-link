FROM nginx:1.12-alpine

ENV LOCATION '/usr/share/nginx/html'

## Copy NGINX default configuration
# COPY docker/nginx-default.conf /etc/nginx/conf.d/default.conf

COPY . "$LOCATION"

WORKDIR $LOCATION

EXPOSE 80

