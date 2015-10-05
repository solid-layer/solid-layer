server {
    listen 80;
    listen 443 ssl;
    server_name slayer.app;
    root "/var/www/phalconslayer/public";

    index index.html index.htm index.php;

    charset utf-8;

    try_files $uri $uri/ @rewrite;

    location @rewrite {
        rewrite ^(.*)$ /index.php?_url=$1;
    }

    location = /favicon.ico { access_log off; log_not_found off; }
    location = /robots.txt  { access_log off; log_not_found off; }

    access_log off;
    error_log  /var/log/nginx/slayer.app-error.log error;

    sendfile off;

    client_max_body_size 100m;

    location ~ \.php$ {
        fastcgi_split_path_info ^(.+\.php)(/.+)$;
        fastcgi_pass unix:/var/run/php5-fpm.sock;
        fastcgi_index index.php;
        include fastcgi_params;
        fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name;
        fastcgi_intercept_errors off;
        fastcgi_buffer_size 16k;
        fastcgi_buffers 4 16k;
    }

    location ~ /\.ht {
        deny all;
    }

    #ssl_certificate     /etc/nginx/ssl/slayer.app.crt;
    #ssl_certificate_key /etc/nginx/ssl/slayer.app.key;
}