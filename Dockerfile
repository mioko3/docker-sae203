# Utiliser une image Apache avec PHP
FROM php:7.4-apache

# Activer le module mod_rewrite d'Apache et PHP
RUN a2enmod rewrite

# Installer les dépendances nécessaires pour PHP (si vous utilisez PHP pour traiter des fichiers)
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd

# Copier les fichiers de votre projet dans le conteneur
COPY ./html/ /var/www/html/

# Exposer le port 90
EXPOSE 90

# Lancer Apache en mode foreground
CMD ["apache2-foreground"]

