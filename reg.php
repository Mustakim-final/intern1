<?php

include('connection.php');
if(isset($_POST['submit'])){

    $name=$_POST['name'];
    $profession=$_POST['profession'];
    $descrip=$_POST['description'];
    $gender=$_POST['gender'];
    $email=$_POST['email'];
    $password=$_POST['password']; 

    $sql="INSERT INTO newuser (id,email,name,password,profession,description,gender) VALUES('','$email','$name','$password','$profession','$descrip','$gender')";

    if($con->query($sql)==true){
        header('location:loginfront.php');
    }else{
        echo "Error";
    }

    $con->close();

}


?>