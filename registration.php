<?php
  require_once "db.php";
  if(isset($_SESSION['user_id'])) {
    header("Location: login.php");
  }
    if(isset($_POST['signup'])) {
        $first_name = mysqli_real_escape_string($conn, $_POST['first_name']);
        $last_name = mysqli_real_escape_string($conn, $_POST['last_name']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);
        $cpassword = mysqli_real_escape_string($conn, $_POST['cpassword']); 
        if (!preg_match("/^[a-zA-Z ]+$/",$first_name)) {
            $name_error = "First Name must contain only alphabets and space";
        }
        if (!preg_match("/^[a-zA-Z ]+$/",$last_name)) {
            $name_error = "Last Name must contain only alphabets and space";
        }
        if(!filter_var($email,FILTER_VALIDATE_EMAIL)) {
            $email_error = "Please Enter Valid Email ID";
        }
        if(strlen($password) < 6) {
            $password_error = "Password must be minimum of 6 characters";
        }
        if($password != $cpassword) {
            $cpassword_error = "Password and Confirm Password doesn't match";
        }
        if (!$error) {
            $ins_query = "insert into users(`first_name`,`last_name`,`email`,`password`)
                          values('$first_name','$last_name','$email','$password')";
            if(mysqli_query($conn, $ins_query)) {
             header("location: login.php");
             exit();
            } else {
               echo "Error: " . $sql . "" . mysqli_error($conn);
            }
        }
        mysqli_close($conn);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Registration Form</title>
    <link rel="stylesheet" href="style.css">
</head>

<style>
h1 {text-align: center;}
p {text-align: center;}
div {text-align: center;}
input {text-align: center;}
</style>

<body bgcolor="#f1e4e3">
    <div class="container">
    <div id="main-wrapper">
        <div class="row">
            <div class="col-lg-8 col-offset-2">
                <div class="page-header">
                    <h2>REGISTRATION FORM</h2>
                </div>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" class='myform'>

                    <div class="form-group">
                        <label><b>First Name</b></label> &emsp;
                        <input type="text" name="first_name" class="inputvalues" value="" maxlength="100" required="">
                        <span class="text-danger"><?php if (isset($name_error)) echo $name_error; ?></span>
                    </div><br>

                    <div class="form-group">
                        <label><b>Last Name</b></label> &emsp;
                        <input type="text" name="last_name" class="inputvalues" value="" maxlength="100" required="">
                        <span class="text-danger"><?php if (isset($name_error)) echo $name_error; ?></span>
                    </div><br>

                    <div class="form-group ">
                        <label><b>Email</b></label> &emsp;  &emsp;
                        <input type="email" name="email" class="inputvalues" value="" maxlength="30" required="">
                        <span class="text-danger"><?php if (isset($email_error)) echo $email_error; ?></span>
                    </div><br>

                    <div class="form-group">
                        <label><b>Password</b></label> &emsp;
                        <input type="password" name="password" class="inputvalues" value="" maxlength="8" required="">
                        <span class="text-danger"><?php if (isset($password_error)) echo $password_error; ?></span>
                    </div> <br> 

                    <div class="form-group">
                        <label><b>Confirm Password</b></label> &emsp;
                        <input type="password" name="cpassword" class="inputvalues" value="" maxlength="8" required="">
                        <span class="text-danger"><?php if (isset($cpassword_error)) echo $cpassword_error; ?></span>
                    </div><br>

                    <input type="submit" class="btn btn-primary" name="signup" value="Submit" id = 'signup'> <br><br>
                    Already have a account? <a href="login.php" class="btn btn-default">Login</a>
                </form>
            </div>
        </div>    
    </div>
</body>
</html>
