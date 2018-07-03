Yii API Starter Kit
===================
Yii API Starter Kit is a skeleton application best for rapidly creating API projects.

REQUIREMENTS
------------
The minimum requirement by this project template that your Web server supports PHP 7.1.

INSTALLATION
------------

Install [composer](http://getcomposer.org/download/).

Download the archive file and then unpack it. 

Copy `composer.json.sample` to `composer.json` and update your `require` data. Then run:

~~~
php composer update
~~~


CONFIGURATION
-------------

Copy `/config/secrets.php.sample` to `/config/secrets.php` and put your real data.
Copy `/config/params.php` to `/config/params-local.php` and update real data.


**NOTE:**
- DOT NOT edit any files except the composer.json, params-local.php, secrets.php

SETUP
-----

If there is any module need to install, run all migration scrips you have, like below for the core module:
~~~
php yii mongodb-migrate --migrationPath=@vendor/powerkernel/yii-core-api/src/migrations --migrationCollection=core_migration
// ...
~~~

Setup the application
~~~
php yii setup
~~~

**NOTE**
Run the commands in /bin directory

TESTING
-------

Tests are located in `tests` directory.