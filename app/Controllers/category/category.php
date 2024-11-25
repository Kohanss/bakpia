<?php

namespace App\Controllers\category;

use App\Controllers\BaseController;
use Exception;

class category extends BaseController
{

    public function check_cookie($token)
    {
        $token = (string) $token;
        // print_r($token); die;
        $curl['url'] = [BASEURL];
        $curl['endpoint'] = ['admin/product/list-product-sesuai'];
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

    public function category()
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
                    'admin_page/category/category',
                    [
                        'title' => 'Category'
                    ]

                );
            }
        }
    }

    public function category_get()
    {
        // Check if token/cookie exists
        $token = $this->request->getCookie();
        if (empty($token['Token'])) {
            return redirect()->to('/login');
        }

        if (!empty($token['Token'])) {
            $result = $this->check_cookie($token['Token']);
            $token = $token['Token'];

            if ($result == 200) {

                $curl['url'] = [BASEURL];
                $curl['endpoint'] = ['admin/category/list-category'];
                $curl['http_header'] = ['Token' => $token];
                $curl['max_redirect'] = 10;
                $curl['timeout'] = [1];
                $curl['pagination'] = ['false'];
                $data = curlSetOptGet($curl);
                $data = json_decode($data, true);
                
                $return = [
                    'data' => $data['result']['data']
                    ];
                    return $this->response->setJSON($return);
                // print_r($return); die;
            }
        }
    }

    public function add_product_category()
    {
        // Check if token/cookie exists
        $token = $this->request->getCookie();
        if (empty($token['Token'])) {
            return redirect()->to('/login');
        }

        if (!empty($token['Token'])) {
            $result = $this->check_cookie($token['Token']);
            $token = $token['Token'];

            if ($result == 200) {
                $name = $this->request->getPost('name');

                $endpoint = 'admin/category/insert';
                $header = 'Token: ' . $token;
                $data = [
                    'name' => $name
                ];

                $response = curlSetOptPost($endpoint, $header, '', $data);

                return $this->response->setJSON($response);
            }
        }
    }

    public function update_product_category()
    {
        // Check if token/cookie exists
        $token = $this->request->getCookie();
        if (empty($token['Token'])) {
            return redirect()->to('/login');
        }

        if (!empty($token['Token'])) {
            $result = $this->check_cookie($token['Token']);
            $token = $token['Token'];

            if ($result == 200) {
                $name = $this->request->getPost('name');
                $id = $this->request->getPost('id');

                $endpoint = 'admin/category/update';
                $header = 'Token: ' . $token;
                $data = [
                    'name' => $name,
                    'id' => $id
                ];

                $response = curlSetOptPost($endpoint, $header, '', $data);

                return $this->response->setJSON($response);
            }
        }
    }

    public function product_delete_category()
    {
        // Check if token/cookie exists
        $token = $this->request->getCookie();
        if (empty($token['Token'])) {
            return redirect()->to('/login');
        }

        if (!empty($token['Token'])) {
            $result = $this->check_cookie($token['Token']);
            $token = $token['Token'];

            if ($result == 200) {
                $name = $this->request->getPost('name');
                $id = $this->request->getPost('id');

                $endpoint = 'admin/category/delete';
                $header = 'Token: ' . $token;
                $data = [
                    'name' => $name,
                    'id' => $id
                ];

                $response = curlSetOptPost($endpoint, $header, '', $data);

                return $this->response->setJSON($response);
            }
        }
    }
}
