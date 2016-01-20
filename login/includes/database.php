<?php
$server = "localhost";
$user = "root";
$pass = "";
$dbName = "school";
$db = new mysqli($server, $user, $pass, $dbName);
if ($db->connect_errno) {
    echo "Failed to connect to MySQL: (" . $db->connect_errno . ") " . $db->connect_error;
}
