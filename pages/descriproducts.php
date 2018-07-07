<?php 
session_start();
require_once("../includes/includes.php");

/*if (!isset($_SESSION['prenom']))
{
	header('Location: ../index.php');
	exit;
}
*/
$musi = $DB-> query("SELECT * FROM musique WHERE code_article ='" . $_GET["code_article"] . "'");
$musi = $musi->fetchAll();

foreach ($musi as $msc){

};

if(!empty($_GET["action"])) 
{
	switch($_GET["action"]) 
	{
		case "add":
		if(!empty($_POST["quantity"])) {
			$productByid = $DB->query("SELECT * FROM musique WHERE code_article='" . $_GET["code_article"] . "'");
			$productByid = $productByid->fetchAll();
			$itemArray = array($productByid[0]["code_article"]=>array('nom_album'=>$productByid[0]["nom_album"], 'code_article'=>$productByid[0]["code_article"], 'nom_artiste'=>$productByid[0]["nom_artiste"], 'quantity'=>$_POST["quantity"], 'prix_vinyl'=>$productByid[0]["prix_vinyl"]));

			if(!empty($_SESSION["cart_item"])) {
				if(in_array($productByid[0]["code_article"],$_SESSION["cart_item"])) {
					foreach($_SESSION["cart_item"] as $k) {
						if($productByid[0]["code_article"] == $k) {
							if(empty($_SESSION["cart_item"][$k]["quantity"])) {
								$_SESSION["cart_item"][$k]["quantity"] = 0;
							}
							$_SESSION["cart_item"][$k]["quantity"] += $_POST["quantity"];
						}
					}
				} else {
					$_SESSION["cart_item"] = array_merge($_SESSION["cart_item"],$itemArray);
				}
			} else {
				$_SESSION["cart_item"] = $itemArray;
			}
		}
		break;
	}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Description produits</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
	<link rel="stylesheet" href="/commerce/E/index.css">
</head>
<body>
	
	<?php require_once ('../includes/bande_son.php'); ?>
	
	<div class="wrapper">

		<?php require_once("../includes/navbar.php"); ?>

		<div class="album">
			<div class="titrealbum">
				<h4>Album : <?php echo $msc['nom_album']?></h4>
				<h5>Interprète : <?php echo $msc['nom_artiste']?></h5>
			</div>
			<div class="pochette">
				<?php echo '<img src=/commerce/E/images/'.$msc['pochette'].'></img>'  ?>
			</div>
			<div id="productdescri">
				<h6>Description du produit : </h6><br>
				<?php echo $msc['description_musique']  ?>
			</div>

			<div id="prix">
		<!-- 	<div id="prixvin">
				<p>Prix de la cassette: <br><?php echo $msc['prix_cassette']. "€" ?> <div class="ajoutpanier"><button type="button">Ajouter au panier</button></div></p>
			</div>
		<-->	<div id="prixcas">
				<form method="post" action="descriproducts.php?action=add&code_article=<?php echo $msc['code_article']; ?>">
					<p>Prix du vinyl: <br><?php echo $msc['prix_vinyl']. "€" ?><div class="ajoutpanier"><input type="text" name="quantity" value="1" size="2" /><input type="submit" value="Ajouter au panier"/></div></p>
				</form>
				</div>
			</div>
		</div>
<!-- <a href="./admin.php"><button type="button" name="Admin">Admin</button></a> -->
<?php  require_once("../includes/footer.php");?>
	</div>
</body>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
<script src="/commerce/E/index.js"></script>
</html>