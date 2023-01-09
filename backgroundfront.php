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
            width: 700px;
            margin-left: 400px;
            margin-top: 200px;
            
        }
    </style>
</head>
<body>
    
<div class="container">
        <form class="updatefrom" method="POST" enctype="multipart/form-data">

            <div class="mb-3">
                <label for="formFile" class="form-label">Background photo</label>
                <input class="form-control" name="background" type="file" id="formFile">
            </div>
            

            

           

           
            <button type="submit" name="update" class="btn btn-primary">Upload</button>
        </form>
    </div>
</body>
</html>

<?php
include('connection.php');
if(isset($_POST['update'])){

    $filename=$_FILES['background']['name'];
    $tempname=$_FILES['background']['tmp_name'];
    $folder="images/". $filename;

    
    move_uploaded_file($tempname,$folder);

    
    
    $sql="UPDATE background SET backimage='$folder' ";

    if($con->query($sql)==true){
        echo "update data";
    }else{
        echo "Error";
    }

    $con->close();

}
?>