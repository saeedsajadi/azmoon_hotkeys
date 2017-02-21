<?php
include_once('config.php');
$key = '';
if($_POST['key1'] != ''){
    if($key != ''){
        $key .= '+';
    }
    $key .= $_POST['key1'];
}
if($_POST['key2'] != ''){
    if($key != ''){
        $key .= '+';
    }
    $key .= $_POST['key2'];
}
if($_POST['key3'] != ''){
    if($key != ''){
        $key .= '+';
    }
    $key .= $_POST['key3'];
}
if($_POST['key4'] != ''){
    if($key != ''){
        $key .= '+';
    }
    $key .= $_POST['key4'];
}

$description = $_POST['description'];
$category_id = $_POST['category_id'];


$conn->query("INSERT INTO `hotkeys` (`key`, `description`, `category_id`) VALUES ('$key', '$description', '$category_id')");
header('location: http://localhost:8000/');
?>
