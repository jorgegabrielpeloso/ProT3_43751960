<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// Páginas públicas
$routes->get('/', 'Home::index');
$routes->get('/inicio', 'Home::index');
$routes->get('/quienes_somos', 'Home::quienes_somos');
$routes->get('/acerca_de', 'Home::acerca_de');

// Registro (vista y procesamiento)
$routes->get('/registro', 'Usuarios_controller::create');
$routes->post('/usuarios/validar', 'Usuarios_controller::validar');

// Login y logout
$routes->get('/login', 'SigninController::index');
$routes->post('/login/auth', 'SigninController::loginAuth');
$routes->get('/logout', 'SigninController::logout');

// Perfil del usuario común
$routes->get('/profile', 'ProfileController::index');
$routes->post('/profile/update', 'ProfileController::update');


// Dashboard (admin o usuario)
$routes->get('/admin', 'AdminController::index');

// CRUD integrado al admin_dashboard.php
$routes->post('/admin/usuarios/guardar', 'AdminController::guardarUsuario');
$routes->get('/admin/usuarios/editar/(:num)', 'AdminController::editarUsuario/$1');
$routes->post('/admin/usuarios/actualizar', 'AdminController::actualizarUsuario');
$routes->get('/admin/usuarios/eliminar/(:num)', 'AdminController::eliminarUsuario/$1');
$routes->get('/admin/usuarios/reactivar/(:num)', 'AdminController::reactivarUsuario/$1');

// Tienda
$routes->get('/tienda', 'TiendaController::index');

