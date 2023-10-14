<?php
require "my_db_config.php";

$mymsg = "";
if(isset($_GET['error']) && $_GET['error'] == 'invalid') // Checking for invalid parameters
{
    $mymsg =  "Invalid username or password!";
}
else if(isset($_GET['error']) && $_GET['error'] == 'illegal_entry')
{
    $mymsg =  "Please sign in or sign up firstly to continue!";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agios Athanasios Skiers Sign In&nbsp;&nbsp;&nbsp;</title>
    <link rel="stylesheet" href="new_external.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="my_javascript.js"></script>
    <style>
        main{
            height: 796px;
            background-color: #5681d1;
            margin-top: 100px;
            text-align: center;
            color: white;
        }
        h2{
            text-align: center;
            color: #333;
        }
        #my_login_form{
            position: absolute;;
            top:20%;
            height:450px;
            right:40%;
            max-width: 400px;
            margin: 30px auto;
            border-radius: 15px;
            background-color: #fff;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.5);
        }
        input[type="text"], input[type="password"] {
            width: 70%;
            padding: 10px;
            margin-bottom: 20px;
            border: none;
            border-radius: 5px;
            box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.2);
        }
        input[type="submit"]{
            background-color: #5681D1;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 3%;
        }
        #my_login_form a{
            color: #5681D1;
            text-decoration: none;
            border-radius: 10px;
            padding: 10px;
        }
    </style>
    <script>
        let my_title = $(document).prop("title"); 

        function movingTitleFunc()
        {
            my_title = my_title.substring(1, my_title.length) + my_title.substring(0, 1);
            $(document).prop("title", my_title)
            setTimeout("movingTitleFunc()", 200);
        }
    </script>
</head>
<body onload="document.body.style.opacity='1', movingTitleFunc()">
<button id="scroll_to_top_but">&uarr;</button>
    <!--Navigation section-->
    <nav style="margin-top:-5.3%;">
        <div id="logo">
            <img style="padding-left: 36%; padding-top: 0.5%;" src="images/snowflake.png" alt="" height="35%" width="25%">
            <p style="color:white; padding-left: 2.5%; margin-top: -0.05%; font-weight: bolder;">&copy; Agios Athanasios Skiers</p>
        </div>
        <div id="menu">
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="about_us.html">About us</a></li>
                <li><a href="contact_us.html">Contact Us</a></li>
                <li><a href="login_page.php" style="background-color:rgb(19, 44, 90); color: white;">Sign In</a></li>
                <li><a href="sign_up_page.php">Sign Up</a></li>
            </ul>
        </div>
    </nav>

    <main>
        <div id="my_login_form">
        <form action="authenticate_event.php" method="post">
        <img style="margin-top:4%" src="images/snowflake.png" alt="" width="15%" height="15%">
        <h1 style="color:#5681D1; margin-bottom:30px; margin-top:10px;">
            Login
        </h1>
        <input type="text" id="username" name="name" required placeholder="Username">
        <input type="password" id="password" name="password" required placeholder="Password"><img id="show_hide" style="float:right;position:absolute;left:77%;top:46.8%;" hidden src="images/eye.png" alt="">
        <br>
        
        <input id="my_sumbit" type="submit" value="Login">
        <br>
        <p style="color:red"><?php echo $mymsg?></p> <!--Printing error message-->
        <p style="color:black; margin-top:30px;">Are you new to Agios Athanasios Skiers?</p>
        <a href="sign_up_page.php">Sign up today!</a>
        </form>
        </div>
        
    </main>
    
    <!--Footer section-->
    <footer>
        <div id="footer_social">
                <ul>
                    <li><a href="https://el-gr.facebook.com/" target="_blank"><img src="images/facebook.png" alt="Facebook"></a></li>
                    <li><a href="https://www.instagram.com/" target="_blank"><img src="images/instagram.png" alt="Instagram"></a></li>
                    <li><a href="https://maps.google.com/" target="_blank"><img src="images/google-maps.png" alt="Google_Maps"></a></li>
                </ul>
        </div>
                <p style="text-align: center; margin-top: 30px; margin-left: 18px;">Follow us on social media!</p>
                <p style="font-size:small; text-align: center; margin-left: 18px;">Made by &copy; Agios Athanasios Skiers</p>
    </footer>

</body>            
</html>