<?php
if(isset($_POST['submit'])) {
	echo '<script>alert("',$_SESSION["currentPoints"],'");</script>';
}
?>