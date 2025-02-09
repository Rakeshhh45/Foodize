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
                                                    <h4 class="m-b-0 text-white">All Orders</h4>
                                                </div>

                                                <div class="table-responsive m-t-40">
                                                    <table id="myTable" class="table table-bordered table-striped">
                                                        <thead class="thead-dark">
                                                            <tr>
                                                                <th>User</th>
                                                                <th>Title</th>
                                                                <th>Quantity</th>
                                                                <th>Price</th>
                                                                <th>Address</th>
                                                                <th>Status</th>
                                                                <th>Reg-Date</th>
                                                                <th>Action</th>

                                                            </tr>
                                                        </thead>
                                                        <tbody>


                                                            <?php
                                                            $sql = "SELECT users.*, users_orders.* FROM users INNER JOIN users_orders ON users.u_id=users_orders.u_id ";
                                                            $query = mysqli_query($db, $sql);

                                                            if (!mysqli_num_rows($query) > 0) {
                                                                echo '<td colspan="8"><center>No Orders</center></td>';
                                                            } else {
                                                                while ($rows = mysqli_fetch_array($query)) {

                                                            ?>
                                                                    <?php
                                                                    echo ' <tr>
																					           <td>' . $rows['username'] . '</td>
																								<td>' . $rows['title'] . '</td>
																								<td>' . $rows['quantity'] . '</td>
																								<td>Rs ' . $rows['price'] . '</td>
																								<td>' . $rows['address'] . '</td>';
                                                                    ?>
                                                                    <?php
                                                                    $status = $rows['status'];
                                                                    if ($status == "" or $status == "NULL") {
                                                                    ?>
                                                                        <td> <button type="button" class="btn btn-info"><span class="fa fa-bars" aria-hidden="true"></span> Dispatch</button></td>
                                                                    <?php
                                                                    }
                                                                    if ($status == "in process") { ?>
                                                                        <td> <button type="button" class="btn btn-warning"><span class="fa fa-cog fa-spin" aria-hidden="true"></span> On The Way!</button></td>
                                                                    <?php
                                                                    }
                                                                    if ($status == "closed") {
                                                                    ?>
                                                                        <td> <button type="button" class="btn btn-success"><span class="fa fa-check-circle" aria-hidden="true"></span> Delivered</button></td>
                                                                    <?php
                                                                    }
                                                                    ?>
                                                                    <?php
                                                                    if ($status == "rejected") {
                                                                    ?>
                                                                        <td> <button type="button" class="btn btn-danger"> <i class="fa fa-close"></i> Cancelled</button></td>
                                                                    <?php
                                                                    }
                                                                    ?>
                                                                    <?php
                                                                    echo '	<td>' . $rows['date'] . '</td>';
                                                                    ?>
                                                                    <td>
                                                                        <a href="delete_orders.php?order_del=<?php echo $rows['o_id']; ?>" onclick="return confirm('Are you sure?');" class="btn btn-danger btn-flat btn-addon btn-xs m-b-10"><i class="fa fa-trash-o" style="font-size:16px"></i></a>
                                                                <?php
                                                                    echo '<a href="view_order.php?user_upd=' . $rows['o_id'] . '" " class="btn btn-info btn-flat btn-addon btn-sm m-b-10 m-l-5"><i class="fa fa-edit"></i></a>
																									</td>
																									</tr>';
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