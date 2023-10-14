<?php
require "my_db_config.php";
session_start();
if (!isset($_SESSION['username'])) {
    header('location:login_page.php?error=illegal_entry');
}
else
{
    $userid= $_SESSION['userid'];
    $my_user_name = $_SESSION['username'];
    $dbconn=connectToDb();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agios Athanasios Skiers Purchase History&nbsp;&nbsp;&nbsp;</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="new_external.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="my_javascript.js"></script>
    <style>
        main{
            height: 796px;
            background-color: #5681d1;
            margin-top: 50px;
            text-align: center;
            color: white;
        }
        a:hover{
            text-decoration: none;
        }
        #footer_social ul li{
            margin-top:4%;
        }
        input::-webkit-outer-spin-button, input::-webkit-inner-spin-button {
            -webkit-appearance: none;
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
    <nav style="margin-top:-2.7%;height: 112px;z-index: 99;">
        <div id="logo" style="margin-top:-0.5%">
            <img style="padding-left: 36%; padding-top: 0.5%;" src="images/snowflake.png" show alt="logo" height="35%" width="130px">
            <p style="color:white; padding-left: 2.5%; margin-top: -0.05%; font-weight: bolder;">&copy; Agios Athanasios Skiers</p>
        </div>
        <div id="menu" style="margin-top:-114px;">
            <ul>
                <li><a href="products.php">Products</a></li>
                <li><a href="funds_page.php">Add Funds</a></li>
                <li><a href="cart_page.php">Check Cart</a></li>
                <li><a href="purchase_history_page.php" style="background-color:rgb(19, 44, 90); color: white;">History</a></li>
                <li><a href="logout_event.php">Logout</a></li>
            </ul>
        </div>
    </nav>

    <main>
    <h1 id="my_heading_2" style="padding-top: 10%;padding-bottom: 3%;">You have no purchase history!</h1>
        <table class="table" id="purch_table">
        <thead id="my_table_heading_2" hidden>
            <tr style="background-color:#2B5087;">
                <th>Transaction ID</th>
                <th>User ID</th>
                <th>Transaction Total</th>
                <th>Transaction Date</th>
            </tr>
        </thead>
        <?php displayHistory($dbconn,$userid); ?> <!-- Function that returns all purchase history of specific user -->
        </table>
    </main>
    
    <!--Footer section-->
    <footer>
        <div id="footer_social" style="height:120px">
                <ul>
                    <li><a href="https://el-gr.facebook.com/" target="_blank"><img src="images/facebook.png" alt="Facebook"></a></li>
                    <li><a href="https://www.instagram.com/" target="_blank"><img src="images/instagram.png" alt="Instagram"></a></li>
                    <li><a href="https://maps.google.com/" target="_blank"><img src="images/google-maps.png" alt="Google_Maps"></a></li>
                </ul>
        </div>
                <p style="text-align: center; margin-top: -10px; margin-left: 18px;">Follow us on social media!</p>
                <p style="font-size:small; text-align: center; margin-left: 18px; padding-bottom:2%;">Made by &copy; Agios Athanasios Skiers</p>
    </footer>

    
</body> 
<script>
$().ready(function(){
let a = $("tbody").length;

$("nav").on("click", "#logo", function()
    {
        window.location.href = "products.php";
    })
$("nav").on("mouseover", "#logo", function()
    {
        $("#logo").css({'cursor': 'pointer'});
    })

if(a<=0) // Changing html based on user's purchase history
{
    $("#my_heading_2").text("You have no purchase history!");
    $("#my_table_heading_2").attr("hidden",true);
}
else if(a>0)
{
    $("#my_heading_2").text("Here's your purchase history:");
    $("#my_table_heading_2").attr("hidden",false);
}

})
</script>           
</html>