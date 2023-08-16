<?php

include_once "helper.php";

if(!empty($_POST['submit']) && !empty($_POST['url'])){
    extract($_POST);
    
    $check = siteIsUp($url);

    if($check){
        header("Location: resultCheck.php");
    }else{
        header("Location: resultDown.php");
    }
}
?>

<!DOCTYPE html>
<head>
<title> Site Checker </title>
</head>
<body>
    <form method="post">
        <h2> Please put your URL below to check if it is Up or Down </h2>
    <a>URL</a> <input type="text" name="url" id="url" placeholder="https://example.com"> 
    <input type="submit" name="submit" value="Send">
    </form>
</body>
</html>




