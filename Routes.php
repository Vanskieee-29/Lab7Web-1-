<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// ==========================
// FRONTEND
// ==========================
$routes->get('/', 'Page::home');
$routes->get('about', 'Page::about');
$routes->get('contact', 'Page::contact');
$routes->get('faqs', 'Page::faqs');
$routes->get('tos', 'Page::tos');

$routes->get('artikel', 'Artikel::index');
$routes->get('artikel/(:any)', 'Artikel::view/$1');


// ==========================
// AUTH (LOGIN)
// ==========================
$routes->get('user/login', 'User::login');
$routes->post('user/login', 'User::login');
$routes->get('user/logout', 'User::logout');


// ==========================
// ADMIN (PAKAI FILTER)
// ==========================
$routes->group('admin', ['filter' => 'auth'], function($routes) {
    $routes->get('artikel', 'Artikel::admin_index');
    $routes->get('artikel/add', 'Artikel::add');
    $routes->post('artikel/add', 'Artikel::add');
    $routes->get('artikel/edit/(:any)', 'Artikel::edit/$1');
    $routes->post('artikel/edit/(:any)', 'Artikel::edit/$1');
    $routes->get('artikel/delete/(:any)', 'Artikel::delete/$1');
});


// ==========================
// MATIKAN AUTOROUTE (WAJIB)
// ==========================
$routes->setAutoRoute(false);