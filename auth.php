<?php
session_start();
if(isset($_SESSION["admin"]) && $_SESSION["admin"] === true){
	header("refresh: 2; url=menu.php");
    exit;
} else {
	echo '<script>alert("Sorry, you are not allowed to create a quiz !");</script>';
	header("refresh: 1; url=login.php");
}
?>