<?php
function emptyInputs($P_ID, $P_Name, $P_Price, $P_Img, $P_Desc, $P_Type){
    $result;
    if (empty($P_ID) || empty($P_Name) || empty($P_Price) || empty($P_Img) || empty($P_Desc) || empty($P_Type)){
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}
function emptyInputsAdd($P_Name, $P_Price, $P_Img, $P_Desc, $P_Type, $P_Stock){
    $result;
    if (empty($P_Name) || empty($P_Price) || empty($P_Img) || empty($P_Desc) || empty($P_Type) || empty($P_Stock)){
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}

function updateProduct($conn, $P_ID, $P_Name, $P_Price, $P_Img, $P_Desc, $P_Type){
    $sql = "UPDATE products SET P_Name = ?, P_Price = ?, P_Img = ?, P_Desc = ?, P_Type = ? WHERE P_ID = ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../control-panel.php?error=stmtfailed");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "sisssi", $P_Name, $P_Price, $P_Img, $P_Desc, $P_Type, $P_ID);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../control-panel.php?error=none");
    exit();
}

function addProduct($conn, $p_name, $p_price, $p_img, $p_description, $p_type, $p_stock){
    $sql = "INSERT INTO products (P_Name, P_Price, P_Img, P_Desc, P_Type, P_Stock) VALUES (?, ?, ?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../control-panel.php?error=stmtfailed");
        exit();
    }
    mysqli_stmt_bind_param($stmt, 'sisssi', $p_name, $p_price, $p_img, $p_description, $p_type, $p_stock);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../control-panel.php?success=productadded");
    exit();
}

function removeProduct($conn, $pid){
    $sql = "DELETE FROM products WHERE P_Id = ?";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../control-panel.php?error=stmtfailed");
        exit();
    }
    mysqli_stmt_bind_param($stmt, 'i', $pid);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../control-panel.php?success=productadded");
    exit();
}
