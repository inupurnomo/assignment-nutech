<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// auth
$routes->get('/login','Auth::login');
$routes->post('/loginAction','Auth::loginAction');
$routes->get('/register','Auth::register');
$routes->post('/registerAction','Auth::registerAction');
$routes->get('/logout','Auth::logout');

// dashboard
$routes->get('/', 'Home::dashboard');
$routes->get('/topup','Home::topup');
$routes->post('/topupAction','Home::topupAction');
$routes->get('/service/(:any)', 'Home::service/$1');
$routes->POST('/serviceAction', 'Home::serviceAction');
$routes->get('/history','Home::history');
$routes->post('/transaksi','Home::serviceAction');

// User
$routes->get('/profile','User::profile');
$routes->get('/profile/edit','User::editProfile');
$routes->post('profile/edit', 'User::editProfileAction');
$routes->get('profile/image', 'User::editImage');
$routes->post('profile/image', 'User::updateImage');