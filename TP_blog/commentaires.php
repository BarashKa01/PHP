


<?php
		
	if (isset($_POST['auteur']) AND isset ($_POST['comm']) AND isset($_POST['bill_id']))
	{
		$aut = $_POST['auteur'];
		$comm = $_POST['comm'];
		$bill_id = $_POST['bill_id'];	
			try
			{
				$bdd = new PDO ('mysql:host=localhost;dbname=test;charset=utf8', 'root', '');
			}
			catch (Exception $e)
			{
				die('Erreur : ' . $e->getMessage());
			}
				
			$req = $bdd->prepare('INSERT INTO commentaires(id_billet, auteur, commentaire, date_commentaire) VALUES(:id_bill, :aut, :comm, NOW())');
			$req->execute(array(
				'id_bill' => $bill_id,
				'aut' => $aut,
				'comm' => $comm,
				));
			$req->closeCursor();
	}
	else
	{
		echo ("Erreur de commentaire !");
	}
	header('Location: index.php');
?>