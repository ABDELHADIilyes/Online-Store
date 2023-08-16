<?php

include_once 'sessions.php';
include_once 'db.php';

if(!empty($_POST['submit'])){
   $username = $_POST['username'];
   $passwrd = $_POST['password'];
 if(!empty($username) && !empty($passwrd)){
   $sql = "SELECT user_id,Fname,name,email from user where email = ? and password = ?";
   $qry = $db->prepare($sql);
   $res = $qry->execute([$username,sha1($passwrd)]);
   $row = $qry->fetch(PDO::FETCH_OBJ);

   if ($qry->rowCount() === 1)
   {
      $_SESSION['user_id'] = $row->user_id;
      $_SESSION['fname'] = $row->Fname;
      $_SESSION['name'] = $row->name;
      $_SESSION['email'] = $row->email;
      $_SESSION['msg'] = "<div style='color: green;'>Welcome, $row->name</div>";
      header("Location: profile.php");
   }
   else
   {
      $msg = "Bad email / password";
   }
 }
}
?>

<!doctype html>

<html lang="en"> 
<head> 
<meta charset="UTF-8"> 
<title>Sign in</title> 
<link rel="stylesheet" href="./style_login.css"> 
</head> 
<body> <!-- partial:index.partial.html --> 
<section> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> 

   <div class="signin"> 

    <div class="content"> 

     <h2>Sign In</h2> 

     <form method="POST" class="form"> 
      <div class="inputBox"> 

       <input name="username" type="text" required> <i>Username</i> 

      </div> 
      <?= isset($msg) ? $msg : "" ;?>
      <div class="inputBox"> 

       <input name="password" type="password" required> <i>Password</i> 

      </div> 

      <div class="links"> <a href="resetpass.php">Forgot Password</a> <a href="register.php">Signup</a> 

      </div> 

      <div class="inputBox"> 

       <input type="submit" value="Login" name="submit"> 

      </div> 

</form>

    </div> 

   </div> 

  </section> <!-- partial --> 

 </body>

</html>
