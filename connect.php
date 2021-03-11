<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "lokania";
$db = new PDO('mysql:host='.$host.';dbname='.$database, $username, $password);
$conn = new mysqli($host, $username, $password, $database);
?>