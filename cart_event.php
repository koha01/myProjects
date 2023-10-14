<?php
include "my_db_config.php";
if(isset($_GET['userid']) && isset($_GET['prodid'])) // Checking whether the password and user id fields are set
{
    $userid = $_GET['userid'];
    $prodid = $_GET['prodid'];
    $dbconn=connectToDb();
    
    $sql2="SELECT prodid FROM cart WHERE userid = $userid AND prodid = '$prodid'"; // SQL query that returns the prodid from cart table
    $result2=mysqli_query($dbconn,$sql2);
    if(mysqli_num_rows($result2)>0) // If the result is greater than zero then it means that the user has already added that specifc product to their cart
    {
        echo "Product with id '$prodid' is already in your cart".mysqli_num_rows($result2);
    }
    else if(mysqli_num_rows($result2) == 0) // Else, adding specific product to cart
    {
        $sql="insert into cart (userid,prodid,quantity) values ('$userid', '$prodid', 1)";
        $result=mysqli_query($dbconn,$sql);
        if(!$result){
            echo "error adding product to cart: ". mysqli_error($dbconn);
        }
        else
            echo "Product with id '$prodid' has been added to your cart";
    }
}

?>