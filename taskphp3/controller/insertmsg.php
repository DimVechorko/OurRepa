<?php
require_once('../model/model.php');
//var_dump($_GET);
$db_query = new dbQuery();
//$queries = new Queries();

if (isset($_GET) && !empty($_GET['msg'])) {

    $msg = trim($_GET['msg']);
    $id=3;

    $insert_data = $db_query->insertMsgQuery($db_query->insertMsg(), $msg, $id);
    if ($insert_data==true) {
        header("Location: ../view/index-local.php?page=messages");
    }
}
