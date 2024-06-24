                
                <!DOCTYPE html>
                <html lang="en">
                
                <?php


include "include/header.php";
$u_id=$_SESSION["user_id"];

if(isset($_POST['submit'] ))
{
    if(empty($_POST['username']) ||
   	    empty($_POST['firstname'])|| 
		empty($_POST['lastname']) ||  
		empty($_POST['phone'])||
		empty($_POST['address']))
		{
			echo  "<script>alert('all field requied');</script>";
		}
	else
	{
		

	
	
    if(strlen($_POST['username']) < 6) 
    {
       	echo "<script>alert('username must be 6 character');</script>";
    }
	
	
	elseif(strlen($_POST['phone']) < 10)
	{
		echo"<script>alert('invaid phone number');</script>";
	}
	
	else{
       
	
	$mql = "update users set username='$_POST[username]', f_name='$_POST[firstname]', l_name='$_POST[lastname]',phone='$_POST[phone]',address='$_POST[address]' where u_id= $u_id ";
	mysqli_query($db, $mql);
			echo 	"<script>alert('profile updated successfully');</script>";
	
    }
	}

}

?>
                
                <body>


<div style=" background-image: url('images/img/pimg.jpg');">

    <div class="page-wrapper">

        <div class="container">
            <ul>


            </ul>
        </div>


        <section class="contact-page inner-page">
            <div class="container ">
                <div class="row ">
                    <div class="col-md-12">
                    
                    
                        <div class="widget">
                        <h3 style="color: blue;">profile_update</h3>
                            <div class="widget-body">
                            
                                <form action="" method="post">
                                    <div class="row">
                                        <?php
                                        $ssql ="select * from users where u_id=$u_id";
                                        $res=mysqli_query($db, $ssql); 
                                        $newrow=mysqli_fetch_array($res); 
                                        ?>

                                        <div class="form-group col-sm-6">
                                            <label for="exampleInputEmail1">User-Name</label>
                                            <input class="form-control" type="text" name="username" id="example-text-input" value="<?php  echo $newrow['username']; ?>">
                                        </div>
                                        <div class="form-group col-sm-6">
                                            <label for="exampleInputEmail1">First Name</label>
                                            <input class="form-control" type="text" name="firstname" id="example-text-input" value="<?php  echo $newrow['f_name'];  ?>">
                                        </div>
                                        <div class="form-group col-sm-6">
                                            <label for="exampleInputEmail1">Last Name</label>
                                            <input class="form-control" type="text" name="lastname" id="example-text-input-2" value="<?php  echo $newrow['l_name']; ?>">
                                        </div>
                                       
                                        <div class="form-group col-sm-6">
                                            <label for="exampleInputEmail1">Phone number</label>
                                            <input class="form-control" type="text" name="phone" id="example-tel-input-3" value="<?php  echo $newrow['phone'];  ?>">
                                        </div>
                                       
                                        <div class="form-group col-sm-12">
                                            <label for="exampleTextarea">Delivery Address</label>
                                            <input class="form-control" type="text" name="address" id="example-tel-input-3" value="<?php  echo $newrow['address'];  ?>">
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

                </div>
            </div>
        </section>



        <?php include "include/footer.php" ?>

    </div>


</body>

                
                


                </html>
               