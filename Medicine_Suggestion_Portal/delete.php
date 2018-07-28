<?php
require 'connection.php';
include 'header.php';

$id = $_GET['id'];


$stmt = $connect->prepare("DELETE FROM medicine WHERE med_id='$id'");
$stmt->execute();

header('Location: dashboard.php?action=removed');
exit;