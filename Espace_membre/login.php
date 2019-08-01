<?php // LOGIN PAGE ?>

<!DOCTYPE = html>
<html>

	<head>
		<meta charset="utf-8" />
		<link rel="stylesheet" href="Style.css">
		<title>L'ambition au service de l'autonomie</title>
	</head>
	<body>
	<header>
			<?php include "header.php"; ?>
		</header>
		<nav>
			<?php include "nav.php"; ?>
		</nav>
		<section> 
			<div id="login_form">
				<form method="post" action="login_post2.php">
					<div class="mail"><label for="mail">Votre adresse e-mail :</label>
					<input type="text" name="mail" id="mail" required /></div>
					<div class="password"><label for="passw">Mot de passe :</label>
					<input type="password" name="passw" id="passw" required /></div>
					
					<input type="submit" value="Connexion" /></div>
				</form>
			</div>
		</section>
		
		<footer>
			<?php include "footer.php"; ?>
		</footer>
		
	</body>
</html>