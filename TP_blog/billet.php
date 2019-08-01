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
				<p>Vous pouvez éditer le post ou le commentaire</p>
			</div>
		</header>
		<aside>
			<?php 
			$id_billet = (int) $_POST['id_post'];
			define("ID_BILLET", "$id_billet");
				if (isset($_POST['id_post']))
				{
					
					
					
					try
								{
								$bdd = new PDO ('mysql:host=localhost;dbname=test;charset=utf8', 'root', '',
								array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
								}
								catch (Exception $e)
								{
									die('Erreur : ' . $e->getMessage());
								}
					
								
								
					$select_billet = $bdd->prepare("SELECT titre, contenu, DATE_FORMAT(date_creation, '%d/%m/%Y à %H:%i') AS date_creation FROM billets WHERE id = :id_billet");
					$select_billet->execute (array (
						'id_billet' => $id_billet));
					while ($billet = $select_billet->fetch())
					{

			?>
						<div id="billet">
								<h2>
								
								<?php echo htmlspecialchars($billet['titre']);?>

								</h2>
								<p>
									<?php echo 'Posté le ' .htmlspecialchars($billet['date_creation']);?>
								<p>
									<?php echo nl2br(htmlspecialchars($billet['contenu'])); ?>
								</p>
					
						</div>
			<?php
					}

					$select_billet->closeCursor();
				}


				else
				{
					echo ("Erreur !!!");
				}
			?>
			
			<p>
				<form method="post" action="commentaires.php">
					<div class="commaut">
						<label for="auteur">Pseudo :</label>
						<input type="text" name="auteur" id="auteur" maxlength="16" autofocus required /><br />
					</div>
					<div class="commcontent">
						<label for="comm">Exprimez-vous !</label>
						<br />
						<textarea type="text" name="comm" id="comm" rows="10" cols="50" required></textarea>
					</div>	
						<input type="hidden" name="bill_id" id="bill_id" value="<?php echo ID_BILLET; ?>" />
						<p></p>
						<input type="submit" value="Envoyer !!" />
					</form>
			</p>
			
			<?php
			
				try
									{
									$bdd = new PDO ('mysql:host=localhost;dbname=test;charset=utf8', 'root', '',
									array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
									}
									catch (Exception $e)
									{
										die('Erreur : ' . $e->getMessage());
									}
						
									
									
						$select_comment = $bdd->prepare("SELECT auteur, commentaire, DATE_FORMAT(date_commentaire, '%d/%m/%Y à %H:%i') AS date_commentaire FROM commentaires WHERE id_billet = :idbillet");
						$select_comment->execute (array (
							'idbillet' => ID_BILLET ));
						while ($commentaire = $select_comment->fetch())
						{

			?>
							<div id="commentaire">
									<h2>
									
									<?php echo htmlspecialchars($commentaire['auteur']);?>

									</h2>
									<p>
										<?php echo 'Posté le ' .htmlspecialchars($commentaire['date_commentaire']); ?>
									</p>					
									<p>
										<?php echo htmlspecialchars($commentaire['commentaire']); ?>
									</p>
						
							</div>
			<?php
						}

						$select_comment->closeCursor();

			?>
			
		</aside>
	</body>
</html>