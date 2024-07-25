<?php

// $base_url = "www.google.com/";
// function api_curl($endpoint = "product/add", $method = 'POST', $header = [], $params = [])
// {

//   $curl = curl_init();

//   if ($method === 'GET') {
//     $url = $base_url . "" . $endpoint . "?" . http_build_query($params);
//   } else {
//     $url = $base_url . "" . $endpoint;
//   }

//   curl_setopt_array($curl, array(
//     CURLOPT_URL => $url,
//     CURLOPT_RETURNTRANSFER => true,
//     CURLOPT_ENCODING => '',
//     CURLOPT_MAXREDIRS => 10,
//     CURLOPT_TIMEOUT => 0,
//     CURLOPT_FOLLOWLOCATION => true,
//     CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
//     CURLOPT_CUSTOMREQUEST => $method,
//     CURLOPT_POSTFIELDS => $method == 'POST' ? json_encode($params) : [],
//     CURLOPT_SSL_VERIFYPEER => false,
//     CURLOPT_SSL_VERIFYHOST => false,
//     CURLOPT_HTTPHEADER => $header
//   ));

//   $response = curl_exec($curl);
//   $response_json = json_decode($response);
//   curl_close($curl);

//   $response = [
//     "status" => 412,
//     "message" => "Name harus diisi.\nBonus poin harus angka.\nTanggal mulai tidak valid.\nTanggal berakhir tidak valid.",
//     "error_code" => "error_validation",
//     "results" => [
//       "data" => [
//         "name" => "Name harus diisi.",
//         "full_track_point" => "Bonus poin harus angka.",
//         "start_date" => "Tanggal mulai tidak valid.",
//         "end_date" => "Tanggal berakhir tidak valid."
//       ]
//     ]
//   ];

//   if ($response->status === 200) {
//     if (!empty($response->result)) {
//       $data = $response->result->data;
//       $message = $response->message;
//     }
//   }

//   return [
//     'data' => $data,
//     'message' => $message
//   ];
// }

// OPT POST


function curlSetOptPost($endpoint, $header, $params, $post_field)
{
    $base_url = BASEURL . 'coba-coba-wir/public/' . $endpoint . '';

    if (!empty($params)) {
        $base_url = BASEURL . 'coba-coba-wir/public/' . $endpoint . '?' . params($params) . '';
    }

    $curl = curl_init();
    curl_setopt_array($curl, array(
        CURLOPT_URL => $base_url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => postField($post_field),
        CURLOPT_SSL_VERIFYPEER => false,
        CURLOPT_SSL_VERIFYHOST => false,
        CURLOPT_HTTPHEADER => $header
    ));

    $response = curl_exec($curl);
    $decode = json_decode($response, true);
    curl_close($curl);

    if ($decode->status === 200) {
        $data = $decode->result->data;
        $message = $decode->message;
    }

    return [
        'data' => $data,
        'message' => $message
    ];
}



// function curlSetOptPost($curl)
// {
//     $url = isset($curl['url']) ?  $curl['url'] : '';
//     $method = isset($curl['method']) ?  $curl['method'] : '';
//     $endpoint = isset($curl['endpoint']) ?  $curl['endpoint'] : '';
//     $return_transfer = isset($curl['return_transfer']) ?  $curl['return_transfer'] : '';
//     $max_redirect = isset($curl['max_redirect']) ?  $curl['max_redirect'] : '';
//     $timeout = isset($curl['timeout']) ?  $curl['timeout'] : '';
//     $follow_location = isset($curl['follow_location']) ?  $curl['follow_location'] : '';
//     $http_header = isset($curl['http_header']) ?  $curl['http_header'] : '';
//     $post_field = isset($curl['post_field']) ?  $curl['post_field'] : '';
//     $params = isset($curl['params']) ? $curl['params'] : '';


//     if (!empty($url)) {
//         $url = BaseUrlCurl($url);
//     }

//     if (!empty($method)) {
//         $method = customRequest($method);
//     }

//     if (!empty($endpoint)) {
//         $endpoint = endPoint($endpoint);
//     }

//     if (!empty($params)) {
//         $params = params($params);
//         $paramStatus = true;
//     } else {
//         $paramStatus = false;
//     }

//     if (!empty($return_transfer)) {
//         $return_transfer = returnTransfer($return_transfer);
//     }

//     if (!empty($timeout)) {
//         $timeout = timeOut($timeout);
//     }

//     if (!empty($follow_location)) {
//         $follow_location = followLocation($follow_location);
//     }

//     if (!empty($http_header)) {
//         $http_header = httpHeader($http_header);
//     }

//     if (!empty($post_field)) {
//         $post_field = postField($post_field);
//     }

