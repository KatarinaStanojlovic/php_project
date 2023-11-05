<?php
include('podaci.php');
try{
$conn = new
PDO("mysql:host=$server;dbname=$imeBaze",$username,$pass);
$conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
$conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_OBJ);
}
catch(PDOException $e){
echo $e->getMessage();
}
