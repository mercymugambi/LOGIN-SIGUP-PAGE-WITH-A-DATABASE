<?php 

include 'config.php';
session_start();
error_reporting(0);

/*Check whether theirs any session active */
if (isset($_SESSION['username'])){
    header("location: welcome.php");
}
if (isset($_POST['submit'])){
    $email = $_POST['email'];
    $passwords = md5($_POST['passwords']); #md5 will convert password to strings in the database
    $sql = "SELECT * FROM users WHERE email = '$email' AND passwords ='$passwords'";
    $result=mysqli_query($conn, $sql);

    if($result->num_rows > 0){
        $row = mysqli_fetch_assoc($result);
        $_SESSION['username'] = $row['username'];
        header("Location: welcome.php");
    }  else{
        echo "<script>alert('Whoops ! Email or Password is Wrong.')</script>";
    }

}
?>
<!Doctype html>
<html>
    <head>
        <title>Login Form - merctech Technologies LTD</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">  
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
        
        <link href="css/style.css" rel="stylesheet">

    </head>
    <body>
    <div class="container"> 
        <form action="" method="POST" class="login-email">
            <p class="login-text" style="font-size: 2rem; font-weight: 800;">
            login
            </p>
            <div class="input-group">
                <input type="email" placeholder="Email" name="email" value="<?php echo $email; ?>" required>
            </div>
            <div class="input-group">
                <input type="password" placeholder="Password" name="passwords" value="<?php echo $_POST['passwords']; ?>" required>
            </div>
            <div class="input-group">
                <button name="submit" class="btn"> Login </button>
            </div>
            <p class="login-register-text"> Don't have an account? <a href="register.php">Register Here </a> . </p>
        </form>         
    </div>
    
</body>
</html>