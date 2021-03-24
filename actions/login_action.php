<?php

if (isset($_POST["submit"]))
{
    require_once "../conn/conn.php";

    $email = $_POST["login_username"];
    $password = $_POST["login_password"];

    require_once "functions.inc.php";

    if (emptyInputLogin($email, $password) !== false){
        header("location: ../login.php?error=emptylogininput");
        exit();
    }

    loginUser($conn, $email, $password);
}
else
{
    header("location: ../login.php");
    exit();
}
