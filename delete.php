<?php
include('connection.php');

$id=$_GET['id'];

$query="DELETE FROM newuser WHERE id='$id' ";
$data=mysqli_query($con,$query);

if($data){
    header('location:adminmain.php');
}else{
    echo "Failed Delete";
}

?>