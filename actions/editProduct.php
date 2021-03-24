<?php
if (!isset($_GET["submit"])){
    header("location: ../index.php");
    exit();
}
else
{
    $P_ID = $_GET["P_ID"];
    $P_Name = $_GET["P_Name"];
    $P_Price = $_GET["P_Price"];
    $P_Img = $_GET["P_Img"];
    $P_Desc = $_GET["P_Desc"];
    $P_Type = $_GET["P_Type"];

    require_once "../conn/conn.php";
    require_once "product.function.inc.php";
    if (emptyInputs($P_ID, $P_Name, $P_Price, $P_Img, $P_Desc, $P_Type) !== false){
        header("location: ../control-panel.php?error=emptyinputs");
        exit();
    }

    updateProduct($conn, $P_ID, $P_Name, $P_Price, $P_Img, $P_Desc, $P_Type);

}
