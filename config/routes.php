<?php

$router->get('', 'HomeController@index');
$router->get('home', 'DashboardController@index');

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
$router->get('logout', 'Auth\LoginController@logout');
$router->post('register', 'Auth\RegisterController@register');
