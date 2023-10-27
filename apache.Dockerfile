FROM php:8.1-apache

# 更新系统并安装必要的PHP扩展
RUN apt update && \
    docker-php-ext-install mysqli pdo pdo_mysql
RUN chmod 755 /var/www/html/index.php
RUN chmod -R 755 /var/www/App