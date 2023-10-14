<?php
require "my_db_config.php";
$dbconn=connectToDb();

if(isset($_GET['userid'])) // Checking whether userid is set
{
    $userid = $_GET['userid'];
    $total = $_GET['total'];
    $date = date('Y/m/d');

    $dbconn=connectToDb();
    $sql = "UPDATE users SET balance = balance - '$total' WHERE id='$userid'"; // Updating specific user's balance according to their total
    $result=mysqli_query($dbconn,$sql);
    $sql3 = "INSERT INTO purch_history (user_id, total , purchase_date) VALUES ('$userid', '$total', '$date')"; // Adding given information to history table
    $result3=mysqli_query($dbconn,$sql3);
    $sql2 = "DELETE FROM cart"; // Deleting all rows from cart
    $result2=mysqli_query($dbconn,$sql2);
   
    if(!$result){
        echo "error updating user's balance:" . mysqli_error($dbconn);
    }
}

?>