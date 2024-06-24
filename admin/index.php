 <!DOCTYPE html>
 <html lang="en">
 <?php
    include("../connection/connect.php");
    error_reporting(0);
    session_start();
    if (isset($_POST['submit'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        if (!empty($_POST["submit"])) {
            $loginquery = "SELECT * FROM admin WHERE username='$username' && password='" . md5($password) . "'";
            $result = mysqli_query($db, $loginquery);
            $row = mysqli_fetch_array($result);

            if (is_array($row)) {
                $_SESSION["adm_id"] = $row['adm_id'];
                header("refresh:1;url=dashboard.php");
            } else {
                echo "<script>alert('Invalid Username or Password!');</script>";
            }
        }
    }

    ?>


 <head>
     <meta charset="UTF-8">
     <title>Admin Login</title>

     

     <link rel="stylesheet" href="css/login.css">


 </head>

 <body>



     <div class="container">
         <div class="info">
             <h1>Admin Panel </h1>
         </div>
     </div>
     <div class="form">
         <div class="thumbnail"><img src="images/manager.png" /></div>
        
         <form class="login-form" action="index.php" method="post">
             <input type="text" placeholder="Username" name="username" />
             <input type="password" placeholder="Password" name="password" />
             <input type="submit" name="submit" value="Login" />

         </form>


     </div>
     <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
     <script src='js/index.js'></script>
 </body>

 </html>