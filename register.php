<?php 

include 'config.php';
session_start();
error_reporting(0);

/*Check whether theirs any session active */
if (isset($_SESSION['username'])){
    header("location: index.php");
}
if (isset($_POST['submit'])){
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $lname = $_POST['username'];
    $email = $_POST['email'];
    $password = md5($_POST['password']); #md5 will convert password to strings in the database
    $cpassword = md5($_POST['cpassword']);

    if ($password==$cpassword){
        $sql = "SELECT * FROM users WHERE email = '$email'";
        $result=mysqli_query($conn, $sql);

        if (!$result->num_rows > 0){ 
            $sql = "INSERT INTO users (fname, lname, username, email, password) 
                    VALUES ('$fname', '$lname', '$username', '$email', '$password')";
                    $result=mysqli_query($conn, $sql);

            if ($result){
                echo "<script>alert('user registration completed.') </script>";
                $fname="";
                $lname="";
                $username="";
                $email="";
                $_POST['password']="";
                $_POST['cpassword']="";

            }else {
                echo "<script>alert('Whoops. Somethimg went wrong')</script>";
            }

        }else { 
            echo "<script>alert('Whoops Email Already exists.')</script>";
        }
            
    } else{
        echo "<script>alert('Password is not Matched. try again.')</script>";
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
            Register Here
            </p>
            <div class="input-group">
                <input type="text" placeholder="FirstName" name="fname" value="<?php echo $fname; ?>" required>
            </div>
            <div class="input-group">
                <input type="text" placeholder="LastName" name="lname" value="<?php echo $lname; ?>" required>
            </div>
            <div class="input-group">
                <input type="text" placeholder="UserName" name="username" value="<?php echo $username; ?>" required>
            </div>
            <div class="input-group">
                <input type="email" placeholder="Email" name="email" value="<?php echo $email; ?>" required>
            </div>
            <div class="input-group">
                <input type="password" placeholder="Password" name="password" value="<?php echo $_POST['password']; ?>" required>
            </div>
            <div class="input-group">
                <input type="confirm-password" placeholder="Confirm Password" name="cpassword" value="<?php echo $_POST['cpassword']; ?>" required>
            </div>
            <div class="input-group">
                <button name="submit" class="btn"> Register </button>
            </div>
            <p class="register-text"> Have an account? <a href="index.php">Login Here </a> . </p>
        </form>         
    </div>
        


    </body>
</html>