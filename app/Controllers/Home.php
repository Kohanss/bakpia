<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Home extends BaseController
{
    public function index()
    {
        // return view('welcome_message'); 


        // $lol['base']
        // $lol['data'] = [
        //     'pitek',
        //     'sate',
        // ];
        // $lol['return_transfer'] = false;
        // $d = ($lol);

        // $lol = ['true'];
        // $ed = followLocation($lol);
        // print_r($ed);
        // return $lol;

        // $lol = ['GET'];
        // $ed = customRequest($lol);
        // print_r($ed);
        // return $lol;

        // $lol = ['ythtyhhytythyyt'];
        // $ed = httpHeader($lol);
        // print_r($ed);
        // return $lol;


        // get
        $curl['url'] = ['https://pitekapi.000webhostapp.com/'];
        $curl['endpoint'] = ['ListPublic/Listproduct'];
        $curl['method'] = ['GET'];
        $curl['return_transfer'] = true;
        $curl['max_redirect'] = 10;
        $curl['timeout'] = 0;
        $curl['follow_location'] = true;
        $curl['http_header'] = ['ceritane token'];
        $curl['pagination'] = [
            'pagination' => 'true'
        ];
        $dd = curlSetOptGet($curl);
        $decode = json_decode($dd, true);
        print_r($decode);
        die;

        return view(
            'welcome_message',
            [
                'data' => $decode
            ]

        );
    }
}
