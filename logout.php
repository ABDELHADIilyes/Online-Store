<?php

include_once 'sessions.php';

if (!empty($_SESSION)){
    unset($_SEESION);
    $_SESSION = [];
    header('Location: login.php');
    exit(0);
}
