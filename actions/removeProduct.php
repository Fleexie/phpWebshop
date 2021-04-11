<?php
if (!isset($_GET["submit"])){
    header("location: ../index.php");
    exit();
}

$id = $_GET["pid"];

if (empty($id)){
    header("location: ../index.php");
    exit();
}
require_once "../conn/conn.php";
require_once "product.function.inc.php";


removeProduct($conn, $id);

header("location: ../control-panel.php?success=productdeleted");
exit();
