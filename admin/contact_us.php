               <!DOCTYPE html>
               <html lang="en">
               <?php

                include "include/header.php";
                include "include/menubar.php";
                ?>




               <body class="fix-header fix-sidebar">
                   

                   <div id="main-wrapper">







                       <div class="page-wrapper">


                           <div class="container-fluid">
                               <div class="row">
                                   <div class="col-12">

                                       <div class="col-lg-12">
                                           <div class="card card-outline-primary">
                                               <div class="card-header">
                                                   <h4 class="m-b-0 text-white">All Messages</h4>
                                               </div>

                                               <div class="table-responsive m-t-40">
                                                   <table id="myTable" class="table table-bordered table-striped table-hover">
                                                       <thead class="thead-dark">
                                                           <tr>
                                                               <th>Name</th>
                                                               <th>Phone</th>
                                                               <th>Email</th>
                                                               <th>Descripation</th>
                                                               <th>Reg-Date</th>
                                                               <th>Action</th>
                                                           </tr>
                                                       </thead>
                                                       <tbody>



                                                           <?php
                                                            $sql = "SELECT * FROM contact_us order by id desc";
                                                            $query = mysqli_query($db, $sql);

                                                            if (!mysqli_num_rows($query) > 0) {
                                                                echo '<td colspan="7"><center>No record found..!</center></td>';
                                                            } else {
                                                                while ($rows = mysqli_fetch_array($query)) {



                                                                    echo ' <tr>
																								<td>' . $rows['name'] . '</td>
																								<td>' . $rows['phone'] . '</td>
																								<td>' . $rows['email'] . '</td>
																								<td>' . $rows['descripation'] . '</td>
																							    <td>' . $rows['add_on'] . '</td>
																									 <td><a href="delete_contact.php?id=' . $rows['id'] . '" class="btn btn-danger btn-flat btn-addon btn-xs m-b-10"><i class="fa fa-trash-o" style="font-size:16px"></i></a> 
																									 
																									</td></tr>';
                                                                }
                                                            }
                                                            ?>
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

                   </div>

                   </div>





               </body>

               </html>