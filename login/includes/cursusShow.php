<!doctype html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="../../css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../../css/style.css">
</head>
<body>
<div class="container">

<?php
/**
 * Created by PhpStorm.
 * User: Yaron
 * Date: 23-1-2016
 * Time: 03:02
 */

include_once('database.php');

session_start();

$email = $_SESSION['email'];
$user_email = "SELECT * FROM user WHERE email LIKE '%$email%'";
$result = mysqli_query($db, $user_email);
$row = mysqli_fetch_assoc($result);
$userName = $row['firstname'] ." ". $row['lastname']. "<br/>";
$role = $row['user_level'];
$id = $row['id'];
if(!empty($_SESSION['email'])){
    echo '<div class="menubar">';
    echo "<h2>"."Welkom ". $userName."</h2>"."<br/>";
    if($role == 2){
        echo '<a href="cursus.php"> curus aanmaken / aanpassen </a> ';
        echo '<a class="menu" href="user.php"> Gebruikers </a>';
    }else{
        echo '<a href="user.php">Gegevens bewerken </a> ';
    }
    echo '<a href="logout.php">Uitloggen </a> ';
    echo '</div>';
}else{
    header('location: ../index.php');
}


if($role == 2){
    $idCursus = $_GET['id'];

    $allCursus = "SELECT * FROM cursus_registratie WHERE id_cursus='$idCursus'";
    $resultCursus = mysqli_query($db, $allCursus);

    while($row = mysqli_fetch_array($resultCursus)){
        $userId = $row['id_user'];
        $allUserId = "SELECT * FROM user WHERE id='$userId'";
        $userResult = mysqli_query($db, $allUserId);
        while($rowUser = mysqli_fetch_array($userResult)){

            echo $rowUser['firstname'] . " ";
            echo $rowUser['lastname'] . " ";
            echo $rowUser['email']. " ";
            echo $rowUser['phone'] . "<br/>";
            echo "<hr/>";
        }
    }

}