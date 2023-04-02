<?php
ob_start();
session_start();
if(isset($_SESSION['user_id'])) {
	session_destroy();
	unset($_SESSION['user_id']);
	unset($_SESSION['first_name']);
    unset($_SESSION['last_name']);
	unset($_SESSION['user_email']);
	header("Location: login.php");
} else {
	header("Location: login.php");
}
?>