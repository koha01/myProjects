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
    <title>Agios Athanasios Skiers Balance&nbsp;&nbsp;&nbsp;</title>
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
        #my_funds_form{
            position: absolute;
            top:200px;
            height:450px;
            right:38%;
            width: 500px;
            margin: 30px auto;
            border-radius: 15px;
            background-color: #fff;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.5);
        }
        #my_funds_form p
        {
            color:black;
        }
        input[type="number"]{
            width: 25%;
            padding: 10px;
            margin-bottom: 20px;
            border: none;
            border-radius: 5px;
            box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.2);
            text-align: center;
        }
        input[type="button"]{
            background-color: #5681D1;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 3%;
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
                <li><a href="funds_page.php" style="background-color:rgb(19, 44, 90); color: white;">Add Funds</a></li>
                <li><a href="cart_page.php">Check Cart</a></li>
                <li><a href="purchase_history_page.php">History</a></li>
                <li><a href="logout_event.php">Logout</a></li>
            </ul>
        </div>
    </nav>

    <main>
        <div id="my_funds_form">
        <form>
        <img style="margin-top:10%;margin-bottom:3%;" src="images/snowflake.png" alt="" width="15%" height="15%">
        <h3 style="color:#5681D1; margin-bottom:30px; margin-top:10px;">
            Add funds to your account
        </h3>
        <p>Your current balance is: <span style="font-weight:bold;color:#2E538C;font-size:20px;"><?php display_balance($dbconn,$userid)?> &euro;</span></p>
        <label for="my_balance_input" style="color:black;margin-right:20px;">Money to add to your account:</label>
        <input type="number" name="my_balance_input" id="money" min="1" required placeholder="10 &euro;" pattern="[0-9]" oninput="validity.valid||(value='');">
        <br>
        <input type="button" id="my_sumbit" value="Add funds">
        </form>
        </div>
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

    <script>
$().ready(function(){
$("nav").on("click", "#logo", function()
    {
        window.location.href = "products.php";
    })
$("nav").on("mouseover", "#logo", function()
    {
        $("#logo").css({'cursor': 'pointer'});
    })
$("#my_funds_form").on("click", "#my_sumbit", function() // When the form sumbit button is clicked, the user's balance is increased based on the amount that they inputted 
{
    $.ajax({
      url:"funds_event.php",
      data:{userid:"<?php echo $userid?>", added_balance:$("#money").val()},
      success: function(response){
        alert(response)
      }
    })
    setInterval('location.reload()', 100);
})
})
</script>
</body>            
</html>