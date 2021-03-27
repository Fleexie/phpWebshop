<?php
session_start();
if (empty($_SESSION["userID"])){
    $_SESSION["userID"] = null;
    $_SESSION["userName"] = null;
    $_SESSION["userRole"] = null;
}

if (empty($_SESSION["cart"])){
    $_SESSION["cart"] = array();
    $_SESSION["total"] = array();
    $_SESSION["total_price"] = 0;
}
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

</main>
<aside><?php include_once "_includes/_include_cart.php"?></aside>


</body>
</html>
