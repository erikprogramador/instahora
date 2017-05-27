<?php

$router->get('', 'HomeController@index');

/**
 * Profile
 */
$router->get('profile/{username}', 'ProfileController@index');
$router->get('picture/{picture}', 'ProfileController@picture');
$router->post('upload/{username}', 'ProfileController@upload');

/**
 * Authentication
 */
$router->post('login', 'Auth\LoginController@authenticate');
$router->post('register', 'Auth\RegisterController@register');
