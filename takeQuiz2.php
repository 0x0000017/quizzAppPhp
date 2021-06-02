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
	<br>
	<div class ="flexPosition">
		<div class ="xtraSpace">
		</div>
		<div class ="quizArea">
			<h2 style ="margin: 0px 0px 0px 15px;">True or False Test</h2>
			<p style ="margin: 0px 0px 0px 15px;">
				Please pick the correct answer</p>
				<br><br>
					<?php
						$conn = mysqli_connect("localhost", "root", "", "quizbeengo");
						$sql = mysqli_query($conn, "SELECT * from questionstf");
						
						while($rw = mysqli_fetch_array($sql)){
							$id = $rw['id'];
							$quizTitle = $rw['quizTitle'];
							$tfQuest = $rw['tfQuest'];
							$tfAns = $rw['tfAns'];
							
							echo '
							<form method ="POST">
								<h3 style ="margin: 0px 0px 0px 15px;">',$quizTitle,'</h3>
								<p style ="font-size: 15px; margin: 0px 0px 0px 15px;">',$tfQuest,'</p>
								<p style ="margin: 0px 0px 0px 15px;">
								<input type ="radio" name ="',$id,'" value ="true">
									<label for ="true">True</label><br>
								<input type ="radio" name ="',$id,'" value ="false">
									<label for ="false">False</label>
									<br><br><br>
							</form>';
						}
					?>
		</div>
	</div>
</body>
</html>
					