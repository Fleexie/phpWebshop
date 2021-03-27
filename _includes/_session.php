<?php
/*###########################################
 * Session details
 * session_start() to make sure the current page has sessions running
 * Then it checks if the user sessions and cart sessions are currently not set. If they are not they will be set as null or empty
 * If they are set it will just skip.
 * ##########################################
 */

session_start();

if (!isset($_SESSION["userID"])){
    $_SESSION["userID"] = null;
    $_SESSION["userRole"] = null;
    $_SESSION["userName"] = null;
}

if (!isset($_SESSION["cart"])){
    $_SESSION["cart"] = array();
    $_SESSION["total"] = array();
    $_SESSION["total_price"] = 0;
}
