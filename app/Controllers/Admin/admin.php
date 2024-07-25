<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class admin extends BaseController
{

    public function admin()
    {

        //check token/cookie exist
        $token = $this->request->getCookie();
        if (empty($token['Token'])) {
            return redirect()->to('/login');
        }

        if (!empty($token['Token'])) {
            $result = $this->check_cookie($token['Token']);
            if ($result == 200) {
                $curl['url'] = ['http://10.10.0.53/coba-coba-wir/public'];
                $curl['endpoint'] = ['listpublic/product'];
                $curl['pagination'] = ['false'];
                $curl['max_redirect'] = 10;
                $curl['timeout'] = [1];
                $data = curlSetOptGet($curl);
                $data = json_decode($data, true);

                $default = [
                    "status" => 200,
                    "message" => "List Data Product",
                    "error" => "",
                    "result" => [
                        [
                            "product" => "Kacang Hijau",
                            "value" => "15",
                            "type" => "Griya Bakpia Premium",
                            "category" => "Basah",
                            "price" => "40000"
                        ],
                        [
                            "product" => "Keju",
                            "value" => "15",
                            "type" => "Griya Bakpia Premium",
                            "category" => "Basah",
                            "price" => "40000"
                        ],
                        [
                            "product" => "Coklat",
                            "value" => "15",
                            "type" => "Griya Bakpia Premium",
                            "category" => "Basah",
                            "price" => "40000"
                        ],
                        [
                            "product" => "Durian",
                            "value" => "15",
                            "type" => "Griya Bakpia Premium",
                            "category" => "Basah",
                            "price" => "40000"
                        ],
                        [
                            "product" => "Mix",
                            "value" => "15",
                            "type" => "Griya Bakpia Premium",
                            "category" => "Basah",
                            "price" => "42000"
                        ],
                        [
                            "product" => "Kacang Hijau Originial",
                            "value" => "20",
                            "type" => "Bakpia 465",
                            "category" => "Basah",
                            "price" => "24000"
                        ],
                        [
                            "product" => "Kacang Hijau Rasa Keju",
                            "value" => "20",
                            "type" => "Bakpia 465",
                            "category" => "Basah",
                            "price" => "26000"
                        ],
                        [
                            "product" => "Kacang Hijau Rasa Coklat",
                            "value" => "20",
                            "type" => "Bakpia 465",
                            "category" => "Basah",
                            "price" => "26000"
                        ],
                        [
                            "product" => "Telo Ungu",
                            "value" => "15",
                            "type" => "Bakpia 465",
                            "category" => "Basah",
                            "price" => "24000"
                        ],
                        [
                            "product" => "Keju",
                            "value" => "20",
                            "type" => "Bakpia 465 Kering",
                            "category" => "Kering",

                            "price" => "24000"
                        ],
                        [
                            "product" => "Coklat",
                            "value" => "20",
                            "type" => "Bakpia 465 Kering",
                            "category" => "Kering",
                            "price" => "24000"
                        ],
                        [
                            "product" => "Aneka Rasa",
                            "value" => "20",
                            "type" => "Bakpia 465 Kering",
                            "category" => "Kering",
                            "price" => "24000"
                        ],
                        [
                            "product" => "Mix Keju Coklat",
                            "value" => "20",
                            "type" => "Bakpia 465 Kering",
                            "category" => "Kering",
                            "price" => "24000"
                        ]
                    ]
                ];

                if (empty($data)) {
                    return view(
                        'admin_page/admin/admin',
                        [
                            'title' => 'Griya Bakpia | Produk',
                            'data_get' => $default
                        ]

                    );
                } else {
                    return view(
                        'admin_page/admin/admin',
                        [
                            'title' => 'Griya Bakpia | Produk',
                            'data_get' => $data
                        ]

                    );
                }
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
            CURLOPT_URL => 'http://10.10.0.53/coba-coba-wir/public/login/login',
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
        $token = $response['result']['token'];
        // Auth Token
        $result = $this->check_cookie($token);

        if ($result == 200) {
            $statusToken = $token;
            return $this->login_page($statusToken);
        } else {
            echo "salah lol";
            die;
        }
    }

    public function check_cookie($token)
    {
        $curl['url'] = ['http://10.10.0.53/coba-coba-wir/public'];
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

        // foreach ($data as $key => $value) {
        //     $data = $value['Token'];
        // }

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
            $category['url'] = ['http://10.10.0.53/coba-coba-wir/public'];
            $category['endpoint'] = ['listpublic/category'];
            $category['pagination'] = ['false'];
            $category = curlSetOptGet($category);
            $category = json_decode($category, true);

            // get list type
            $type['url'] = ['http://10.10.0.53/coba-coba-wir/public'];
            $type['endpoint'] = ['listpublic/type'];
            $type['pagination'] = ['false'];
            $type = curlSetOptGet($type);
            $type = json_decode($type, true);

            // get list value
            $value['url'] = ['http://10.10.0.53/coba-coba-wir/public'];
            $value['endpoint'] = ['listpublic/value'];
            $value['pagination'] = ['false'];
            $value = curlSetOptGet($value);
            $value = json_decode($value, true);
        } else {
            echo "token salah"; // invalid token
        }

        $data = [
            'category' => $category,
            'type' => $type,
            'value' => $value
        ];
        return view('admin_page/admin/add_data', $data);
    }

    // public function add_product()
    // {
    //     //check token/cookie exist
    //     $token = $this->request->getCookie();
    //     $token = $token['Token'];
    //     $cookie_check = $this->check_cookie($token);

    //     // get data from view (POST)
    //     $post = $this->request->getPost();

    //     $product = $post['namaProduk'];
    //     $category = $post['category'];
    //     $type = $post['type'];
    //     $value = $post['value'];
    //     $harga = $post['harga'];
    //     // print_r($harga); die;
    //     // if cookie true & data post inputed
    //     if ($cookie_check == 200) {

    //         $curl = curl_init();

    //         curl_setopt_array($curl, array(
    //             CURLOPT_URL => 'http://10.10.0.53/coba-coba-wir/public/admin/product/insert',
    //             CURLOPT_RETURNTRANSFER => true,
    //             CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    //             CURLOPT_CUSTOMREQUEST => 'POST',
    //             CURLOPT_POSTFIELDS => array(
    //                 'product' => $product,
    //                 'category' => $category,
    //                 'type' => $type,
    //                 'value' => $value,
    //                 'price' => $harga
    //             ),
    //             CURLOPT_HTTPHEADER => array(
    //                 'Token: ' . $token . ''
    //             ),
    //         ));

    //         $p = curl_exec($curl);
    //         $p = json_decode($p);

    //         curl_close($curl);

    //         // print_r($p);
    //     } else {
    //         echo "token not registered";
    //     }

    //     return $this->admin();
    // }

    public function add_product()
    {
        //check token/cookie exist
        $token = $this->request->getCookie();
        $token = $token['Token'];
        $cookie_check = $this->check_cookie($token);

        // get data from view (POST)
        $post = $this->request->getPost();

        $product = $post['namaProduk'];
        $category = $post['category'];
        $type = $post['type'];
        $value = $post['value'];
        $harga = $post['harga'];
        // print_r($harga); die;
        // if cookie true & data post inputed
        if ($cookie_check == 200) {

            $curl = curl_init();

            curl_setopt_array($curl, array(
                CURLOPT_URL => 'http://10.10.0.53/coba-coba-wir/public/admin/product/insert',
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'POST',
                CURLOPT_POSTFIELDS => array(
                    'product' => $product,
                    'category' => $category,
                    'type' => $type,
                    'value' => $value,
                    'price' => $harga
                ),
                CURLOPT_HTTPHEADER => array(
                    'Token: ' . $token . ''
                ),
            ));

            $p = curl_exec($curl);
            $p = json_decode($p);

            curl_close($curl);

            // print_r($p);
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
            $product['url'] = ['http://10.10.0.53/coba-coba-wir/public'];
            $product['endpoint'] = ['admin/product/detail'];
            $product['params'] = ['id' => $id];
            $product['http_header'] = ['Token' => $token];
            $product_detail = curlSetOptGet($product);
            $product_detail = json_decode($product_detail, true);

            // get list category
            $category['url'] = ['http://10.10.0.53/coba-coba-wir/public'];
            $category['endpoint'] = ['listpublic/category'];
            $category['pagination'] = ['false'];
            $category = curlSetOptGet($category);
            $category = json_decode($category, true);

            // get list type
            $type['url'] = ['http://10.10.0.53/coba-coba-wir/public'];
            $type['endpoint'] = ['listpublic/type'];
            $type['pagination'] = ['false'];
            $type = curlSetOptGet($type);
            $type = json_decode($type, true);

            // get list value
            $value['url'] = ['http://10.10.0.53/coba-coba-wir/public'];
            $value['endpoint'] = ['listpublic/value'];
            $value['pagination'] = ['false'];
            $value = curlSetOptGet($value);
            $value = json_decode($value, true);
        } else {
            echo "token salah"; // invalid token
        }

        $data = [
            'product_detail' => $product_detail,
            'category' => $category,
            'type' => $type,
            'value' => $value
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
        $category = $post['category'];
        $type = $post['type'];
        $value = $post['value'];
        $harga = $post['harga'];
        // print_r($token); die;
        // if cookie true & data post inputed
        if ($cookie_check == 200) {

            $curl = curl_init();

            curl_setopt_array($curl, array(
                CURLOPT_URL => 'http://10.10.0.53/coba-coba-wir/public/admin/product/update?id=' . $id . '',
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'POST',
                CURLOPT_POSTFIELDS => array(
                    'product' => $product,
                    'category' => $category,
                    'type' => $type,
                    'value' => $value,
                    'price' => $harga
                ),
                CURLOPT_HTTPHEADER => array(
                    'Token: ' . $token . ''
                ),
            ));

            $p = curl_exec($curl);
            $p = json_decode($p);

            curl_close($curl);

            // print_r($p);
        } else {
            echo "token not registered";
        }

        return $this->get_detail_update($id);
    }

    public function product_delete(): string
    {

        $id = $this->request->getGet();
        $id = $id['id'];

        $token = $this->request->getCookie();
        $token = $token['Token'];


        $curl = curl_init();


        curl_setopt_array($curl, array(
            CURLOPT_URL => 'http://10.10.0.53/coba-coba-wir/public/admin/product/delete?id=' . $id . '',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'DELETE',
            CURLOPT_HTTPHEADER => array(
                'Token: ' . $token . ''
            ),
        ));


        $response = curl_exec($curl);

        curl_close($curl);

        return $this->admin();
    }

    // public function search()
    // {
    //     //check token/cookie exist
    //     $token = $this->request->getCookie();
    //     $token = $token['Token'];
    //     $cookie_check = $this->check_cookie($token);

    //     if ($cookie_check == 200) {
    //         $post = $this->request->getPost();
    //         $input = $post['search'];

    //         // get list category
    //         $search['url'] = ['http://10.10.0.53/coba-coba-wir/public'];
    //         $search['endpoint'] = ['listpublic/product'];
    //         $search['params'] = [
    //             'search' => $input
    //         ];
    //         $search['pagination'] = ['false'];
    //         $search = curlSetOptGet($search);
    //         $search = json_decode($search, true);

    //         return view(
    //             'admin_page/admin/admin',
    //             [
    //                 'title' => 'Griya Bakpia | Produk',
    //                 'data_get' => $search
    //             ]

    //         );
    //     }
    // }


    // public function tes()
    // {
    //     $token = $this->request->getCookie();
    //     $token = $token['Token'];
    //     $cookie_check = $this->check_cookie($token);

    //     $post = $this->request->getPost();
    //     $product = $post['namaProduk'];
    //     $category = $post['category'];
    //     $type = $post['type'];
    //     $value = $post['value'];
    //     $harga = $post['harga'];

    //     $post = $this->request->getPost();

    //     $endpoint = 'admin/product/';
    //     $header = '';
    //     $params = [
    //         'id' => 12
    //     ];
    //     $post_field = [
    //         'product' => $product,
    //         'category' => $category,
    //         'type' => $type,
    //         'value' => $value,
    //         'price' => $harga
    //     ];

    //     $data = curlSetOptPost($endpoint, $header, $params, $post_field);
    // }
}
