<?php
include("database.php");
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <div class="form-container">
            <div class="form-header">
                <h2>Login</h2>
            </div>
            <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post" class="login-form">
                <div class="input-group">
                    <label>Username</label>
                    <input type="text" id="login-email" name="username" required>
                </div>
                <div class="input-group">
                    <label>Password</label>
                    <input type="password" id="login-password" name="password" required>
                </div>
                <button type="submit" class="btn">Login</button>
                <p class="switch-form">Don't have an account? <a href="signup.php">Sign up here</a></p>
            </form>
        </div>
    </div>
</body>
</html>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_SPECIAL_CHARS);
    $password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_SPECIAL_CHARS);

    $sql = "SELECT * FROM loginsignupproject WHERE username = '$username'";
    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        if(password_verify($password, $row['password'])) {
            $username = $row['username'];
            $_SESSION['username'] = $username;
            header("Location: welcome.php");
        } else {
            // echo"Invalid Password";
        }
    } else {
        echo"<script>alert('No matching records found. Please check your input and try again.')</script>";
    }
}

mysqli_close($conn);
?>