<?php
    session_start();
    if(isset($_SESSION['user_id'])=="") {
        header("Location: login.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link rel="stylesheet" href="style.css">
<style>
h1 {text-align: center;}
p {text-align: center;}
div {text-align: center;}
</style>
</head>
<body bgcolor="#f1e4e3">
 
    <div class="container">
        <br><br><br>
        <div class="row">
            <div class="col-lg-8">
            <div id="main-wrapper">
                <div class="card">
                  <div class="card-body">
                    <p class="card-title"><b>Name : </b><?php echo $_SESSION['first_name']?> <?php echo $_SESSION['last_name']?></p>
                    <p class="card-text"><b>Email : </b><?php echo $_SESSION['user_email']?></p>
                    <a href="logout.php" class="btn btn-primary">Logout</a><br><br>
                    <a href="update.php" class="btn btn-primary">Update Info</a><br><br>
                    <a href="delete.php" class="btn btn-primary">Delete Profile</a>
                  </div>
                </div>
            </div>
        </div>       
    </div>
</body>
</html>