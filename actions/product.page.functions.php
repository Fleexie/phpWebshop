<?php
function getProducts($category, $conn){
    if(isset($category)){
        switch ($category){
            case 'computer':
                $sql = "SELECT * FROM Products WHERE P_Type = 'Computer';";
                $result = $conn->query($sql);
                return $result;
            case 'keyboard':
                $sql = "SELECT * FROM Products WHERE P_Type = 'Keyboard';";
                return $result = $conn->query($sql);
            case 'mouse':
                $sql = "SELECT * FROM Products WHERE P_Type = 'Mouse';";
                return $result = $conn->query($sql);
            case 'monitor':
                $sql = "SELECT * FROM Products WHERE P_Type = 'Monitor';";
                return $result = $conn->query($sql);
            default:
                $sql = "SELECT * FROM Products";
                return $result = $conn->query($sql);
        }
    }else{
        $sql = "SELECT * FROM Products";
        return $result = $conn->query($sql);
    }
}
