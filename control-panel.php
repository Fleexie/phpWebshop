<?php
session_start();
if ($_SESSION["userRole"] !== "Admin"){
    header("location: index.php?error=restricted");
    exit();
}

require_once "conn/conn.php";
$sql = "SELECT * FROM Products";
$result = $conn->query($sql);
?>
<!doctype html>
<html lang="en" xmlns="http://www.w3.org/1999/html" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Control Panel Webshop</title>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&family=Open+Sans:ital,wght@0,400;0,700;1,400&display=swap" rel="stylesheet">
</head>
<body>
<?php
include_once "_includes/_include_nav.php";
?>
Hello There Admin

<main>
    <section class="products">
        <?php
        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                echo "<div class=\"productListItem\">";
                echo "<p>Product ID: ".$row["P_ID"]."</p>";
                echo "<img src='img/$row[P_Img]' alt='$row[P_Name]'>";
                echo "Name: " . $row["P_Name"]. " Price: " . $row["P_Price"];
                echo " Description " . $row["P_Desc"];
                echo "</div>";

                echo '
    <form action="./actions/editProduct.php" method="get">
        <label for="productID'.$row["P_ID"].'">ID</label>
        <input type="text" id="productID'.$row["P_ID"].'" readonly value="'.$row["P_ID"].'" name="P_ID">
        <label for="productName'.$row["P_ID"].'">Name</label>
        <textarea id="productName'.$row["P_ID"].'" name="P_Name">'.$row["P_Name"].'</textarea>
        <label for="productPrice'.$row["P_ID"].'">Price</label>
        <textarea id="productPrice'.$row["P_ID"].'" name="P_Price">'.$row["P_Price"].'</textarea>
        <label for="productImg'.$row["P_ID"].'">Image name</label>
        <input type="text" id="productImg'.$row["P_ID"].'" value="'.$row["P_Img"].'" name="P_Img">
        <label for="productDescription'.$row["P_ID"].'">Description</label>
        <textarea id="productDescription'.$row["P_ID"].'" name="P_Desc">'.$row["P_Desc"].'</textarea>
        <label for="productType'.$row["P_ID"].'">Product Category</label>
        <select name="P_Type" id="productType'.$row["P_ID"].'">
            <option value="Computer">Computer</option>
            <option value="Mouse">Mouse</option>
            <option value="Keyboard">Keyboard</option>
            <option value="Monitor">Monitor</option>
        </select>
        <button type="submit" name="submit">Update Product</button>
    </form>
                ';
            }
        }
        ?>
    </section>
    <section class="addProduct">

    <form action="./actions/addProduct.php" method="get">
        <label for="addName">Name: </label>
        <input type="text" id="addName" name="addName">
        <label for="addPrice">Price: </label>
        <input type="number" name="addPrice" id="addPrice">
        <label for="addImg">Image path:</label>
        <input type="text" id="addImg" name="addImg">
        <label for="addDescription">Description: </label>
        <textarea name="addDescription" id="addDescription" cols="30" rows="10"></textarea>
        <label for="addType">Product Category: </label>
        <select name="P_Type" id="addType">
            <option value="Computer">Computer</option>
            <option value="Mouse">Mouse</option>
            <option value="Keyboard">Keyboard</option>
            <option value="Monitor">Monitor</option>
        </select>
        <button type="submit" name="submit">Add Product</button>
    </form>
    </section>
</main>
</body>
</html>
