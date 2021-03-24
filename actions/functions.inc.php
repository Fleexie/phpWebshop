<?php
function emptyInputSignup($name, $email, $phone, $address, $city, $postcode, $country, $password, $passwordRepeat) {
    $result;
    if (empty($name) || empty($email) || empty($phone) || empty($address) || empty($city) || empty($postcode) || empty($country) || empty($password) || empty($passwordRepeat)){
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}

function invalidEmail($email){
    $result;
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}
function emailExists($conn, $email){
    $sql = "SELECT * FROM users where U_Email = ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../login.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($resultData)){
        return $row;
    }else{
        $result = false;
        return $result;
    }

    mysqli_stmt_close($stmt);
}

function passwordMatch($password, $passwordRepeat){
    $result;
    if ($password !== $passwordRepeat){
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}

function createUser($conn, $name, $email, $phone, $address, $city, $postcode, $country, $password){
    $sql = "INSERT INTO users (U_Name, U_Password, U_Email, U_Phone, U_Address, U_Role) VALUES (?, ?, ?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../login.php?error=stmtfailed");
        exit();
    }
    $role = "Customer";
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    $fullAddress = $address . ', ' . $city . ' ' . $postcode . ', ' . $country;
    mysqli_stmt_bind_param($stmt, "sssiss", $name, $hashedPassword, $email, $phone, $fullAddress, $role);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../login.php?error=none");
    exit();
}

function emptyInputLogin($email, $password) {
    $result;
    if (empty($email) || empty($password)){
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}

function loginUser($conn, $email, $passowrd){
    $emailExists = emailExists($conn, $email);

    if ($emailExists === false){
        header("location: ../login.php?error=wronglogin");
        exit();
    }

    $passwordhashed = $emailExists["U_Password"];
    $checkPassword = password_verify($passowrd, $passwordhashed);
    if ($checkPassword === false){
        header("location: ../login.php?error=wronglogin");
        exit();
    } else if ($checkPassword === true){
        session_start();
        $_SESSION["userID"] = $emailExists["U_ID"];
        $_SESSION["userName"] = $emailExists["U_Name"];
        $_SESSION["userRole"] = $emailExists["U_Role"];
        header("location: ../index.php");
        exit();
    }
}
