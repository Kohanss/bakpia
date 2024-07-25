<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Dashboard extends BaseController
{
    public function category(): string
    {
        $curl['url'] = ['http://10.10.0.53/coba-coba-wir/public/'];
        $curl['endpoint'] = ['listpublic/product'];
        $curl['method'] = ['GET'];
        $curl['pagination'] = ['false'];
        $curl['max_redirect'] = 10;
        $curl['timeout'] = [1];
        $curl['follow_location'] = true;
        $curl['return_transfer'] = true;
        $data = curlSetOptGet($curl);
        $data = json_decode($data, true);
        // print_r($data);
        // die;

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

        if (empty($data)) {
            return view(
                'admin_page/category/category',
                [
                    'title' => 'Griya Bakpia | Produk',
                    'data_get' => $default
                ]

            );
        } else {
            return view(
                'admin_page/category/category',
                [
                    'title' => 'Griya Bakpia | Produk',
                    'data_get' => $data
                ]

            );
        }
    }

    public function unit(): string
    {
        $curl['url'] = ['http://10.10.0.53/coba-coba-wir/public/'];
        $curl['endpoint'] = ['listpublic/product'];
        $curl['method'] = ['GET'];
        $curl['pagination'] = ['false'];
        $curl['max_redirect'] = 10;
        $curl['timeout'] = [1];
        $curl['follow_location'] = true;
        $curl['return_transfer'] = true;
        $data = curlSetOptGet($curl);
        $data = json_decode($data, true);
        // print_r($data);
        // die;

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

        if (empty($data)) {
            return view(
                'admin_page/unit/unit',
                [
                    'title' => 'Griya Bakpia | Produk',
                    'data_get' => $default
                ]

            );
        } else {
            return view(
                'admin_page/unit/unit',
                [
                    'title' => 'Griya Bakpia | Produk',
                    'data_get' => $data
                ]

            );
        }
    }
}
