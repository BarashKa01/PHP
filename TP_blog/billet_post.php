<?php
		
			isset($_POST['titre']) AND isset ($_POST['contenu']);

			$titre = $_POST['titre'];
			$conten = $_POST['contenu'];
			
				try
				{
				$bdd = new PDO ('mysql:host=localhost;dbname=test;charset=utf8', 'root', '');
				}
				catch (Exception $e)
				{
					die('Erreur : ' . $e->getMessage());
				}
			
			$req = $bdd->prepare('INSERT INTO billets(titre, contenu, date_creation) VALUES(:titre, :contenu, NOW())');
			$req->execute(array(
				'titre' => $titre,
				'contenu' => $conten,
				));
			$req->closeCursor();
			header('Location: index.php');
		?>