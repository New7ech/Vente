# Étape 1 : build avec Composer et dépendances
FROM php:8.3-fpm AS builder

# Installer les dépendances système et PHP (Git, unzip, extensions)
RUN apt-get update && apt-get install -y --no-install-recommends \
    git unzip libzip-dev libonig-dev libxml2-dev libpng-dev libjpeg-dev libfreetype6-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install pdo_mysql zip bcmath gd intl \
    && pecl install redis && docker-php-ext-enable redis \
    && apt-get clean && rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/*

RUN usermod -u 1000 www-data && \
    groupmod -g 1000 www-data && \
    chown -R www-data:www-data /var/www

# Travailler dans /var/www
WORKDIR /var/www

# Copier le code source de l’application Laravel
COPY . /var/www

# Installer Composer et dépendances PHP (mode production)
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer \
    && composer install --no-dev --optimize-autoloader --no-interaction

# Étape 2 : image finale PHP-FPM
FROM php:8.3-fpm

# Installer uniquement les libs d’exécution nécessaires
RUN apt-get update && apt-get install -y --no-install-recommends \
    libpng-dev libjpeg-dev libfreetype6-dev libzip-dev libicu-dev libxml2-dev \
    libonig-dev libpq-dev libcurl4-openssl-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install pdo_mysql zip bcmath gd intl opcache \
    && pecl install redis && docker-php-ext-enable redis \
    && mv "$PHP_INI_DIR/php.ini-production" "$PHP_INI_DIR/php.ini" \
    && apt-get clean && rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/*

# Copier le code et les extensions depuis l'étape builder
COPY --from=builder /usr/local/lib/php/extensions/ /usr/local/lib/php/extensions/
COPY --from=builder /usr/local/etc/php/conf.d/ /usr/local/etc/php/conf.d/
COPY --from=builder /var/www /var/www

# Permissions et utilisateur non privilégié
WORKDIR /var/www
RUN chown -R www-data:www-data /var/www
USER www-data

# Exposer le port PHP-FPM
EXPOSE 9000
CMD ["php-fpm"]
