<p align="center">
    <a href="https://github.com/yiisoft" target="_blank">
        <img src="https://avatars0.githubusercontent.com/u/993323" height="100px">
    </a>
    <h1 align="center">Yii 2.1 Project Template</h1>
    <br>
</p>

Yii 2.1 Project Template is a skeleton [Yii 2](http://www.yiiframework.com/) application best for
rapidly creating projects.

# REQUIREMENTS
 

The minimum requirement by this project template that your Web server supports PHP 7.1.


# INSTALLATION

Download the archive file, unpack then run
~~~
php composer update
~~~


CONFIGURATION
-------------

Rename `/config/secrets.php.sample` to `/config/secrets.php` and put your real data.
Copy `/config/params.php` to `/config/params-local.php` and update real data.


**NOTES:**
- DOT NOT edit any files except the composer.json

SETUP
-----

Just run the following commands in /bin directory
~~~
php yii mongodb-migrate --migrationPath=@vendor/powerkernel/yii-core-api/src/migrations --migrationCollection=core_migration
php yii setup
~~~

TESTING
-------

Tests are located in `tests` directory.