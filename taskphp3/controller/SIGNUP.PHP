<?php
require_once('../model/model.php');

$sign_up = new SignUp();
$sign_up->writeData();
//$queries = new Queries();

/*if (isset($_POST) && !empty($_POST['username']) && !empty($_POST['password']) && !empty($_POST['repassword'])) {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
    $repassword = trim($_POST['repassword']);
    if ($_POST['password'] === $_POST['repassword']) {
        $insert_data = $db_query->insertDataQuery($db_query->insertData(), $username, $password);
        if ($insert_data == true) {
            header("Location: ../view/index-local.php?page=messages");
        }
    }
}*/