<?php

namespace App\Controllers\transaction;

use App\Controllers\BaseController;
use SebastianBergmann\Type\TrueType;

class transaction extends BaseController
{
    public function check_cookie($token)
    {
        $curl['url'] = [BASEURL];
        $curl['endpoint'] = ['admin/product/list-product-sesuai'];
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

            if ($result == 200) {
                return view(
                    'admin_page/transaction/transaction_page',
                    [
                        'title' => 'Transaction'
                    ]

                );
            } else {
                echo "<script type='text/javascript'>alert('Data tidak di temukan');</script>";
            }
        }
    }
    public function transaction_get()
    {
        $token = $this->request->getCookie();
        if (empty($token['Token'])) {
            return redirect()->to('/login');
        }

        if (!empty($token['Token'])) {
            $result = $this->check_cookie($token['Token']);
            $token = $token['Token'];

            if ($result == 200) {
                $page = $this->request->getGet('page') ?? 1;
                $limit = $this->request->getGet('limit') ?? 10;
                $search = $this->request->getGet('search') ?? '';

                $curl['url'] = [BASEURL];
                $curl['endpoint'] = ['admin/confirmation/list-transaction'];
                $curl['http_header'] = ['Token' => $token];
                $curl['pagination'] = ['true'];
                $curl['params'] = [
                    'page' => $page,
                    'limit' => $limit,
                    'search' => $search
                ];
                $data = curlSetOptGet($curl);
                $data = json_decode($data, true);
                // print_r($data);
                // die;

                return $this->response->setJSON($data);
            }
        }
    }

    public function detil_transaksi()
    {
        $token = $this->request->getCookie();
        if (empty($token['Token'])) {
            return redirect()->to('/login');
        }

        if (!empty($token['Token'])) {
            $result = $this->check_cookie($token['Token']);
            $token = $token['Token'];

            if ($result == 200) {
                $id = $this->request->getGet('id');

                $curl['url'] = [BASEURL];
                $curl['endpoint'] = ['admin/confirmation/list-order-product'];
                $curl['http_header'] = ['Token' => $token];
                $curl['params'] = [
                    'id' => $id
                ];
                $data = curlSetOptGet($curl);
                $data = json_decode($data, true);
                // print_r($data);
                // die;

                return $this->response->setJSON($data);
            }
        }
    }

    public function accept_product_transaction()
    {
        $id = $this->request->getPost();
        $id = $id['id'];
        
        $token = $this->request->getCookie();
        $token = $token['Token'];
        $cookie_check = $this->check_cookie($token);
        // print_r($id);
        // die;    
        if ($cookie_check == 200) {

            $endpoint = 'admin/confirmation/confirm';
            $header = 'Token: ' . $token;
            $data = [
                'id' => $id
            ];

            $response = curlSetOptPost($endpoint, $header, '', $data);
            // print_r($response);
            // die;
            return $this->response->setJSON($response);
        }
    }

    public function product_delete_transaction()
    {
        $id = $this->request->getPost();
        $id = $id['id'];
        $reason = 'null';

        $token = $this->request->getCookie();
        $token = $token['Token'];
        $cookie_check = $this->check_cookie($token);
        // print_r($id);
        // die;    
        if ($cookie_check == 200) {

            $endpoint = 'admin/confirmation/cancel';
            $header = 'Token: ' . $token;
            $data = [
                'id' => $id,
                'reason' => $reason
            ];

            $response = curlSetOptPost($endpoint, $header, '', $data);
            // print_r($response);
            // die;
            return $this->response->setJSON($response);
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
}
