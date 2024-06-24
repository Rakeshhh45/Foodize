<!DOCTYPE html>
<html lang="en">
<?php include "include/header.php" ?>

<head>
    <meta charset="UTF-8">



    <link rel="stylesheet" href="css/login.css">

    <style type="text/css">
        #buttn {
            color: #fff;
            background-color: #5c4ac7;
        }
    </style>





</head>


<body>

    <div style=" background-image: url('images/img/pimg.jpg');">

        <?php

        if (isset($_POST['submit'])) {
            $username = $_POST['username'];
            $password = $_POST['password'];

            if (!empty($_POST["submit"])) {
                $loginquery = "SELECT * FROM users WHERE username='$username' && password='" . md5($password) . "'";
                $result = mysqli_query($db, $loginquery);
                $row = mysqli_fetch_array($result);
                

                if (is_array($row)) {
                    $_SESSION["user_id"] = $row['u_id'];
                    header("refresh:1;url=index.php");
                } else {
                    $message = "Invalid Username or Password!";
                }
            }
        }
        ?>



        <div class="pen-title">
        </div>

        <div class="module form-module">
            <div class="toggle">

            </div>
            <div class="form">
                <h2>Login to your account</h2>
                <span style="color:red;"><?php echo $message; ?></span>

                <form action="" method="post">
                    <input type="text" placeholder="Username" name="username" />
                    <input type="password" placeholder="Password" name="password" />
                    <input type="submit" id="buttn" name="submit" value="Login" />
                </form>
            </div>

            <div class="cta">Not registered?<a href="registration.php" style="color:#5c4ac7;"> Create an account</a></div>
        </div>






        <div class="container-fluid pt-3">
            <p></p>
        </div>



        <?php include "include/footer.php" ?>
    </div>



</body>

</html>