<?php 

if(!empty($_POST['name']) && !empty($_POST['submit'])){
    extract($_POST);
    
    echo "Hello! My name is " . $name;
}

?>

<!doctype html>
<body>
    <form method="POST">
        <input name="name" type="text" placeholder="Name">
        <input type="submit" name="submit">
    </form>
</body>
</html>