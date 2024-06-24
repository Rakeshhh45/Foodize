<!DOCTYPE html>
<html lang="en">
<?php
include("connection/connect.php");  
error_reporting(0);  
session_start(); 

?>


<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="#">
    <title>FOODIZE</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/animsition.min.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>

<body class="home">
    

    <header id="header" class="header-scroll top-header headrom">
        <nav class="navbar navbar-dark">
            <div class="container">
                <button class="navbar-toggler hidden-lg-up" type="button" data-toggle="collapse" data-target="#mainNavbarCollapse">&#9776;</button>
                <a class="navbar-brand" href="index.php"> <img class="img-rounded" src="images/logo1.png" alt="" width="152px" height="40px"> </a>
                <div class="collapse navbar-toggleable-md  float-lg-right" id="mainNavbarCollapse">
                    <ul class="nav navbar-nav">
                        <li class="nav-item"> <a class="nav-link active" href="index.php">Home <span class="sr-only">(current)</span></a> </li>
                        <li class="nav-item"> <a class="nav-link active" href="restaurants.php">Restaurants <span class="sr-only"></span></a> </li>
                        <li class="nav-item"> <a class="nav-link active" href="about_us.php">About Us <span class="sr-only"></span></a> </li>
                        


                        <?php
						if(empty($_SESSION["user_id"])) 
							{
								echo '<li class="nav-item"><a href="login.php" class="nav-link active">Login</a> </li>
							  <li class="nav-item"><a href="registration.php" class="nav-link active">Register</a> </li>';
							}
						else
							{

									
									echo  '<li class="nav-item"><a href="your_orders.php" class="nav-link active">My Orders</a> </li>';
									echo  '<li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle text-muted  " href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="images/logo2.png" alt="user" width="50px" height="35px" class="profile-pic" /></a>
                                    <div class="dropdown-menu dropdown-menu-right animated zoomIn" style ="background-color:black">
                                        <ul class="dropdown-user"  >
                                        <center>
                                            <li ><a href="update_profile.php" style ="color:white"><i class="fa "></i >Update Profile</a></li>
                                            <br/>
                                            <li><a href="password_change.php" style ="color:white"><i class="fa "></i> Password Change</a></li>
                                            <br/>
                                            <li><a href="logout.php" style ="color:white"><i class="fa fa-power-off"></i> Logout</a></li>
                                            </center>
                                        </ul>
                                    </div>
                                </li>';
							}

						?>

                    </ul>

                </div>
            </div>
        </nav>

    </header>