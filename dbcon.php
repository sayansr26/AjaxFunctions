<?php 

// mysql db connections
$server = "localhost";
$username = "root";
$password = "";
$dbname = "ajax_db";


try{
    $connection = new PDO("mysql:host=$server;dbname=$dbname",$username,$password);
    
    // set pdo connection error mode exception
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e){
    echo "Connection Failed: " . $e->getMessage();
}


?>