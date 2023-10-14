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
    <title>Agios Athanasios Skiers Products Page&nbsp;&nbsp;&nbsp;</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="new_external.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="my_javascript.js"></script>
    <style>
        main{
            min-height: 878px;
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
        #my_select_sort
        {
            float:left;
            margin-top:-3.3%;
            margin-left:39%;
        }
        #sort_select
        {
            width:175.49px;
            border-radius:20px;
            height:40.5px;
            color:#6C757D;
            padding-left:10px;
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
        <div style="margin-top: -10.6%;margin-left:21.5%;" class="container-fluid">
            <form class="d-flex">
            <input style="width:15%;border-radius:20px;" id="search_text" class="form-control me-2" type="search" placeholder="Search by name" aria-label="Search"><span style="margin-top:0.6%;margin-left:-3%;">&#128270;</span>
            </form>
        </div>
        <div id="my_select_sort">
        <select id="sort_select" name="sort">
            <option value="name">Product Name</option>
            <option value="price">Product Price</option>
            <option value="user_rating">User rating</option>
            <option value="description">Description</option>
        </select>
        </div>
        <div id="menu" style="margin-top:-34px;">
            <ul>
                <li><a href="#">Balance: <?php display_balance($dbconn,$userid)?> &euro;</a></li> <!-- Displaying specific user's balance -->
                <li><a href="funds_page.php">Add Funds</a></li>
                <li><a href="cart_page.php">Check Cart</a></li>
                <li><a href="purchase_history_page.php">History</a></li>
                <li><a href="logout_event.php">Logout</a></li>
            </ul>
        </div>
    </nav>

    <main>
        <h1 id="my_heading_1" style="padding-top: 10%;padding-bottom: 3%;">Welcome back <?php echo $my_user_name?></h1> <!-- Displaying user's name -->
        <div class="row" id="products" style="margin-left:11%;">
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
    let my_products = [];
    $("nav").on("click", "#logo", function()
    {
        window.location.href = "products.php";
    })
    $("nav").on("mouseover", "#logo", function(){
        $("#logo").css({'cursor': 'pointer'});
    })

    class Product{ // Creating Product class
      id
      name
      imagelink
      price
      user_rating
      description
      constructor(id,name,imagelink,price,user_rating,description){
              this.id=id
              this.name=name
              this.imagelink=imagelink
              this.price=price
              this.user_rating=user_rating
              this.description=description
        }
        }

$.ajax({
  url:"products_event.php", // Ajax request to get all product information
  success:function(response){
   let products=JSON.parse(response)
   for(let product of products){
    $("#products").append(`
    <div class="card col-3 m-4" id="my_prod" style="border-radius:10px;background-color:#A9CEE8;">
    <img class="card-img-top" style="padding:25px;border-radius:50px;" src="${product.imagelink}" alt="Card image cap">
    <div class="card-body" style="background-color:#224576;border-radius:10% / 50%;">
    <h5 class="card-title">${product.name}</h5>
    <p class="card-text">${product.description}</p>
    <p class="card-text">${product.price} &euro;</p>
    <p class="card-text">${product.user_rating}/10</p>
    <p class="card-text" hidden>${product.id}</p>
    <a href="#" style="border-radius:10px;" class="btn btn-primary">Add to your cart</a>
  </div>
</div>
    `)
    let my_prod=new Product(parseInt(product.id), product.name, product.imagelink, parseInt(product.price), parseInt(product.user_rating), product.description)
    my_products.push(my_prod) // Pushing specific products into array
   }
}
 }
)
$(".container-fluid").on("keyup", "#search_text", function(){ // Search bar functionality
                $("#products").empty() // Emptying the div
                for(let prod of my_products){ // Looping over my_products array in order to check whether any of the product names matches the user input
                if((prod.name).includes($(this).val())){
                    let prodhtml=`
                    <div class="card col-3 m-4" style="border-radius:10px;background-color:#A9CEE8;">
                    <img class="card-img-top" style="padding:25px;border-radius:50px;" src="${prod.imagelink}" alt="Card image cap">
                    <div class="card-body" style="background-color:#224576;border-radius:10% / 50%;">
                    <h5 class="card-title">${prod.name}</h5>
                    <p class="card-text">${prod.description}</p>
                    <p class="card-text">${prod.price} &euro;</p>
                    <p class="card-text">${prod.user_rating}/10</p>
                    <p class="card-text" hidden>${prod.id}</p>
                    <a href="#" style="border-radius:10px;" class="btn btn-primary">Add to your cart</a>
                    </div>
                    </div>
                `;
                $("#products").append(prodhtml)
                $("#my_heading_1").text("Here is a list of products that matched your query")
                }
        }
})
$("nav").on("change", "#sort_select", function(){ // Sorting functionality
    
        $("#products").empty()
        let my_val = ($("#sort_select").val())
        
        if(my_val == "name")
        {
            my_products = my_products.sort((a, b) =>
            (a.name < b.name) ? 1 : (a.name > b.name) ? -1 : 0
            );
            for(let product of my_products)
        {
            let prodhtml=`
                    <div class="card col-3 m-4" style="border-radius:10px;background-color:#A9CEE8;">
                    <img class="card-img-top" style="padding:25px;border-radius:50px;" src="${product.imagelink}" alt="Card image cap">
                    <div class="card-body" style="background-color:#224576;border-radius:10% / 50%;">
                    <h5 class="card-title">${product.name}</h5>
                    <p class="card-text">${product.description}</p>
                    <p class="card-text">${product.price} &euro;</p>
                    <p class="card-text">${product.user_rating}/10</p>
                    <p class="card-text" hidden>${product.id}</p>
                    <a href="#" style="border-radius:10px;" class="btn btn-primary">Add to your cart</a>
                    </div>
                    </div>
                `;
                $("#products").append(prodhtml)
                $("#my_heading_1").text("Here is a list of products that matched your query")
        }
        }
        else if(my_val == "description")
        {
            my_products = my_products.sort((a, b) => 
            (a.description < b.description) ? 1 : (a.description > b.description) ? -1 : 0
            );
            for(let product of my_products)
        {
            let prodhtml=`
                    <div class="card col-3 m-4" style="border-radius:10px;background-color:#A9CEE8;">
                    <img class="card-img-top" style="padding:25px;border-radius:50px;" src="${product.imagelink}" alt="Card image cap">
                    <div class="card-body" style="background-color:#224576;border-radius:10% / 50%;">
                    <h5 class="card-title">${product.name}</h5>
                    <p class="card-text">${product.description}</p>
                    <p class="card-text">${product.price} &euro;</p>
                    <p class="card-text">${product.user_rating}/10</p>
                    <p class="card-text" hidden>${product.id}</p>
                    <a href="#" style="border-radius:10px;" class="btn btn-primary">Add to your cart</a>
                    </div>
                    </div>
                `;
                $("#products").append(prodhtml)
                $("#my_heading_1").text("Here is a list of products that matched your query")
        }
        }
        else if(my_val == "price")
        {
            my_products = my_products.sort((a, b) => 
            {
                return b.price - a.price;
            }
            );
            for(let product of my_products)
        {
            let prodhtml=`
                    <div class="card col-3 m-4" style="border-radius:10px;background-color:#A9CEE8;">
                    <img class="card-img-top" style="padding:25px;border-radius:50px;" src="${product.imagelink}" alt="Card image cap">
                    <div class="card-body" style="background-color:#224576;border-radius:10% / 50%;">
                    <h5 class="card-title">${product.name}</h5>
                    <p class="card-text">${product.description}</p>
                    <p class="card-text">${product.price} &euro;</p>
                    <p class="card-text">${product.user_rating}/10</p>
                    <p class="card-text" hidden>${product.id}</p>
                    <a href="#" style="border-radius:10px;" class="btn btn-primary">Add to your cart</a>
                    </div>
                    </div>
                `;
                $("#products").append(prodhtml)
                $("#my_heading_1").text("Here is a list of products that matched your query")
        }
        }
        else if(my_val == "user_rating")
        {
            my_products = my_products.sort((a, b) => 
            {
                return b.user_rating - a.user_rating;
            }
            );
            for(let product of my_products)
        {
            let prodhtml=`
                    <div class="card col-3 m-4" style="border-radius:10px;background-color:#A9CEE8;">
                    <img class="card-img-top" style="padding:25px;border-radius:50px;" src="${product.imagelink}" alt="Card image cap">
                    <div class="card-body" style="background-color:#224576;border-radius:10% / 50%;">
                    <h5 class="card-title">${product.name}</h5>
                    <p class="card-text">${product.description}</p>
                    <p class="card-text">${product.price} &euro;</p>
                    <p class="card-text">${product.user_rating}/10</p>
                    <p class="card-text" hidden>${product.id}</p>
                    <a href="#" style="border-radius:10px;" class="btn btn-primary">Add to your cart</a>
                    </div>
                    </div>
                `;
                $("#products").append(prodhtml)
                $("#my_heading_1").text("Here is a list of products that matched your query")
        }
        }
    })
    $("#products").on('click',".btn-primary",function(){ // Add product to cart functionality
    $.ajax({
      url:"cart_event.php",
      data:{userid:"<?php echo $userid?>", prodid:$(this).prev().text()},
      success: function(response){
          alert(response)
      }
    })
  })
}

)
</script>
</body>            
</html>