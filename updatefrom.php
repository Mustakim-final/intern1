<?php
session_start();
include('connection.php');

$id=$_GET['id'];
//echo $id;

$query="SELECT * FROM newuser WHERE id='$id' ";

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
                <label for="formFile" class="form-label">Profile photo</label>
                <input class="form-control" name="image" type="file" id="formFile">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Name</label>
                <input type="text" class="form-control" name="name" value="<?php echo $result['name'] ?>" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter name">
            </div>

            <div class="form-group" >
                 <label for="exampleInputEmail1">Name</label>
                <input class="form-control input-lg" name="profession" value="<?php echo $result['profession'] ?>" type="text" required="" placeholder="Profession">
            </div>

            <div class="form-group">
               <label for="exampleFormControlTextarea1">Enter self description</label>
               <textarea name="description" class="form-control" id="exampleFormControlTextarea1" rows="5">
                <?php echo $result['description'];
                ?>
               </textarea>
           </div>

           <div class="form-group">
               <label for="exampleFormControlTextarea1">Self Project</label>
               <textarea name="project" class="form-control" id="exampleFormControlTextarea1" rows="5">
                <?php echo $result['project'];
                ?>
               </textarea>
           </div>

           <div class="form-group">
                <label class="mr-sm-2" for="inlineFormCustomSelect">Gender</label>
                <select name="gender" class="custom-select mr-sm-2" id="inlineFormCustomSelect">
                    <option selected>Choose...</option>
                    <option
                        <?php
                           if($result['gender']=='Male'){
                            echo "selected";
                           }
                        ?>
                    >Male
                    </option>
                    <option 
                      <?php
                      if($result['gender']=='Female'){
                        echo "selected";
                      }
                      ?>
                    >Female</option>
                    <option>Others</option>
                </select>
          </div>
            <button type="submit" name="update" class="btn btn-primary">Update</button>
        </form>
    </div>

</body>

</html>


<?php

if(isset($_POST['update'])){

    $filename=$_FILES['image']['name'];
    $tempname=$_FILES['image']['tmp_name'];
    $folder="images/". $filename;

    
    move_uploaded_file($tempname,$folder);

    $name=$_POST['name'];
    $profession=$_POST['profession'];
    $descrip=$_POST['description'];
    $gender=$_POST['gender'];
    $project=$_POST['project'];
    $sql="UPDATE newuser SET name='$name',profession='$profession',description='$descrip',gender='$gender',project='$project',image='$folder' WHERE id='$id' ";

    if($con->query($sql)==true){
        echo "update data";
    }else{
        echo "Error";
    }

    $con->close();

}

?>