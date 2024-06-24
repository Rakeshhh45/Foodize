                
                <!DOCTYPE html>
                <html lang="en">
                <?php
include "include/header.php";
include "include/menubar.php";

if(isset($_POST['submit'] ))
{
    if(empty($_POST['c_name']))
		{
			$error = '<div class="alert alert-danger alert-dismissible fade show">
																<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
																<strong>field Required!</strong>
															</div>';
		}
	else
	{
		
	
	
	
       
	
	$mql = "update res_category set c_name ='$_POST[c_name]' where c_id='$_GET[cat_upd]'";
	mysqli_query($db, $mql);
			$success = 	'<div class="alert alert-success alert-dismissible fade show">
																<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
																<strong>Updated!</strong> Successfully.</br></div>';
	
    
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
                        
                       

                        
                       

                        <div class="page-wrapper">
                           

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
									        echo $success; ?>




                                        <div class="col-lg-12">
                                            <div class="card card-outline-primary">
                                                <div class="card-header">
                                                    <h4 class="m-b-0 text-white">Update Restaurant Category</h4>
                                                </div>
                                                <div class="card-body">
                                                    <form action='' method='post'>
                                                        <div class="form-body">
                                                            <?php $ssql ="select * from res_category where c_id='$_GET[cat_upd]'";
													$res=mysqli_query($db, $ssql); 
													$row=mysqli_fetch_array($res);?>
                                                            <hr>
                                                            <div class="row p-t-20">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label class="control-label">Category</label>
                                                                        <input type="text" name="c_name" value="<?php echo $row['c_name'];  ?>" class="form-control" placeholder="Category Name">
                                                                    </div>
                                                                </div>


                                                            </div>
                                                            <div class="form-actions">
                                                                <input type="submit" name="submit" class="btn btn-primary" value="Save">
                                                                <a href="add_category.php" class="btn btn-inverse">Cancel</a>
                                                            </div>
                                                    </form>
                                                </div>
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