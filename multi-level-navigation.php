<?php
require_once "./conn/conn.php";
$sql = "SELECT * FROM Products";
$result = $conn->query($sql);

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>


    <nav class="multilevelnav">
        <a href="products.php" id="productDrop">Products</a>
        <div>
            <ul>
                <li>
                    <div id="computerNav">
                        <a href="products.php?category=computer">Computer</a>
                        <ul>
                            <?php
                            foreach ($result as $item){
                                if ($item["P_Type"] == "Computer"){
                                    echo "<li>".$item["P_Name"]."</li>";
                                }
                            }
                            ?>
                        </ul>
                    </div>
                </li>
                <li>
                    <div id="monitorNav">
                        <a href="products.php?category=monitor">Monitor</a>
                        <ul>
                            <?php
                            foreach ($result as $item){
                                if ($item["P_Type"] == "Monitor"){
                                    echo $item["P_Name"];
                                }
                            }
                            ?>
                        </ul>
                    </div>
                </li>
                <li>
                    <div id="mouseNav">
                        <a href="products.php?category=mouse">Mouse</a>
                        <ul>
                            <?php
                            foreach ($result as $item){
                                if ($item["P_Type"] == "Mouse"){
                                    echo $item["P_Name"];
                                }
                            }
                            ?>
                        </ul>
                    </div>
                </li>
                <li>
                    <div id="keyboardNav">
                        <a href="products.php?category=keyboard">Keyboard</a>
                        <ul>
                            <?php
                            foreach ($result as $item){
                                if ($item["P_Type"] == "Keyboard"){
                                    echo $item["P_Name"];
                                }
                            }
                            ?>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </nav>

</body>
</html>
