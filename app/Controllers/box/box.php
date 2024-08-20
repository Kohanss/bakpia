<?php

namespace App\Controllers\box;

use App\Controllers\BaseController;

class box extends BaseController
{
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


    public function box()
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
                $curl['endpoint'] = ['admin/box/list'];
                $curl['method'] = ['GET'];
                $curl['http_header'] = ['Token' => $token];
                $curl['pagination'] = ['false'];
                $curl['max_redirect'] = 10;
                $curl['timeout'] = [1];
                $curl['follow_location'] = true;
                $curl['return_transfer'] = true;
                $data = curlSetOptGet($curl);
                $data = json_decode($data, true);


                return view(
                    'admin_page/box/box',
                    [
                        'title' => 'Box',
                        'data_get' => $data
                    ]

                );
            }
        }
    }

    public function get_detail_add_box()
    {

        //check token/cookie exist
        $token = $this->request->getCookie();
        $token = $token['Token'];
        $cookie_check = $this->check_cookie($token);


        // check token + get detail product, category, type, value
        if ($cookie_check == 200) {
            return view('admin_page/box/add_data_box');
        } else {
            echo "token salah"; // invalid token
        }
    }


    public function add_product_box()
    {
        //check token/cookie exist
        $token = $this->request->getCookie();
        $token = $token['Token'];
        $cookie_check = $this->check_cookie($token);

        // get data from view (POST)
        $post = $this->request->getPost();
        $value = $post['value'];
        // print_r($harga); die;
        // if cookie true & data post inputed
        if ($cookie_check == 200) {

            $endpoint = 'admin/box/insert';
            $header = 'Token: ' . $token . '';
            $post_field = [
                'box' => $value
            ];

            $result = curlSetOptPost($endpoint, $header, '', $post_field);
            // print_r($p);
            return view(
                'admin_page/box/add_data_box',
                [
                    'value' => $result
                ]
            );
        } else {
            echo "token not registered";
        }

        // return redirect()->to('/category');
    }

    public function get_detail_update_box($id)
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

            // get list category
            $box['url'] = [BASEURL];
            $box['endpoint'] = ['admin/box/detail?id=' . $id . ''];
            // $box['pagination'] = ['false'];
            $box['http_header'] = ['Token' => $token];
            $box = curlSetOptGet($box);
            $box = json_decode($box, true);
            // print_r($box);
            // die;
        } else {
            echo "token salah"; // invalid token
        }

        return view(
            'admin_page/box/edit_data_box',
            [
                'data' => $box
            ]
        );
    }

    public function update_product_box()
    {
        //check token/cookie exist
        $token = $this->request->getCookie();
        $token = $token['Token'];
        $cookie_check = $this->check_cookie($token);

        // get data from view (POST)
        $post = $this->request->getPost();

        $id = $post['id'];
        $box = $post['box'];
        // print_r($box); die;
        // if cookie true & data post inputed
        if ($cookie_check == 200) {

            $endpoint = 'admin/box/update?id=' . $id . '';
            $header = 'Token: ' . $token . '';
            $post_field = [
                'box' => $box
            ];

            curlSetOptPost($endpoint, $header, '', $post_field);
        } else {
            echo "token not registered";
        }

        return redirect()->to('/box');
    }

    public function product_delete_box()
    {

        $id = $this->request->getPost();
        $id = $id['id'];

        $token = $this->request->getCookie();
        $token = $token['Token'];
        $cookie_check = $this->check_cookie($token);
        // print_r($id);
        // die;    

        if ($cookie_check == 200) {

            $endpoint = 'admin/box/delete?id=' . $id . '';
            $header = 'Token: ' . $token . '';

            curlSetOptPost($endpoint, $header, '', []);
            // return $this->admin();
            return redirect()->to('/box');
        }
    }
}
