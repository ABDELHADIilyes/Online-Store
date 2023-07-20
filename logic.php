<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title> Crud </title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='main.css'>
    <script src='main.js'></script>
</head>
<body>
    <form method="post">
        <input name="family_n" id="f" type="text" placeholder="Fname"> <br>
        <input name="name" id="n" type="text" placeholder="name"> <br>
        <input name="email" id="em" type="email" placeholder="e-mail"> <br>
        <input name="password" id="ps" type="password" placeholder="password"> <br>
        <select name="action" id="">
            <option value="add" selected>add</option>
            <option value="update">update</option>
            <option value="delete">delete</option>
            <option value="read">read</option>
        </select>
        <input type="submit" name="submit" value="validate">
    </form>
</body>
</html>

<?php
include 'db.php';
/*
$fullname  = $_POST['family_n'];
$username  = $_POST['name'];
$useremail = $_POST['email'];
$passwrd   = sha1($_POST["password"]);
*/

$auth_actions = ['add','delete','update','read'];

if(!empty($_POST['submit'])){
    extract($_POST);


    if ($action === "add"){
        $sql = "INSERT INTO user (Fname, name, email, password) values(?,?,?,?)";
        $qry = $db->prepare($sql);
        $isExecuted = $qry->execute([$family_n,$name,$email,sha1($password)]);
        if($isExecuted){
            echo "<h1 style='color:green;text-align:center'>user has been inserted</h1>";
        }else{
            echo "<h1 style='color:red;text-align:center'>Error in db</h1>";
        }
    }elseif($action === "update"){
        $sql = "UPDATE user set Fname = ?, name = ?, email = ?, password = ? where email = ?";
        $qry = $db->prepare($sql);
        $isExecuted = $qry->execute([$family_n,$name,$email,sha1($password),$email]);
        if($isExecuted){
            echo "<h1 style='color:green;text-align:center'>user with : $email has been updated</h1>";
        }else{
            echo "<h1 style='color:red;text-align:center'>Update error</h1>";
        }
    }elseif($action === "read"){
        $sql = "SELECT * FROM user";
        $qry = $db->prepare($sql);
        $isExecuted = $qry->execute();
        $rows = $qry->fetchAll(PDO::FETCH_OBJ);
        
        echo '<ol>';
        foreach($rows as $row){

            
                echo '<li>';
                    echo $row->email . "<br>";
                echo '</li>';
            
        }
        echo '</ol>';
    }elseif($action === "delete"){
        $sql = "DELETE FROM user WHERE email = ?";
        $qry = $db->prepare($sql);
        $isExecuted = $qry->execute([$email]);
        if($isExecuted){
            echo "<h1 style='color:green;text-align:center'>user with : $email has been deleted</h1>";
        }else{
            echo "<h1 style='color:red;text-align:center'>Delete error</h1>";
        }
    }


}


?>
