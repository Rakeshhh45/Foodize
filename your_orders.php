<!DOCTYPE html>
<html lang="en">
<?php
include "include/header.php";

if (empty($_SESSION['user_id'])) {
    header('location:login.php');
} else {
?>



    <body>



        <div class="page-wrapper">



            <div class="inner-page-hero bg-image" data-image-src="images/img/restrrr.png">
                <div class="container"> </div>

            </div>
            <div class="result-show">
                <div class="container">
                    <div class="row">


                    </div>
                </div>
            </div>

            <section class="restaurants-page">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                        </div>
                        <div class="col-xs-12">
                            <div class="bg-gray">
                                <div class="row">

                                    <table class="table table-bordered table-hover">
                                        <thead style="background: #404040; color:white;">
                                            <tr>

                                                <th>Item</th>
                                                <th>Quantity</th>
                                                <th>Price</th>
                                                <th>Status</th>
                                                <th>Date</th>
                                                <th>Action</th>

                                            </tr>
                                        </thead>
                                        <tbody>


                                            <?php

                                            $query_res = mysqli_query($db, "select * from users_orders where u_id='" . $_SESSION['user_id'] . "'");
                                            if (!mysqli_num_rows($query_res) > 0) {
                                                echo '<td colspan="6"><center>You have No orders Placed yet. </center></td>';
                                            } else {

                                                while ($row = mysqli_fetch_array($query_res)) {

                                            ?>
                                                    <tr>
                                                        <td data-column="Item"> <?php echo $row['title']; ?></td>
                                                        <td data-column="Quantity"> <?php echo $row['quantity']; ?></td>
                                                        <td data-column="price">Rs <?php echo $row['price']; ?></td>
                                                        <td data-column="status">
                                                            <?php
                                                            $status = $row['status'];
                                                            if ($status == "" or $status == "NULL") {
                                                            ?>
                                                                <button type="button" class="btn btn-info"><span class="fa fa-bars" aria-hidden="true"></span> Dispatch</button>
                                                            <?php
                                                            }
                                                            if ($status == "in process") { ?>
                                                                <button type="button" class="btn btn-warning"><span class="fa fa-cog fa-spin" aria-hidden="true"></span> On The Way!</button>
                                                            <?php
                                                            }
                                                            if ($status == "closed") {
                                                            ?>
                                                                <button type="button" class="btn btn-success"><span class="fa fa-check-circle" aria-hidden="true"></span> Delivered</button>
                                                            <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if ($status == "rejected") {
                                                            ?>
                                                                <button type="button" class="btn btn-danger"> <i class="fa fa-close"></i> Cancelled</button>
                                                            <?php
                                                            }
                                                            ?>






                                                        </td>
                                                        <td data-column="Date"> <?php echo $row['date']; ?></td>
                                                        <td data-column="Action"> <a href="delete_orders.php?order_del=<?php echo $row['o_id']; ?>" onclick="return confirm('Are you sure you want to cancel your order?');" class="btn btn-danger btn-flat btn-addon btn-xs m-b-10"><i class="fa fa-trash-o" style="font-size:16px"></i></a>
                                                        </td>

                                                    </tr>


                                            <?php }
                                            } ?>




                                        </tbody>
                                    </table>



                                </div>

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
<?php
}
?>