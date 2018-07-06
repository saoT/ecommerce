<?php 
session_start();
require_once("../includes/includes.php");

/*if (!isset($_SESSION['prenom']))
{
	header('Location: ../index.php');
	exit;
}*/

$music = $DB-> query('SELECT * FROM musique');
$music = $music->fetchAll();

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Produits - La boite a musique</title>	
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
	<link rel="stylesheet" href="../index.css">
</head>
<body>

	<?php 
		require_once ('../includes/bande_son.php');
	?>

	<div class="wrapper">
		<?php
			require_once("../includes/navbar.php");
		?>

	<div class="table-responsive">
                <table class="table table-striped tablacceuil">
                    <tr>
                        <th id="tabcat">Artiste</th>
                        <th id="tabcat">Nom de l'album</th>
                        <th id="tabcat">Genre</th>
                        <th id="tabcat">Prix vinyl</th>
                        <th id="tabcat">Prix cassette</th>
                    </tr>
                <?php
                    foreach($music as $mc){ 
                    ?>  
                        <tr>
                            <td>
                                <?= $mc['nom_artiste'] ?>
                            </td>
                            <td>
                                <a href="/commerce/E/pages/descriproducts.php?code_article=<?php echo $mc['code_article'] ?>"><?= $mc['nom_album'] ?></a>
                            </td>
                            <td>
                                <?= $mc['categorie_artiste'] ?>
                            </td>
                            <td>
                            	
                                <?= $mc['prix_vinyl'] ?>
                            </td>
                            <td>
                                <?= $mc['prix_cassette'] ?>
                            </td>
                        </tr>   
                    <?php
                    }
                ?>
            </div>
        </table>
        
    <?php require_once("../includes/footer.php");?>
    </div>
</body>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
  <script src="/commerce/E/index.js"></script>
</html>