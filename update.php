<?php
include('updatefrom.php');
include('connection.php');
if(isset($_POST['update'])){

    $name=$_POST['name'];
    $sql="UPDATE newuser SET name='$name' WHERE id='$id' ";

    if($con->query($sql)==true){
        echo "update data";
    }else{
        echo "Error";
    }

    $con->close();

}


?>