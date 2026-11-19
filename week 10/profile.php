
<?php
session_start();

if (!isset($_SESSION["username"])) {
    header("Location: login.php");
    exit();
}

$conn = mysqli_connect("localhost", "root", "", "user");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$username = $_SESSION["username"];

$sql = "SELECT username, email FROM user WHERE username = ?";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "s", $username);
mysqli_stmt_execute($stmt);

$result = mysqli_stmt_get_result($stmt);
$user = mysqli_fetch_assoc($result);

if (!$user) {
    session_unset();
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
</head>
<body>
    <h1>My Profile</h1>

    <p>Username:
        <?php echo htmlspecialchars($user["username"]); ?>
    </p>

    <p>Email:
        <?php echo htmlspecialchars($user["email"]); ?>
    </p>

    <h2>Edit Profile</h2>

    <form action="update_profile.php" method="post">
        <div>
            <label for="email">New Email</label>
            <input type="email" id="email" name="email"
                value="<?php echo htmlspecialchars($user["email"]); ?>"
                required>
        </div>

        <br>
        <button type="submit">Update Email</button>
    </form>
</body>
</html>
