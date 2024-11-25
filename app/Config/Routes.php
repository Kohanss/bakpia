<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// HALAMAN UTAMA
$routes->get('/', 'Pages::index');
$routes->post('/filter', 'Pages::index_filter');

// HALAMAN PRODUK
$routes->get('/produk', 'Pages::produk');
$routes->post('/produk/filter', 'Pages::produk_filter');

// HALAMAN TENTANG
$routes->get('/tentang', 'Pages::tentang');

// HALAMAN TOKO
$routes->get('/toko', 'Pages::toko');
$routes->post('/toko/filter', 'Pages::toko_filter');

// HALAMAN KERANJANG
$routes->get('/keranjang', 'Pages::pembelian');
$routes->post('/keranjang/beli', 'Pages::pembelian_post');
$routes->post('/keranjang/beli/transaksi', 'Pages::pembayaran_post');

//HALAMAN HISTORI PEMBELI
$routes->get('/histori', 'Pages::pembelian_history');
$routes->post('/histori-nomer', 'Pages::pembelian_history_post');



// LOGIN
$routes->get('/login', 'Admin\admin::login_page');
$routes->post('/login_post', 'Admin\admin::login_post');

// LOGOUTF
$routes->post('/logout', 'Admin\admin::logout');

// LUPA PASS
$routes->get('/login/lupa-password', 'Admin\admin::nomer_hp_get');
$routes->post('/no-hp', 'Admin\admin::nomer_hp_post');
$routes->get('/login/lupa-password/otp', 'Admin\admin::otp_get');
$routes->post('/otp', 'Admin\admin::otp_post'); 
$routes->get('/login/lupa-password/otp/reset-pass', 'Admin\admin::reset_pass_get');
$routes->post('/reset-pass', 'Admin\admin::reset_pass_post'); 

// ADMIN PRODUCT
$routes->get('/admin', 'Admin\admin::admin');
$routes->get('/admin_get', 'Admin\admin::admin_get');
// ADD DATA PRODUCT
// $routes->get('/admin/produk/add-data', 'Admin\admin::get_detail_add');
$routes->post('/admin/produk/add-data', 'Admin\admin::add_product');
// DELETE PRODUCT
// $routes->get('/admin/product/delete(:any)', 'Admin\admin::product_delete/$1');
$routes->post('/admin/product/delete', 'Admin\admin::product_delete');
// UPDATE PRODUCT
// $routes->get('/admin/product/update(:any)', 'Admin\admin::get_detail_update/$1');
$routes->post('/admin/product/update', 'Admin\admin::update_product');

// STOCK
$routes->get('/stock', 'stok\stok::stock');
$routes->get('/stock-get', 'stok\stok::stock_get');
//STOCK ADD
$routes->post('/admin/stock/add', 'stok\stok::add_product_stock');
//STOCK REDUCE
$routes->post('/admin/stock/reduce', 'stok\stok::reduce_product_stock');
// UPDATE PRODUCT STOCK
$routes->post('/admin/stock/update', 'stok\stok::update_product_stock');

// CATEGORY
$routes->get('/category', 'category\category::category');
$routes->get('/category-get', 'category\category::category_get');
// ADD DATA CATEGORY
$routes->post('/admin/category/add_data', 'category\category::add_product_category');
// UPDATE PRODUCT CATEGORY
$routes->post('/admin/category/update', 'category\category::update_product_category');
// DELETE CATEGORY
$routes->post('/admin/category/delete', 'category\category::product_delete_category');

// TRANSACTION
$routes->get('/transaction', 'transaction\transaction::transaction');
$routes->get('/transaction-get', 'transaction\transaction::transaction_get');
$routes->get('/transaction-detil', 'transaction\transaction::detil_transaksi');
$routes->post('/admin/transaction/accept', 'transaction\transaction::accept_product_transaction');
$routes->post('/admin/transaction/delete', 'transaction\transaction::product_delete_transaction');
$routes->get('/transaction_history', 'transaction\transaction::transaction_history');

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

