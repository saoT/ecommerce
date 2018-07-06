<?php 

session_start();
require_once("../includes/includes.php");

if (!isset($_SESSION['prenom']))
{
	header('Location: ../index.php');
	exit;
}

$panier = $DB->query('SELECT * fROM commande');
$panier = $panier->fetch();

if(isset($_SESSION["cart_item"])){

    foreach ($_SESSION["cart_item"] as $item) {
        $id = $_SESSION['id'];
        $prix = $item['prix_vinyl'];
        $code_article = $item['code_article'];

        $panier = $DB->insert('INSERT INTO commande (id_client, code_article, prix_commande) VALUES (:id_client, :code_article, :prix_commande)', array('id_client' => $id, 'code_article' => $code_article, 'prix_commande' => $prix));
		
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