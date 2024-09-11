<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use CURLFile;


class admin extends BaseController
{
    public function check_cookie($token)
    {
        $token = (string) $token;
        // print_r($token); die;
        $curl['url'] = [BASEURL];
        $curl['endpoint'] = ['admin/product/list-product'];
        $curl['pagination'] = ['false'];
        $curl['max_redirect'] = 10;
        $curl['timeout'] = [1];
        $curl['return_transfer'] = true;
        $curl['http_header'] = [
            'Token' => "$token",
        ];
        $data = curlSetOptGet($curl);
        $data = json_decode($data, true);
        // print_r($data); die;
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

    public function admin($error_add_product = null, $error_update_product = null, $success_add = null, $success_update = null)
    {
        // print_r($error_add_product); die;
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


                $category['url'] = [BASEURL];
                $category['endpoint'] = ['listpublic/category'];
                $category['pagination'] = ['false'];
                $category = curlSetOptGet($category);
                $category = json_decode($category, true);
                // print_r($data); die;

                if (empty($error_add_product)) {
                    return view(
                        'admin_page/admin/admin',
                        [
                            'title' => 'Product',
                            'data_get' => $data,
                            'category' => $category,
                            'success_add' => $success_add,
                            'success_update' => $success_update,
                        ]

                    );
                }
                if (!empty($error_add_product)) {
                    // echo 'lol'; die;
                    return view(
                        'admin_page/admin/admin',
                        [
                            'title' => 'Product',
                            'data_get' => $data,
                            'category' => $category,
                            'error' => $error_add_product
                        ]
                    );
                } else {
                    return view(
                        'admin_page/admin/edit_admin',
                        [
                            'title' => 'Edit Akun',
                            'data_get' => $curl,
                            'error_update' => $error_update_product
                        ]
                    );
                }
            }
        }
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
        $description = $post['description'];
        $stock = $post['stock'];
        $harga = $post['harga'];

        // Handle file upload
        $image = $_FILES['image'];
        $filePath = $image["tmp_name"];
        $fileName = $image["name"];
        $fileType = $image["type"];
        $cfile = new CURLFile($filePath, $fileType, $fileName);
        // print_r($image);
        // die;

        // print_r($cfile); die;
        // if cookie true & data post inputed
        if ($cookie_check == 200) {
            if (!empty($cfile->name)) {
                $curl = curl_init();

                curl_setopt_array($curl, array(
                    CURLOPT_URL => BASEURL . 'admin/product/insert',
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_ENCODING => '',
                    CURLOPT_MAXREDIRS => 10,
                    CURLOPT_TIMEOUT => 0,
                    CURLOPT_FOLLOWLOCATION => true,
                    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                    CURLOPT_CUSTOMREQUEST => 'POST',
                    CURLOPT_POSTFIELDS => array(
                        'name' => $product,
                        'variant' => $variant,
                        'category' => $category,
                        'price' => $harga,
                        'stock' => $stock,
                        'description' => $description,
                        'upload' => $cfile
                    ),
                    CURLOPT_HTTPHEADER => array(
                        "Token: {$token}"
                    ),
                ));

                $result = curl_exec($curl);
                $result = (array) json_decode($result);
                curl_close($curl);
            } else {
                $curl = curl_init();

                curl_setopt_array($curl, array(
                    CURLOPT_URL => BASEURL . 'admin/product/insert',
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_ENCODING => '',
                    CURLOPT_MAXREDIRS => 10,
                    CURLOPT_TIMEOUT => 0,
                    CURLOPT_FOLLOWLOCATION => true,
                    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                    CURLOPT_CUSTOMREQUEST => 'POST',
                    CURLOPT_POSTFIELDS => array(
                        'name' => $product,
                        'variant' => $variant,
                        'category' => $category,
                        'price' => $harga,
                        'stock' => $stock,
                        'description' => $description,
                        'upload' => ''
                    ),
                    CURLOPT_HTTPHEADER => array(
                        "Token: {$token}"
                    ),
                ));

                $result = curl_exec($curl);
                $result = (array) json_decode($result);
                curl_close($curl);
            }
            // print_r($result); die;

            // print_r($result); die;
            if (!empty($result['error'])) {
                $error_add_product = $result['data'];
                return $this->admin($error_add_product);
            } else {
                // $this->session->set_flashdata('message', 'Product Added Successfully');
                return $this->admin(null, null, $result);
                // return redirect()->to('/admin');
            }
        }
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
        $description = $post['description'];
        $stock = $post['stock'];
        $harga = $post['harga'];

