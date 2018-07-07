<?php 

session_start();
require_once("../includes/includes.php");

if (!isset($_SESSION['prenom']))
{
	header('Location: ../index.php');
	exit;
}
		date_default_timezone_set('Europe/Paris');
		$date_creation = date('Y-m-d H:i:s');

$panier = $DB->query('SELECT * fROM commande');
$panier = $panier->fetch();

// random(ish) 5 digit int
$random_number = intval( "0" . rand(1,9) . rand(0,9) . rand(0,9) . rand(0,9) . rand(0,9) ); 

// random(ish) 5 character string
$random_string = chr(rand(65,90)) . chr(rand(65,90)) . chr(rand(65,90)) . chr(rand(65,90)) . chr(rand(65,90)); 

//Create a unique var foru commande Number
$random = $random_number.$random_string;

if(isset($_SESSION["cart_item"])){

    foreach ($_SESSION["cart_item"] as $item) {
        $id = $_SESSION['id'];
        $prix = $item['prix_vinyl'];
        $code_article = $item['code_article'];

        $panier = $DB->insert('INSERT INTO commande (id_client, code_article, prix_commande, date_commande, num_commande) VALUES (:id_client, :code_article, :prix_commande, :date_creation, :num_commande)', array('id_client' => $id, 'code_article' => $code_article, 'prix_commande' => $prix , 'date_creation' => $date_creation, 'num_commande' => $random));
		
		unset($_SESSION["cart_item"]);
    }
}  

echo "Votre commande a bien été prise en compte";
header('Refresh:3; url= /commerce/E/pages/profil.php ')
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Pouet</title>
</head>
<body>
	
</body>
</html>