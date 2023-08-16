<?php

include_once 'helper.php';
include_once 'db.php';


if(!empty($_POST['submit'])){
    $nameee = $_POST['name'];
    if(IsEmpty($_POST) && isEmptyFile($_FILES)){
        extract($_POST);
        $errors = analyseFile($_FILES);
        if (count($errors) === 0)
        {
            $targetDir = '/uploads';
            $targetFile = $targetDir .basename($_FILES["image"]["name"]);
    
            $name =  $_FILES['image']['name'];
            $parts = explode('.',$name);
            $ext = $parts[count($parts)-1]; 
    
            if (file_exists($targetDir)){
                echo "Sorry, file already exists.";
              }
              if (!move_uploaded_file($_FILES['image']['tmp_name'], sprintf('./uploads/%s.%s',sha1_file($_FILES['image']['tmp_name']),$ext))) {
                throw new RuntimeException('Failed to move uploaded file.');
            }
            
            $sql = "UPDATE user SET file_path=? WHERE name=?";
            $res = $db->prepare($sql);
            $res->execute([$targetFile, $nameee]);
            $qru = $res->fetch(PDO::FETCH_OBJ);
            
            $msg =  'File is uploaded successfully.';
        }
    }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Image upload</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
</head>
<body>

    <div class="container">
        <div class="p-5 mb-4 bg-body-tertiary rounded-3">
            <form method="POST" enctype="multipart/form-data">
                <label for="name" class="form-label">Your name</label>
                <input type="text" name="name" id="name" placeholder="Enter your name" class="form-control mb-2">
                <label for="username" class="form-label">Your username</label>
                <input type="text" name="username" id="username" placeholder="Enter your username" class="form-control mb-2">
                <label for="password" class="form-label">Your password</label>
                <input type="text" name="password" id="password" placeholder="Enter your password" class="form-control mb-2">
                <label for="image" class="form-label">Your Image</label>
                <input type="file" name="image" id="image" class="form-control mb-2">
                <?php
                if(!empty($errors)){
                    foreach($errors as $error)
                    {
                        echo $error . '<br>';
                    }
                }

                ?>
                <div class="d-flex justify-content-center">
                    <input type="submit" name="submit" value="Upload" class="btn btn-success">
                </div>
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"></script>
</body>
</html>

