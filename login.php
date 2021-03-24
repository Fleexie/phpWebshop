<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Webshop Login</title>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&family=Open+Sans:ital,wght@0,400;0,700;1,400&display=swap" rel="stylesheet">
</head>
<body>
<section class="login">
    <h2>Got an account? Login here</h2>
    <form action="actions/login_action.php" method="post" autocomplete="on">
        <label for="login_username">Email:</label>
        <input type="email" id="login_username" name="login_username">
        <label for="login_password">Password:</label>
        <input type="password" id="login_password" name="login_password">
        <button type="submit" name="submit">Login</button>
    </form>

    <?php
    if (isset($_GET["error"])){
        switch ($_GET["error"]){
            case "emptylogininput":
                echo '<p class="error">Please fill all input fields!</p>';
                break;
            case "wronglogin":
                echo '<p class="error">Login is not valid</p>';
                break;
            default:
                return;
        }
    }
    ?>
</section>

<section class="register">
    <h2>Register Here</h2>
    <form action="actions/register_action.php" method="post" autocomplete="on">
        <div>
            <label for="register_name">Name:</label>
            <input type="text" id="register_name" name="register_name">
        </div>
        <div>
            <label for="register_email">Email:</label>
            <input type="email" id="register_email" name="register_email">
        </div>
        <div>
            <label for="register_phone">Phone:</label>
            <input type="tel" id="register_phone" name="register_phone" pattern="[0-9]{8}">
        </div>
        <div>
            <label for="register_address">Address:</label>
            <input type="text" id="register_address" name="register_address">
        </div>
        <div>
            <label for="register_city">City:</label>
            <input type="text" id="register_city" name="register_city">
        </div>
        <div>
            <label for="register_postcode">PostCode:</label>
            <input type="number" id="register_postcode" name="register_postcode">
        </div>
        <div>
            <label for="register_country">Country:</label>
            <input type="text" id="register_country" name="register_country">
        </div>
        <div>
            <label for="register_password">Password:</label>
            <input type="password" id="register_password" name="register_password">
        </div>
        <div>
            <label for="register_password_repeat">Repeat password:</label>
            <input type="password" id="register_password_repeat" name="register_password_repeat">
        </div>
        <button type="submit" name="submit">Register</button>
    </form>
    <?php
    if (isset($_GET["error"])){
        switch ($_GET["error"]){
            case "emptyinput":
                echo '<p class="error">Please fill all input fields!</p>';
                break;
            case "invalidemail":
                echo '<p class="error">Email is not valid</p>';
                break;
            case "emailexists":
                echo '<p class="error">Email already exists!</p>';
                break;
            case "passwordnotmatch":
                echo '<p class="error">Entered passwords are not matching!</p>';
                break;
            case "none":
                echo '<p class="success">Account has been created</p>';
                break;
            default:
                return;
        }
    }
    ?>
</section>


</body>
</html>
