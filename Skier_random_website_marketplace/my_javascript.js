$(function(){ // Jquery effects, css, design styles below
    $("nav").on("click", "#logo", function()
    {
        window.location.href = "index.php";
    })
    $("nav").on("mouseover", "#logo", function(){
        $("#logo").css({'cursor': 'pointer'});
    })
    $("#Team").on("mouseover", ".my_members", function(){
        $(this).css({padding: "13px", boxShadow: "#5681D1 15px 15px"});
    })
    $("#Team").on("mouseout", ".my_members", function(){
        $(this).css({padding: "", boxShadow: ""});
    })
    $("#activities_box").on("mouseover", ".activities", function(){
        $(this).css({padding: "15px", fontWeight:"bolder", fontSize: "20px", boxShadow: "0 3px 10px rgb(0 0 0 / 0.2)", width: "40%"})
    })
    $("#activities_box").on("mouseout", ".activities", function(){
        $(this).css({padding: "", fontWeight:"", fontSize: "", boxShadow: "", width: ""})
    })
    $("#agios_athanasios_guide").on("mouseover", "#pack", function(){
        $(this).css({padding: "15px", fontWeight:"bolder", fontSize: "20px", boxShadow: "0 3px 10px rgb(0 0 0 / 0.2)", width: "40%"})
    })
    $("#agios_athanasios_guide").on("mouseout", "#pack", function(){
        $(this).css({padding: "", fontWeight:"", fontSize: "", boxShadow: "", width: ""})
    })
    $("#agios_athanasios_guide").on("mouseover", "#guide", function(){
        $(this).css({padding: "15px", fontWeight:"bolder", fontSize: "20px", boxShadow: "0 3px 10px rgb(0 0 0 / 0.2)", width: "40%"})
    })
    $("#agios_athanasios_guide").on("mouseout", "#guide", function(){
        $(this).css({padding: "", fontWeight:"", fontSize: "", boxShadow: "", width: ""})
    })
    $("#gallery").on("mouseover", ".myphotos img", function(){
        $(this).css("filter", "grayscale(0%)")
    })
    $("#gallery").on("mouseout", ".myphotos img", function(){
        $(this).css("filter", "grayscale(80%)")
    })
    $("#footer_social").on("mouseover", "img", function(){
        $(this).css({filter: "grayscale(100%)", boxShadow: "rgba(0, 0, 0, 0.3) 0px 19px 38px, rgba(0, 0, 0, 0.22) 0px 15px 12px", borderRadius: "12px"})
        $(this).animate({padding:"12px 5px 5px 5px"},400)
    })
    $("#footer_social").on("mouseout", "img", function(){
        $(this).css({filter: "grayscale(0%)", boxShadow: "", borderRadius: ""})
        $(this).animate({padding:"0px 0px 0px 0px"},400)
    })
    $("#my_login_form form, #my_sign_up_form form").on("mouseover", "a", function(){
        $(this).css({filter: "contrast(0%)", boxShadow: "rgba(0, 0, 0, 0.3) 0px 19px 38px, rgba(0, 0, 0, 0.22) 0px 15px 12px", borderRadius: "12px"})
        $(this).animate({padding:"10px"},500)
    })
    $("#my_login_form form, #my_sign_up_form form").on("mouseout", "a", function(){
        $(this).css({filter: "", boxShadow: "", borderRadius: ""})
        $(this).animate({padding:"0px 0px 0px 0px"},1000)
    })
    $("#my_login_form form, #my_sign_up_form form").on("mouseover", "#my_sumbit", function(){
        $(this).css({backgroundColor: "#727e96"})
    })
    $("#my_login_form form, #my_sign_up_form form").on("mouseout", "#my_sumbit", function(){
        $(this).css({backgroundColor:""})
    })
    $("#my_login_form form, #my_sign_up_form form").on("focus", "#password, #password_validate", function(){
        $(this).css({backgroundColor: "#80d1f2"})
        $("#rand_pass").attr("hidden",false);
        $("#show_hide").attr("hidden",false);
        $("#rand_pass").css('cursor', 'pointer');
        $("#show_hide").css('cursor', 'pointer');
    })
    $("#my_login_form form, #my_sign_up_form form").on("blur", "#password, #password_validate", function(){
        $(this).css({backgroundColor:""})
        $("#rand_pass").attr("hidden",true);
        $("#show_hide").attr("hidden",true);
    })
    $("#my_login_form form, #my_sign_up_form form").on("focus", "#username", function(){
        $(this).css({backgroundColor: "#80d1f2"})
    })
    $("#my_login_form form, #my_sign_up_form form").on("blur", "#username", function(){
        $(this).css({backgroundColor:""})
    })
    $("#products").on("mouseover", ".card", function(){
        $(this).css({backgroundColor: "#727e96", boxShadow: "rgba(0, 0, 0, 0.3) 0px 39px 38px, rgba(0, 0, 0, 0.42) 0px 25px 25px", borderRadius: "12px"})
    })
    $("#products").on("mouseout", ".card", function(){
        $(this).css({backgroundColor: "#A9CEE8", boxShadow: "", borderRadius: ""})
    })
    $("#cart_table, #purch_table").on("mouseover", "th", function(){
        $(this).css({backgroundColor: "#3b72e2"})
    })
    $("#cart_table, #purch_table").on("mouseout", "th", function(){
        $(this).css({backgroundColor: "#2B5087"})
    })
    $("tbody").each(function(){
        if($("tbody").index(this) % 2 == 0)
        {
            $(this).css({backgroundColor: "#0043AA", filter: "grayscale(20%)"})
        }
        else
            $(this).css({backgroundColor: "#005AC6", filter: "grayscale(20%)"})
    })
    $("#cart_table, #purch_table").on("mouseover", "tbody", function(){
        $(this).css({backgroundColor: "#294275", boxShadow: "rgba(0, 0, 0, 0.3) 0px 39px 38px, rgba(0, 0, 0, 0.42) 0px 25px 25px", borderRadius: "12px"})
    })
    $("#cart_table, #purch_table").on("mouseout", "tbody", function(){
        if($("tbody").index(this) % 2 == 0)
            $(this).css({backgroundColor: "#0043AA", boxShadow: "", borderRadius: ""})
        else
            $(this).css({backgroundColor: "#005AC6", boxShadow: "", borderRadius: ""})
    })
    $("main").on("mouseover", "#my_checkout", function(){
        $(this).css({backgroundColor: "#3B72E1", boxShadow: "rgba(0, 0, 0, 0.3) 0px 39px 38px, rgba(0, 0, 0, 0.42) 0px 25px 25px", borderRadius: "12px"})
    })
    $("main").on("mouseout", "#my_checkout", function(){
        $(this).css({backgroundColor: "", boxShadow: "", borderRadius: ""})
    })
    $("main").on("mouseover", ".bot", function(){
        $(this).css({backgroundColor: "#3B72E1", boxShadow: "rgba(0, 0, 0, 0.9) 0px 19px 58px, rgba(0, 0, 0, 0.42) 50px 25px 25px", borderRadius: "20px"})
    })
    $("main").on("mouseout", ".bot", function(){
        $(this).css({backgroundColor: "", boxShadow: "", borderRadius: ""})
    })
    $("main").on("focus", ".required_inputs, #number_of_group, #contact_text_area", function(){
        $(this).css({backgroundColor:"#3d5a91", color:"white", fontSize:"14px"})
    })
    $("main").on("blur", ".required_inputs, #number_of_group, #contact_text_area", function(){
        $(this).css({backgroundColor:"", color:"", fontSize:""})
    })
    $("main").on("mouseover", "#my_contact_sumbit_button", function(){
        $(this).css({backgroundColor: "#0bbf35", boxShadow: "rgba(0, 0, 0, 0.9) 0px 19px 58px, rgba(0, 0, 0, 0.42) 50px 25px 25px"})
    })
    $("main").on("mouseout", "#my_contact_sumbit_button", function(){
        $(this).css({backgroundColor: "rgb(24, 90, 24)", boxShadow: ""})
    })
    $("main").on("mouseover", "#my_contact_reset_button", function(){
        $(this).css({backgroundColor: "#dd0606", boxShadow: "rgba(0, 0, 0, 0.9) 0px 19px 58px, rgba(0, 0, 0, 0.42) 50px 25px 25px"})
    })
    $("main").on("mouseout", "#my_contact_reset_button", function(){
        $(this).css({backgroundColor: "rgb(119, 5, 5)", boxShadow: ""})
    })
    $("main").on("mouseover", ".news_boxes", function(){
        $(this).css({backgroundColor: "#3d5a91", borderRadius: "20px", fontStyle: "italic"})
    })
    $("main").on("mouseout", ".news_boxes", function(){
        $(this).css({backgroundColor: "", borderRadius:"", fontStyle: ""})
    })
    // JQUERY WEBSITE FUNCTION BELOW
    $("nav").on("click", "#logo", function()
        {
            window.location.href = "products.php";
        })
        $("nav").on("mouseover", "#logo", function(){
            $("#logo").css({'cursor': 'pointer'});
        })
    var block_chars = ["e", "E", "-", "+"];

    $("table").on("keypress", "#prod_quantity", function(input){ // Blocking any character that is inside the array of characters
        if(block_chars.includes(input.key)){
            input.preventDefault();
        }
    })

    $("#my_login_form form").on("mouseover", "#show_hide", function(){ // Hiding or showing the password field in the form and changing the eye image accordingly
        if($("#password").prop("type") == "password")
        {
            $('#password').get(0).type = 'text';
            $("#show_hide").attr("src", "images/hide.png")
        }
        else if($("#password").prop("type") == "text")
        {
            $('#password').get(0).type = 'password';
            $("#show_hide").attr("src", "images/eye.png")
        }
    })
    $("#my_sign_up_form form").on("change", "#password_validate", function(){ // Checking whether the user inputted the same password in both fields
        console.log($("#password_validate").val())
        if($("#password_validate").val()!=$("#password").val())
        {
            $("#password_validate").css({"borderStyle": "solid", "borderColor": "red"})
            $("#my_sumbit").prop('disabled', true)
        }
        else
        {
            $("#password_validate").css({"borderStyle": "", "borderColor": ""})
            $("#my_sumbit").prop('disabled', false)
        }
    })
    $("#my_sign_up_form form").on("mouseover", "#rand_pass", function(){ // Generating a random password and adding it to the password field
        let rand_user_pass = randomPassword();
        $("#password").val(rand_user_pass)
        $("#password_validate").val(rand_user_pass)
    })

    //Scroll from bottom to top button functionality below!
    $("body").on("click", "#scroll_to_top_but", function(){ // When the user clicks on the scroll to top button, they are automatically scrolled to the top of the page
        $("html, body").animate({ scrollTop: 0 }, 1000);
    })
    $("body").on("mouseover", "#scroll_to_top_but", function(){
        $("#scroll_to_top_but").css({'cursor': 'pointer', 'backgroundColor': '#80C7EA'});
    })
    $("body").on("mouseout", "#scroll_to_top_but", function(){
        $("#scroll_to_top_but").css({'cursor': '', 'backgroundColor': ''});
    })

    window.onscroll = function() {scrollToTop()}; // When the user scrolls, the function scrollToTop is called
    
    function scrollToTop(){
        if((($("body").scrollTop())>30)||(($("html").scrollTop())>30)) // If the user has scrolled beyond a specific threshold the button is shown or else it is hidden
        {
            $("#scroll_to_top_but").show(400);
        }
        else{
            $("#scroll_to_top_but").hide(400);
        }
    }
    function randomPassword(){ // Function to create a random password for the user
        let characters = ["0","1","2","3","4","5","6","7","8","9","A","B","C","D","E","F","G","H","I","J","K","L","M","N","O","P","Q","R","S","T","U","V","W","X","Y","Z","a","b","c","d","e","f","g","h","i","j","k","l","m","n","o","p","q","r","s","t","u","v","w","x","y","z","!","@","#","$","%","^","&","*","(",")"]
        let pass_length = 30;
        let password = "";
        let randchar = 0;
        for(let i=0; i<=pass_length; i++) // For loop that for each character of the passwords' allowed length will...
        {
            randchar = Math.floor(characters.length * Math.random()) // ... get a random number ... 
            password += characters[randchar]; // ... and pass it as a single character to the password variable from the array index. 
        }
        return password;
    }
})