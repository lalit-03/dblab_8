<?php
  session_start();
  require_once "db.php";
    if (isset($_POST['delete'])){
        $temp = $_SESSION['user_id'];
        $del_query = "delete from users where id = '$temp'";
        mysqli_query($conn, $del_query);
        header("location: login.php");
        mysqli_close($conn);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Delete Profile?</title>
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
    <div id = 'main-wrapper'>
        <div class="row">
            <div class="col-lg-8">
                <div class="card">
                  <div class="card-body">
                  <p class="card-title"><b>Name : </b><?php echo $_SESSION['first_name']?> <?php echo $_SESSION['last_name']?></p>
                  <p class="card-text"><b>Email : </b><?php echo $_SESSION['user_email']?></p>  
                  <input type="submit" class="btn btn-primary" name="delete" value="Are you Sure you want to delete your Account?" id='delete_btn'>
                  </div>
                </div>
            </div>
        </div>       
    </div>
</body>
</html>