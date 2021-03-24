<?php
@require_once "conn/conn.php";
session_start();

if (empty($_SESSION["cart"])){
    $_SESSION["cart"] = array();
    $_SESSION["total"] = array();
    $_SESSION["total_price"] = 0;
}

if (isset($_GET["id"])){
    $id = $_GET["id"];
    if (preg_match('/^\d+$/', $id)){
        array_push($_SESSION["cart"], $id);
    }
}


header("Refresh: 4; url=cart.php");
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>WebShop Cart</title>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&family=Open+Sans:ital,wght@0,400;0,700;1,400&display=swap" rel="stylesheet">
</head>
<body>
<div>

    <?php
    @require_once "_includes/_include_nav.php";

    if (isset($_GET["id"])){

        $sql = 'SELECT * FROM Products where P_ID = '. $_GET["id"];
        $result = $conn->query($sql);
            while($row = $result->fetch_assoc()) {
                echo "<div class=\"productCart\">";
                echo "<img src='img/$row[P_Img]' alt='$row[P_Name]'>";
                echo "<h3>Name: " . $row["P_Name"]. "</h3><p>Price: <span class='price'>" . $row["P_Price"]. "</span>.- </p>";
                echo "</div>";
                //array_push($_SESSION["total"], $row["P_Price"]);
                $_SESSION['total_price'] =  $_SESSION["total_price"] + $row["P_Price"];
            }

        echo "<h2>Item successfully added to cart</h2>";
        echo "<h3>You will be redirected to the <a href='cart.php'>cart</a></h3>";
    }

    ?>
</div>
</body>
</html>
