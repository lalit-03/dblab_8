<?php
  session_start();
  require_once "db.php";

    if (isset($_POST['update'])) {
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

        $temp = $_SESSION['user_id'];
        $upd_query = "update users set first_name = '$first_name', last_name = '$last_name', email = '$email', password = '$password' where id = '$temp'";
        // echo $upd_query; 
        $_SESSION['first_name'] = $first_name;
        $_SESSION['last_name'] = $last_name;
        $_SESSION['user_email'] = $email;
        $_SESSION['user_password'] = $password;
        if(mysqli_query($conn, $upd_query)) {
            header("location: dashboard.php");
           } 
        else {
              echo "Error: " . $sql . "" . mysqli_error($conn);
           }
        mysqli_close($conn);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Profile</title>
    <link rel="stylesheet" href="style.css">
</head>
<style>
h1 {text-align: center;}
p {text-align: center;}
div {text-align: center;}
</style>
<body bgcolor="#f1e4e3">
    <br><br><br>
    <div class="container">
    <div id="main-wrapper">
        <div class="row">
            <div class="col-lg-8 col-offset-2">
                <div class="page-header">
                    <h2>UPDATE INFO</h2>
                </div>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" class='myform'>
                    <div class="form-group"'>
                        <label><b>New First Name</b></label>
                        <input type="text" name="first_name" class="form-control" value="" maxlength="100" required="">
                        <span class="text-danger"><?php if (isset($name_error)) echo $name_error; ?></span>
                    </div><br>
                    <div class="form-group">
                        <label><b>New Last Name</b></label>
                        <input type="text" name="last_name" class="form-control" value="" maxlength="100" required="">
                        <span class="text-danger"><?php if (isset($name_error)) echo $name_error; ?></span>
                    </div><br>
                    <div class="form-group">
                        <label><b>New Email</b></label>
                        <input type="email" name="email" class="form-control" value="" maxlength="30" required="">
                        <span class="text-danger"><?php if (isset($email_error)) echo $email_error; ?></span>
                    </div><br>
                    <div class="form-group">
                        <label><b>New Password</b></label>
                        <input type="password" name="password" class="form-control" value="" maxlength="8" required="">
                        <span class="text-danger"><?php if (isset($password_error)) echo $password_error; ?></span>
                    </div> <br> 
                    <div class="form-group">
                        <label><b>Confirm New Password</b></label>
                        <input type="password" name="cpassword" class="form-control" value="" maxlength="8" required="">
                        <span class="text-danger"><?php if (isset($cpassword_error)) echo $cpassword_error; ?></span>
                    </div><br>
                    <input type="submit" class="btn btn-primary" name="update" value="Submit" id = 'signup'> <br><br>
                </form>
            </div>
        </div>    
    </div>
</body>
</html>