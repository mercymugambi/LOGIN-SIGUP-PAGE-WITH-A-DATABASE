<?php
session_start();

if (!isset($_SESSION['username'])){
    header("location: index.php");
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <mata name="viewport" content = "width=device-width, initial-scale=1.0">
    <link rel = "stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <title> Welcome - merctech </title>
    <link rel="stylesheet" type = "text/css" href = "style.css">
</head>

<body>
    <p>hello</p>
    <?php echo "<h1> Welcome" . $_SESSION ['lname'] . "<h1>"; ?>
    <a href = "logout.php">Logout</a>

</body>
</html>
