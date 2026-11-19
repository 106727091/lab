
<?php
session_start();

if (!isset($_SESSION["username"])) {
    header("Location: login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] != "POST") {
    header("Location: profile.php");
    exit();
}

$conn = mysqli_connect("localhost", "root", "", "user");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$username = $_SESSION["username"];
$email = trim($_POST["email"] ?? "");

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    die("Invalid email address");
}

$sql = "UPDATE user SET email = ? WHERE username = ?";
$stmt = mysqli_prepare($conn, $sql);

mysqli_stmt_bind_param($stmt, "ss", $email, $username);
mysqli_stmt_execute($stmt);

header("Location: profile.php");
exit();
?>
