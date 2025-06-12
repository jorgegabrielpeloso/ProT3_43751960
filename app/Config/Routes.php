<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/', 'Home::index');
$routes->get('/quienes_somos', 'Home::quienes_somos');
$routes->get('/acerca_de', 'Home::acerca_de'); 
$routes->get('/registro', 'Home::registro');
$routes->get('/login', 'Home::login');
$routes->match(['get', 'post'], '/registro', 'Auth::registro');
$routes->get('/registro', 'SignupController::index');
$routes->post('/registro/store', 'SignupController::store');
$routes->get('/login', 'SigninController::index');
$routes->post('/login/auth', 'SigninController::loginAuth');
$routes->get('/logout', 'SigninController::logout');

// Para cuando tengamos la vista de perfil:
$routes->get('/profile', 'ProfileController::index', ['filter' => 'authGuard']);

