<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 28.11.2017
 * Time: 15:24
 */

if ( ! @include __DIR__ . '/../vendor/autoload.php') {
    die("You must set up the project dependencies, run the following commands:
wget http://getcomposer.org/composer.phar
php composer.phar install --dev
");
}