#!/bin/bash
set -e

# Start MySQL service
service mysql start

# Ensure MySQL is initialized
mysql -e "CREATE USER IF NOT EXISTS 'admin'@'%' IDENTIFIED BY 'admin123';"
mysql -e "GRANT ALL PRIVILEGES ON *.* TO 'admin'@'%' WITH GRANT OPTION;"
mysql -e "FLUSH PRIVILEGES;"

# Start Apache service
service apache2 start

# Keep the container running
tail -f /var/log/apache2/access.log