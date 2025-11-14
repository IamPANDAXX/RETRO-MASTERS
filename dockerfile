#usamos una imagen oficial de PHP con Apache
FROM php:8.2-apache

#copiamos todo el repo al contenedor
COPY . /var/www/html/

#activamos mod_rewrite y PHP extensions necesarias
RUN a2enmod rewrite

#ponemos la carpeta public como DocumentRoot
RUN sed -i 's|/var/www/html|/var/www/html/public|g' /etc/apache2/sites-available/000-default.conf

#instalamos PDO y PostgreSQL para PHP
RUN docker-php-ext-install pdo pdo_pgsql

#exponemos el puerto 80
EXPOSE 80

#arrancamos Apache en foreground
CMD ["apache2-foreground"]
