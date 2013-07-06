<?php   
session_start(); 
include_once 'setting/function.php';
include_once 'setting/config.php'; 
$user = new User(); 
session_destroy();  
	header("location:index.php");

?>