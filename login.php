<?php
session_start();

require_once "_includes/_include_head.php";
?>
<body>
<?php
require_once "_includes/_include_nav.php";
?>

<section class="register">
    <h2>Got an account? Login here</h2>
    <form action="actions/login_action.php" method="post" autocomplete="on">
        <div>
            <input type="email" id="login_username" name="login_username" required>
            <label for="login_username">Email:</label>
        </div>
        <div>
            <input type="password" id="login_password" name="login_password" required>
            <label for="login_password">Password:</label>
        </div>
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
                break;
        }
    }
    ?>
</section>

<section class="register">
    <h2>Register Here</h2>
    <form action="actions/register_action.php" method="post" autocomplete="on">
        <div>
            <input type="text" id="register_name" name="register_name" required>
            <label for="register_name">Name:</label>
        </div>
        <div>
            <input type="email" id="register_email" name="register_email" required>
            <label for="register_email">Email:</label>
        </div>
        <div>
            <input type="tel" id="register_phone" name="register_phone" required>
            <label for="register_phone">Phone:</label>
        </div>
        <div>
            <input type="text" id="register_address" name="register_address" required>
            <label for="register_address">Address:</label>
        </div>
        <div>
            <input type="text" id="register_city" name="register_city" required>
            <label for="register_city">City:</label>
        </div>
        <div>
            <input type="number" id="register_postcode" name="register_postcode" required>
            <label for="register_postcode">PostCode:</label>
        </div>
        <div>
            <input type="text" id="register_country" name="register_country" required>
            <label for="register_country">Country:</label>
        </div>
        <div>
            <input type="password" id="register_password" name="register_password" required>
            <label for="register_password">Password:</label>
        </div>
        <div>
            <input type="password" id="register_password_repeat" name="register_password_repeat" required>
            <label for="register_password_repeat">Repeat password:</label>
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
                break;
        }
    }
    ?>
</section>


</body>
</html>
