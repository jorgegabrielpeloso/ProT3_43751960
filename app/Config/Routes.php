<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', 'Home::index');
$routes->get('/inicio', 'Home::index');
$routes->get('/quienes_somos', 'Home::quienes_somos');
$routes->get('/acerca_de', 'Home::acerca_de');

// Usuarios
$routes->get('/registro', 'Usuarios_controller::create');
$routes->post('/usuarios/validar', 'Usuarios_controller::validar');

// Login
$routes->get('/login', 'SigninController::index');
$routes->post('/login/auth', 'SigninController::loginAuth');
$routes->get('/logout', 'SigninController::logout');

// Perfil
$routes->get('/profile', 'ProfileController::index');
