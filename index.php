<?php
require_once "_includes/_session.php";
require_once "conn/conn.php";
require_once "_includes/_include_head.php";

?>

<body class="index">
<?php
require_once "_includes/_include_nav.php";
?>


<main>
    <?php
    if ($_SESSION["userRole"] === "Admin"){
        echo "<a href='control-panel.php' class='adminButton'>Admin Control Panel</a>";
    }
    ?>

    <div class="heroSection">
        <img src="img/indexHero.jpg" alt="Laptop">
        <h1>Welcome to TechMore, <br>
            The place for all of your needs regarding technology.</h1>
    </div>

    <div class="intro">
        At TechMore we offer you the highest quality tech products. <br>
        Our main focus of products are laptops, monitors, keyboard and mouse.
    </div>
    <div class="products">
        <h2>Products</h2>
        <?php
        require_once "multi-level-navigation.php";
        ?>
    </div>
</main>


</body>
</html>
