<?php

namespace App\Controllers\stok;

use App\Controllers\BaseController;

class stok extends BaseController
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

    //stock
    public function stock()
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
                $curl['endpoint'] = ['admin/stock/list-stock'];
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
                {

                    return view(
                        'admin_page/stok/stok',
                        [
                            'title' => 'Stock',
                            'data_get' => $data
                        ]

                    );
                }
            }
        }
    }

    public function get_detail_update_stock($id, $message = null)
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
            'box' => $box,
            'message' => $message
        ];
        return view('admin_page/stok/edit_data_stok', $data);
    }

    public function update_product_stock()
    {
        //check token/cookie exist
        $token = $this->request->getCookie();
        $token = $token['Token'];
        $cookie_check = $this->check_cookie($token);

        // get data from view (POST)
        $post = $this->request->getPost();

        $id = $post['id'];
        $product = $post['nama'];
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

            $result =  curlSetOptPost($endpoint, $header, '', $post_field);
            $message = $result['message'];
        } else {
            echo "token not registered";
        }

        return $this->get_detail_update_stock($id, $message);
    }
}
