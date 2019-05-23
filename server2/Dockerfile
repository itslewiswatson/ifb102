# Base Nginx + PHP-FPM image
FROM richarvey/nginx-php-fpm:1.5.5

# Base dependencies
RUN apk update && \
	apk upgrade && \
	apk add --no-cache \
	libcurl \
	libcrypto1.1 \
	libssl1.1 \
	curl-dev && \
	docker-php-ext-configure zip --enable-zip && \
	docker-php-ext-configure intl --enable-intl && \
	docker-php-ext-install \
		zip \
		intl \
		mysqli \

# Integration depedencies
RUN apk update && \
    apk add php7

# Copy source code
COPY ../server2 /var/www/server2

# Expose port 3001
EXPOSE 3001