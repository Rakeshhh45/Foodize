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
                                                    <h4 class="m-b-0 text-white">All Restaurant</h4>
                                                </div>

                                                <div class="table-responsive m-t-40">
                                                    <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                                        <thead class="thead-dark">
                                                            <tr>
                                                                <th>Category</th>
                                                                <th>Name</th>
                                                                <th>Email</th>
                                                                <th>Phone</th>
                                                                <th>Url</th>
                                                                <th>Open Hrs</th>
                                                                <th>Close Hrs</th>
                                                                <th>Open Days</th>
                                                                <th>Address</th>
                                                                <th>Image</th>
                                                                <th>Date</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </thead>

                                                        <tbody>



                                                            <?php
                                                            $sql = "SELECT * FROM restaurant order by rs_id desc";
                                                            $query = mysqli_query($db, $sql);

                                                            if (!mysqli_num_rows($query) > 0) {
                                                                echo '<td colspan="11"><center>No Restaurants</center></td>';
                                                            } else {
                                                                while ($rows = mysqli_fetch_array($query)) {

                                                                    $mql = "SELECT * FROM res_category where c_id='" . $rows['c_id'] . "'";
                                                                    $res = mysqli_query($db, $mql);
                                                                    $row = mysqli_fetch_array($res);

                                                                    echo ' <tr><td>' . $row['c_name'] . '</td>
																								<td>' . $rows['title'] . '</td>
																								<td>' . $rows['email'] . '</td>
																								<td>' . $rows['phone'] . '</td>
																								<td>' . $rows['url'] . '</td>
																								
																								
																								<td>' . $rows['o_hr'] . '</td>
																								<td>' . $rows['c_hr'] . '</td>
																								<td>' . $rows['o_days'] . '</td>
																								
																								<td>' . $rows['address'] . '</td>
																								
																								<td><div class="col-md-3 col-lg-8 m-b-10">
																								<center><img src="Res_img/' . $rows['image'] . '" class="img-responsive radius"  style="min-width:150px;min-height:100px;"/></center>
																								</div></td>
																								
																								<td>' . $rows['date'] . '</td>
																									 <td><a href="delete_restaurant.php?res_del=' . $rows['rs_id'] . '" class="btn btn-danger btn-flat btn-addon btn-xs m-b-10"><i class="fa fa-trash-o" style="font-size:16px"></i></a> 
																									 <a href="update_restaurant.php?res_upd=' . $rows['rs_id'] . '" class="btn btn-info btn-flat btn-addon btn-sm m-b-10 m-l-5"><i class="fa fa-edit"></i></a>
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