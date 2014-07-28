#!/usr/bin/env bash

# Update remote package metadata
# cat /vagrant/vagrant/source.list >> /etc/apt/source.list
# apt-get update -q

# Install deb dependencies
# apt-get install -y \
#	curl \
#	php5 \
#	php5-cli \
#	php5-json \
#	php5-curl \
#	apache2 \
#	mysql-server-5.5 \


# Setup apache virtualhost
# rm -rf /var/www
# ln -fs /vagrant /var/www
# cat /vagrant/vagrant/virtualhost >> /etc/apache2/httpd.conf
# service apache2 restart