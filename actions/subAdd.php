<?php
session_start();
require_once "../conn/conn.php";

/*
 * Store the $_GET values in variables.
 * */
$type = $_GET["type"];
$id = $_GET["id"];

/*
 * Store the Session values in variables
 * */
$cart = $_SESSION["cart"];
$total = $_SESSION["total"];
$totalPrice = $_SESSION["total_price"];

/*
 * Checking if $_GET of type is set in the url. If it is not then it sends people to the index page.
 * Checking if $_GET of id is set in the url. If it is not then it sends people to the index page.
 * */
if (!isset($_GET["type"])){
    header("location: ../index.php");
    exit();
}
if (!isset($_GET["id"])){
    header("location: ../index.php");
    exit();
}

/*
 * result variable is set to an empty array.
 * Then preg_match is used to check if the id is numbers only.
 * Then it search the database to get the data associated with the specific id,
 * stores the data in the result variable.
 * */
$result = [];
if (preg_match('/^\d+$/', $id)){
    $sql = 'SELECT * FROM Products where P_ID = '. $_GET["id"];
    $result = $conn->query($sql);
}

/*
 * Checks whether type is add or subtract, then it runs the appropriate function with the information needed.
 * */
if ($type === "add"){
    addition($id, $result);
}
if ($type === "subtract"){
    subtract($id, $cart, $result);
}

/*#####
 * Addition function, when people want to add another one of the same product to the cart.
 * First we make sure to validate with preg_match that we only have numbers.
 * Then we use array_push on the $_SESSION cart and push in the item.
 * After that in a while loop we take the result from the data fetched from the database,
 * This data is put in a new variable called row. The row variable contains an array with the information we want from the database,
 * We want to adjust the total_price session and we do that by,
 * setting the $_SESSION["total_price"] to $_SESSION["total_price"] + $row["P_Price"] which is the items price.
 * ####
*/
function addition($id, $result){
    if (preg_match('/^\d+$/', $id)){
        array_push($_SESSION["cart"], $id);
    }
    while($row = $result->fetch_assoc()) {
        $_SESSION["total_price"] = $_SESSION["total_price"] + $row["P_Price"];
    }
    header("location: ../cart.php");
    exit();
}

/*#####
 * Subtract function, when people want to remove a single product.
 *
 * First a variable is made which includes a search method to search the array which is in reality $_SESSION["cart"] to check if the id is in it.
 * Array_splice is used to remove a single item from the array and re-index the array. It takes the session, the search criteria and a limit.
 * After the item has been removed from the array, the total price session has to be updated as well.
 * It is done in a while loop were we take the results that we fetched from the database, and put it in a row variable.
 * We simply take the Session with total_price and set it to the Session with total_price - the price of the item.
 * Finally we send people to the cart.php and exit this document.
 * ####
*/
function subtract($id, $cart, $result){
    $search = array_search($id, $cart);
    array_splice($_SESSION["cart"], $search, 1);
    while($row = $result->fetch_assoc()) {
        $_SESSION["total_price"] = $_SESSION["total_price"] - $row["P_Price"];
    }
    header("location: ../cart.php");
    exit();
}
