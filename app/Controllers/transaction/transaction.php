<?php

namespace App\Controllers\transaction;

use App\Controllers\BaseController;
use SebastianBergmann\Type\TrueType;

class transaction extends BaseController
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

    public function transaction()
    {
        $token = $this->request->getCookie();
        if (empty($token['Token'])) {
            return redirect()->to('/login');
        }


        if (!empty($token['Token'])) {
            $result = $this->check_cookie($token['Token']);
            $token = $token['Token'];

            // $get = $this->request->getGet();
            // if (empty($get['id'])) {
            //     $id = $id;
            // } else {
            //     $id = $get['id'];
            // }

            if ($result == 200) {
                $curl['url'] = [BASEURL];
                $curl['endpoint'] = ['admin/confirmation/detail'];
                $curl['http_header'] = ['Token' => $token];
                $data = curlSetOptGet($curl);
                $data = json_decode($data, true);
                // print_r($data);
                // die;

                return view(
                    'admin_page/transaction/transaction',
                    [
                        'title' => 'transaction',
                        'data_get' => $data
                    ]

                );
            }
        }
    }

    public function transaction_history()
    {
        $token = $this->request->getCookie();
        if (empty($token['Token'])) {
            return redirect()->to('/login');
        }


        if (!empty($token['Token'])) {
            $result = $this->check_cookie($token['Token']);
            $token = $token['Token'];

            // $get = $this->request->getGet();
            // if (empty($get['id'])) {
            //     $id = $id;
            // } else {
            //     $id = $get['id'];
            // }

            if ($result == 200) {
                $curl['url'] = [BASEURL];
                $curl['endpoint'] = ['admin/confirmation/history'];
                $curl['http_header'] = ['Token' => $token];
                $data = curlSetOptGet($curl);
                $data = json_decode($data, true);
                // print_r($data);
                // die;

                return view(
                    'admin_page/transaction/transaction_history',
                    [
                        'title' => 'transaction history',
                        'data_get' => $data
                    ]

                );
            }
        }
    }


    public function accept_product_transaction()
    {
        //check token/cookie exist
        $token = $this->request->getCookie();
        $token = $token['Token'];
        $cookie_check = $this->check_cookie($token);

        // get data from view (POST)
        $post = $this->request->getPost();

        $id = $post['id'];
        // print_r($token); die;
        // if cookie true & data post inputed
        if ($cookie_check == 200) {

            $endpoint = 'admin/confirmation/confirm?id=' . $id . '';
            $header = 'Token: ' . $token . '';
            $data = [];

            curlSetOptPost($endpoint, $header, '', $data);
        } else {
            echo "token not registered";
        }

        return redirect()->to('/transaction');
    }

    public function product_delete_transaction()
    {

        $id = $this->request->getPost();
        $id = $id['id'];

        $token = $this->request->getCookie();
        $token = $token['Token'];
        $cookie_check = $this->check_cookie($token);
        // print_r($id);
        // die;    

        if ($cookie_check == 200) {

            $endpoint = 'admin/confirmation/cancel?id=' . $id . '';
            $header = 'Token: ' . $token . '';

            curlSetOptPost($endpoint, $header, '', []);
            // return $this->admin();

            return redirect()->to('/transaction');
        }
    }
}
