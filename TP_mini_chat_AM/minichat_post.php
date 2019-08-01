<?php setcookie('pseudo', $_POST['pseudo'], time() + 190, null, null, false, true); // ICI LE COOKIE EST MIS A JOUR A CHAQUE NOUVELLE ENTREE POUR 3 MINUTES ?> 

<!DOCTYPE = html>
<html>
    <head>
        <meta charset="utf-8" />
		<link rel="stylesheet" href="style.css">
        <title>Bienvenue sur le Minichat !</title>
    </head>
	<body>
	
		<?php																		// INCREMENTATION DE NOUVELLE ENTREE DANS LA TABLE
		
			isset($_POST['pseudo']) AND isset ($_POST['message']);

			$pseud = $_POST['pseudo'];
			$mess = $_POST['message'];
			
				try
				{
				$bdd = new PDO ('mysql:host=localhost;dbname=test;charset=utf8', 'root', '');
				}
				catch (Exception $e)
				{
					die('Erreur : ' . $e->getMessage());
				}
			
			$req = $bdd->prepare('INSERT INTO minichat(pseudo, message, date_tim) VALUES(:pseudo, :message, NOW())');
			$req->execute(array(
				'pseudo' => $pseud,
				'message' => $mess,
				));
			header('Location: index.php');
		?>
	
	</body>
</html>