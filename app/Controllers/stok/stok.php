<?php

namespace App\Controllers\stok;

use App\Controllers\BaseController;

class stok extends BaseController
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

    public function stock()
    {
        $token = $this->request->getCookie();
        if (empty($token['Token'])) {
            return redirect()->to('/login');
        }

        if (!empty($token['Token'])) {
            $result = $this->check_cookie($token['Token']);
            $token = $token['Token'];
            if ($result == 200) { {
                    return view(
                        'admin_page/stok/stok',
                        [
                            'title' => 'Stock'
                        ]

                    );
                }
            }
        }
    }

    public function stock_get()
    {
        $token = $this->request->getCookie();
        if (empty($token['Token'])) {
            return redirect()->to('/login');
        }


        if (!empty($token['Token'])) {
            $result = $this->check_cookie($token['Token']);
            $token = $token['Token'];
            if ($result == 200) { {
                    $page = $this->request->getGet('page') ?? 1;
                    $limit = $this->request->getGet('limit') ?? 10;
                    $search = $this->request->getGet('search') ?? '';

                    $curl['url'] = [BASEURL];
                    $curl['endpoint'] = ['admin/stock/list-stock'];
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
    }

    public function add_product_stock()
    {
        $token = $this->request->getCookie();
        if (empty($token['Token'])) {
            return redirect()->to('/login');
        }

        if (!empty($token['Token'])) {
            $result = $this->check_cookie($token['Token']);
            $token = $token['Token'];

            if ($result == 200) {
                $id = $this->request->getPost('id');
                $value = $this->request->getPost('value');

                $endpoint = 'admin/stock/add';
                $header = 'Token: ' . $token;
                $data = [
                    'id' => $id,
                    'value' => $value
                ];

                $response = curlSetOptPost($endpoint, $header, '', $data);

                return $this->response->setJSON($response);
            }
        }
    }

    public function reduce_product_stock()
    {
        $token = $this->request->getCookie();
        if (empty($token['Token'])) {
            return redirect()->to('/login');
        }

        if (!empty($token['Token'])) {
            $result = $this->check_cookie($token['Token']);
            $token = $token['Token'];

            if ($result == 200) {
                $id = $this->request->getPost('id');
                $value = $this->request->getPost('value');

                $endpoint = 'admin/stock/reduce';
                $header = 'Token: ' . $token;
                $data = [
                    'id' => $id,
                    'value' => $value
                ];

                $response = curlSetOptPost($endpoint, $header, '', $data);

                return $this->response->setJSON($response);
            }
        }
    }

    public function update_product_stock()
    {
        $token = $this->request->getCookie();
        if (empty($token['Token'])) {
            return redirect()->to('/login');
        }

        if (!empty($token['Token'])) {
            $result = $this->check_cookie($token['Token']);
            $token = $token['Token'];

            if ($result == 200) {
                $id = $this->request->getPost('id');
                $stock = $this->request->getPost('stock');

                $endpoint = 'admin/stock/update';
                $header = 'Token: ' . $token;
                $data = [
                    'id' => $id,
                    'stock' => $stock
                ];

                $response = curlSetOptPost($endpoint, $header, '', $data);

                return $this->response->setJSON($response);
            }
        }
    }
}
