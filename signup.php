<?php
include("database.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <div class="form-container">
            <div class="form-header">
                <h2>Sign Up</h2>
            </div>
            <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post" class="signup-form">
                <div class="input-group">
                    <label>Username</label>
                    <input type="text" id="signup-username" name="username" required>
                </div>
                <div class="input-group">
                    <label>Email</label>
                    <input type="email" id="signup-email" name="email" required>
                </div>
                <div class="input-group">
                    <label>Password</label>
                    <input type="password" id="signup-password" name="password" required>
                </div>
                <button type="submit" name="submit" class="btn">Sign Up</button>
                <p class="switch-form">Already have an account? <a href="login.php">Login here</a></p>
            </form>
        </div>
    </div>
</body>
</html>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_SPECIAL_CHARS);
    $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_SPECIAL_CHARS);
    $password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_SPECIAL_CHARS);
    $hash = password_hash($password, PASSWORD_BCRYPT);

    $sql = "INSERT INTO loginsignupproject (username, email, password) VALUES ('$username', '$email', '$hash')";
    
    try {
        $result = mysqli_query($conn, $sql);
        echo "<script>
            alert('Signup successful! You can now log in with your credentials.');
            window.location.href = 'login.php';
        </script>";
    }
    catch(mysqli_sql_exception) {
        echo"<script>('We're experiencing technical difficulties. Please try again later.')</script>";
    }
}

mysqli_close($conn);
?>