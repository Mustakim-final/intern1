<?php
session_start();
include('connection.php');
$email=$_SESSION['email'];


$query="SELECT * FROM newuser ";

$data=mysqli_query($con,$query);

$total=mysqli_num_rows($data);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="portfolio.css">
    <title>Document</title>
</head>
<body>
<div class="hero">
        <nav>
            <h2 class="logo">Portfo <span>lio</span></h2>

            <ul>
                <li><a href="userhomepage.php">About Us</a></li>
                <li><a href="employerfront.php">Employer</a></li>
                <li><a href="homepage.php">Update Profile</a></li>
                <li><a href="logout.php">logout</a></li>
            </ul>

            <a href="#" class="btn">Subscribe</a>
        </nav>
        
        <div class="row" style="display: flex;">
            <?php
            while($result=mysqli_fetch_assoc($data)){
                echo "<div class='col-4'>
            
              <div class='card'style='background-color:#f3f3f4;' >
                <div class='card-hader'>
                <img src=".$result['image']." style='width: 60px;'>
                <p> ".$result['name']."</p>
                </div>
                <div class='card-body'>
                <p>".$result['description']."</p>
                </div>
              </div>
            </div>";
            }
            

            ?>
        </div>

        
    </div>

    


    

    


    <footer>
        <p>name</p>
        <p>For more Web Development code - please click on the below to suscribe to my channel:</p>

        <div class="social">
            <a href="#"> <img src="http://drive.google.com/uc?export=view&id=1NhrITWHiwI1fJB1CGzPxGPYP01MY6YVv" alt="mustakim"> </a>
            <a href="#"> <img src="http://drive.google.com/uc?export=view&id=1NhrITWHiwI1fJB1CGzPxGPYP01MY6YVv" alt="mustakim"> </a>
            <a href="#"> <img src="http://drive.google.com/uc?export=view&id=1NhrITWHiwI1fJB1CGzPxGPYP01MY6YVv" alt="mustakim"> </a>
        </div>

        <p class="end">Copy Right By Md.Mustakim</p>
    </footer>
</body>
</html>