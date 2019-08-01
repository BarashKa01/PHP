<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
		<link rel="stylesheet" href="style.css">
        <title>Le blog !</title>
    </head>
    <body>
		<header>
			<div id="intro">
				<h3>Le blog !</h3>
				<p>Voici les 5 derniers billets de publication<br />
				cliquez sur un billet pour visualiser les commentaires</p>
			</div>
		</header>
        
		<aside>
			<div id="billet_post">
				
				
				<form method=post action="billet_post.php">
					<div class="titrepost">
						<label for="titre">Titre :</label>
						<input type="text" name="titre" id="titre" maxlength="16" autofocus required /><br />
					</div>
					<div class="contenupost">
						<label for="contenu">Exprimez-vous !</label>
						<br />
						<textarea type="text" name="contenu" id="contenu" rows="10" cols="50" required></textarea>
					</div>	
						
						<p></p>
						<input type="submit" value="Envoyer !!" />
					</form>
			
			</div>
		</aside>
		
		<section>
			<?php
					try
					{
					$bdd = new PDO ('mysql:host=localhost;dbname=test;charset=utf8', 'root', '');
					}
					catch (Exception $e)
					{
						die('Erreur : ' . $e->getMessage());
					}
		
					
					
					$selection = $bdd->query("SELECT id, titre, contenu, date_creation FROM billets ORDER BY id DESC LIMIT 0, 5");

						while ($lastmessage = $selection->fetch())
						{
			?>	
							<div id="billet">
									<h2>
										<form method=post action="billet.php">
											<?php $id_post = $lastmessage['id']; ?>
											<label for="id_post"><?php echo htmlspecialchars($lastmessage['titre']);?></label>
											<input type="hidden" name="id_post" id="id_post" value="<?php echo $id_post; ?>" />
											<input type="submit" value="Visualiser" />
										</form>
									</h2>
									
									<p>
										<?php echo htmlspecialchars($lastmessage['contenu']); ?>
									</p>
							</div>
			<?php
						}

					$selection->closeCursor();
				?>
		</section>
		<footer>
			<?php
				$monfichier = fopen('compteur.txt', 'r+');
			
				$page_vue = fgets($monfichier);
				$page_vue += 1;
				fseek($monfichier, 0);
				fputs($monfichier, $page_vue);

				fclose($monfichier);
				
				echo '<p>Cette page a été vue ' .$page_vue. ' fois !</p>';
			?>
		</footer>

		<p>Aujourd'hui il sera au quatrième top : <?php echo date ('d/m/Y h:i:s'); ?></p>
		
		
    </body>
</html>