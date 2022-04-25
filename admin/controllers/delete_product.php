<?php
require_once("../../models/getData.php");
$id=$_GET['id'];
$sql = "delete from tbl_product where id = '$id'";
$result = $conn->query($sql);
header('location: index.php?page_layout=list_product');
?>
