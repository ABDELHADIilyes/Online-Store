<?php
$dsn = 'mysql:host=localhost;port=3308;dbname=test';
$user = 'root';
$password = '';

try{
return $db = new PDO($dsn, $user, $password);
//echo "connected succesfully";
}catch(PDOException $e){
    echo"connection failed:".$e->getMessage();
}

?>