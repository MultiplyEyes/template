<?php
require_once "database.php";
if(isset($_GET["id"])){
$db = new database();
$db->edit_or_delete("DELETE from product WHERE id=:id;",['id'=>$_GET["id"]], 'index.php');
}
?>