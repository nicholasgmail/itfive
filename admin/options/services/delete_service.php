<?php
include '../../../configs/db.php';

$sql = "DELETE FROM `category_services` WHERE `service_id` =" . $_GET['id'] ."";
$result = $connect->query($sql);

$sql = "DELETE FROM `services` WHERE `services`.`id` =" . $_GET['id'] ."";
$result = $connect->query($sql);

header("Location: http://itfive.local/admin/services.php");
?>
