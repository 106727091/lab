<?php include 'header.inc'; ?>
<form method="Post" action="process.php">
    <label for="username">Username:</label>
    <input id="username" type="text" name="username" required> <br>

    <label for="password">Password:</label>
    <input id="password" type="password" name="password" required> <br>

    <input type="hidden" name="token" value="abc123">
    <input type="submit" value="login">
</form>
<?php include 'footer.inc'; ?>