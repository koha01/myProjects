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
    <title>Agios Athanasios Skiers Cart&nbsp;&nbsp;&nbsp;</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="new_external.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="my_javascript.js"></script>
    <style>
        main{
            min-height: 1100px;
            background-color: #5681d1;
            margin-top: 50px;
            text-align: center;
            color: white;
            margin-bottom: -17px;
        }
        a:hover{
            text-decoration: none;
        }
        #footer_social ul li{
            margin-top:4%;
        }
        input[type="number"]{
            width: 45%;
            padding: 5px;
            margin-bottom: 20px;
            border: none;
            border-radius: 5px;
            box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.2);
            text-align: center;
        }
        input::-webkit-outer-spin-button, input::-webkit-inner-spin-button {
            -webkit-appearance: none;
        }
        th
        {
            border-right:1px solid white;
        }
        input[type="button"]{
            background-color: #2B5087;
            color: #fff;
            padding: 20px 30px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 3%;
        }
        #my_final_total{
            margin:auto;
            width:fit-content;
            background-color: #2B5087;
            color: #fff;
            padding: 20px 30px;
            border-radius: 5px;
            margin-top: 3%;
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
                <li><a href="#">Balance: <?php display_balance($dbconn,$userid)?> &euro;</a></li>
                <li><a href="products.php">Products</a></li>
                <li><a href="funds_page.php">Add Funds</a></li>
                <li><a href="cart_page.php" style="background-color:rgb(19, 44, 90); color: white;">Check Cart</a></li>
                <li><a href="purchase_history_page.php">History</a></li>
                <li><a href="logout_event.php">Logout</a></li>
            </ul>
        </div>
    </nav>

    <main>
        <h1 id="my_heading_1" style="padding-top: 10%;padding-bottom: 3%;">You seem to not have added anything to your cart!</h1>
        <table class="table" id="cart_table">
        <thead id="my_table_heading" hidden>
            <tr style="background-color:#2B5087;">
                <th>Product ID</th>
                <th>Product Name</th>
                <th>Product Description</th>
                <th style="padding-bottom: 25px;">Product Image</th>
                <th>Product Price(&euro;)</th>
                <th>Product Rating</th>
                <th style="padding-bottom: 25px;">Product Quantity</th>
                <th style="padding-bottom: 25px;">Remove</th>
            </tr>
        </thead>
        <?php displayCart($dbconn,$userid); ?>
        </table>
        <br>
        <h2 hidden id="my_final_total"></h2>
        <input hidden type="button" id="my_checkout" value="Checkout now!">
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
let a = $("tbody").length;

if(a > 0) // Checking if there are any products in the cart
{
    let total = 0;
    let quantity_array = [];
    let price_array = [];
    $(".prod_quantity_class").each(function(){ // Filling out any empty quantity product inputs
    if($(this).val() == "")
    {
        $(this).val(1)
    }
    })
    for(let i=0;i<a;i++)
    {
        price_array.push($("tbody").eq(i).children().children().eq(4).text())
        quantity_array.push($("tbody").eq(i).children().children().eq(6).children().val())
    }
    for(let i=0;i<quantity_array.length;i++) // Calculating user's total
    {
        total+=quantity_array[i]*price_array[i];
    }

    $("#my_heading_1").text("Here's your cart:"); // Changing html accordingly
    $("#my_table_heading").attr("hidden",false);
    $("#my_checkout").attr("hidden",false);
    $("#my_final_total").text("Your total is: " + total + "€");
    $("#my_final_total").attr("hidden",false);
}
else if(a<=0) // No products in cart
{
    $("#my_heading_1").text("You seem to not have added anything to your cart!");
    $("#my_table_heading").attr("hidden",true);
    $("#my_checkout").attr("hidden",true);
    $("#my_final_total").attr("hidden",true);
}

