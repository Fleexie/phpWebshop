<?php
require_once "./conn/conn.php";
$sql = "SELECT * FROM Products";
$result = $conn->query($sql);

?>


<!--    <nav class="multilevelnav">-->
<!--        <a href="products.php" id="productDrop">Products</a>-->
<!--        <div>-->
<!--            <ul>-->
<!--                <li>-->
<!--                    <div id="computerNav">-->
<!--                        <a href="products.php?category=computer">Computer</a>-->
<!--                        <ul>-->
<!--                            --><?php
//                            foreach ($result as $item){
//                                if ($item["P_Type"] == "Computer"){
//                                    echo "<li>".$item["P_Name"]."</li>";
//                                }
//                            }
//                            ?>
<!--                        </ul>-->
<!--                    </div>-->
<!--                </li>-->
<!--                <li>-->
<!--                    <div id="monitorNav">-->
<!--                        <a href="products.php?category=monitor">Monitor</a>-->
<!--                        <ul>-->
<!--                            --><?php
//                            foreach ($result as $item){
//                                if ($item["P_Type"] == "Monitor"){
//                                    echo $item["P_Name"];
//                                }
//                            }
//                            ?>
<!--                        </ul>-->
<!--                    </div>-->
<!--                </li>-->
<!--                <li>-->
<!--                    <div id="mouseNav">-->
<!--                        <a href="products.php?category=mouse">Mouse</a>-->
<!--                        <ul>-->
<!--                            --><?php
//                            foreach ($result as $item){
//                                if ($item["P_Type"] == "Mouse"){
//                                    echo $item["P_Name"];
//                                }
//                            }
//                            ?>
<!--                        </ul>-->
<!--                    </div>-->
<!--                </li>-->
<!--                <li>-->
<!--                    <div id="keyboardNav">-->
<!--                        <a href="products.php?category=keyboard">Keyboard</a>-->
<!--                        <ul>-->
<!--                            --><?php
//                            foreach ($result as $item){
//                                if ($item["P_Type"] == "Keyboard"){
//                                    echo $item["P_Name"];
//                                }
//                            }
//                            ?>
<!--                        </ul>-->
<!--                    </div>-->
<!--                </li>-->
<!--            </ul>-->
<!--        </div>-->
<!--    </nav>-->

<?php

    require_once "conn/conn.php";
    $sql = "SELECT * FROM Products";
    $result = $conn->query($sql);

    getCategories($conn);
    function getCategories($conn){
        $sql = "SELECT DISTINCT P_Type FROM Products";
        $result = $conn->query($sql);

        foreach ($result as $item){
            $category = strtolower($item["P_Type"]);
            echo "<div class=\"". $category ."nav\">";
            echo "<a href=\"products.php?category=" . $category . "\">".$item["P_Type"]."</a>";
            echo "<ul class=\"navCategoryLvl\">";
            getProducts($conn, $item["P_Type"]);
            echo "</ul>";
            echo "</div>";
        }
    }

        function getProducts($conn, $item){
            $sql = "SELECT * FROM Products WHERE P_Type = '$item'";
            $result = $conn->query($sql);
            foreach ($result as $item){
            echo "<li><a href=\"product.php?product=". $item["P_ID"] ."\">" . $item["P_Name"] . "</a></li>";
        }
    }
?>
