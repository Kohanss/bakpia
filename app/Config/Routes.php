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
// $routes->post('/admin/produk/update-data', 'Admin\admin::posteditdata');
// $routes->get('/admin/produk/add-data', 'Admin\admin::addData');
// $routes->post('/admin/login/success', 'Admin\admin::login_post');
// $routes->post('/eror', 'Admin\admin::login_post');

// LOGIN
$routes->get('/login', 'Admin\admin::login_page');
$routes->post('/login', 'Admin\admin::login_post');

// LOGOUT
$routes->post('/logout', 'Admin\admin::logout');

// SEARCH DATA
$routes->post('/admin/search', 'Admin\admin::search');

// ADD DATA
// $routes->get('/admin/produk/add-data', 'Admin\admin::get_detail_add');
$routes->post('/admin/produk/add-data', 'Admin\admin::add_product');

// DELETE PRODUCT
// $routes->get('/admin/product/delete(:any)', 'Admin\admin::product_delete/$1');
$routes->post('/admin/product/delete', 'Admin\admin::product_delete');

// UPDATE PRODUCT
// $routes->get('/admin/product/update(:any)', 'Admin\admin::get_detail_update/$1');
$routes->post('/admin/product/update(:any)', 'Admin\admin::update_product/$1');

// STOCK
$routes->get('/stock', 'stok\stok::stock');
// UPDATE PRODUCT STOCK
// $routes->get('/admin/stock/update(:any)', 'stok\stok::get_detail_update_stock/$1');
$routes->post('/admin/stock/update(:any)', 'stok\stok::update_product_stock/$1');

// CATEGORY
$routes->get('/category', 'category\category::category');
// UPDATE PRODUCT CATEGORY
$routes->get('/admin/category/update(:any)', 'category\category::get_detail_update_category/$1');
$routes->post('/admin/category/update(:any)', 'category\category::update_product_category/$1');
// ADD DATA CATEGORY
$routes->get('/admin/category/add_data', 'category\category::get_detail_add_category');
$routes->post('/admin/category/add_data', 'category\category::add_product_category');
// DELETE CATEGORY
$routes->post('/admin/category/delete', 'category\category::product_delete_category');

// TYPE
$routes->get('/type', 'type\type::type');
// ADD DATA TYPE
$routes->get('/admin/type/add_data', 'type\type::get_detail_add_type');
$routes->post('/admin/type/add_data', 'type\type::add_product_type');
// UPDATE PRODUCT TYPE
$routes->get('/admin/type/update(:any)', 'type\type::get_detail_update_type/$1');
$routes->post('/admin/type/update(:any)', 'type\type::update_product_type/$1');
// DELETE TYPE
$routes->post('/admin/type/delete', 'type\type::product_delete_type');

// TRANSACTION
$routes->get('/transaction', 'transaction\transaction::transaction');
$routes->get('/transaction_history', 'transaction\transaction::transaction_history');
$routes->post('/admin/transaction/accept(:any)', 'transaction\transaction::accept_product_transaction/$1');
$routes->post('/admin/transaction/delete', 'transaction\transaction::product_delete_transaction');

// ACCOUNT
$routes->get('/account', 'Admin\admin::account');
$routes->post('/admin/account/update', 'Admin\admin::update_account'); 

// EDIT ACCOUNT
$routes->get('/edit-account', 'Admin\admin::edit_account');
$routes->post('/admin/account/regist', 'Admin\admin::regist_account');
$routes->post('/admin/account/update2', 'Admin\admin::update2_account'); 
$routes->post('/admin/account/delete', 'Admin\admin::delete_account'); 

// REGIST ACCOUNT
$routes->post('/admin/account/regist', 'Admin\admin::regist_account');

