<?php
session_start();

/*#######
 * Check if the url/get contains product
 * If it does not, send people to the products page.
 * Exits the rest of the code
 * #####
 */
if (!isset($_GET["product"]))
{
    header("location: products.php");
    exit();
}

/*####
 * Store the information from the product get method in a variable.
 * Uses a pregmatch function to check if it is a number it contains.
 * If it is anything else than numbers it will send people to products page
 * Exits the rest of the code
 *####
 */
$product = $_GET["product"];

if (preg_match("(^[0-9]+$)", $product) === 0)
{
    header("location: products.php");
    exit();
}

/*####
 * Require connection to database.
 * Selecting all from the database where the Product ID is the same as the variable we got from the get/url
 * Stores the result in a new variable.
 *####
*/

require_once "conn/conn.php";
$sql = "SELECT * FROM Products WHERE P_ID = ". $product .";";
$result = $conn->query($sql);


require_once "_includes/_include_head.php";
?>

<body>
<?php
require_once "_includes/_include_nav.php";


foreach ($result as $item){
    echo $item["P_Name"];
}
?>


</body>
</html>
