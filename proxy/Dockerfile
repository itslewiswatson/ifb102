FROM ubuntu:bionic

RUN apt-get update && apt-get upgrade -y

RUN apt-get update \
    && apt-get install -y nginx

RUN rm -rf /etc/nginx/sites* \
    && ln -sf /dev/stdout /var/log/nginx/access.log \
    && ln -sf /dev/stderr /var/log/nginx/error.log

EXPOSE 80

CMD ["nginx", "-g", "daemon off;"]