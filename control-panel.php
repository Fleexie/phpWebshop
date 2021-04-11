<?php
session_start();
if ($_SESSION["userRole"] !== "Admin"){
    header("location: index.php?error=restricted");
    exit();
}

require_once "conn/conn.php";
$sql = "SELECT * FROM Products";
$result = $conn->query($sql);

require_once "_includes/_include_head.php";
?>
<body>
<?php
include_once "_includes/_include_nav.php";
?>

<h2>Hello there <?php
    $_SESSION["userName"];
    ?> Welcome to the admin panel.</h2>

<!--
TODO ADD UPLOAD IMAGE FUNCTION
-->

<main>
    <h1></h1>
    <section class="products-CP">
        <h2 class="cp-hl">List of products</h2>
        <?php
        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                echo "<div class=\"productListItem\">";
                echo "<p>Product ID: ".$row["P_ID"]."</p>";
                echo "<img src='img/$row[P_Img]' alt='$row[P_Name]'>";
                echo "Name: " . $row["P_Name"]. " Price: " . $row["P_Price"];
                echo " Description " . $row["P_Desc"];
                echo " Stock " . $row["P_Stock"];
                echo "</div>";

                echo '
    <form action="./actions/editProduct.php" class="updateProductForm" method="get">
        <label for="productID'.$row["P_ID"].'">ID</label>
        <input type="text" id="productID'.$row["P_ID"].'" readonly value="'.$row["P_ID"].'" name="P_ID">
        <label for="productName'.$row["P_ID"].'">Name</label>
        <textarea id="productName'.$row["P_ID"].'" name="P_Name">'.$row["P_Name"].'</textarea>
        <label for="productPrice'.$row["P_ID"].'">Price</label>
        <input id="productPrice'.$row["P_ID"].'" name="P_Price" value="'.$row["P_Price"].'">
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
        <a href="./actions/removeProduct.php?pid='.$row["P_ID"].'&submit">Delete</a>
    </form>
                ';
            }
        }
        ?>
    </section>
    <section class="addProduct">
    <h2>Add a new product</h2>
    <form action="./actions/addProduct.php" method="get">
        <label for="addName">Name: </label>
        <input type="text" id="addName" name="addName">
        <label for="addPrice">Price: </label>
        <input type="number" name="addPrice" id="addPrice">
        <label for="addImg">Image path:</label>
        <input type="text" id="addImg" name="addImg">
        <label for="addDescription">Description: </label>
        <textarea name="addDescription" id="addDescription" cols="30" rows="5"></textarea>
        <label for="addType">Product Category: </label>
        <select name="addType" id="addType">
            <option value="Computer">Computer</option>
            <option value="Mouse">Mouse</option>
            <option value="Keyboard">Keyboard</option>
            <option value="Monitor">Monitor</option>
        </select>
        <label for="addStock">Stock: </label>
        <input type="number" name="addStock" id="addStock">
        <button type="submit" name="submit">Add Product</button>
    </form>
    </section>
</main>
</body>
</html>
