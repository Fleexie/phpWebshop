<?php
session_start();
require_once "conn/conn.php";

/*
 * Checks if there is a GET / parameter in the url for the category.
 * if there is then it uses a switch statement to check if the category is any of the predefined categories,
 * it will take the products associated with the specific category and show them with an SQL select.
 * Else it will take all products with an SQL select.
 * */
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

require_once "_includes/_include_head.php";
?>
<body>

    <?php
    require_once "_includes/_include_nav.php"
    ?>



    <div class="productContainer">

        <?php
        /*
         * If there are more than 0 rows in the result variable then it will go to a while loop.
         * */
        if ($result->num_rows > 0) {
            /*
             * Uses a while to go through each row in the results that was fetched form the database.
             * It then shows them on products page
             * */
            while($row = $result->fetch_assoc()) {
                echo '
                <div class="flipCard">
                    <div class="flipCardInner">
                        <div class="flipCardFront">
                            <img src="img/'. $row["P_Img"] .'" alt="'. $row["P_Name"] .'" class="cardImg">
                            <h3 class="cardHL">'. $row["P_Name"] .'</h3>
                            <span class="cardPrice">'. $row["P_Price"] .' .-</span>
                            <a href="add-to-cart.php?id='. $row["P_ID"] .'" class="cardButton">Add to cart</a>
                        </div>
                        <div class="flipCardBack">
                            <h3 class="cardHL">'. $row["P_Name"] .'</h3>
                            <span class=cardPrice">'. $row["P_Price"] .' .-</span>
                            <p class="cardDesc">'.$row["P_Desc"].'</p>
                            <a href="add-to-cart.php?id='. $row["P_ID"] .'" class="cardButton">Add to cart</a>
                        </div>
                    </div>
                </div>
                ';
            }
        } else {
            echo "0 results";
        }
        ?>
    </div>
</body>
</html>
