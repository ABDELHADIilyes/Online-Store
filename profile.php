<?php

include_once 'sessions.php';

if(empty($_SESSION)){
    header('Location: login.php');
    exit(0);
}
?>


<!DOCTYPE html>
<html lang="en"> 
<meta charset="UTF-8"> 
<title>Sign in</title> 
<link rel="stylesheet" href="./style_profile.css">
<head>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title> Profile - <?= $_SESSION['fname']?> </title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
</head>
<body>
    <h1>Welcome, <?= $_SESSION['fname'] . " " . $_SESSION['name']; ?></h1>
    <a class="" href="logout.php">Logout</a>

<div class="upperBar">
    
</div>

</body>
</html>