<?php
require_once "conn/conn.php";
session_start();

/* ###############################
 * This file is the page that is shown whenever a person adds something to the cart
 * ###############################
 * */

/*
 * Checks if the SESSION cart is empty as that would mean that the session should be created.
 * */
if (empty($_SESSION["cart"])){
    $_SESSION["cart"] = array();
    $_SESSION["total"] = array();
    $_SESSION["total_price"] = 0;
}

/*
 * Checks if the _GET id is set in the url
 * If it is the id is being checked in a preg_match to see if it is only digits/numbers.
 * if it is, it pushes the item to the end of the array/SESSION["cart"]
 * */
if (isset($_GET["id"])){
    $id = $_GET["id"];
    if (preg_match('/^\d+$/', $id)){
        array_push($_SESSION["cart"], $id);
    }
}

/*
 * Header sends the user to the cart.php page.
 * Refresh means that it will happen after x amount of seconds. In this case 4
 * */
header("Refresh: 4; url=cart.php");
require_once "_includes/_include_head.php";
?>
<body>
<div>

    <?php
    require_once "_includes/_include_nav.php";
    /*
     * Checks if the id is set in the url
     * */
    if (isset($_GET["id"])){
        /*
         * Makes SQL query to the database to get the product information associated with the id we got form the url
         * */
        $sql = 'SELECT * FROM Products where P_ID = '. $_GET["id"];
        $result = $conn->query($sql);
        /*
         * While loop to check the results from our query.
         * For each row the data is put into a variable called row.
         * Then echo is used to display the information associated with the item/id that is being added
         * */
            while($row = $result->fetch_assoc()) {
                echo "<div class=\"productCart\">";
                echo "<img src='img/$row[P_Img]' alt='$row[P_Name]'>";
                echo "<h3>Name: " . $row["P_Name"]. "</h3><p>Price: <span class='price'>" . $row["P_Price"]. "</span>.- </p>";
                echo "</div>";
                /*
                 * Total price displayed on the site is being adjusted in the session by taking the current value,
                 * in the session and add on the price from the item.
                 * */
                $_SESSION['total_price'] =  $_SESSION["total_price"] + $row["P_Price"];
            }

            /*
             * Display a text to say it has been added to the cart.
             * As well a message to tell the person that they are being redirected, with a link to the cart.php if they are inpatient
             * */
        echo "<h2>Item successfully added to cart</h2>";
        echo "<h3>You will be redirected to the <a href='cart.php'>cart</a></h3>";
    }

    ?>
</div>
</body>
</html>
