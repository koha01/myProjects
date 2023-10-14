<?php
require "my_db_config.php";
$dbconn=connectToDb(); // Connecting to the database

if(isset($_GET['userid'])) // Checking whether the userid field is set
{
    $userid = $_GET['userid'];
    $user_balance = $_GET['added_balance'];

    $dbconn=connectToDb();
    
    $sql = "UPDATE users SET balance = balance + '$user_balance' WHERE id='$userid'"; // SQL query that updates the user's balance according to the user's input
    $result=mysqli_query($dbconn,$sql);
   
    if(!$result){ // Explanatory message
        echo "Error updating balance:" . mysqli_error($dbconn);
    }
    else echo "Balance updated"; // Alert message for user
}

?>