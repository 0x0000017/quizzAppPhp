<?php
	session_start();
	require_once("admin/users.php");
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
	<div class ="flexPosition">
		<div class ="xtraSpace">
		</div>
		<div class ="quizArea">
		<H2>MULTIPLE CHOICE</H2>
			<?php
                    $conn = mysqli_connect("localhost", "root", "", "quizbeengo");
                    $sql = mysqli_query($conn, "SELECT * FROM questionsmchoice;");
					
					while($rw = mysqli_fetch_array($sql))
					{
                        $id = $rw['id'];
						$quizTitle = $rw['quizTitle'];
						$quizQuest = $rw['quizQuest'];
						
						echo '
								<a href ="takeQuiz1.php?id=',$id,'>',$QuizTitle
	
</body>
</html>
	