<?php
session_start();
include('connection.php');
$email=$_SESSION['email'];


$query="SELECT * FROM newuser WHERE email='$email' ";

$backquery="SELECT * FROM background ";

$footerquery="SELECT * FROM footer ";

$footerdata=mysqli_query($con,$footerquery);
$footertotal=mysqli_num_rows($footerdata);
$footerresult=mysqli_fetch_assoc($footerdata);

$backdata=mysqli_query($con,$query);
$backtotal=mysqli_num_rows($backdata);
$backresult=mysqli_fetch_assoc($backdata);


$data=mysqli_query($con,$query);

$total=mysqli_num_rows($data);
$result=mysqli_fetch_assoc($data);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="portfolio.css">

    <style>
        .hero{
            background-image: url("<?php echo $backresult['backimage'] ?>");
        }
    </style>
</head>
<body>

   
    
    <div class="hero">
        <nav>
            <h2 class="logo">Portfo <span>lio</span></h2>

            <ul>
                <li><a href="#">About Us</a></li>
                <li><a href="employerfront.php">Employer</a></li>
                <li><a href="useradmin.php">Update Profile</a></li>
                <li><a href="logout.php">logout</a></li>
            </ul>

            <a href="#" class="btn">Subscribe</a>
        </nav>

        <div class="content">

            <h4>Hello, my name is</h4>
            <h1><?php echo $result['name'] ?></h1>
            <h3><?php echo $result['profession'] ?></h3>

           

        </div>
    </div>

    <section class="about">
        <div class="main">
            <img src="<?php echo $result['image'] ?>" alt="">
            <div class="about-text">
                <h2>About Me</h2>
                <h5>Developer and <span>Android Developer</span> </h5>
                <p>
                    <?php
                    echo $result['description'];
                    ?>
                </p>

                <button type="button">Let's Talk</button>
            </div>
        </div>
    </section>


    <div class="service">
        <div class="title">
            <h2>My Slkill</h2>
        </div>
        <div class="box">

            <div class="card">
                <i class="fas fa-bars"></i>
                <h5>Web Developer</h5>
                <div class="pra">
                    <p>
                        <?php
                        echo $result['project'];
                        ?>
                    </p>
                    <p>
                        <a href="#" class="button">Read More</a>
                    </p>
                </div>
            </div>
    
            
    
            

        </div>
       

    </div>

    


    <footer>
        <p><?php echo $result['name'] ?></p>
        <p><?php echo $footerresult['fast_line'] ?></p>
        <p style="color: #fff;"><?php echo $footerresult['second_line'] ?></p>

        <!-- <div class="social">
            <a href="#"> <img src="http://drive.google.com/uc?export=view&id=1NhrITWHiwI1fJB1CGzPxGPYP01MY6YVv" alt="mustakim"> </a>
            <a href="#"> <img src="http://drive.google.com/uc?export=view&id=1NhrITWHiwI1fJB1CGzPxGPYP01MY6YVv" alt="mustakim"> </a>
            <a href="#"> <img src="http://drive.google.com/uc?export=view&id=1NhrITWHiwI1fJB1CGzPxGPYP01MY6YVv" alt="mustakim"> </a>
        </div> -->

        <p class="end"><?php echo $footerresult['copyright'] ?></p>
    </footer>
    
</body>
</html>