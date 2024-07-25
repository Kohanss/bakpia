<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// $routes->get('/', 'Home::index');
$routes->get('/', 'Pages::index');
$routes->get('/produk', 'Pages::produk');
$routes->get('/pages/search', 'Pages::search');
$routes->get('/tentang', 'Pages::tentang');
$routes->get('/toko', 'Pages::toko');
// $routes->post('pages/search', 'Pages::search', ['post']);
// $routes->get('/loginUser', 'Pages::loginUser');
$routes->get('/admin', 'Admin\admin::admin');
$routes->post('/admin/produk/update-data', 'Admin\admin::posteditdata');
// $routes->get('/admin/produk/add-data', 'Admin\admin::addData');
$routes->get('/category', 'Admin\Dashboard::category');
$routes->get('/unit', 'Admin\Dashboard::unit');
$routes->post('/admin/login/success', 'Admin\admin::login_post');
$routes->post('/eror', 'Admin\admin::login_post');

// LOGIN SYSTEM
$routes->get('/login', 'Admin\admin::login_page');
$routes->post('/login', 'Admin\admin::login_post');

// SEARCH DATA
$routes->post('/admin/search', 'Admin\admin::search');

// ADD DATA
$routes->get('/admin/produk/add-data', 'Admin\admin::get_detail_add');
$routes->post('/admin/produk/add-data', 'Admin\admin::add_product');

// DELETE PRODUCT
$routes->get('/admin/product/delete(:any)', 'Admin\admin::product_delete/$1');

// UPDATE PRODUCT
$routes->get('/admin/product/update(:any)', 'Admin\admin::get_detail_update/$1');
$routes->post('/admin/product/update(:any)', 'Admin\admin::update_product/$1');
