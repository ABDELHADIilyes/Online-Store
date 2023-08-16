<?php

if($_SERVER['REQUEST_METHOD'] === "GET"){
    if($_SERVER['HTTP_HOST'] === "127.0.0.1"){
        echo "Welcome to ur secret local service";
    }else{
        echo "Not authorized";
    }
}
