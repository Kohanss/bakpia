<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class admin extends BaseController
{

    public function admin()
    {
        // check token/cookie exist
        $token = $this->request->getCookie();
        if (empty($token['Token'])) {
            return redirect()->to('/login');
        }

        if (!empty($token['Token'])) {
            $result = $this->check_cookie($token['Token']);
            $token = $token['Token'];
            if ($result == 200) {
                $curl['url'] = [BASEURL];
                $curl['endpoint'] = ['admin/product/list-product'];
                $curl['pagination'] = ['false'];
                $curl['http_header'] = ['Token' => $token];
                $curl['max_redirect'] = 10;
                $curl['timeout'] = [1];
                $data = curlSetOptGet($curl);
                $data = json_decode($data, true);
                // print_r($data); die;


                return view(
                    'admin_page/admin/admin',
                    [
                        'title' => 'Product',
                        'data_get' => $data
                    ]

                );
            }
        }
    }

    public function login_page($token = null)
    {
        if (!empty($token)) {
            setCookie('Token', $token, time() + (3600));
            return $this->admin();
        }
        // check cookie 

        $getCookie = $this->request->getCookie();
        if (!empty($getCookie['Token'])) {
            $cookie = true;
        } else {
            $cookie = false;
        }
        if ($cookie == true) {
            $cookie = $_COOKIE['Token'];
            $result = $this->check_cookie($cookie);
            // print_r($result);
            // die;
            if ($result == 200) {
                return $this->admin();
            } else {
                return view('admin_page/login');
            }
        } else {
            return view('admin_page/login');
        }
    }

    public function login_post()
    {
        // get username and password
        $post = $this->request->getPost();
        $username = $post['username'];
        $password = $post['password'];


        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => BASEURL . 'login/login',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => array(
                'username' => $username,
                'password' => $password
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        $response = json_decode($response, true);
        // print_r($response); die;
        // $token = $response['result']['data'];
        // Auth Token
        $token = '';
        if (!empty($response['result']['token'])) {
            $token = $response['result']['token'];
        }
        // print_r($response); die;
        $result = $this->check_cookie($token);

        if ($result == 200) {
            $statusToken = $token;
            return $this->login_page($statusToken);
        } else {
            $eror_data = $response['result']['data'];
            return view(
                'admin_page/login',
                [
                    'eror' => $eror_data
                ]
            );
            // die;
        }
    }

    public function check_cookie($token)
    {
        $curl['url'] = [BASEURL];
        $curl['endpoint'] = ['admin/user/list-user'];
        $curl['pagination'] = ['false'];
        $curl['max_redirect'] = 10;
        $curl['timeout'] = [1];
        $curl['return_transfer'] = true;
        $curl['http_header'] = [
            'Token' => $token,
        ];
        $data = curlSetOptGet($curl);
        $data = json_decode($data, true);

        if (isset($data['code'])) {
            return 500;
        }
        if (isset($data['status'])) {
            if ($data['status'] == 200) {
                return 200;
            } else {
                return 401;
            }
        }
    }

    public function get_detail_add()
    {
        //check token/cookie exist
        $token = $this->request->getCookie();
        $token = $token['Token'];
        $cookie_check = $this->check_cookie($token);

        // check token + get detail product, category, type, value
        if ($cookie_check == 200) {

            // get list category
            $category['url'] = [BASEURL];
            $category['endpoint'] = ['listpublic/category'];
            $category['pagination'] = ['false'];
            $category = curlSetOptGet($category);
            $category = json_decode($category, true);

            // get list type
            $variant['url'] = [BASEURL];
            $variant['endpoint'] = ['listpublic/variant'];
            $variant['pagination'] = ['false'];
            $variant = curlSetOptGet($variant);
            $variant = json_decode($variant, true);

            // get list value
            $box['url'] = [BASEURL];
            $box['endpoint'] = ['listpublic/box'];
            $box['pagination'] = ['false'];
            $box = curlSetOptGet($box);
            $box = json_decode($box, true);
        } else {
            echo "token salah"; // invalid token
        }

        $data = [
            'category' => $category,
            'variant' => $variant,
            'box' => $box
        ];
        return view('admin_page/admin/add_data', $data);
    }

    public function add_product()
    {
        //check token/cookie exist
        $token = $this->request->getCookie();
        $token = $token['Token'];
        $cookie_check = $this->check_cookie($token);

        // get data from view (POST)
        $post = $this->request->getPost();

        $product = $post['namaProduk'];
        $variant = $post['variant'];
        $category = $post['category'];
        $box = $post['box'];
        $stock = $post['stock'];
        $harga = $post['harga'];
        // print_r($harga); die;
        // if cookie true & data post inputed
        if ($cookie_check == 200) {

            $endpoint = 'admin/product/insert';
            $header = 'Token: ' . $token . '';
            $post_field = [
                'name' => $product,
                'variant' => $variant,
                'category' => $category,
                'price' => $harga,
                'box' => $box,
                'stock' => $stock
            ];

            curlSetOptPost($endpoint, $header, '', $post_field);
            // print_r($p);
            return redirect()->to('/login');
        } else {
            echo "token not registered";
        }

        return $this->admin();
    }

    public function get_detail_update($id)
    {
        //check token/cookie exist
        $token = $this->request->getCookie();
        $token = $token['Token'];
        $cookie_check = $this->check_cookie($token);

        // get id from params
        $get = $this->request->getGet();
        if (empty($get['id'])) {
            $id = $id;
        } else {
            $id = $get['id'];
        }

        // check token + get detail product, category, type, value
        if ($cookie_check == 200) {

            // get detail product
            $product['url'] = [BASEURL];
            $product['endpoint'] = ['admin/product/detail'];
            $product['params'] = ['id' => $id];
            $product['http_header'] = ['Token' => $token];
            $product_detail = curlSetOptGet($product);
            $product_detail = json_decode($product_detail, true);

            // get list category
            $category['url'] = [BASEURL];
            $category['endpoint'] = ['admin/selected/category-selected?id=' . $id . ''];
            // $category['pagination'] = ['false'];
            $category['http_header'] = ['Token' => $token];
            $category = curlSetOptGet($category);
            $category = json_decode($category, true);
            // print_r($category); die;

            // get list type
            $variant['url'] = [BASEURL];
            $variant['endpoint'] = ['admin/selected/variant-selected?id=' . $id . ''];
            // $variant['pagination'] = ['false'];
            $variant['http_header'] = ['Token' => $token];
            $variant = curlSetOptGet($variant);
            $variant = json_decode($variant, true);

            // get list value
            $box['url'] = [BASEURL];
            $box['endpoint'] = ['admin/selected/box-selected?id=' . $id . ''];
            // $box['pagination'] = ['false'];
            $box['http_header'] = ['Token' => $token];
            $box = curlSetOptGet($box);
            $box = json_decode($box, true);
        } else {
            echo "token salah"; // invalid token
        }

        $data = [
            'product_detail' => $product_detail,
            'category' => $category,
            'variant' => $variant,
            'box' => $box
        ];
        return view('admin_page/admin/edit_data', $data);
    }

    public function update_product()
    {
        //check token/cookie exist
        $token = $this->request->getCookie();
        $token = $token['Token'];
        $cookie_check = $this->check_cookie($token);

        // get data from view (POST)
        $post = $this->request->getPost();

        $id = $post['id'];
        $product = $post['namaProduk'];
        $variant = $post['variant'];
        $category = $post['category'];
        $box = $post['box'];
        $stock = $post['stock'];
        $harga = $post['harga'];
        // print_r($token); die;
        // if cookie true & data post inputed
        if ($cookie_check == 200) {

            $endpoint = 'admin/product/update?id=' . $id . '';
            $header = 'Token: ' . $token . '';
            $post_field = [
                // 'product' => $product,
                // 'category' => $category,
                // 'variant' => $variant,
                // 'box' => $box,
                // 'price' => $harga
                'product' => $product,
                'variant' => $variant,
                'category' => $category,
                'price' => $harga,
                'box' => $box,
                'stock' => $stock
            ];

            curlSetOptPost($endpoint, $header, '', $post_field);
        } else {
            echo "token not registered";
        }

        return $this->get_detail_update($id);
    }

    public function product_delete()
    {

        $id = $this->request->getPost();
        $id = $id['id'];

        $token = $this->request->getCookie();
        $token = $token['Token'];
        // print_r($id);
        // die;    


        $endpoint = 'admin/product/delete?id=' . $id . '';
        $header = 'Token: ' . $token . '';

        curlSetOptPost($endpoint, $header, '', []);
        // return $this->admin();
        return redirect()->to('/login');
    }

    public function search()
    {
        //check token/cookie exist
        $token = $this->request->getCookie();
        $token = $token['Token'];
        $cookie_check = $this->check_cookie($token);

        if ($cookie_check == 200) {
            $post = $this->request->getPost();
            $input = $post['search'];

            // get list category
            $search['url'] = [BASEURL];
            $search['endpoint'] = ['admin/product/list-product'];
            $search['params'] = [
                'search' => $input
            ];
            $search['pagination'] = ['false'];
            $search = curlSetOptGet($search);
            $search = json_decode($search, true);

            return view(
                'admin_page/admin/admin',
                [
                    'title' => 'Griya Bakpia | Produk',
                    'data_get' => $search
                ]

            );
        }
    }

    public function logout()
    {
        $token = $this->request->getCookie();
        $token = $token['Token'];

        $endpoint = 'admin/user/logout';
        $header = 'Token: ' . $token . '';

        curlSetOptPost($endpoint, $header, '', []);

        setCookie('Token', '', time() - (3600));
        
        return redirect()->to('/login');
    }
}
