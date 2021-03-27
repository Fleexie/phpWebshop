<?php
require_once "conn/conn.php";
session_start();

/*
 * Checks if the url got empty as a parameter
 * if it does then it set the SESSIONS for cart, total and total_price to either empty array or 0
 * */
if (isset($_GET["empty"])){
    $_SESSION["cart"] = array();
    $_SESSION["total"] = array();
    $_SESSION["total_price"] = 0;
}
/*
 * Require head file
 * */
require_once "_includes/_include_head.php";
?>

<body>
<?php
/*
 * Require navigation file
 * Require the file that contains the cart
 * */
require_once "_includes/_include_nav.php";
require_once "_includes/_include_cart.php";
?>



</body>
</html>
