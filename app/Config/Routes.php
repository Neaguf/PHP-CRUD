<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/services', 'Services::index');
$routes->get('/services/edit', 'Services::edit');
$routes->post('services/save_changes', 'Services::save_changes');
$routes->get('/Login', 'Login::index');
$routes->get('/Register', 'Register::index');
$routes->post('/register_user', 'Register::registerUser');
$routes->post('/login_user', 'Login::login_user');
$routes->get('/logout', 'Login::logout');
$routes->get('/home/edit', 'Home::edit');
$routes->post('home/save_changes', 'Home::save_changes');
