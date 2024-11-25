<?php

// OPT POST
function curlSetOptPost($endpoint, $header, $params, $post_field)
{
    $base_url = BASEURL . $endpoint;

    if (!empty($params)) {
        $base_url .= '?' . http_build_query($params); // Use http_build_query to handle any array params safely
    }

    $curl = curl_init();

    // Debug the post fields before sending
    // Set CURL options
    curl_setopt_array($curl, [
        CURLOPT_URL => $base_url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_SSL_VERIFYPEER => false,
        CURLOPT_SSL_VERIFYHOST => false,
        CURLOPT_HTTPHEADER => [$header],
    ]);

    // If there is a file in the $post_field, use it directly in CURLOPT_POSTFIELDS
    if (isset($post_field['upload']) && $post_field['upload'] instanceof CURLFile) {
        // Use CURLFile in the post fields directly
        curl_setopt($curl, CURLOPT_POSTFIELDS, $post_field);
    } else {
        // Otherwise, encode the fields as a URL-encoded string
        curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($post_field)); // Use http_build_query for non-file fields
    }

    // Execute the CURL request
    $response = curl_exec($curl);
    if (curl_errno($curl)) {
        throw new Exception("cURL error: " . curl_error($curl));
    }
    curl_close($curl);

    // Decode the JSON response
    $decode = json_decode($response, true);
    if (json_last_error() !== JSON_ERROR_NONE) {
        throw new Exception("Invalid JSON response from server: " . $response);
    }

    // Process the response
    return [
        'data' => $decode['result']['data'] ?? null,
        'message' => $decode['message'] ?? null,
        'error' => $decode['error'] ?? null,
    ];
}




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
