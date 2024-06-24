                
                <!DOCTYPE html>
                <html lang="en">
                
                <?php


include "include/header.php";
include "include/menubar.php";

if(isset($_POST['submit'] ))
{
    if(empty($_POST['uname']) ||
   	    empty($_POST['fname'])|| 
		empty($_POST['lname']) ||  
		empty($_POST['email'])||
		empty($_POST['password'])||
		empty($_POST['phone']))
		{
			$error = '<div class="alert alert-danger alert-dismissible fade show">
																<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
																<strong>All fields Required!</strong>
															</div>';
		}
	else
	{
		

	
	
    if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) 
    {
       	$error = '<div class="alert alert-danger alert-dismissible fade show">
																<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
																<strong>invalid email!</strong>
															</div>';
    }
	elseif(strlen($_POST['password']) < 6)
	{
		$error = '<div class="alert alert-danger alert-dismissible fade show">
																<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
																<strong>Password must be >=6!</strong>
															</div>';
	}
	
	elseif(strlen($_POST['phone']) < 10)
	{
		$error = '<div class="alert alert-danger alert-dismissible fade show">
																<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
																<strong>invalid phone!</strong>
															</div>';
	}
	
	else{
       
	
	$mql = "update users set username='$_POST[uname]', f_name='$_POST[fname]', l_name='$_POST[lname]',email='$_POST[email]',phone='$_POST[phone]',password='".md5($_POST['password'])."' where u_id='$_GET[user_upd]' ";
	mysqli_query($db, $mql);
			$success = 	'<div class="alert alert-success alert-dismissible fade show">
																<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
																<strong>User Updated!</strong></div>';
	
    }
	}

}

?>
                

                
                

                <body class="fix-header">
                    <div class="preloader">
                        <svg class="circular" viewBox="25 25 50 50">
                            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" />
                        </svg>
                    </div>
                    <div id="main-wrapper">

                        
                        

                        

                        <div class="page-wrapper" style="height:1200px;">
                           

                            <div class="row page-titles">
                                <div class="col-md-5 align-self-center">
                                    <h3 class="text-primary">Dashboard</h3>
                                </div>

                            </div>
                           


                            <div class="container-fluid">

                                <div class="row">



                                    <div class="container-fluid">



                                        <?php  
									        echo $error;
									        echo $success; 
											
											
											
											?>

                                        



                                        <div class="col-lg-12">
                                            <div class="card card-outline-primary">
                                                <div class="card-header">
                                                    <h4 class="m-b-0 text-white">Update Users</h4>
                                                </div>
                                                <div class="card-body">
                                                    <?php $ssql ="select * from users where u_id='$_GET[user_upd]'";
													$res=mysqli_query($db, $ssql); 
													$newrow=mysqli_fetch_array($res);?>
                                                    <form action='' method='post'>
                                                        <div class="form-body">

                                                            <hr>
                                                            <div class="row p-t-20">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="control-label">Username</label>
                                                                        <input type="text" name="uname" class="form-control" value="<?php  echo $newrow['username']; ?>" placeholder="username">
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-6">
                                                                    <div class="form-group has-danger">
                                                                        <label class="control-label">First-Name</label>
                                                                        <input type="text" name="fname" class="form-control form-control-danger" value="<?php  echo $newrow['f_name'];  ?>" placeholder="jon">
                                                                    </div>
                                                                </div>

                                                            </div>
                                                            

                                                            <div class="row p-t-20">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="control-label">Last-Name </label>
                                                                        <input type="text" name="lname" class="form-control" placeholder="doe" value="<?php  echo $newrow['l_name']; ?>">
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-6">
                                                                    <div class="form-group has-danger">
                                                                        <label class="control-label">Email</label>
                                                                        <input type="text" name="email" class="form-control form-control-danger" value="<?php  echo $newrow['email'];  ?>" placeholder="example@gmail.com">
                                                                    </div>
                                                                </div>

                                                            </div>
                                                            

                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="control-label">Password</label>
                                                                        <input type="text" name="password" class="form-control form-control-danger" value="<?php  echo $newrow['password'];  ?>" placeholder="password">
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="control-label">Phone</label>
                                                                        <input type="text" name="phone" class="form-control form-control-danger" value="<?php  echo $newrow['phone'];  ?>" placeholder="phone">
                                                                    </div>
                                                                </div>
                                                            </div>


                                                            


                                                        </div>
                                                </div>
                                                <div class="form-actions">
                                                    <input type="submit" name="submit" class="btn btn-primary" value="Save">
                                                    <a href="all_users.php" class="btn btn-inverse">Cancel</a>
                                                </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                    





                                    






                                </div>

                            </div>
                          

                            <?php include "include/footer.php" ?>

                        </div>

                    </div>

                   

                </body>

                </html>
               