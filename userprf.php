<?php
session_start();
//include('homepage.php');

include('useradmin.php');

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="public/css/extra.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- boxicons cdn -->

    <style>
        .delete{
            color: wheat;
            background-color: red;
            outline: none;
            border: 0;
            border-radius: 5px;
            height: 23px;
            width: 80px;
            font-weight: bold;
            cursor: pointer;
        }
        .container{
            margin-bottom: 500px;
            margin-left: 300px;
        }
    </style>

    <title>Document</title>
</head>

<body>

    <div class="container">
        <h1 style="text-align: center;">User Profile</h1>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Image</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    
                </tr>
            </thead>
            <tbody>
                
               <?php
                  include('connection.php');
                  error_reporting(0);
                  $user=$_SESSION['email'];
                  $query="SELECT * FROM newuser WHERE email='$user' && email!='admin@gmail.com' ";
                  $data=mysqli_query($con,$query);
                  $total=mysqli_num_rows($data);

                  if($total!=0){
                    while($result=mysqli_fetch_assoc($data)){
                        echo "
                        <tr>
                        <td>".$result['id']."</td>
                        <td><img src='".$result['image']."' height='80px' width='100px'></td>
                        <td>".$result['name']."</td>
                        <td>".$result['email']."</td>
                        <td><a href='updatefrom.php?id=$result[id] &name=$result[name]'><input type='submit' value='update' class='update'></a></td>
                        </tr>
                        ";
                    }
                  }else{
                    echo "no record";
                  }

               ?>
            </tbody>
        </table>

    </div>

</body>

</html>