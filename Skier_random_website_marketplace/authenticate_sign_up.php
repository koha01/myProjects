<?php
require "my_db_config.php";
$error = "";
$user_name = "";
if(isset($_POST['name']) && isset($_POST['password'])){ // Checking whether password and username fields are set
    $name=$_POST['name'];
    $password=$_POST['password'];
    $dbconn=connectToDb();
    $sql="select * from users where name = '$name'"; // SQL query that returns everything from user table where the username column is equal to the given username
    $result=mysqli_query($dbconn,$sql);
    if(mysqli_num_rows($result)>0){ // If the result is greater than one, then there is already a user with the given name and therefore the new user is promted to get a new username (Not very secure)
        header('location:sign_up_page.php?error=invalid');
    }
    else 
    {
        $sql = "INSERT IGNORE INTO users (name, password, balance) VALUES('$name', '$password', 0)"; // If the username is not taken, then the given data is inserted in the users table
        $result2 = mysqli_query($dbconn,$sql);
        
        $sql = "select * from users where name = '$name' and password = '$password'";
        $result3=mysqli_query($dbconn,$sql);

        if(mysqli_num_rows($result3)>0){

            $row=mysqli_fetch_array($result3);
    
            session_start();
    
            $_SESSION['userid']=$row['id'];
            $_SESSION['username']=$row['name'];
            header("location:products.php?user_name=$name"); // Redirecting user to products page
            
        }
    }

}
else header('location:sign_up_page.php?error=invalid');
?>