<?php
require "my_db_config.php";
$error = "";
$user_name = "";

if(isset($_POST['name']) && isset($_POST['password'])){ // Checking whether password and username are set
    $name=$_POST['name'];
    $password=$_POST['password'];
    $dbconn=connectToDb();
    $sql="select count(*) from users where name = '$name' and password = '$password'"; // SQL query that returns number of rows from users table
    $result=mysqli_query($dbconn,$sql);
    if(mysqli_num_rows($result)>0){ // If there is a result then that specifc user is already in the database and therefore can login
        
        $sql="select id, name from users where name = '$name' and password = '$password'"; // SQL query that returns all columns from users table
        $result=mysqli_query($dbconn,$sql);
        $row=mysqli_fetch_array($result);

        session_start();

        $_SESSION['userid']=$row['id'];
        $_SESSION['username']=$row['name'];
        header("location:products.php?user_name=$name"); // Redirecting user to products page
    }
    else 
    {
        header('location:login_page.php?error=invalid'); // User is not signed up or the login info is invalid
    }

}
else header('location:login_page.php');
?>