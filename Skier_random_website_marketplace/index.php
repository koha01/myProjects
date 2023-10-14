<?php
require "my_db_config.php"; // Getting the database configuration file
$sqlconn=connectToSql();
createDb($sqlconn); // Creating database
$dbconn=connectToDb(); // Database connection
createTables($dbconn); // Creating tables
insertData($dbconn) // Inserting dummy data into database
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>Agios Athanasios Skiers&nbsp;&nbsp;&nbsp;</title>
    <link rel="stylesheet" href="new_external.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="my_javascript.js"></script>

    <style>
        #hidden_text
        {
            overflow: hidden;
            white-space: nowrap;
            margin-top: -15px;
            margin-left: 2px;
            animation: show_text 2.5s steps(40, end) forwards, typing_border .75s step-end infinite;
            border-right: 2px solid white;
            font-size: 21.3px;
        }
        @keyframes show_text/*Typing animation*/
        {
            from{width: 0}
            to{width: 95%}
        }
        @keyframes typing_border/*Border to the right of the hidden text*/
        {
            from, to{border-color: transparent;}
            50%{border-color: white;}
        }
        .myphotos img{
            filter: grayscale(80%);
        }
    </style>
    <script>
        let my_title = $(document).prop("title"); // Getting the document's title (Same functionality for every page)

        function movingTitleFunc() // Function that "moves" the title according to the timeout given below
        {
            my_title = my_title.substring(1, my_title.length) + my_title.substring(0, 1);
            $(document).prop("title", my_title)
            setTimeout("movingTitleFunc()", 200);
        }
    </script>
