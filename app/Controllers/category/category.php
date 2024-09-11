<?php

namespace App\Controllers\category;

use App\Controllers\BaseController;

class category extends BaseController
{

    public function check_cookie($token)
    {
        $curl['url'] = [BASEURL];
        $curl['endpoint'] = ['admin/product/list-product'];
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

    public function category($success_add = null, $success_update = null)
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
                $curl['endpoint'] = ['admin/category/list'];
                $curl['method'] = ['GET'];
                $curl['http_header'] = ['Token' => $token];
                $curl['pagination'] = ['false'];
                $curl['max_redirect'] = 10;
                $curl['timeout'] = [1];
                $curl['follow_location'] = true;
                $curl['return_transfer'] = true;
                $data = curlSetOptGet($curl);
                $data = json_decode($data, true);


                if (empty($success_add OR $success_update)) {
                    return view(
                        'admin_page/category/category',
                        [
                            'title' => 'Category',
                            'data_get' => $data
                        ]

                    );
                } else {
                    return view(
                        'admin_page/category/category',
                        [
                            'title' => 'Category',
                            'data_get' => $data,
                            'success_add' => $success_add,
                            'success_update' => $success_update
                            
                        ]
                    );
                }
            }
        }
    }


    public function update_product_category()
    {
        //check token/cookie exist
        $token = $this->request->getCookie();
        $token = $token['Token'];
        $cookie_check = $this->check_cookie($token);

        // get data from view (POST)
        $post = $this->request->getPost();

        $id = $post['id'];
        $category = $post['category'];
        // print_r($token); die;
        // if cookie true & data post inputed
        if ($cookie_check == 200) {

            $endpoint = 'admin/category/update?id=' . $id . '';
            $header = 'Token: ' . $token . '';
            $post_field = [
                'category' => $category
            ];

            $result = curlSetOptPost($endpoint, $header, '', $post_field);
            // print_r($result); die;
            return $this->category(null, $result);
        } else {
            echo "token not registered";
            return redirect()->to('/category');
        }

    }

    public function add_product_category()
    {
        //check token/cookie exist
        $token = $this->request->getCookie();
        $token = $token['Token'];
        $cookie_check = $this->check_cookie($token);

        // get data from view (POST)
        $post = $this->request->getPost();
        $category = $post['category'];
        // print_r($harga); die;
        // if cookie true & data post inputed
        if ($cookie_check == 200) {

            $endpoint = 'admin/category/insert';
            $header = 'Token: ' . $token . '';
            $post_field = [
                'category' => $category
            ];

            $result = curlSetOptPost($endpoint, $header, '', $post_field);
            return $this->category($result);
        } else {
            echo "token not registered";
            return redirect()->to('/category');
        }

    }

    public function product_delete_category()
    {

        $id = $this->request->getPost();
        $id = $id['id'];

        $token = $this->request->getCookie();
        $token = $token['Token'];
        $cookie_check = $this->check_cookie($token);
        // print_r($id);
        // die;    

        if ($cookie_check == 200) {

            $endpoint = 'admin/category/delete?id=' . $id . '';
            $header = 'Token: ' . $token . '';

            curlSetOptPost($endpoint, $header, '', []);
            // return $this->admin();
            return redirect()->to('/category');
        }
    }

    // public function get_detail_update_category($id)
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

    //         // get list category
    //         $category['url'] = [BASEURL];
    //         $category['endpoint'] = ['admin/category/detail?id=' . $id . ''];
    //         // $category['pagination'] = ['false'];
    //         $category['http_header'] = ['Token' => $token];
    //         $category = curlSetOptGet($category);
    //         $category = json_decode($category, true);
    //         // print_r($category);
    //         // die;
    //     } else {
    //         echo "token salah"; // invalid token
    //     }

    //     return view(
    //         'admin_page/category/edit_data_category',
    //         [
    //             'data' => $category
    //         ]
    //     );
    // }

    // public function get_detail_add_category()
    // {

    //     //check token/cookie exist
    //     $token = $this->request->getCookie();
    //     $token = $token['Token'];
    //     $cookie_check = $this->check_cookie($token);


    //     // check token + get detail product, category, type, value
    //     if ($cookie_check == 200) {
    //         return view('admin_page/category/add_data_category');
    //     } else {
    //         echo "token salah"; // invalid token
    //     }
    // }
}
