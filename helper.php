<?php

function isEmpty(array $vars): bool
{

    foreach($vars as $var){

        if (empty($var)){
            return false;
        }
    }

return true;

}

function isEmptyFile(array $files){

    foreach($files as $file => $value){
        if(empty($value['tmp_name'])){
            return false;
        }
    }

    return true;
}

function analyseFile($files): array
{

    $erros = [];
    $allowed_exts = ['png','jpg','gif','jpeg'];
    $allowed_mimetype = ['image/png', 'image/gif', 'image/jpeg'];

    foreach($files as $file){
        // get filename
        $name =  $file['name'];

        // get ext
        $parts = explode('.',$name);
        $ext = $parts[count($parts)-1]; 

        // get system file location
        $tmp_name = $file['tmp_name'];
        // get file mime type
        $type = $file['type'];

        // get file size
        $size = $file['size'];

        // get upload errors
        $error = $file['error'];
        if(!in_array($ext,$allowed_exts)){
            $erros[] = "bad extension";
        }

        if(!in_array($type,$allowed_mimetype)){
            $erros[] = "bad file type";
        }

        if($size <= 0 || $size > 100000000){
            $erros[] = "File too large";
        }

        if(!empty($error) > 0 || count($erros) > 0){
            return $erros;
        }else{
            return [];
        }

    }
}

function siteIsUp($url){
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, false);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, false);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);
    curl_setopt($ch, CURLOPT_MAXREDIRS, 10);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    $response = curl_exec($ch);

    if($response){
        return true;
    }

    return false;
}