<nav>
    <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="products.php">Products</a></li>
    </ul>
    <?php
    if ($_SESSION["userName"] !== null){
        echo $_SESSION["userName"];
        echo '<a href="./actions/logout.php">Log Out</a>';
    }else{
        echo '<a href="login.php">Login</a>';
    }

    if ($_SESSION["userRole"] === "Admin"){
        echo '<a href="control-panel.php">Control Panel</a>';
    }
    ?>
    <a href="cart.php"><i class="fas fa-shopping-cart"></i></a>
</nav>
