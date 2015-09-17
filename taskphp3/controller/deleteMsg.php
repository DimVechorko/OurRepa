<?php
require_once('../model/model.php');
//var_dump($_GET);
$db_query = new dbQuery();
//$queries = new Queries();
$author_id = $_GET['author_id'];
$id = $_GET['id'];
$delete_msg = $db_query->delete($db_query->deleteMsg($author_id));
    if ($delete_msg==true) {
        header("Location: ../view/index-local.php?page=messages");
    }
