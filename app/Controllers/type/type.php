<?php

namespace App\Controllers\type;

use App\Controllers\BaseController;

class type extends BaseController
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

    public function type()
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
                $curl['endpoint'] = ['admin/variant/list-variant'];
                $curl['method'] = ['GET'];
                $curl['http_header'] = ['Token' => $token];
                $curl['pagination'] = ['false'];
                $curl['max_redirect'] = 10;
                $curl['timeout'] = [1];
                $curl['follow_location'] = true;
                $curl['return_transfer'] = true;
                $data = curlSetOptGet($curl);
                $data = json_decode($data, true);
                // print_r($data);
                // die;

                return view(
                    'admin_page/type/type',
                    [
                        'title' => 'Variant',
                        'data_get' => $data
                    ]

                );
            }
        }
    }

    public function get_detail_add_type()
    {

        //check token/cookie exist
        $token = $this->request->getCookie();
        $token = $token['Token'];
        $cookie_check = $this->check_cookie($token);


        // check token + get detail product, category, type, value
        if ($cookie_check == 200) {
            return view('admin_page/type/add_data_type');
        } else {
            echo "token salah"; // invalid token
        }
    }


    public function add_product_type()
    {
        //check token/cookie exist
        $token = $this->request->getCookie();
        $token = $token['Token'];
        $cookie_check = $this->check_cookie($token);

        // get data from view (POST)
        $post = $this->request->getPost();
        $type = $post['type'];
        // print_r($harga); die;
        // if cookie true & data post inputed
        if ($cookie_check == 200) {

            $endpoint = 'admin/variant/insert';
            $header = 'Token: ' . $token . '';
            $post_field = [
                'variant' => $type
            ];

            $result = curlSetOptPost($endpoint, $header, '', $post_field);
            // print_r($p);
            return view(
                'admin_page/type/add_data_type',
                [
                    'type' => $result
                ]
            );
        } else {
            echo "token not registered";
        }

        // return redirect()->to('/category');
    }

    public function get_detail_update_type($id, $message = null)
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
            $type['url'] = [BASEURL];
            $type['endpoint'] = ['admin/variant/detail?id=' . $id . ''];
            // $type['pagination'] = ['false'];
            $type['http_header'] = ['Token' => $token];
            $type = curlSetOptGet($type);
            $type = json_decode($type, true);
            // print_r($type);
            // die;
        } else {
            echo "token salah"; // invalid token
        }

        return view(
            'admin_page/type/edit_data_type',
            [
                'data' => $type,
                'message' => $message
            ]
        );
    }

    public function update_product_type()
    {
        //check token/cookie exist
        $token = $this->request->getCookie();
        $token = $token['Token'];
        $cookie_check = $this->check_cookie($token);

        // get data from view (POST)
        $post = $this->request->getPost();

        $id = $post['id'];
        $type = $post['type'];
        // print_r($token); die;
        // if cookie true & data post inputed
        if ($cookie_check == 200) {

            $endpoint = 'admin/variant/update?id=' . $id . '';
            $header = 'Token: ' . $token . '';
            $post_field = [
                'variant' => $type
            ];

            $result = curlSetOptPost($endpoint, $header, '', $post_field);
            $message = $result['message'];
        } else {
            echo "token not registered";
        }

        return $this->get_detail_update_type($id, $message);
        // return redirect()->to('/type');
    }

    public function product_delete_type()
    {
        $id = $this->request->getPost();
        $id = $id['id'];

        $token = $this->request->getCookie();
        $token = $token['Token'];
        $cookie_check = $this->check_cookie($token);
        // print_r($id);
        // die;    

        if ($cookie_check == 200) {

            $endpoint = 'admin/variant/delete?id=' . $id . '';
            $header = 'Token: ' . $token . '';

            curlSetOptPost($endpoint, $header, '', []);
            // return $this->admin();
            return redirect()->to('/type');
        }
    }
}
