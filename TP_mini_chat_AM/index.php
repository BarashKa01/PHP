<?php header("Refresh:20"); ?>
<!DOCTYPE = html>
<html>
    <head>
        <meta charset="utf-8" />
		<link rel="stylesheet" href="style.css">
        <title>Bienvenue sur le minichat !</title>
    </head>
	<body>
	

		<h1>Ce site est optimisé pour Firefox et Chrome</h1>
		<h3>/!\ Attention la base de donnée (pas la table) est nommée "test", pensez à modifier la destination "dbname=" dans les 2 pages si ce n'est pas votre cas et à importer la table SQL dans votre BDD pour un fonctionnement normal /!\</h3>
		<div id="formulaire">
			<form method=post action="minichat_post.php">
				<?php											// FORMULAIRE D'ENVOI DE MESSAGE, PSEUDO + TEXTE
					if (isset ($_COOKIE['pseudo']))
					{ ?>
						<label for="pseudo">Entrez votre pseudo :</label>
						<input type="text" name="pseudo" id="pseudo" maxlength="16"  required value="<?php echo htmlspecialchars($_COOKIE['pseudo']); ?>" /><br />
					<?php
					}
					else
					{?>
						<label for="pseudo">Entrez votre pseudo :</label>
						<input type="text" name="pseudo" id="pseudo" maxlength="16"  required /><br />
					<?php
					}
				?>
					<label for="message">Votre message :</label>
					<textarea type="text" name="message" id="message" rows="10" cols="50" maxlength="255" autofocus required></textarea>
					
				<p></p>
				<input type="submit" value="Envoyer !!" />
			</form>
		</div>
		<p></p>
		<p></p>
		<p></p>

			<?php											 // SELECTION ET AFFICHAGE DES 10 DERNIERS MESSAGES DE LA BASE
				try
				{
				$bdd = new PDO ('mysql:host=localhost;dbname=test;charset=utf8', 'root', '');
				}
				catch (Exception $e)
				{
					die('Erreur : ' . $e->getMessage());
				}
	
				
				
				$selection = $bdd->query("SELECT pseudo, message, DATE_FORMAT(date_tim, '%d/%m/%Y à %H:%i') AS date_tim FROM minichat ORDER BY id DESC LIMIT 0, 10");

					while ($lastmessage = $selection->fetch())
					{?>
							
						<div id="message">
							<p>
								<?php echo htmlspecialchars($lastmessage['pseudo']); ?> : <?php echo htmlspecialchars($lastmessage['message']); ?> <br />
							</p>
							<ul>
								<li>
								le <?php echo htmlspecialchars($lastmessage['date_tim']); ?> 
								</li>
							</ul>
						</div>
					<?php
					}

				$selection->closeCursor();
			?>
	
	</body>
</html>