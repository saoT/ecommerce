<?php 
session_start();
require_once("../includes/includes.php");

if (!isset($_SESSION['prenom']))
{
	header('Location: ../index.php');
	exit;
}

if(!empty($_GET["action"]))
{
	switch($_GET["action"])
	{
		case "remove":
		if(!empty($_SESSION["cart_item"]))
		{
			foreach($_SESSION["cart_item"] as $k => $v)
			{
				if($_GET["id_musique"] == $k)
					unset($_SESSION["cart_item"][$k]);				
				if(empty($_SESSION["cart_item"]))
					unset($_SESSION["cart_item"]);
			}
		}
		break;
		case "empty":
		unset($_SESSION["cart_item"]);
		break;	
	}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
	<link rel="stylesheet" href="../index.css">
	<title>Panier - La Boite a Musique</title>
</head>
<body>
	<?php require_once ('../includes/bande_son.php'); ?>

	<div class="wrapper">
		<?php require_once("../includes/navbar.php"); ?>
		<div class="basketcontainer">
			<div id="panier">
				<div class="panierentete"><span>MON PANIER</span> <span id="vider"><a id="btnEmpty" href="panier.php?action=empty">Vider le panier</a></span></div>
				<?php
				if(isset($_SESSION["cart_item"])){
					$item_total = 0;
					?>	
					<table class="table table-dark">
						<tbody>
							<tr>
								<th>Nom de l'album</th>
								<th>Artiste</th>
								<th>Quantité</th>
								<th>Prix vinyl</th>
								<th></th>
							</tr>	
							<?php
							foreach ($_SESSION["cart_item"] as $item){
								?>
								<tr>
									<td><strong><?php echo $item["nom_album"]; ?></strong></td>
									<td><?php echo $item["nom_artiste"]; ?></td>
									<td><?php echo $item["quantity"]; ?></td>
									<td><?php echo "$".$item["prix_vinyl"]; ?></td>
									<td><a href="panier.php?action=remove&id_musique=<?php echo $item["id_musique"]; ?>" title="Supprimer">Retirer du caddie</a></td>
								</tr>
								<?php
								$item_total += ($item["prix_vinyl"]*$item["quantity"]);
							};
							?>
							<tr>
								<td colspan="5" align=right><strong>Total:</strong> <?php echo "$".$item_total; ?></td>
							</tr>
						</tbody>
					</table>		
					<?php
				};
				?>
			</div>
		</div>
		<?php require_once("../includes/footer.php");?>
	</div>
</body>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
<script src="/commerce/E/index.js"></script>
</html>