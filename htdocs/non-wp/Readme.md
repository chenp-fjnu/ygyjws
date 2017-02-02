
# How to setup composer and Slim
1. download composer.phar from https://getcomposer.org/doc/00-intro.md#manual-installation
2. put composer.phar to php folder.
3. create composer.bat with following content.
```php
@ECHO OFF
php "%~dp0composer.phar" %*
```

4. run following command to setting the 'disable-tls' option to true
```php

composer config -g -- disable-tls true
```

5. run following command to setting the 'secure-http' option to true
```php
composer config -g -- secure-http true
```

6. install git if you do not have it yet and add folder to PATH. https://git-scm.com/download/win

7. run following command to get slim from packagist.org which is the main composer repository
```php
composer require slim/slim "^3.0"
```

# composer wiki: 
https://getcomposer.org/doc/06-config.md