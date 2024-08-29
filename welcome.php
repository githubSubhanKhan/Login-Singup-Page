<?php
session_start();

$username = $_SESSION['username'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <link rel="stylesheet" href="welcome.css">
</head>
<body>
    <div class="container">
        <div class="form-container">
            <div class="form-header">
                <h2>Welcome <?php echo htmlspecialchars($username); ?>!</h2>
            </div>
            <p class="thank-you-message">Thank you for using my project</p>
            <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post">
                <button type="submit" name="submit" class="btn">Logout</button>
            </form>
        </div>
    </div>
</body>
</html>

<?php
if($_SERVER["REQUEST_METHOD"] == "POST") {
    session_destroy();
    header("Location: login.php");
} 
?>