//     $curl = curl_init();
//     curl_setopt_array($curl, array(
//         CURLOPT_URL => "{$url}/{$endpoint}{$params}",
//         CURLOPT_RETURNTRANSFER => true,
//         CURLOPT_ENCODING => '',
//         CURLOPT_MAXREDIRS => 10,
//         CURLOPT_TIMEOUT => 0,
//         CURLOPT_FOLLOWLOCATION => true,
//         CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
//         CURLOPT_CUSTOMREQUEST => 'POST',
//         CURLOPT_HTTPHEADER => array(
//             "{$http_header}"
//         ),
//         CURLOPT_POSTFIELDS => array(
//             $post_field
//         ),
//     ));

//     $response = curl_exec($curl);

//     curl_close($curl);

//     return $response;
// }


// OPT GET
function curlSetOptGet($curl)
{
    $url = isset($curl['url']) ?  $curl['url'] : '';
    $method = isset($curl['method']) ?  $curl['method'] : '';
    $endpoint = isset($curl['endpoint']) ?  $curl['endpoint'] : '';
    $return_transfer = isset($curl['return_transfer']) ?  $curl['return_transfer'] : '';
    $max_redirect = isset($curl['max_redirect']) ?  $curl['max_redirect'] : '';
    $timeout = isset($curl['timeout']) ?  $curl['timeout'] : '';
    $follow_location = isset($curl['follow_location']) ?  $curl['follow_location'] : '';
    $http_header = isset($curl['http_header']) ?  $curl['http_header'] : '';
    $pagination = isset($curl['pagination']) ?  $curl['pagination'] : '';
    $params = isset($curl['params']) ? $curl['params'] : '';

    if (!empty($url)) {
        $url = BaseUrlCurl($url);
    }

    if (!empty($method)) {
        $method = customRequest($method);
    }

    if (!empty($endpoint)) {
        $endpoint = endPoint($endpoint);
    }

    if (!empty($params)) {
        $params = params($params);
        $paramStatus = true;
    } else {
        $paramStatus = false;
    }

    if (!empty($pagination)) {
        $pagination = pagination($pagination, $paramStatus);
    }

    if (!empty($return_transfer)) {
        $return_transfer = returnTransfer($return_transfer);
    }

    if (!empty($timeout)) {
        $timeout = timeOut($timeout);
    }

    if (!empty($follow_location)) {
        $follow_location = followLocation($follow_location);
    }

    if (!empty($http_header)) {
        $http_header = httpHeader($http_header);
    }

    // ---------- set CurL ---------- //
    $curl = curl_init();
    curl_setopt_array($curl, array(
        CURLOPT_URL => "{$url}/{$endpoint}{$params}{$pagination}",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_MAXREDIRS => $max_redirect,
        CURLOPT_TIMEOUT => $timeout,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => array(
            "{$http_header}"
        ),
    ));

    $response = curl_exec($curl);
    curl_close($curl);
    return $response;
}




//----------------- PRINTILAN -----------------//
function BaseUrlCurl($url)
{
    foreach ($url as $key => $value) {
        $url = $value;
        $curl = $url;
    }
    return $curl;
}

function endPoint($point)
{
    $curl = '';
    foreach ($point as $key => $value) {
        $curl = $value;
    }
    return $curl;
}

function params($params)
{
    $curl = '?';
    foreach ($params as $key => $value) {
        $curl .= "{$key}={$value}&";
    }
    $curl = rtrim($curl, '& ');
    return $curl;
}

function pagination($pagination, $paramStatus)
{
    // get pagination value
    foreach ($pagination as $key => $value) {
        $pagination = $value;
    }

    if ($pagination == 'true') {
        if (!empty($paramStatus)) {
            $curl = "&pagination=true";
            return $curl;
        } else {
            $curl = "?pagination=true";

            return $curl;
        }
    } else {
        if (empty($paramStatus)) {
            $curl = "?pagination=false";
            return $curl;
        } else {
            $curl = "&pagination=false";
            return $curl;
        }
    }
}


function returnTransfer($transfer)
{
    if ($transfer > 0) {
        return 'true';
    } else {
        return 'false';
    }
}

function timeOut($timeout)
{
    foreach ($timeout as $key => $value) {
        $timeout = $value;
    }
    return $timeout;
}

function followLocation($location)
{
    if ($location > 0) {
        return 'true';
    } else {
        return 'false';
    }
}


function customRequest($cusReq)
{
    foreach ($cusReq as $key => $value) {
        $cusReq = $value;
        // print_r($cusReq);
        // die;
    }
    return $cusReq;
}

function httpHeader($httphead)
{
    $curl = '';
    foreach ($httphead as $key => $value) {
        $curl = "{$key}: {$value},";
    }
    $curl = rtrim($curl, ', ');
    return $curl;
}

function postField($post_field)
{
    $curl = '';
    foreach ($post_field as $key => $value) {
        $curl .= "'{$key}' => '{$value}',";
    }
    $curl = rtrim($curl, ', ');
    return $post_field;
}
