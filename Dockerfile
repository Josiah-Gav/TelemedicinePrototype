FROM php:8.2-apache

# Copy all your project files into the web directory
COPY . /var/www/html/

# Grant Apache ownership of the files so it has permission to read them
RUN chown -R www-data:www-data /var/www/html