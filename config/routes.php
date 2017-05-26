<?php

$router->get('', 'HomeController@index');

/**
 * Profile
 */
$router->get('profile/{username}', 'ProfileController@index');
$router->get('{username}/{picture}', 'ProfileController@picture');
$router->post('upload/{username}/{picture}', 'ProfileController@upload');

/**
 * Authentication
 */
$router->get('register', 'Auth\RegisterController@register');
$router->post('register', 'Auth\RegisterController@store');
$router->get('login', 'Auth\LoginController@login');
$router->post('login', 'Auth\LoginController@authenticate');
$router->get('logout', 'Auth\LoginController@logout');