        // Handle file upload
        $image = $_FILES['image'];
        $filePath = $image["tmp_name"];
        $fileName = $image["name"];
        $fileType = $image["type"];
        $cfile = new CURLFile($filePath, $fileType, $fileName);
        // print_r($image);
        // die;

        // print_r($cfile); die;
        // if cookie true & data post inputed
        if ($cookie_check == 200) {
            if (!empty($cfile->name)) {
                $curl = curl_init();

                curl_setopt_array($curl, array(
                    CURLOPT_URL => BASEURL . 'admin/product/update?id=' . $id,
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_ENCODING => '',
                    CURLOPT_MAXREDIRS => 10,
                    CURLOPT_TIMEOUT => 0,
                    CURLOPT_FOLLOWLOCATION => true,
                    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                    CURLOPT_CUSTOMREQUEST => 'POST',
                    CURLOPT_POSTFIELDS => array(
                        'name' => $product,
                        'variant' => $variant,
                        'category' => $category,
                        'price' => $harga,
                        'stock' => $stock,
                        'description' => $description,
                        'upload' => $cfile
                    ),
                    CURLOPT_HTTPHEADER => array(
                        "Token: {$token}"
                    ),
                ));

                $result = curl_exec($curl);
                $result = (array) json_decode($result);
                curl_close($curl);
            } else {
                $curl = curl_init();

                curl_setopt_array($curl, array(
                    CURLOPT_URL => BASEURL . 'admin/product/update?id=' . $id,
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_ENCODING => '',
                    CURLOPT_MAXREDIRS => 10,
                    CURLOPT_TIMEOUT => 0,
                    CURLOPT_FOLLOWLOCATION => true,
                    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                    CURLOPT_CUSTOMREQUEST => 'POST',
                    CURLOPT_POSTFIELDS => array(
                        'name' => $product,
                        'variant' => $variant,
                        'category' => $category,
                        'price' => $harga,
                        'stock' => $stock,
                        'description' => $description,
                        'upload' => ''
                    ),
                    CURLOPT_HTTPHEADER => array(
                        "Token: {$token}"
                    ),
                ));

                $result = curl_exec($curl);
                $result = (array) json_decode($result);
                curl_close($curl);
            }

            // print_r($result); die;
            if (!empty($result['error'])) {
                $error_update_product = $result['data'];
                return $this->admin(null, $error_update_product);
            } else {
                return $this->admin(null, null, null, $result);
                return redirect()->to('/admin');
            }
        }
    }

    // public function get_detail_add()
    // {
    //     //check token/cookie exist
    //     $token = $this->request->getCookie();
    //     $token = $token['Token'];
    //     $cookie_check = $this->check_cookie($token);

    //     // check token + get detail product, category, type, value
    //     if ($cookie_check == 200) {

    //         // get list category


    //         // // get list type
    //         // $variant['url'] = [BASEURL];
    //         // $variant['endpoint'] = ['listpublic/variant'];
    //         // $variant['pagination'] = ['false'];
    //         // $variant = curlSetOptGet($variant);
    //         // $variant = json_decode($variant, true);

    //         // // get list value
    //         // $box['url'] = [BASEURL];
    //         // $box['endpoint'] = ['listpublic/box'];
    //         // $box['pagination'] = ['false'];
    //         // $box = curlSetOptGet($box);
    //         // $box = json_decode($box, true);
    //     } else {
    //         echo "token salah"; // invalid token
    //     }

    //     $data = [
    //         'category' => $category
    //     ];
    //     return view('admin_page/admin/add_data', $data);
    // }

    // public function get_detail_update($id)
    // {
    //     //check token/cookie exist
    //     $token = $this->request->getCookie();
    //     $token = $token['Token'];
    //     $cookie_check = $this->check_cookie($token);

    //     // get id from params
    //     $get = $this->request->getGet();
    //     if (empty($get['id'])) {
    //         $id = $id;
    //     } else {
    //         $id = $get['id'];
    //     }

    //     // check token + get detail product, category, type, value
    //     if ($cookie_check == 200) {

    //         // get detail product
    //         $product['url'] = [BASEURL];
    //         $product['endpoint'] = ['admin/product/detail'];
    //         $product['params'] = ['id' => $id];
    //         $product['http_header'] = ['Token' => $token];
    //         $product_detail = curlSetOptGet($product);
    //         $product_detail = json_decode($product_detail, true);

    //         // get list type
    //         // $variant['url'] = [BASEURL];
    //         // $variant['endpoint'] = ['admin/selected/variant-selected?id=' . $id . ''];
    //         // // $variant['pagination'] = ['false'];
    //         // $variant['http_header'] = ['Token' => $token];
    //         // $variant = curlSetOptGet($variant);
    //         // $variant = json_decode($variant, true);

    //     } else {
    //         echo "token salah"; // invalid token
    //     }

    //     $data = [
    //         'product_detail' => $product_detail
    //     ];
    //     return view('admin_page/admin/edit_data', $data);
    // }

    public function product_delete()
    {

        $id = $this->request->getPost();
        $id = $id['id'];

        $token = $this->request->getCookie();
        $token = $token['Token'];
        $cookie_check = $this->check_cookie($token);
        // print_r($id);
        // die;    
        if ($cookie_check == 200) {

            $endpoint = 'admin/product/delete?id=' . $id . '';
            $header = 'Token: ' . $token . '';

            curlSetOptPost($endpoint, $header, '', []);
            // return $this->admin();
            return redirect()->to('/login');
        }
    }

    public function login_page($token = null)
    {
        if (!empty($token)) {
            setCookie('Token', $token, time() + (86400));
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

        // print_r($response); die;
        // $token = $response['result']['data'];
        // Auth Token
        $token = '';
        if (!empty($response['result']['token'])) {
            $token = $response['result']['token'];
        }
        $result = $this->check_cookie($token);
        // print_r($result); die;
        // if ($response['message'] == 'Login Success') {
        //     return view(
        //         'layouts/admin_template',
        //         [
        //             'role' => $response
        //         ]
        //     );
        // }


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

        setCookie('Token', '', time() - (86400));

        return redirect()->to('/login');
    }

    public function account()
    {
        $token = $this->request->getCookie();
        if (empty($token['Token'])) {
            return redirect()->to('/login');
        }

        if (!empty($token['Token'])) {
            $result = $this->check_cookie($token['Token']);
            $token = $token['Token'];
            if ($result == 200) {

                $curl['url'] = [BASEURL];
                $curl['endpoint'] = ['admin/user/detail'];
                $curl['http_header'] = ['Token' => $token];
                $curl = curlSetOptGet($curl);
                $curl = json_decode($curl, true);
                // print_r($curl);
                // die;
                // if(empty($curl['eror'])){
                //     return view(
                //         'admin_page/eror',
                //         [
                //             'title' => 'Akun',
                //             'data_get' => $curl
                //         ]
                //     );
                // }

                return view(
                    'admin_page/admin/account',
                    [
                        'title' => 'Akun',
                        'data_get' => $curl
                    ]
                );
            }
        }
    }

    public function edit_account($error_regist_account = null, $message_regist = null, $error_update_account = null, $message_update = null)
    {
        // print_r($error_regist_account); die;
        $token = $this->request->getCookie();
        if (empty($token['Token'])) {
            return redirect()->to('/login');
        }

        if (!empty($token['Token'])) {
            $result = $this->check_cookie($token['Token']);
            $token = $token['Token'];
            if ($result == 200) {

                $curl['url'] = [BASEURL];
                $curl['endpoint'] = ['admin/user/list-user'];
                $curl['http_header'] = ['Token' => $token];
                $curl['pagination'] = ['false'];
                $curl = curlSetOptGet($curl);
                $curl = json_decode($curl, true);
                // print_r($message_regist);
                // die;
                if (empty($error_regist_account or $error_update_account)) {
                    // echo 'jadi'; die;
                    return view(
                        'admin_page/admin/edit_admin',
                        [
                            'title' => 'Edit Akun',
                            'data_get' => $curl,
                            'message_regist' => $message_regist,
                            'message_update' => $message_update
                        ]
                    );
                }
                if (empty($error_regist_account)) {
                    // echo 'lol'; die;
                    return view(
                        'admin_page/admin/edit_admin',
                        [
                            'title' => 'Edit Akun',
                            'data_get' => $curl,
                            'error' => $error_regist_account,
                            'id' => $error_update_account['id'],
                            'error_update' => $error_update_account['error']
                        ]
                    );
                } else {
                    return view(
                        'admin_page/admin/edit_admin',
                        [
                            'title' => 'Edit Akun',
                            'data_get' => $curl,
                            'error' => $error_regist_account
                        ]
                    );
                }
            }
        }
    }

    public function update_account()
    {
        //check token/cookie exist
        $token = $this->request->getCookie();
        $token = $token['Token'];
        $cookie_check = $this->check_cookie($token);

        // get data from view (POST)
        $post = $this->request->getPost();

        $name = $post['fullname'];
        $email = $post['email'];
        $no_handphone = $post['phoneNumber'];
        $username = $post['username'];
        $password = $post['password'];
        // print_r($cookie_check); die;
        // if cookie true & data post inputed
        if ($cookie_check == 200) {
            $endpoint = 'admin/user/update';
            $header = 'Token: ' . "$token" . '';
            $post_field = [
                'username' => $username,
                'password' => $password,
                'name' => $name,
                'email' => $email,
                'no_handphone' => $no_handphone,
            ];

            $result = curlSetOptPost($endpoint, $header, '', $post_field);
            // print_r($result); die;
            $token_updated = $result['data'][0]['token'];
            setCookie('Token', "$token_updated", time() + (86400), '/');
        } else {
            echo "token not registered";
        }
        return redirect()->to('/account');
    }

    public function update2_account()
    {
        //check token/cookie exist
        $token = $this->request->getCookie();
        $token = $token['Token'];
        $cookie_check = $this->check_cookie($token);

        // get data from view (POST)
        $post = $this->request->getPost();

        $id = $post['id'];
        $name = $post['fullname'];
        $email = $post['email'];
        $no_handphone = $post['phoneNumber'];
        $username = $post['username'];
        $password = $post['password'];
        $no_handphone = (integer) $no_handphone;
        // print_r($no_handphone); die;
        // if cookie true & data post inputed
        // print_r($cookie_check); die;
        if ($cookie_check == 200) {
            $endpoint = 'admin/user/update-admin?id=' . $id . '';
            $header = 'Token: ' . "$token" . '';
            $post_field = [
                'username' => $username,
                'password' => $password,
                'name' => $name,
                'email' => $email,
                'no_handphone' => $no_handphone
            ];

            $result = curlSetOptPost($endpoint, $header, '', $post_field);
            // print_r($result); die;
        } else {
            echo "token not registered";
        }
        if (!empty($result['error'])) {
            $error_update_account = $result['data'];
            return $this->edit_account(null, null, $error_update_account, null);
        } else {
            $message_update = $result['message'];
            return $this->edit_account(null, null, null, $message_update);
        }
        return redirect()->to('/edit-account');
    }

    public function regist_account()
    {
        //check token/cookie exist
        $token = $this->request->getCookie();
        $token = $token['Token'];
        $cookie_check = $this->check_cookie($token);

        // get data from view (POST)
        $post = $this->request->getPost();

        $name = $post['fullname'];
        $email = $post['email'];
        $no_handphone = $post['phoneNumber'];
        $username = $post['username'];
        $password = $post['password'];
        $confirm = $post['confirm'];
        // print_r($cookie_check); die;
        // if cookie true & data post inputed
        if ($cookie_check == 200) {
            $endpoint = 'admin/user/register';
            $header = 'Token: ' . "$token" . '';
            $post_field = [
                'username' => $username,
                'password' => $password,
                'confirm' => $confirm,
                'name' => $name,
                'email' => $email,
                'no_handphone' => $no_handphone,
            ];

            $result =  curlSetOptPost($endpoint, $header, '', $post_field);
            // print_r($result); die;  
        } else {
            echo "token not registered";
        }
        if (!empty($result['error'])) {
            $error_regist_account = $result['data'];
            return $this->edit_account($error_regist_account, null);
        } else {
            $message_regist = $result['message'];
            return $this->edit_account(null, $message_regist);
        }
        return redirect()->to('/edit-account');
    }

    public function delete_account()
    {

        $id = $this->request->getPost();
        $id = $id['id'];

        $token = $this->request->getCookie();
        $token = $token['Token'];


        $endpoint = 'admin/user/delete?id=' . $id . '';
        $header = 'Token: ' . $token . '';

        curlSetOptPost($endpoint, $header, '', []);

        return redirect()->to('/edit-account');
    }
}
