<!--
This file is the navigation include.
It's a nav tag containing ul with li for home and products and then some conditional links as well.
-->

<nav>
    <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="products.php">Products</a></li>
    </ul>
    <?php
    /*
     * Checks if the SESSION - userName is not null.
     * If it is not null meaning someone has logged in, it will show the user name.
     * As well as a link to their user profile.
     * In addition to that it shows a logout button.
     *
     * If the userName is Null it shows a login button.
     * */
    if ($_SESSION["userName"] !== null){
        echo '<a href="profile.php?user='. $_SESSION["userID"] .'">' . $_SESSION["userName"] . '</a>';
        echo '<a href="./actions/logout.php">Log Out</a>';
    }else{
        echo '<a href="login.php">Login</a>';
    }

    /*
     * Checks if the SESSION userRole is set to Admin
     * if it is there is a link to the admin control panel,
     * if it is anything else nothing is shown
     * */
    if ($_SESSION["userRole"] === "Admin"){
        echo '<a href="control-panel.php">Control Panel</a>';
    }
    ?>
    <!--
    Last link is a shopping cart link.
    It also contains a conditional statment.
    -->
    <a href="cart.php"><i class="fas fa-shopping-cart"></i>
        <?php
        /*
         * If the amount of items in the cart is higher than 0 (meaning 1 or more)
         * It will show the count next to the cart icon
         * */
        if (count($_SESSION["cart"]) > 0){
            echo "<span class=\"cartCount\">" .count($_SESSION["cart"]). "</span>";
        }
        ?>
    </a>

</nav>
