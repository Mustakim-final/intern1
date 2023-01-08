<?php
session_start();
include('homepage.php');
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
        .delete {
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

        .container {
            margin-bottom: 400px;
            margin-left: 300px;
        }
    </style>

    <title>Document</title>
</head>

<body>

    <div class="container">
        <table class="table">
            <h1 style="text-align: center;">Admin</h1>
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Gender</th>
                    <th scope="col">Profession</th>
                    <th scope="col">Description</th>
                    <th scope="col">Handle</th>
                </tr>
            </thead>
            <tbody>
                
                <?php
                include('connection.php');
                error_reporting(0);
                $user = $_SESSION['email'];
                if ($user == 'admin@gmail.com') {
                    $query = "SELECT * FROM newuser ";
                    //$sql1="SELECT * FROM newuser WHERE email='$email' && email='admin@gmail.com' && password='$password' ";
                    $data = mysqli_query($con, $query);
                    $total = mysqli_num_rows($data);

                    if ($total != 0) {
                        while ($result = mysqli_fetch_assoc($data)) {
                            echo "
                        <tr>
                        <td>" . $result['id'] . "</td>
                        <td>" . $result['name'] . "</td>
                        <td>" . $result['email'] . "</td>
                        <td>" . $result['gender'] . "</td>
                        <td>" . $result['profession'] . "</td>
                        <td>" . $result['description'] . "</td>
                        <td><a href='updatefrom.php?id=$result[id] &name=$result[name]'><input type='submit' value='update' class='update'></a></td>
                        <td><a href='delete.php?id=$result[id]'><input type='submit' value='delete' class='delete'></a></td>
                        </tr>
                        ";
                        }
                    } else {
                        echo "no record";
                    }
                }else{
                    echo "<tr><h1>You are not admin</h1></tr>";
                }


                ?>
            </tbody>
        </table>
    </div>

</body>

</html>