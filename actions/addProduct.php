<?php

/* ######################################
 * The php file that is set as action in the control panel for when an admin is adding a product, to the database
 * ######################################
 * */


/*#######
 * Checks whether the url has the submit value. If it doesn't it sends people to the index.php and exit the file.
 * We do this check to ensure that people get here through the form and not by typing the file name.
 *#######
 * */
if (!isset($_GET["submit"])){
    header("location: ../index.php");
    exit();
}
else {
    /*
     * Takes all the _GET information associated with the product information and store the information in variables.
     * */
    $P_Name = $_GET["addName"];
    $P_Price = $_GET["addPrice"];
    $P_Img = $_GET["addImg"];
    $P_Description = $_GET["addDescription"];
    $P_Type = $_GET["addType"];
    $P_Stock = $_GET["addStock"];

    /*
     * Require both the connection to the database
     * And the functions associated with the addProduct which are in a separate file.
     * */
    require_once "../conn/conn.php";
    require_once "product.function.inc.php";

    /*
     * Checks whether any of the inputs are empty. If they are then it uses the header function to redirect to
     * control-panel with the error emptyinputsadd and then exits this file.
     * */
    if (emptyInputsAdd($P_Name, $P_Price, $P_Img, $P_Description, $P_Type, $P_Stock) !== false){
        header("location: ../control-panel.php?error=emptyinputsadd");
        exit();
    }

    /*
     * If it goes through the empty check above then an addProduct function (user made) is called which uses the,
     * connection and the information from the _GET
     * */
    addProduct($conn, $P_Name, $P_Price, $P_Img, $P_Description, $P_Type, $P_Stock);

}
