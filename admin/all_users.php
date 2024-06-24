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
                                                    <h4 class="m-b-0 text-white">All Users</h4>
                                                </div>

                                                <div class="table-responsive m-t-40">
                                                    <table id="myTable" class="table table-bordered table-striped table-hover">
                                                        <thead class="thead-dark">
                                                            <tr>
                                                                <th>Username</th>
                                                                <th>FirstName</th>
                                                                <th>LastName</th>
                                                                <th>Email</th>
                                                                <th>Phone</th>
                                                                <th>Address</th>
                                                                <th>Reg-Date</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>



                                                            <?php
                                                            $sql = "SELECT * FROM users order by u_id desc";
                                                            $query = mysqli_query($db, $sql);

                                                            if (!mysqli_num_rows($query) > 0) {
                                                                echo '<td colspan="7"><center>No Users</center></td>';
                                                            } else {
                                                                while ($rows = mysqli_fetch_array($query)) {



                                                                    echo ' <tr><td>' . $rows['username'] . '</td>
																								<td>' . $rows['f_name'] . '</td>
																								<td>' . $rows['l_name'] . '</td>
																								<td>' . $rows['email'] . '</td>
																								<td>' . $rows['phone'] . '</td>
																								<td>' . $rows['address'] . '</td>																								
																								<td>' . $rows['date'] . '</td>
																									 <td><a href="delete_users.php?user_del=' . $rows['u_id'] . '" class="btn btn-danger btn-flat btn-addon btn-xs m-b-10"><i class="fa fa-trash-o" style="font-size:16px"></i></a> 
																									 <a href="update_users.php?user_upd=' . $rows['u_id'] . '" " class="btn btn-info btn-flat btn-addon btn-sm m-b-10 m-l-5"><i class="fa fa-edit"></i></a>
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