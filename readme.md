# EzInventory

## Requirement
* PHP >= 5.5
* MySQL
* Apache / NginX
* Composer

## Setup
* clone the source code from repository https://github.com/vincentsthe/ezinventory
* in project directory, run `composer install`
* create database and import db.sql file from project source
* copy `config.json.default` to `config.json` and enter your database credential
* create virtual host file
  * for apache


```
  <VirtualHost *:80>
      DocumentRoot /path/to/project/source
      ServerName ezinventory.dev
  </VirtualHost>
```

  * for nginx

```
  server {
        listen   80; ## listen for ipv4; this line is default and implie
        #listen   [::]:80 default ipv6only=on; ## listen for ipv6

        root /path/to/project/source;
        index index.html index.htm index.php;
        location / {
                # Check if a file or directory index file exists, else route it to index.php.
		try_files $uri $uri/ /index.php$is_args$args;
	}

	location ~ \.php$ {
            fastcgi_pass   127.0.0.1:9000;
            fastcgi_index  index.php;
            fastcgi_split_path_info ^(.+\.php)(/.+)$;
            fastcgi_param  SCRIPT_FILENAME  $document_root/$fastcgi_script_name;
            include        fastcgi_params;
        }

        server_name ezinventory.dev;
  }
```


* and then modify your /etc/hosts file it redirect ezinventory.dev to 127.0.0.1