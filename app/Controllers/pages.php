<?php

namespace App\Controllers;

use CodeIgniter\Cookie\Cookie;
use CURLFile;


class Pages extends BaseController
{

    public function index()
    {
        $search = $this->request->getPost('category');
        $product['url'] = [BASEURL];
        $product['endpoint'] = ['listpublic/product'];
        $product['pagination'] = ['false'];
        $product['params'] = ['search' => $search];
        $product = curlSetOptGet($product);
        // $product = json_decode($product, true);

        return view('pages/main', [
            'product' => $product,
            'title' => 'Beranda'
        ]);
    }
    public function index_filter()
    {
        $search = $this->request->getPost('category');
        // return $this->response->setJSON($search);

        $product['url'] = [BASEURL];
        $product['endpoint'] = ['listpublic/product'];
        $product['pagination'] = ['false'];
        $product['params'] = ['search' => $search];
        $product = curlSetOptGet($product);

        return $this->response->setJSON($product);
    }


    public function produk()
    {
        return view(
            'pages/produk',
            [
                'title' => 'Produk'
            ]

        );
    }
    public function produk_filter()
    {
        $search = $this->request->getPost('search');
        $filter = $this->request->getPost('filter');
        $start = $this->request->getPost('start');
        $end = $this->request->getPost('end');
        $page = $this->request->getPost('page') ?: 1;

        $perPage = 9;
        $offset = ($page - 1) * $perPage;

        $product['url'] = [BASEURL];
        $product['endpoint'] = ['listpublic/product'];
        $product['pagination'] = ['true'];
        $product['params'] = [
            'search' => $search,
            'filter' => $filter,
            'start_price' => $start,
            'end_price' => $end,
            'offset' => $offset,
            'limit' => $perPage,
            'page' => $page
        ];


        $product = curlSetOptGet($product);

        return $this->response->setJSON($product);
    }


    public function tentang()
    {
        $data = [
            'title' => 'Tentang'
        ];
        return view('pages/tentang', $data);
    }


    public function toko()
    {
        $data = [
            'title' => 'Toko'
        ];
        return view('pages/toko', $data);
    }
    public function toko_filter()
    {
        $search = $this->request->getPost('search');

        $toko['url'] = [BASEURL];
        $toko['endpoint'] = ['listpublic/outlet'];
        $toko['pagination'] = ['false'];
        $toko['params'] = [
            'search' => $search,
        ];

        $toko = curlSetOptGet($toko);

        return $this->response->setJSON($toko);
    }


    public function pembelian()
    {
        $data = [
            'title' => 'Keranjang'
        ];
        return view('pages/pembelian', $data);
    }
    public function pembelian_post()
    {
        $data = $this->request->getJSON(true);

        $curl = curl_init();
        curl_setopt_array($curl, [
            CURLOPT_URL => BASEURL . 'transaction/select',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => json_encode($data),
            CURLOPT_HTTPHEADER => [
                'Content-Type: application/json'
            ],
        ]);


        $response = curl_exec($curl);
        curl_close($curl);

        return $this->response->setJSON(json_decode($response));
    }
    public function pembayaran_post()
    {
        $id = $this->request->getPost('transactionId');

        $image = $this->request->getFile('proofOfPayment');
        $cfile = null;
        if ($image && $image->isValid() && !$image->hasMoved()) {
            $filePath = $image->getTempName();
            $fileName = $image->getName();
            $fileType = $image->getClientMimeType();
            $cfile = new CURLFile($filePath, $fileType, $fileName);
        }
        $endpoint = 'transaction/payment';
        $data = [
            'id' => $id
        ];

        if ($cfile) {
            $data['upload'] = $cfile;
        }
        $response = curlSetOptPost($endpoint, '', '', $data);

        return $this->pembelian();
    }

    public function pembelian_history()
    {
        $data = [
            'title' => 'Keranjang'
        ];
        return view('pages/history_pembeli', $data);
    }
    public function pembelian_history_post()
    {
        $nomer = $this->request->getPost('nomer');

        $history['url'] = [BASEURL];
        $history['endpoint'] = ['transaction/history-customer'];
        $history['params'] = [
            'no_handphone' => $nomer,
            'pagination' => 'false',
        ];

        $history = curlSetOptGet($history);

        return $this->response->setJSON($history);
    }
}
