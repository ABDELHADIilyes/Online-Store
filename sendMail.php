<?php

$to = "meoyes9@gmail.com";
$subject = "Hello!";
$messsage = "win rak ya ahmed!";
$headers = "Content-Type: Text/plain; charset=utf-8\r\n";
$headers .= "From: meoyes9@gmail.com\r\n";

    if(mail($to, $subject, $messsage, $headers)){
        echo "email sent!";
    }else{ echo "error!"; }
?>