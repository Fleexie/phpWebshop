<?php
if (!isset($_GET["submit"])){
    header("location: ../index.php");
    exit();
}
else {

    $p_name = $_GET["addName"];
    $p_price = $_GET["addPrice"];
    $p_img = $_GET["addImg"];
    $p_description = $_GET["addDescription"];
    $p_type = $_GET["addType"];

    require_once "../conn/conn.php";
    require_once "product.function.inc.php";

    if (emptyInputsAdd($p_name, $p_price, $p_img, $p_description, $p_type) !== false){
        header("location: ../control-panel.php?error=emptyinputsadd");
        exit();
    }

    addProduct($conn, $p_name, $p_price, $p_img, $p_description, $p_type);

}
