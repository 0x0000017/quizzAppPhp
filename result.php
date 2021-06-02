<?php
	session_start();
?>
<!DOCTYPE html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Cache-control" content="no-cache">
	<title>Quizbeengo !</title>
	<link rel ="stylesheet" href ="style.css">
</head>
<body>
	<?php require_once("header.php");?>
	<hr class = "divider"/>
	<center>
	<div class ="flexPosition">
		<div class ="xtraSpace">
		</div>
		<div class ="quizArea">
			<?php
				echo '<script>alert("',$currentPoints,'");</script>';
			?>
</body>
</html>
	