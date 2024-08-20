<?php

namespace App\Controllers;

class Pages extends BaseController
{
    public function index()
    {
        // $curl['url'] = ['http://10.10.0.53/crud-structured/public/'];
        // $curl['endpoint'] = ['listpublic/listproduct'];
        // $curl['method'] = ['GET'];
        // $curl['return_transfer'] = true;
        // $curl['max_redirect'] = 10;
        // $curl['timeout'] = 0;
        // $curl['follow_location'] = true;
        // $curl['http_header'] = ['ceritane token'];
        // $curl['pagination'] = ['false'];
        // $dd = curlSetOptGet($curl);
        // $decode = json_decode($dd, true);
        // // print_r($decode);
        // // die;
        // return view(
        //     'pages/main',
        //     [
        //         'title' => 'Griya Bakpia',
        //         'data_get' => $decode
        //     ]

        // );
        return view('pages/main');
    }

    // public function produk()
    // {
    //     $curl['url'] = ['http://10.10.0.53/crud-structured/public/'];        
    //     $curl['endpoint'] = ['listpublic/listproduct'];
    //     $curl['method'] = ['GET'];
    //     $curl['pagination'] = ['false'];
    //     $curl['max_redirect'] = [10];
    //     $curl['timeout'] = [1];
    //     $curl['follow_location'] = true;
    //     $curl['return_transfer'] = true;
    //     $data = curlSetOptGet($curl);
    //     $data = json_decode($data, true);
    //     // print_r($data);
    //     // die;
    //     return view(
    //         'pages/produk',
    //         [
    //             'title' => 'Griya Bakpia | Produk',
    //             'data_get' => $data
    //         ]

    //     );
    // }
    public function tentang()
    {
        $data = [
            'title' => 'Griya Bakpia | About'
        ];
        return view('pages/tentang', $data);
    }

    public function toko()
    {
        $data = [
            'title' => 'Griya Bakpia | Toko'
        ];
        return view('pages/toko', $data);
    }

    // public function loginUser()
    // {
    //     return view('pages/login');
    // }

    public function produk()
    {
        $curl['url'] = ['http://10.10.0.53/crud-structured/public/'];
        $curl['endpoint'] = ['listpublic/listproduct'];
        $curl['method'] = ['GET'];
        $curl['pagination'] = ['false'];
        $curl['max_redirect'] = 10;
        $curl['timeout'] = 1;
        $curl['follow_location'] = true;
        $curl['return_transfer'] = true;
        $data = curlSetOptGet($curl);
        $data = json_decode($data, true);
        // print_r($data);
        // die;
        $pagi = $this->request->getGet();

        if (!empty($pagi['page'])) {
            $pagi = $pagi['page'];
            $curl_pagi['url'] = ['http://10.10.0.53/crud-structured/public/'];
            $curl_pagi['endpoint'] = ['listpublic/listproduct'];
            $curl_pagi['method'] = ['GET'];
            $curl_pagi['params'] = [
                'page' => $pagi,
            ];
            $curl_pagi['pagination'] = ['true'];
            $curl_pagi['max_redirect'] = 10;
            $curl_pagi['timeout'] = 1;
            $curl_pagi['follow_location'] = true;
            $curl_pagi['return_transfer'] = true;
            // $curl_pagi['http_header'] = [
            //     'Token' => 'dmlub0BnbWFpbC5jb20xMjM0NTY=',
            // ]; 
            $data_pagi = curlSetOptGet($curl_pagi);
            $data_pagi = json_decode($data_pagi, true);
        } else {
            $data_pagi = [];
        }
        $default = [
            "status" => 200,
            "message" => "List Product",
            "error" => "",
            "result" => [
                [
                    "id" => "279",
                    "product" => "Mie Aceh",
                    "category" => "Makanan",
                    "unit" => "Piring",
                    "price_sell" => "350",
                    "stock" => "56"
                ],
                [
                    "id" => "280",
                    "product" => "Ayam Geprek",
                    "category" => "Makanan",
                    "unit" => "Piring",
                    "price_sell" => "700",
                    "stock" => "258"
                ],
                [
                    "id" => "282",
                    "product" => "Ayam Goreng",
                    "category" => "Makanan",
                    "unit" => "Piring",
                    "price_sell" => "700",
                    "stock" => "98"
                ],
                [
                    "id" => "283",
                    "product" => "Mie Rendang",
                    "category" => "Makanan",
                    "unit" => "Piring",
                    "price_sell" => "300",
                    "stock" => "498"
                ],
                [
                    "id" => "284",
                    "product" => "Mie Soto",
                    "category" => "Makanan",
                    "unit" => "Piring",
                    "price_sell" => "300",
                    "stock" => "498"
                ],
                [
                    "id" => "285",
                    "product" => "Ayam Rendang",
                    "category" => "Makanan",
                    "unit" => "Piring",
                    "price_sell" => "1000",
                    "stock" => "999"
                ],
                [
                    "id" => "289",
                    "product" => "Es Teh",
                    "category" => "Minuman",
                    "unit" => "Gelas",
                    "price_sell" => "800",
                    "stock" => "100"
                ],
                [
                    "id" => "290",
                    "product" => "Es Jeruk",
                    "category" => "Minuman",
                    "unit" => "Gelas",
                    "price_sell" => "800",
                    "stock" => "100"
                ],
                [
                    "id" => "291",
                    "product" => "Teh anget",
                    "category" => "Minuman",
                    "unit" => "Gelas",
                    "price_sell" => "800",
                    "stock" => "100"
                ],
                [
                    "id" => "292",
                    "product" => "Kelapa",
                    "category" => "Minuman",
                    "unit" => "Gelas",
                    "price_sell" => "800",
                    "stock" => "100"
                ]
            ]
        ];

        $default_pagination = [
            "status" => 200,
            "message" => "List Product",
            "error" => "",
            "result" => [
                "data" => [
                    [
                        "id" => "291",
                        "product" => "Teh anget",
                        "category" => "Minuman",
                        "unit" => "Gelas",
                        "price_sell" => "800",
                        "stock" => "100"
                    ],
                    [
                        "id" => "292",
                        "product" => "Kelapa",
                        "category" => "Minuman",
                        "unit" => "Gelas",
                        "price_sell" => "800",
                        "stock" => "100"
                    ]
                ],
                "pagination" => [
                    "jumlah_data" => 10,
                    "jumlah_page" => 5,
                    "prev" => null,
                    "page" => "1",
                    "next" => "2",
                    "detail" => [
                        1,
                        2,
                        3
                    ],
                    "start" => 1,
                    "end" => 2
                ]
            ]
        ];

        if (empty($data && $data_pagi)) {
            return view(
                'pages/produk',
                [
                    'title' => 'Griya Bakpia | Produk',
                    'data_page' => $default_pagination,
                    'data_get' => $data
                ]

            );
        } else {
            return view(
                'pages/produk',
                [
                    'title' => 'Griya Bakpia | Produk',
                    'data_page' => $data_pagi,
                    'data_get' => $data
                ]

            );
        }
    }
}
