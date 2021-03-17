<?php
require_once "products/Product.php";
$PC = new Product('Lenovo TopSpin', '3600', 'img/...')
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Products</title>
</head>
<body>
<?php
require_once "_includes/_include_nav.php"
?>
<?php
$product = $PC->getProduct();
echo $product[0];
echo $product[1];
echo $product[2];
?>
</body>
</html>
