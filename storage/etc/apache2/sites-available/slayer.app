<VirtualHost *:80>

    DocumentRoot "/var/www/phalconslayer/slayer/public"
    DirectoryIndex index.php
    ServerName slayer.app

    <Directory "/var/www/phalconslayer/slayer/public">
        Options All
        AllowOverride All
        Allow from all
    </Directory>

</VirtualHost>