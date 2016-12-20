##Installation and Run the Application
- This Percentile Appication is developed in Laravel Framework.
- The Percentile Appication is tested in Windows 7 System in which Wamp 2.5 Server is installed which consists of Apache(2.4.9), PHP(5.5.12), Mysql (5.6.12)

Run the Percentile Application
- Directly download the code from Git in C:/wamp/www/percentile folder
- Open the file "C:/wamp/bin/apache/apache2.4.9/conf/httpd.conf" and Remove the #(number) symbol in the line virtual host is enable "Include conf/extra/httpd-vhosts.conf"
- Create a Virtual Host inside the C:/wamp/bin/apache/apache2.4.9/conf/extra/httpd-vhosts.conf file, create a new Virtual Host block and place the below code inside it.

    ServerAdmin mohan.istq@gmail.com
    DocumentRoot "C:/wamp/www/percentile/public"
    ServerName dev.percentile.com
    CustomLog "logs/mysite-access.log" common

- Add the text "127.0.0.1 dev.percentile.com" at the end of the file C:/Windows/System32/drivers/etc/hosts.
- Now, your virtual host is ready.

- Resart your wamp server
- In the browser, provide the link "dev.percentile.com", if you have followed all the steps properly then youll be seeing a working laravel application
- To test our application provide the link "dev.percentile.com/percentile" which displays all ID, Name, GPA and Percentile Rank in table format.

Application description
- All the controller activities is done in the file "C:/wamp/www/percentile/app/Http/Controllers/PercentileController.php"
- All the model (database and logical operation) activities is done in the file "C:/wamp/www/percentile/app/Http/Percentile.php"
- All the view activities is done in the file "C:/wamp/www/percentile/resources/views/percentil.blade.php"

To Unit Test the application
- Laravel by default installs the PHPUnit folder which is used to test by values getting from the expected value
- In the command prompt provide the command "cd C:/wamp/www/percentile" 
- Then run the command "phpunit". You can see the list of tests, assertions and failures
- To view the failure, kindly change the value in the file "C:/wamp/www/percentile/tests/PercentilTest.php" on the line 36, 45, 54 and 63 change the excepted value. Then you can find the failure results.


Steps followed to Install and Run Percentile Appication
- Install Composer (https://getcomposer.org/)
- After Installing the Composer, run the command prompt in "composer require laravel/installer" which downloads the laravel setup and install in your system.
- You need to add the laravel.bat link inside windows path
- Open command prompt and points to the folder "C:/wamp/www/" and run the command "laravel new percentile", which creates a working laravel application
- Create Virtual Host which needs to be configured in Apache.
- Open command prompt and points to the folder "C:/wamp/www/percentile" and provided the command "php artisan make:test PercentilTest", which creates a copy to test our values.

## Laravel PHP Framework

[![Build Status](https://travis-ci.org/laravel/framework.svg)](https://travis-ci.org/laravel/framework)
[![Total Downloads](https://poser.pugx.org/laravel/framework/d/total.svg)](https://packagist.org/packages/laravel/framework)
[![Latest Stable Version](https://poser.pugx.org/laravel/framework/v/stable.svg)](https://packagist.org/packages/laravel/framework)
[![Latest Unstable Version](https://poser.pugx.org/laravel/framework/v/unstable.svg)](https://packagist.org/packages/laravel/framework)
[![License](https://poser.pugx.org/laravel/framework/license.svg)](https://packagist.org/packages/laravel/framework)

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable, creative experience to be truly fulfilling. Laravel attempts to take the pain out of development by easing common tasks used in the majority of web projects, such as authentication, routing, sessions, queueing, and caching.

Laravel is accessible, yet powerful, providing powerful tools needed for large, robust applications. A superb inversion of control container, expressive migration system, and tightly integrated unit testing support give you the tools you need to build any application with which you are tasked.

## Official Documentation

Documentation for the framework can be found on the [Laravel website](http://laravel.com/docs).

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](http://laravel.com/docs/contributions).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell at taylor@laravel.com. All security vulnerabilities will be promptly addressed.

### License

The Laravel framework is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT)
