<?php
/**
 * Created by PhpStorm.
 * User: Yaron
 * Date: 20-1-2016
 * Time: 22:22
 */
include_once('database.php');
session_start();
$email = $_SESSION['email'];
$user_email = "SELECT * FROM user WHERE email LIKE '%$email%'";
$result = mysqli_query($db, $user_email);
$row = mysqli_fetch_assoc($result);
$userName = $row['firstname'] ." ". $row['lastname']. "<br/>";
$role = $row['role'];
$id = $row['id'];
if(!empty($_SESSION['email'])){
    echo '<div class="menubar">';
    echo "<h2>"."Welkom ". $userName."</h2>"."<br/>";
    if($role == 2){
        echo '<a href="user.php">Gebruikers bekijken </a> ';
    }else{
        echo '<a href="user.php">Gegevens bewerken </a> ';
    }
    echo '<a href="logout.php">Uitloggen </a> ';
    echo '</div>';
}else{
    header('location: ../index.php');
}