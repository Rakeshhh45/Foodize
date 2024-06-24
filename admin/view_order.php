                
                <!DOCTYPE html>
                <html lang="en">
                <?php
include "include/header.php";
include "include/menubar.php";

?>

                

                <body class="fix-header fix-sidebar">

                    <div class="preloader">
                        <svg class="circular" viewBox="25 25 50 50">
                            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" />
                        </svg>
                    </div>

                    <div id="main-wrapper">
                       

                       

                        

                        <div class="page-wrapper">

                            


                            <div class="container-fluid">

                                <div class="row">
                                    <div class="col-12">

                                       

                                        <div class="col-lg-12">
                                            <div class="card card-outline-primary">
                                                <div class="card-header">
                                                    <h4 class="m-b-0 text-white">View Order</h4>
                                                </div>

                                                <div class="table-responsive m-t-20">
                                                    <table id="myTable" class="table table-bordered table-striped">

                                                        <tbody>
                                                            <?php
											$sql="SELECT users.*, users_orders.* FROM users INNER JOIN users_orders ON users.u_id=users_orders.u_id where o_id='".$_GET['user_upd']."'";
												$query=mysqli_query($db,$sql);
												$rows=mysqli_fetch_array($query);
												
												
																		
												?>
                                                            


                                                            <tr>
                                                                <td><strong>Username:</strong></td>
                                                                <td>
                                                                    <center><?php echo $rows['username']; ?></center>
                                                                </td>
                                                                <td>
                                                                    <center>
                                                                        <a href="javascript:void(0);" onClick="popUpWindow('order_update.php?form_id=<?php echo htmlentities($rows['o_id']);?>');" title="Update order">
                                                                            <button type="button" class="btn btn-primary">Update Order Status</button></a>
                                                                    </center>
                                                                </td>


                                                            </tr>
                                                            <tr>
                                                                <td><strong>Title:</strong></td>
                                                                <td>
                                                                    <center><?php echo $rows['title']; ?></center>
                                                                </td>
                                                                <td>
                                                                    <center>
                                                                        <a href="javascript:void(0);" onClick="popUpWindow('userprofile.php?newform_id=<?php echo htmlentities($rows['o_id']);?>');" title="Update order">
                                                                            <button type="button" class="btn btn-primary">View User Detials</button></a>

                                                                    </center>
                                                                </td>

                                                            </tr>
                                                            <tr>
                                                                <td><strong>Quantity:</strong></td>
                                                                <td>
                                                                    <center><?php echo $rows['quantity']; ?></center>
                                                                </td>


                                                            </tr>
                                                            <tr>
                                                                <td><strong>Price:</strong></td>
                                                                <td>
                                                                    <center>Rs <?php echo $rows['price']; ?></center>
                                                                </td>

                                                               

                                                            </tr>
                                                            <tr>
                                                                <td><strong>Address:</strong></td>
                                                                <td>
                                                                    <center><?php echo $rows['address']; ?></center>
                                                                </td>


                                                            </tr>
                                                            <tr>
                                                                <td><strong>Date:</strong></td>
                                                                <td>
                                                                    <center><?php echo $rows['date']; ?></center>
                                                                </td>

                                                                

                                                            </tr>
                                                            <tr>
                                                                <td><strong>Status:</strong></td>
                                                                <?php 
																			$status=$rows['status'];
																			if($status=="" or $status=="NULL")
																			{
																			?>
                                                                <td>
                                                                    <center><button type="button" class="btn btn-info"><span class="fa fa-bars" aria-hidden="true"></span> Dispatch</button></center>
                                                                </td>
                                                                <?php 
																			  }
																			   if($status=="in process")
																			 { ?>
                                                                <td>
                                                                    <center><button type="button" class="btn btn-warning"><span class="fa fa-cog fa-spin" aria-hidden="true"></span>On a Way!</button></center>
                                                                </td>
                                                                <?php
																				}
																			if($status=="closed")
																				{
																			?>
                                                                <td>
                                                                    <center><button type="button" class="btn btn-success"><span class="fa fa-check-circle" aria-hidden="true"></span> Delivered</button></center>
                                                                </td>
                                                                <?php 
																			} 
																			?>
                                                                <?php
																			if($status=="rejected")
																				{
																			?>
                                                                <td>
                                                                    <center><button type="button" class="btn btn-danger"> <i class="fa fa-close"></i> Cancelled</button> </center>
                                                                </td>
                                                                <?php 
																			} 
																			?>


                                                            </tr>




                                                           



                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                    </div>

                    <?php include "include/footer.php" ?>
                    <script language="javascript" type="text/javascript">
                    var popUpWin = 0;

                    function popUpWindow(URLStr, left, top, width, height) {
                        if (popUpWin) {
                            if (!popUpWin.closed) popUpWin.close();
                        }
                        popUpWin = open(URLStr, 'popUpWin', 'toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=no,copyhistory=yes,width=' + 1000 + ',height=' + 1000 + ',left=' + left + ', top=' + top + ',screenX=' + left + ',screenY=' + top + '');
                    }
                    </script>

                    </div>

                    </div>

                    
                </body>

                </html>