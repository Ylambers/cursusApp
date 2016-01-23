<?php
/**
 * Created by PhpStorm.
 * User: Yaron
 * Date: 23-1-2016
 * Time: 03:53
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
}else{
    header('location: ../index.php');
}

if($role == 2){
    $getId = $_GET['id'];

    $deleteCursus = "DELETE FROM cursus WHERE id = $getId";
    if (!mysqli_query($db, $deleteCursus)) {
        die('Error ' . mysqli_error($db));
    }else{
        header("location: cursus.php");
    }
}