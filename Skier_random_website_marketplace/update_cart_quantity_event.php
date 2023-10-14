<?php
require "my_db_config.php";
$dbconn=connectToDb();

if(isset($_GET['userid']) && isset($_GET['prodid'])) // Checking whether password and userid are set
{
    $userid = $_GET['userid'];
    $prodid = $_GET['prodid'];
    $quant = $_GET['quant'];
  
    $dbconn=connectToDb();
    $sql = "UPDATE cart SET quantity='$quant' WHERE userid='$userid' AND prodid='$prodid'"; // Updating quantity column in cart table for specific product id and user id
    $result=mysqli_query($dbconn,$sql);
    if(!$result){
        echo "error updating cart quantity:" . mysqli_error($dbconn);
    }
}

?>