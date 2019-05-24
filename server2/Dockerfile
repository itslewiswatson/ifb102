# Base Nginx + PHP-FPM image
FROM richarvey/nginx-php-fpm:1.5.5

# Base dependencies
RUN apk update && \
	apk upgrade \
	docker-php-ext-install mysqli && docker-php-ext-enable mysqli

# Integration depedencies
RUN apk update && \
    apk add php7

# Copy source code
COPY ./server2 /var/www/server2

# Expose port 3001
EXPOSE 3001