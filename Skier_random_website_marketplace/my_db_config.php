<?php
    function connectToSql(){
        $conn = mysqli_connect("localhost","root",""); // Connecting to MySQL
        if(!$conn){
            echo mysqli_connect_error();
        }
        return $conn;
    }
    function createDb($sqlconn) { // Function to create database
        $sql="create database if not exists agiosathanasiosskiers";
        $result = mysqli_query($sqlconn,$sql);
        if (!$result){
            echo mysqli_error($result);
        }
    }
    function connectToDb(){ // Function to connect to database
        $conn = mysqli_connect("localhost","root","","agiosathanasiosskiers");
        if(!$conn){
            echo mysqli_connect_error();
        }
        return $conn;
    }
    function createTables($dbconn) { // Function to create all 4 tables in database
        $sql = "CREATE TABLE IF NOT EXISTS users (
            id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            name VARCHAR(50) NOT NULL UNIQUE,
            password VARCHAR(50) NOT NULL,
            balance INT(10) UNSIGNED NOT NULL
        )";
        $result = mysqli_query($dbconn, $sql);
        if (!$result) {
            echo "Error: " . mysqli_error($dbconn);
        }
    
        $sql = "CREATE TABLE IF NOT EXISTS products (
            id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            name VARCHAR(50) NOT NULL UNIQUE,
            description VARCHAR(255) NOT NULL,
            imagelink VARCHAR(255) NOT NULL,
            price INT(6) UNSIGNED NOT NULL,
            user_rating INT(6) UNSIGNED NOT NULL
        )";
        $result = mysqli_query($dbconn, $sql);
        if (!$result) {
            echo "Error: " . mysqli_error($dbconn);
        }
    
        $sql = "CREATE TABLE IF NOT EXISTS cart (
            id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            userid INT(6) UNSIGNED NOT NULL,
            prodid INT(6) UNSIGNED NOT NULL UNIQUE,
            quantity INT(6) UNSIGNED NOT NULL
        )";
    
        $result=mysqli_query($dbconn,$sql);
        if (!$result) {
            echo "Error: " . mysqli_error($dbconn);
        }

        $sql = "CREATE TABLE IF NOT EXISTS purch_history (
            id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            user_id VARCHAR(50) NOT NULL,
            total INT(6) UNSIGNED NOT NULL,
            purchase_date DATE NOT NULL
        )";
        $result = mysqli_query($dbconn, $sql);
        if (!$result) {
            echo "Error: " . mysqli_error($dbconn);
        }

    }
    function insertData($sqlconn) { // Function to insert dummy data into database's tables
        
        $sql = "INSERT IGNORE INTO users (name, password, balance) VALUES
                ('User1', 'password1', '200'),
                ('User2', 'password2', '1000'),
                ('User3', 'password3', '10'),
                ('User4', 'password4', '159'),
                ('User5', 'password5', '300'),
                ('User6', 'password6', '3500'),
                ('User7', 'password7', '300'),
                ('User8', 'password8', '419'),
                ('User9', 'password9', '122'),
                ('User10', 'password10', '333'),
                ('User11', 'password11', '500'),
                ('User12', 'password12', '900'),
                ('User13', 'password13', '1000'),
                ('User14', 'password14', '199'),
                ('User15', 'password15', '5200'),
                ('User16', 'password16', '50'),
                ('User17', 'password17', '1650'),
                ('User18', 'password18', '200'),
                ('User19', 'password19', '500'),
                ('User20', 'password20', '9')";
        $result = mysqli_query($sqlconn, $sql);
        if (!$result) {
            echo "Error: " . mysqli_error($sqlconn);
        }
        
        $sql = "INSERT IGNORE INTO products (name, description, imagelink, price, user_rating) VALUES
                ('Ski 1', 'Great Skis 1', 'images/ski_prod_2.jfif',650, 6),
                ('Ski 2', 'Great Skis 2', 'images/ski_prod_2.jfif',800, 10),
                ('Helmet 1', 'Great Helmet 1', 'images/helmet_prod_1.jpg',50, 5),
                ('Helmet 2', 'Great Helmet 2', 'images/helmet_prod_2.jpg',45, 7),
                ('Ski 3', 'Great Skis 3', 'images/ski_prod_2.jfif',900, 9),
                ('Ski 4', 'Great Skis 4', 'images/ski_prod_2.jfif',600, 9),
                ('Helmet 3', 'Great Helmet 3', 'images/helmet_prod_1.jpg',70, 3),
                ('Helmet 4', 'Great Helmet 4', 'images/helmet_prod_2.jpg',90, 5),
                ('Ski 5', 'Great Skis 5', 'images/ski_prod_2.jfif',1000, 6),
                ('Ski 6', 'Great Skis 6', 'images/ski_prod_2.jfif',1500, 7),
                ('Helmet 5', 'Great Helmet 5', 'images/helmet_prod_1.jpg',250, 8),
                ('Helmet 6', 'Great Helmet 6', 'images/helmet_prod_2.jpg',150, 2),
                ('Ski 7', 'Great Skis 7', 'images/ski_prod_2.jfif',2000, 10),
                ('Ski 8', 'Great Skis 8', 'images/ski_prod_2.jfif',400, 7),
                ('Helmet 7', 'Great Helmet 7', 'images/helmet_prod_1.jpg',200, 6)";
        $result = mysqli_query($sqlconn, $sql);
        if (!$result) {
            echo "Error: " . mysqli_error($sqlconn);
        }
    }
    
    function display_balance($dbconn,$userid) // Function to display user's balance
    {
        $sql = "SELECT balance FROM users WHERE id='$userid'";
        $result=mysqli_query($dbconn,$sql);
        while($test=mysqli_fetch_array($result))
        {
            echo "$test[0]";
        }
    }

    function get_user_balance($dbconn,$userid)
    {
        $sql = "SELECT balance FROM users WHERE id='$userid'";  // Function to display user's balance
        $result=mysqli_query($dbconn,$sql);
        while($test=mysqli_fetch_array($result))
        {
            echo $test[0];
        }
    }

    function displayCart($dbconn,$userid){ // Function to display all products that are inside the user's cart
        $sql="SELECT products.id, products.name, products.description, products.imagelink, products.price, products.user_rating, cart.quantity
        FROM products INNER JOIN cart ON products.id = cart.prodid
        WHERE products.id in (SELECT prodid FROM cart where '$userid'=userid)";
        $result=mysqli_query($dbconn,$sql);
        while($row=mysqli_fetch_array($result)){
        echo "
        <tbody>
        <tr>
            <td class='align-middle'>$row[0]</td>
            <td class='align-middle'>$row[1]</td>
            <td class='align-middle'>$row[2]</td>
            <td class='align-middle'><img src='$row[3]' width='18%' height='18%'></td>
            <td class='product_price align-middle'>$row[4]</td>
            <td class='align-middle'>$row[5]</td>
            <td class='product_quantity'><input type='number' style='margin-top:20px' name='prod_amount' id='prod_quantity' class='prod_quantity_class' value=1 min='0' required placeholder='$row[6]' pattern='[0-9]'></td>
            <td class='btn btn-primary' style='margin-top:28px;margin-right:5px;border-radius:10px;border-top:0px;line-height: 1;'>Remove from cart</btn></td>
        </tr>
        </tbody>
        ";
        }
    }

    function displayHistory($dbconn,$userid){ // Function that displays all the products that are in the purch_history table and that belong to the specific user
        $sql="SELECT purch_history.id, purch_history.user_id, purch_history.total, purch_history.purchase_date
        FROM purch_history
        WHERE purch_history.user_id = '$userid'";
        $result=mysqli_query($dbconn,$sql);
        while($row=mysqli_fetch_array($result)){
        echo "
        <tbody>
        <tr style='padding:20px;'>
            <td>$row[0]</td>
            <td>#$row[1]</td>
            <td>$row[2] &euro;</td>
            <td>$row[3]</td>
        </tr>
        </tbody>
        ";
        }
    }

?>