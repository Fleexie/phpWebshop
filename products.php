<?php
session_start();
require_once "conn/conn.php";

if(isset($_GET["category"])){
    switch ($_GET["category"]){
        case 'computer':
            $sql = "SELECT * FROM Products WHERE P_Type = 'Computer';";
            $result = $conn->query($sql);
            break;
        case 'keyboard':
            $sql = "SELECT * FROM Products WHERE P_Type = 'Keyboard';";
            $result = $conn->query($sql);
            break;
        case 'mouse':
            $sql = "SELECT * FROM Products WHERE P_Type = 'Mouse';";
            $result = $conn->query($sql);
            break;
        case 'monitor':
            $sql = "SELECT * FROM Products WHERE P_Type = 'Monitor';";
            $result = $conn->query($sql);
            break;
        default:
            $sql = "SELECT * FROM Products";
            $result = $conn->query($sql);
            break;
    }
}else{
    $sql = "SELECT * FROM Products";
    $result = $conn->query($sql);
}

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Products</title>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&family=Open+Sans:ital,wght@0,400;0,700;1,400&display=swap" rel="stylesheet">
</head>
<body>
    <?php
    require_once "_includes/_include_nav.php"
    ?>

    <div class="productContainer">
        <?php
        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                echo "<div class=\"productCard\">";
                echo "<img src='img/$row[P_Img]' alt='$row[P_Name]'><br>";
                echo "Name: " . $row["P_Name"]. "<br> Price: " . $row["P_Price"]. ".- <br>";
                echo "Description " . $row["P_Desc"];
                echo "<a href='add-to-cart.php?id=" . $row["P_ID"] ."'>Add to cart</a>";
                echo "</div>";
            }
        } else {
            echo "0 results";
        }
        ?>
    </div>
</body>
</html>
