<?php require_once 'view.php'?>


<?php

session_start();

if (isset($_GET['delete'])){
    $id = $_GET['delete'];
    $mysqli->query("DELETE FROM details where ID=$") or die($mysqli->error());
} 
    $_SESSION['message']="Record has been deleted"; 
    $_SESSION['msg_type']="danger";

    header("location: view.php");

 ?>