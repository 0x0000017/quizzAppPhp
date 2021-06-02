<div class ="flexHeader">
	<div class ="leftSide">
		<a href ="index.php"><img src ="img/logo2.png"></a>
	</div>
	<div class ="blankSpace">
	
	</div>	
	<div class ="rightSide">
		<?php
			if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
				echo "<h3>Hello, ", htmlspecialchars($_SESSION["firstName"]),"</h3>
				<a href =\"logout.php\" style =\"text-decoration: none; color: white;background-color: #ff0000; padding: 5px; border-radius: 12px;\">Logout</a>";
			} else {
				echo "
			<ul style =\"position: absolute; bottom: 25px;\">
				<li><a href =\"login.php\">Sign In</a></li>
				<li>&nbsp;&nbsp;</li>
				<li><a href =\"register.php\">Sign Up</a></li>
			</ul>";
			} ?>
	</div>
</div>