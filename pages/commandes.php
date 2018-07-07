<?php 
session_start();
require_once("../includes/includes.php");

if (!isset($_SESSION['prenom']))
{
	header('Location: ../index.php');
	exit;
}
$ancienachat = $DB->query("SELECT * FROM commande WHERE num_commande='" .$_GET["num_commande"]."'");
$ancienachat = $ancienachat->fetchAll();
foreach ($ancienachat as $aa) {};

$commande = $DB->query("SELECT *FROM commande INNER JOIN musique ON commande.code_article = musique.code_article");
$commande = $commande->fetchAll();

foreach ($commande as $cd) {
	
};
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Commande numéro</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
	<link rel="stylesheet" href="/commerce/E/index.css">
</head>
<body>
	<?php require_once ('../includes/bande_son.php'); ?>
	<div class="wrapper">
		<div id="tablecommandecontainer">
			<div id="tablecommande">
				<div id="commandeinfo">
					Numéro de commande : <?= $aa['num_commande'] ?>. Commande effectuée le <?= $aa['date_commande'] ?>
				</div>
				<div>
					<?php foreach ($commande as $cd) {
		echo $cd['nom_album']." :  ".$cd['nom_artiste'].' Prix :'.$cd['prix_vinyl'].'€'.'<br>';
	}  ?>
				</div>
			</div>
		</div>
		<?php  require_once("../includes/footer.php");?>
	</div>
<!-- 
	Votre commande numéro <?= $aa['num_commande'] ?> contient les articles suivants : <?php foreach ($commande as $cd) {
		echo $cd['nom_album']."  ".$cd['nom_artiste'];
	}  ?> -->
</body>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
<script src="/commerce/E/index.js"></script>
</html>