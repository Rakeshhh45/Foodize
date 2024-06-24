              
                <?php
include("../connection/connect.php");
error_reporting(0);
session_start();

mysqli_query($db,"DELETE FROM contact_us WHERE id = '".$_GET['id']."'");
header("location:contact_us.php");  

?>