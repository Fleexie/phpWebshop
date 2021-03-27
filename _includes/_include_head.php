<!doctype html>
<!--
This file contains the head of the standard HTML boilerplate as well as a little bit extra,
it has the style sheets, the font imports, font-awesome import.
-->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>WebShop
        <?php
        /*
         * Stores the page URL in a variables
         * Uses Explode to split the string into an array. The separator is a forward slash.
         * Then it takes the 3 element in the url and explode that with a punctuation.
         * As a default the product variable is set to just a space
         * */
        $url = $_SERVER["REQUEST_URI"];
        $url = explode("/", $url);
        $lastPart = explode(".", $url[2]);
        $product = " ";
        /*
         * Checks if the product parameter is set in the url.
         * If it is then goes through the $result variable (Which is located in the product page)
         * Stores the product name in a variable called product
         * */
        if (isset($_GET["product"])){
            foreach ($result as $item){
                $product = $item["P_Name"];
            }
        }
        /*
         * Lastly it echo out the last bit of the url that we got earlier. Which is the file name of the php file people are on.
         * uses concat to add a space and another concat to add the product name. If we are not on a product page it will just be a space.
         * */
        echo $lastPart[0] . " " . $product;
        ?>
    </title>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&family=Open+Sans:ital,wght@0,400;0,700;1,400&display=swap" rel="stylesheet">
</head>
