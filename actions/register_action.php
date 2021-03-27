<?php

if (isset($_POST["submit"]))
{
    /* Connection to database */
    require_once "../conn/conn.php";

    /* Fetching the data sent from the form with POST method */
    $name = $_POST["register_name"];
    $email = $_POST["register_email"];
    $phone = $_POST["register_phone"];
    $address = $_POST["register_address"];
    $city = $_POST["register_city"];
    $postcode = $_POST["register_postcode"];
    $country = $_POST["register_country"];
    $password = $_POST["register_password"];
    $passwordRepeat = $_POST["register_password_repeat"];


    /*
     *################################################
     *  Validation and Authentication
     *################################################
     */
    require_once "functions.inc.php";
    if (emptyInputSignup($name, $email, $phone, $address, $city, $postcode, $country, $password, $passwordRepeat) !== false){
        header("location: ../login.php?error=emptyinput");
        exit();
    }
    if (pregMatchName($name) !== false){
        header("location: ../login.php?error=pregmatchname");
        exit();
    }
    if (pregMatchPhone($phone) !== false){
        header("location: ../login.php?error=pregmatchphone");
        exit();
    }

    if (pregMatchEmail($email) !== false){
        header("location: ../login.php?error=pregmatchemail");
        exit();
    }
    if (pregMatchAddress($address, $city, $postcode, $country) !== false){
        header("location: ../login.php?error=pregmatchaddress");
        exit();
    }

    if (invalidEmail($email) !== false){
        header("location: ../login.php?error=invalidemail");
        exit();
    }
    if (emailExists($conn, $email) !== false){
        header("location: ../login.php?error=emailexists");
        exit();
    }

    if (passwordMatch($password, $passwordRepeat) !== false){
        header("location: ../login.php?error=passwordnotmatch");
        exit();
    }

    createUser($conn, $name, $email, $phone, $address, $city, $postcode, $country, $password);


    /* Defining the insert Query for MYSQL database */
    //$sql = "INSERT INTO users (U_Name, U_Password, U_Email, U_Phone, U_Address, U_Role) values('$name','$password','$email','$phone','$address $city $postcode $country', '$account_type')";

    /* If statement that attempts to insert into database. */
    /*if ($conn->query($sql)===true){
        echo "Account Created";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }*/
}
else
{
    header("location: ../login.php");
    exit();
}

