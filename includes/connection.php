<?php
$connection  = mysqli_connect("localhost","root","","eagles_buses_db");
if(!$connection){
    die("DB Query failed".mysqli_connect($connection));
}

ob_start(); 

if(session_status() !== PHP_SESSION_ACTIVE) session_start();


  // error_reporting(0); 
?>