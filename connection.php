<?php
$server="localhost";
$username="root";
$pass="";
$db="fast_task";

$con=new mysqli($server,$username,$pass,$db);

if($con->connect_error){
    die("Error". $con->connect_error);
}
?>