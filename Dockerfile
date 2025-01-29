# Command to create image
# docker-compose up --build -d

FROM ubuntu:24.04

# Installing packages
RUN apt-get update -y
RUN apt-get install tzdata -y
RUN apt-get install apache2 -y
RUN apt-get install php libapache2-mod-php php-mysql php-curl php-cgi -y
RUN apt-get install mysql-server -y


# Optional
RUN apt-get install nano -y
RUN apt-get install net-tools -y


# Installing phpmyadmin and configure it with apache
# DEBIAN_FRONTEND=noninteractive is used to prevent package prompts
RUN DEBIAN_FRONTEND=noninteractive apt install phpmyadmin php-mbstring php-zip php-gd php-json -y
RUN echo "Include /etc/phpmyadmin/apache.conf" >> /etc/apache2/apache2.conf

# Overriding apache config
RUN a2enmod rewrite
RUN sed -i '/<Directory \/var\/www\/>/,/<\/Directory>/ s/AllowOverride None/AllowOverride All/' /etc/apache2/apache2.conf

# Replace the bind-address value with 0.0.0.0
RUN sed -i 's/bind-address.*/bind-address = 0.0.0.0/' /etc/mysql/mysql.conf.d/mysqld.cnf

# Update the config-db.php file
RUN sed -i "s/\$dbuser='.*';/\$dbuser='';/" /etc/phpmyadmin/config-db.php
RUN sed -i "s/\$dbpass='.*';/\$dbpass='';/" /etc/phpmyadmin/config-db.php
RUN sed -i "s/\$dbserver='.*';/\$dbserver='127.0.0.1';/" /etc/phpmyadmin/config-db.php

WORKDIR /
RUN mkdir -p /app
COPY ./docker-entrypoint.sh /app

RUN chmod +x /app/docker-entrypoint.sh

WORKDIR /var/www/html
COPY . .

RUN chmod -R 777 /var/www/html

EXPOSE 3306 80

CMD ["/app/docker-entrypoint.sh"]