<?php

use model\IpInfo;


const PARAM_LOCAL_IP = "localIp";

spl_autoload_register(function ($className) {

    $className = ltrim($className, "\\");
    $fileName = "";

    if ($lastNsPos = strripos($className, "\\")) {
        $namespace = substr($className, 0, $lastNsPos);
        $className = substr($className, $lastNsPos + 1);
        $fileName = str_replace("\\", DIRECTORY_SEPARATOR, $namespace) . DIRECTORY_SEPARATOR;
    }
    $fileName .= str_replace("_", DIRECTORY_SEPARATOR, $className) . ".php";

    require $fileName;
});


function get_client_ip()
{
    if (getenv('HTTP_CLIENT_IP'))
        $ipAddress = getenv('HTTP_CLIENT_IP');
    else if (getenv('HTTP_X_FORWARDED_FOR'))
        $ipAddress = getenv('HTTP_X_FORWARDED_FOR');
    else if (getenv('HTTP_X_FORWARDED'))
        $ipAddress = getenv('HTTP_X_FORWARDED');
    else if (getenv('HTTP_FORWARDED_FOR'))
        $ipAddress = getenv('HTTP_FORWARDED_FOR');
    else if (getenv('HTTP_FORWARDED'))
        $ipAddress = getenv('HTTP_FORWARDED');
    else if (getenv('REMOTE_ADDR'))
        $ipAddress = getenv('REMOTE_ADDR');
    else
        $ipAddress = 'UNKNOWN';
    return $ipAddress;
}

if ((!isset($_GET[PARAM_LOCAL_IP]) || trim($_GET[PARAM_LOCAL_IP]) === '')) {
    echo "Expecting GET param called " . PARAM_LOCAL_IP;
    http_response_code(400);
    die();
}


$ipInfo = new IpInfo(get_client_ip(), $_GET[PARAM_LOCAL_IP], time());


file_put_contents(Config::DATA_FILE, json_encode($ipInfo));
