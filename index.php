<!--Setting up MySql db with phpMyAdmin and creating table for this script:
https://github.com/trissentety/PHP-Connect-to-MySQL-and-Create-Table-->

<?php
//Connect to MySQL db
include("database.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post">
        <h3>Greetings!</h3>
        <label>Username</label>
        <input type="text" name="user"><br>
        <label>Password</label>
        <input tpye="password" name="pass"><br>
        <input type="submit" name="submit" value="Register">

    </form>
</body>

</html>
<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = filter_input(INPUT_POST, "user", FILTER_SANITIZE_SPECIAL_CHARS);
    $pass = filter_input(INPUT_POST, "pass", FILTER_SANITIZE_SPECIAL_CHARS);
    if (empty($user)) {
        echo "Username field is required";
    } elseif (empty($pass)) {
        echo "Password field is required";
    } else {
        $passHash = password_hash($pass, PASSWORD_DEFAULT);
        $SQL = "INSERT INTO users (user, pass) VALUES ('$user', '$passHash')";

        try {
            mysqli_query($conn, $sql);
            echo "Successfully registered!";
        } catch (mysqli_sql_exception) {
            echo "Username already exists";
        }
    }
}
mysqli_close($conn);
