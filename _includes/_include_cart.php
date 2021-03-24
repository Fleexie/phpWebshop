<div>

    <?php
    require_once "_includes/_include_nav.php";

    echo "<h1>Your current cart</h1>";

    /*
    * Loops through all items in the cart SESSION array
    * For each item it will make an SQL query to the database to retrieve data about the item
    * For each item it will check if it gets a result, if it does
    * then it will store information in a new array called $row that has the results.
    * Example: Array ( [P_ID] => 2 [P_Name] => Asus ROG Strix G153QR 15,6 [P_Price] => 15999 [P_Img] => asus-rog-strix-g153qr-156.jpg [P_Desc] => AMD Ryzen 7 5800H, 16GB DDR4 RAM 3200 MHz, M.2 PCIe NVMe 1024GB SSD, GeForce RTX 3070 [P_Type] => Computer )
    */
    foreach ($_SESSION["cart"] as $item){
        $sql = "SELECT * FROM Products where P_ID = $item";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                print_r($row);
                echo "<div class=\"productCart\">";
                echo "<img src='img/$row[P_Img]' alt='$row[P_Name]'>";
                echo "<h3>Name: " . $row["P_Name"]. "</h3><p>Price: <span class='price'>" . $row["P_Price"]. "</span>.- </p>";
                echo "</div>";
                echo "<p>Remove</p>";
            }
        }
    }

    /*
     * Shows the total price
     */
    echo "<div class='total'>Total: " . $_SESSION['total_price'] . "</div>";


    if($_SESSION["cart"] != null){
        echo '
        <div class="empty-cart">
        <h4>Empty your cart</h4>
        <form action="cart.php?empty=true" method="get">
            <input type="text" name="empty" hidden>
            <button type="submit">Empty</button>
        </form>
    </div>';
    } else {
        echo "<h2>Your cart is empty</h2>";
    }
    ?>


</div>
