<?php 
session_start();
require_once ('../includes/bande_son.php');
require_once("../includes/navbar.php");
require_once("../includes/includes.php");

if (!isset($_SESSION['prenom']))
{
	header('Location: ../index.php');
	exit;
}
$profi = $DB-> query('SELECT * FROM client WHERE id_client ='.$_SESSION["id"]);
$profi = $profi->fetchAll();

   foreach($profi as $pf){};

$achat = $DB-> query('SELECT * FROM commande WHERE id_client ='.$_SESSION["id"]);
$achat = $achat->fetchAll();

	foreach ($achat as $ac) {};

if(!empty($_POST))
{
  extract($_POST);
  $valid = true;
  $Adressen = htmlspecialchars(ucfirst(trim($Adressen)));
  $Cpn = htmlspecialchars(ucfirst(trim($Cpn)));
  $Villen = htmlspecialchars(ucfirst(trim($Villen)));
  if($valid)
  { 
  $DB->update('UPDATE client SET adresse_client ="'.$Adressen.'",cp_client ="'.$Cpn.'",ville_client="'.$Villen.'" WHERE id_client="'.$_SESSION["id"] .'"');

    $_SESSION['flash']['success'] = "Votre modification a bien été prise en compte !";
    header('Location: /commerce/E/pages/profil.php');
    exit;  
  } 
} 
if(!empty($_GET["action"])) {
    switch($_GET["action"]) {
case "delete":
        $DB->query('DELETE FROM client WHERE id_client='.$_SESSION["id"]);
    	header('Location: /commerce/E/includes/deconnexion.php');
        break;
    }
} 
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Mon Profil - La boite à Musique</title>	
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
	<link rel="stylesheet" href="../index.css">
</head>
<?php var_dump($_SESSION) ?>
<body>
	<div class="profrow">
		<div class="colprof prof1">Votre adresse de livraison : <br><br><?= $pf['nom_client'] ?>		<?= $pf['prenom_client'] ?> <br>	<?= $pf['adresse_client'] ?><br><?= $pf['cp_client'] ?>		<?= $pf['ville_client'] ?><br><br><br>

			<div class="butest">
				<span>				<!-- Button trigger modify modal -->
			<button type="button" class="btn btn-primary butprofil" data-toggle="modal" data-target="#modifi"> Modifier </button>

								<!-- Modify Modal -->
				<div class="modal fade" id="modifi" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  					<div class="modal-dialog" role="document">
    					<div class="modal-content">
      						<div class="modal-header">
        						<h5 class="modal-title" id="exampleModalLabel">Changer mes informations personnelles</h5>
        						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
          						<span aria-hidden="true">&times;</span></button>
      						</div>
      						<div class="modal-body">
      		<?php 
      		if(isset($_SESSION['flash']))
      		{ 
			foreach($_SESSION['flash'] as $type => $message): 
			endforeach;
			unset($_SESSION['flash']);
			}
			?> 
      						<form method="post" action="profil.php">	
    							<div class="formulaire">
        						<p>Veuillez completer tout les champs.</p>
        							<div class="modifprof">
              							<label>* Adresse :</label> <br>
            <input class="input" type="text" name="Adressen" placeholder="Nouvelle adresse" value="<?php if (isset($Adressen)) echo $Adressen; ?>" required><br>                                  
              						<label>* Ville :</label> <br>
            <input class="input" type="text" name="Villen" placeholder="Nouvelle ville" value="<?php if (isset($Villen)) echo $Villen; ?>" required> <br>
              						<label>* Code Postal :</label> <br>
            <input class="input" type="number" name="Cpn" placeholder="Nouveau CP" value="<?php if (isset($Cpn)) echo $Cpn; ?>" maxlength="5" required> <br>
          							</div>    
      							</div>
      							<div class="modal-footer">
        						<button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
        						<button type="submit" class="btn btn-primary">Modifier</button>
      							</div>
       						</form>
      						</div>
    					</div>
  					</div>
				</div>
				</span>
				<span>					<!-- Button trigger delete modal -->
		<button type="button" class="btn btn-primary butdelete butprofil" data-toggle="modal" data-target="#delete"> Supprimer mon compte</button>

										<!-- Delete Modal -->
				<div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  				<div class="modal-dialog" role="document">
  					  	<div class="modal-content">
  					    	<div class="modal-header">
  					      	<h5 class="modal-title" id="exampleModalLabel">Veuillez confirmer la suppression de votre compte</h5>
  			    	  		<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	  			    		</div>
	  			    		<p class="modal-body">Voulez vous vraiment supprimer votre compte?</p>
    	  					<div class="modal-footer">
      						<button type="button" class="btn btn-secondary" data-dismiss="modal">Non</button>
      						<a href="profil.php?action=delete"><button type="button" class="btn btn-primary butdelete">Confirmer supression</button></a>
			    			</div>
			   			</div>
					</div>
				</div>
				</span>
			</div>
		</div>
		<div class="colprof prof2">Panier en cours</div>
		<div class="colprof prof3">Précédents achats <br><br><a href=""><?= $ac['id_commande'] ?></a> <?= $ac['prix_commande'] ?></div>
	</div>

	<?php  require_once("../includes/footer.php");?>

</body>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
  <script src="/commerce/E/index.js"></script>
</html>