$("main").on("mouseover", "#my_final_total", function(){ // Total is green or red depending on whether the user can afford to pay
    let total = 0;
    let quantity_array = [];
    let price_array = [];
    $(".prod_quantity_class").each(function(){
    if($(this).val() == "")
    {
        $(this).val(1)
    }
    })
    for(let i=0;i<a;i++)
    {
        price_array.push($("tbody").eq(i).children().children().eq(4).text())
        quantity_array.push($("tbody").eq(i).children().children().eq(6).children().val())
    }
    for(let i=0;i<quantity_array.length;i++)
    {
        total+=quantity_array[i]*price_array[i];
    }
    if(total > <?php display_balance($dbconn,$userid)?>)
    {
        $(this).css({backgroundColor: "red"})
    }
    else if(total <= <?php display_balance($dbconn,$userid)?>)
    {
        $(this).css({backgroundColor: "green"})
    }
})

$("main").on("mouseout", "#my_final_total", function(){
    $(this).css({backgroundColor: ""})
})

$("main").on("change", "#prod_quantity", function(){ // If the user changes the quantity of a specific product, then that product is also updated in the database
    let my_prod_id = $(this).parent().prev().prev().prev().prev().prev().prev().text(); // Getting product's id

    $.ajax({
      url:"update_cart_quantity_event.php",
      data:{userid:"<?php echo $userid?>", prodid: my_prod_id, quant: $(this).val()},
      success: function(response){
        alert("Cart updated successfully!");
      }
    
    
    })
    let total = 0;
    let quantity_array = [];
    let price_array = [];
    $(".prod_quantity_class").each(function(){
    if($(this).val() == "")
    {
        $(this).val(1)
    }
    })
    for(let i=0;i<a;i++)
    {
        price_array.push($("tbody").eq(i).children().children().eq(4).text())
        quantity_array.push($("tbody").eq(i).children().children().eq(6).children().val())
    }
    for(let i=0;i<quantity_array.length;i++)
    {
        total+=quantity_array[i]*price_array[i];
    }

    $("#my_heading_1").text("Here's your cart:");
    $("#my_table_heading").attr("hidden",false);
    $("#my_checkout").attr("hidden",false);
    $("#my_final_total").text("Your total is: " + total + "€");
    $("#my_final_total").attr("hidden",false);
})
    
$("main").on("click", "#my_checkout", function(){ // Checkout functionality
                let total = 0;
                let quantity_array = [];
                let price_array = [];
                $(".prod_quantity_class").each(function(){ // Filling out all empty quantity input fields
                if($(this).val() == "")
                {
                    $(this).val(1)
                }
                })
                for(let i=0;i<a;i++)
                {
                    price_array.push($("tbody").eq(i).children().children().eq(4).text())
                    quantity_array.push($("tbody").eq(i).children().children().eq(6).children().val())
                }
                for(let i=0;i<quantity_array.length;i++) // Calculating total
                {
                    total+=quantity_array[i]*price_array[i];
                }
                if(total > <?php get_user_balance($dbconn,$userid)?>) // Checking if total is greater than user's balance and alerting them
                {
                    alert("Your balance is not enough to complete this transaction. You still need "+(total-<?php get_user_balance($dbconn,$userid)?>)+"€ in order to complete this purchase!")
                }
                else if(total <= <?php get_user_balance($dbconn,$userid)?>) // If the user has enough to complete this transaction then they alerted and their balance is updated
                {
                    $.ajax({
                        url:"update_balance_after_purchase.php",
                        data:{userid:"<?php echo $userid?>", total: total},
                        success: function(response){
                            alert("Your purchase was successful!")
                            $("#main").children().remove();
                            window.location.href = "products.php";
                        }
                    })   
                }
            
        })

  $("table").on('click',".btn-primary",function(){ // Remove from cart functionality
    $.ajax({
      url:"remove_from_cart_event.php",
      data:{userid:"<?php echo $userid?>", prodid:$(this).prev().prev().prev().prev().prev().prev().prev().text()},
      success: function(response){
        $("table").empty()
        $("table").append(response)
      }
    })
    setInterval('location.reload()', 50);
  })
})
</script>
</body>            
</html>