</head>
<body onload="document.body.style.opacity='1', movingTitleFunc()"> <!--Calling the function above-->

    <button id="scroll_to_top_but">&uarr;</button>

    <header>
        <!--Creating the navigation bar-->
        <nav>
            <div id="logo">
                <img style="padding-left: 36%; padding-top: 0.5%;" src="images/snowflake.png" alt="" height="35%" width="25%">
                <p style="color:white; padding-left: 2.5%; margin-top: -0.05%; font-weight: bolder;">&copy; Agios Athanasios Skiers</p>
            </div>
            <div id="menu">
             <ul>
                <li><a href="index.php" style="background-color:rgb(19, 44, 90); color: white;">Home</a></li>
                <li><a href="about_us.html">About us</a></li>
                <li><a href="contact_us.html">Contact Us</a></li>
                <li><a href="login_page.php">Sign In</a></li>
                <li><a href="sign_up_page.php">Sign Up</a></li>
             </ul>
            </div>
        </nav>
        <!--Greeting section-->
        <div id="greeting">
            <h1 style="margin-left: -2.5%;">Welcome to the</h1>
            <h3 style="padding-left:7.5%; margin-top:-2%;">official page of</h3>
            <div id="greeting_logo">
                <img style="margin-top: -3%;" src="images/snowflake.png" alt="" height="40%" width="30%">
                <p style="margin-top: 1%; margin-bottom: 12%;"></p>
                <div id="hidden_text">&copy; Agios Athanasios Skiers</div>
                <p style="font-size: medium; font-weight: lighter; padding-bottom: 4%;">Learn more about this year's season!</p>
                <span><a href="news.html">Learn more</a></span>
            </div>
        </div>
    </header>    
    <main>
        <!--Team section-->
        <div id="Team">
            <h1 style="text-align: center; color:#235672; font-size: 300%; margin-top: 5%;">Meet the team</h1>
            <div id="team_member1" class="my_members">
                <img style="float: left;" src="images/happy-woman-skier-posing-skis_10069-5412.jpg" alt="">
                <i><p>Meet <span style="font-weight: bolder;">Dimitra Zografelli</span>!</p></i>
                Dimitra has been a skier since she can remember. She has spent many years as a ski teacher and is one of the founding members of &copy; Agios Athanasios Skiers! Finally, she has competed in 2 olympic games represeting Greece and earning a silver medal!
            </div>
            <div id="team_member2" class="my_members">
                <img style="float: right;" src="images/xSkiing_technique_body_posture_carving.jpg.pagespeed.ic.CdSTyoZMUi.jpg" alt="">
                <i><p>Meet <span style="font-weight: bolder;">Andrianos Barakos</span>!</p></i>
                A natural born skier, that has competed in numerous competitions and earned<br>
                multiple medals for himself. He loves to slalom, snowfight and have fun in the <br>
                mountains!
            </div>
            <span id="team_button"><a href="meet_the_team.html">Find the whole team</a></span>
        </div>

        <!--Guide section-->
        <div id="agios_athanasios_guide">
            <h1 style="margin: 0;">The Agios Athanasios Guide Book</h1>
            <h3 style="margin-top: 0.7%;">General Information about Agios Athanasios</h3>
            <div id="activities_box">
                <div class="activities">
                    <img src="images/fork.png" alt="" height="23%" width="23%">
                    <h2>Food</h2>
                    <p>There are countless restaurants in which you can have</p>
                    <p>traditional food and enjoy live music!</p>
                </div>
                <div class="activities" style="margin-left: 22%;">
                    <img src="images/cheers.png" alt="" height="26%" width="26%" style="margin-top: -3%; margin-bottom: 0.3%;">
                    <h2>Night Life</h2>
                    <p>Visitors of Agios Athanasios have a chance to enjoy</p>
                    <p style="margin-bottom: 10%;">the glorious night life of the town!</p>
                </div>
                <div class="activities" style="margin-left: 22%;">
                    <img src="images/hiking.png" alt="" height="25%" width="25%" style="margin-left: 2%; margin-top: -3%; margin-bottom: 1.2%;">
                    <h2>Outdoor Activities</h2>
                    <p>Beyond skiing, you can partake in a variety of activities,</p>
                    <p>involving horse riding, hunting and others!</p>
                </div>
            </div>
            <div id="pack">
                <img src="images/backpack.png" alt="" height="25%" width="25%">
                <h2>What to pack</h2>
                <p>Learn what to pack with you in order to</p>
                <p>withstand the low temperatures.</p>
                <br><br>
                <span style="margin-right: -12%;"><a href="activities.html">Learn about the activities</a></span>
            </div>
            <div id="guide" style="margin-right: -10%;">
                <img src="images/distance.png" alt="" height="20%" width="20%">
                <h2 style="margin-top: 8.5%;">How to get there</h2>
                <p>In case you're not joining us on the bus, learn</p>
                <p>how to get to Agios Athanasios!</p>
                <br><br>
                <span style="margin-left: -17%;"><a style="padding-left: 12%; padding-right:12%;" href="guidance.html">Guidance info</a></span>
            </div>
        </div>

        <!--Gallery section-->
        <div id="gallery">
            <h1 style="margin: 0; padding-top: 2%;">Team gallery</h1>
            <h4 style="padding-bottom: 2%;">Check all of our great moments!</h4>
            <div id="gallery_photos1" class="myphotos">
                <img style="border-radius: 20%;" src="images/68300386-young-happy-man-in-winter-clothes-and-ski-gear-posing-happy-in-snow-mountains-at-sierrna-nevada-reso.png" alt="">
            </div>
            <div id="gallery_photos2" class="myphotos">
                <img style="margin-bottom: 13%; border-radius: 20%;" src="images/133319375-five-happy-friends-skiers-and-snowboarders-are-having-fun-and-posing-together-at-ski-resort.png" alt=""><br>
                <span><a href="gallery.html">Check our gallery</a></span>
            </div>
            <div id="gallery_photos3" class="myphotos">
                <img style="border-radius: 20%;" src="images/male-female-skiers-poses-with-1445810.jpg" alt="">
            </div>
            
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