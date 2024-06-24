                <!DOCTYPE html>
                <html lang="en">

                <?php


                include "include/header.php";
                $u_id = $_SESSION["user_id"];
                $oldpassword = $_POST['old_password'];
                $newpassword = $_POST['new_password'];
                $conpassword = $_POST['con_password'];

                $ssql ="select * from users where u_id=$u_id";
                $res=mysqli_query($db, $ssql); 
                $newrow=mysqli_fetch_assoc($res); 
               

                if (isset($_POST['submit'])) {
                    if (
                        empty($oldpassword) ||
                        empty($newpassword) ||
                        empty($conpassword)) {
                            $error = "All fields are required.";
                    } else {




                        if ((md5($oldpassword)) !== ( $newrow['password'])) {
                            $error = "old password is wrong.";
                        } elseif ((strlen($newpassword)) < 6) {
                            $error = "new password must be < 6.";

                        }
                        elseif ($newpassword !== $conpassword) {
                            $error = "confirm password not match";
                         } else {


                            $mql = "update users set password='" . md5($newpassword) . "' where u_id= $u_id ";
                            mysqli_query($db, $mql);
                            $success = "Password changed successfully.";
                           
                        }
                    }
                }

                ?>

                <body>


                    <div>

                        <div class="page-wrapper">

                            <div class="container">
                                <ul>


                                </ul>
                            </div>


                            <section class="contact-page inner-page">
                                <div class="container ">

                                    <div class="row ">
                                    <div class="col-md-3"></div>
                                        <div class="col-md-6">



                                            <div class="widget">
                                            <center> <h3 style="color: blue;">Password Change</h3></center>
                                                <div class="widget-body">
                                                <?php if (isset($error)) echo "<p style='color: red;'>$error</p>"; ?>
                                           <?php if (isset($success)) echo "<p style='color: green;'>$success</p>"; ?>
                                                    

                                                        <form action="" method="post">
                                                            <div class="row">
                                                               

                                                                <div class="form-group col-sm-12">
                                                                    <label for="exampleInputEmail1">Old Password</label>
                                                                    <input class="form-control" type="password" name="old_password" id="example-text-input" placeholder="Enter your old password">
                                                                </div>
                                                                <div class="form-group col-sm-12">
                                                                    <label for="exampleInputEmail1">New Password</label>
                                                                    <input class="form-control" type="password" name="new_password" id="example-text-input-1" placeholder="Enter your new password" >
                                                                </div>
                                                                <div class="form-group col-sm-12">
                                                                    <label for="exampleInputEmail1">Confirm Password</label>
                                                                    <input class="form-control" type="password" name="con_password" id="example-text-input-2" placeholder="Enter your confirm password">
                                                                </div>





                                                            </div>

                                                            <div class="row">
                                                                <div class="col-sm-4">
                                                                    <p> <input type="submit" value="save" name="submit" class="btn theme-btn"> </p>

                                                                </div>
                                                            </div>
                                                        </form>
                                                        


                                                </div>

                                            </div>


                                        </div>
                                        <div class="col-md-3"></div>

                                    </div>
                                   
                                </div>
                            </section>




                            <?php include "include/footer.php" ?>

                        </div>


                </body>





                </html>