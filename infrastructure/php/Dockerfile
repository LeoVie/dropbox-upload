FROM php:8.0.3-cli

COPY infrastructure/php/install_composer.sh /install_composer.sh
RUN chmod +x /install_composer.sh && /install_composer.sh
COPY app/ app/
RUN apt-get update -y && apt-get install -y git unzip libzip-dev
RUN docker-php-ext-install zip && docker-php-ext-enable zip
RUN cd /app && composer install --no-dev
ENTRYPOINT ["php", "/app/src/upload.php"]
CMD []