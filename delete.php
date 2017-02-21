<?php
include_once('config.php');
$id = $_POST['id'];
$sql = "DELETE FROM hotkeys WHERE `id` = $id";
$conn->query($sql);
$conn->close();
header('location: http://localhost:8000/');