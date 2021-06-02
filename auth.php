<?php
session_start();
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
	header("refresh: 2; url=menu.php");
    exit;
} else {
	header("refresh: 1; url=login.php");
}
?>