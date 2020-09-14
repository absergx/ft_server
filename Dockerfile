FROM debian:buster
EXPOSE 80 443
RUN apt-get -y update
RUN apt-get -y upgrade

#install PHP

RUN apt-get install -y php php-common && \
		apt-get install -y php-cli php-fpm php-json php-pdo \
		php-mysql php-zip php-gd php-mbstring \
		php-curl php-xml php-pear php-bcmath

#install WGET and nginx and MYSQL

RUN apt-get install -y wget \
		&& apt-get install -y nginx \
		&& apt-get install -y mariadb-server

#install PHPMYADMIN

RUN wget https://files.phpmyadmin.net/phpMyAdmin/5.0.2/phpMyAdmin-5.0.2-all-languages.tar.gz \
		&& tar -xzvf phpMyAdmin-5.0.2-all-languages.tar.gz -C /var/www/ \
		&& mv /var/www/phpMyAdmin-5.0.2-all-languages /var/www/phpMyAdmin \
		&& rm -rf phpMyAdmin-5.0.2-all-languages.tar.gz
COPY ./srcs/config.inc.php /var/www/phpMyAdmin/

#install WORDPRESS

RUN wget https://wordpress.org/latest.tar.gz \
		&& tar -xzvf latest.tar.gz -C /var/www/ \
		&& rm -rf latest.tar.gz
COPY /srcs/wp-config.php /var/www/wordpress

#configurate NGINX

COPY /srcs/nginx-config.conf /etc/nginx/sites-avaliable/
RUN ln -s /etc/nginx/sites-avaliable/nginx-config.conf /etc/nginx/sites-enabled/

#generate SSL

RUN openssl req -days 365 -newkey rsa:2048  \
		-x509 \
		-sha256 \
		-nodes \
		-out /etc/ssl/certs/certificate.crt \
		-keyout /etc/ssl/certs/key.key \
		-subj '/C=RU/ST=XX/L=XX/O=XX/OU=XX/CN=born2code'

#configurate MYSQL

COPY /srcs/sql.mysql /var/
RUN service mysql start && mysql -u root mysql < /var/sql.mysql

#grant rights
RUN chmod 755 -R /var/www/* \
		&& chown -R www-data:www-data /var/www/*

#copy autoindex script

COPY ./srcs/autoindex.sh .

#run services

RUN service nginx start && service php7.3-fpm start
COPY /srcs/restart-services.sh .
CMD bash restart-services.sh
