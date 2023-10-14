<?php
require "my_db_config.php";
$sql="select * from products"; // Getting everything from the products table
$dbconn=connectToDb();
    $result=mysqli_query($dbconn,$sql);
    $products=array();
    while($row=mysqli_fetch_array($result)){
        $products[]=$row; // Pushing everything from the products table into the array
    }
    echo json_encode($products); // Returning the array of products
?>