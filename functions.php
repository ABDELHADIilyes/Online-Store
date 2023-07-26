<?php

include_once 'db.php';

function updateAccount(PDO $db,string $email,array $infos){
    $sql = "UPDATE user set Fname = ?, name = ?, email = ?, password = ? where email = ?";
    $qry = $db->prepare($sql);
    $isExecuted = $qry->execute($infos);

    return $isExecuted;
}

function selectAccount(PDO $db,string $email){
    $sql = "select * from user where email = ?"; // 3000$ bug bounty
    $qry = $db->prepare($sql);
    $isExecuted = $qry->execute([$email]);

    $row = $qry->fetch(PDO::FETCH_OBJ);

    return $row;
}
