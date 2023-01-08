<?php
session_start();
include('connection.php');
if(isset($_POST['login'])){

    $email=$_POST['email'];
    $password=$_POST['password']; 

    $sql="SELECT * FROM newuser WHERE email='$email' && password='$password' ";
    $sql1="SELECT * FROM newuser WHERE email='$email' && email='admin@gmail.com' && password='$password' ";

    $data=mysqli_query($con,$sql);

    $data1=mysqli_query($con,$sql1);

    $total=mysqli_num_rows($data);

    $total1=mysqli_num_rows($data1);


    if($total1==1){
        $_SESSION['email']=$email;
    
        header('location:homepage.php');
    }else if($total==1){
        $_SESSION['email']=$email;
        header('location:userhomepage.php');
    }else{
        echo "error";
    }

    $con->close();

}


?>