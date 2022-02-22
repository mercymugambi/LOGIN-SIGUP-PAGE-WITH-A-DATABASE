<?php 

include 'config.php';
session_start();
error_reporting(0);


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
                <input type="password" placeholder="password" name="email" value="<?php echo $email; ?>" required>
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