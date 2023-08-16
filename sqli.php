<?php
include_once 'db.php';
if(!empty($_POST['submit'])){
    extract($_POST);

    $req = 'INSERT INTO user (Fname , name, email, password) VALUES ($Faname, $name, $email, $pass)';
    $poo = $db->exec($req);

    if($poo)
        echo ' New User has been added! ';
    else echo ' Error has been occured! ';
}



?>

<!doctype html>
<body>
    <form method="POST">
        <input name="Faname" type="text" placeholder="Family-Name"> <br>
        <input name="name" type="text" placeholder="Name"> <br>
        <input name="email" type="email" placeholder="Email"> <br>
        <input name="pass" type="password" placeholder="Password"> <br>
        <input type="submit" name="submit" value="Add User">
    </form>
</body>
</html>

