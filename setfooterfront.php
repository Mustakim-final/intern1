<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Document</title>

    <style>
        .updatefrom{
            width: 600px;
            margin-left: 400px;
            margin-top: 200px;
            
        }
        .col-xs-12{
            margin-top: 10px;
        }
    </style>
</head>
<body>

<div class="container">
        <form class="updatefrom" method="POST" enctype="multipart/form-data">

        <div class="form-group ">
            <div class="col-xs-12">
                <input class="form-control input-lg" name="fast" type="text" required="" placeholder="Set fast footer line">
            </div>
        </div>

        <div class="form-group ">
            <div class="col-xs-12">
                <input class="form-control input-lg" name="second" type="text" required="" placeholder="Set second footer line">
            </div>
        </div>

        <div class="form-group ">
            <div class="col-xs-12">
                <input class="form-control input-lg" name="copy" type="text" required="" placeholder="Copy right text">
            </div>
        </div>

           
            <button type="submit" name="submit" class="btn btn-primary" style="margin-top: 10px;margin-left:10px;" >Upload</button>
        </form>
    </div>
</body>
</html>

<?php
include('connection.php');

if(isset($_POST['submit'])){

    $fast=$_POST['fast'];
    $second=$_POST['second'];
    $copy=$_POST['copy'];
    

    $sql="INSERT INTO footer (id,fast_line,second_line,copyright) VALUES('','$fast','$second','$copy') ";

    if($con->query($sql)==true){
        echo "Set Footer";
    }else{
        echo "Error";
    }

    $con->close();

}
?>