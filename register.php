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
    #$username = $_POST['username'];
    $email = $_POST['email'];
    $passwords = md5($_POST['passwords']); #md5 will convert password to strings in the database
    $cpassword = md5($_POST['cpassword']);

    if ($passwords==$cpassword){
        $sql = "SELECT * FROM users WHERE email = '$email'";
        $result=mysqli_query($conn, $sql);

        if (!$result->num_rows > 0){ 
            $sql = "INSERT INTO users (fname, lname, username, email, passwords) 
                    VALUES ('$fname', '$lname', '$username', '$email', '$passwords')";
                    $result=mysqli_query($conn, $sql);

            if ($result){
                echo "<script>alert('user registration completed.') </script>";
                $fname="";
                $lname="";
               # $username="";
                $email="";
                $_POST['passwords']="";
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
                <input type="text" placeholder="Firstname" name="fname" value="<?php echo $fname; ?>" required>
            </div>
            <div class="input-group">
                <input type="text" placeholder="Lastname" name="lname" value="<?php echo $lname; ?>" required>
            </div>
            <!--<div class="input-group">
                <input type="text" placeholder="Username" name="username" value="<?php echo $username; ?>" required>
            </div> -->
            <div class="input-group">
                <input type="email" placeholder="Email" name="email" value="<?php echo $email; ?>" required>
            </div>
            <div class="input-group">
                <input type="password" placeholder="Password" name="passwords" value="<?php echo $_POST['passwords']; ?>" required>
            </div>
            <div class="input-group">
                <input type="password" placeholder="Confirm Password" name="cpassword" value="<?php echo $_POST['cpassword']; ?>" required>
            </div>
            <div class="input-group">
                <button name="submit" class="btn"> Register </button>
            </div>
            <p class="login-register-text"> Have an account? <a href="index.php">Login Here </a> . </p>
        </form>         
    </div>
        


    </body>
</html>