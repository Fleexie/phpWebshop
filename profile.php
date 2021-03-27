<?php
require_once "_includes/_session.php";

/*
 * If the SESSIONS userID is equal to null the person will be redirected to the login page and the file will be exit.
 * */
if ($_SESSION["userID"] == null){
    header("location: login.php");
    exit();
}


require_once "_includes/_include_head.php";
require_once "_includes/_include_nav.php";

?>
<!--
Just a message to tell the page is not made.
As well as the users userName and a message telling them to check back later.
-->
<h1>Under Construction</h1>
<?php
echo $_SESSION["userName"] . " Please check back later";

?>


</body>
</html>
