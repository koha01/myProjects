<?php
require "my_db_config.php";
$dbconn=connectToDb();

if(isset($_GET['userid']) && isset($_GET['prodid'])) // Checking whether the password and userid are set
{
    $userid = $_GET['userid'];
    $prodid = $_GET['prodid'];
  
    $dbconn=connectToDb();
    $sql = "DELETE FROM cart WHERE userid='$userid' AND prodid='$prodid'"; // Deleting specific product from cart table
    $result=mysqli_query($dbconn,$sql);
   
    if(!$result){
        echo "error removing product from cart:" . mysqli_error($dbconn);
    }
    else displayCart($dbconn,$userid); // Calling displayCart function in order to display updated cart
}

?>