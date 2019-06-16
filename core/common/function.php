<?php

/**
 * 发送get请求
 * @param string $url 请求地址
 * @return mixed
 */
function https_get($url){
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_TIMEOUT, 500);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($curl, CURLOPT_URL, $url);

    $res = curl_exec($curl);
    curl_close($curl);

    return $res;
}

/**
 * 数据返回
 * @param  [int] $code [结果码 200:正常/4**数据问题/5**服务器问题]
 * @param  [string] $msg  [返回的提示信息]
 * @param  [array]  $data [返回的数据]
 * @return [string]       [最终的json数据]
 */
function return_msg($code, $msg = '', $data = []) {

    $return_data['code'] = $code;
    $return_data['msg']  = $msg;
    $return_data['data'] = $data;

    echo json_encode($return_data,JSON_UNESCAPED_UNICODE);
    die;
}