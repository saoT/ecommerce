<?php 
session_start();
require_once("../includes/bande_son.php");
include_once('../includes/includes.php');

if(isset($_SESSION['pseudo']))
{
  header('Location: ../index.php');
  exit;
}

if(!empty($_POST))
{
  extract($_POST);
  $valid = true;
  $artiste = htmlspecialchars(trim($artiste));
  $catego = htmlspecialchars(trim($catego));
  $prix_vi = htmlspecialchars(trim($prix_vi));
  $prix_cass = htmlspecialchars(trim($prix_cass));
  $album = htmlspecialchars(trim($album));
  $descri = htmlspecialchars(trim($descri));
  $pochette = htmlspecialchars(trim($pochette));
  $id = trim($id);
  
  $req = $DB->query('SELECT * from musique');
  $req = $req->fetchAll();

  if($valid)
	{ 
$DB->insert('INSERT INTO musique (id_artiste, nom_artiste, categorie_artiste, prix_vinyl, prix_cassette, nom_album, description_musique, pochette) values (:id_artiste ,:nom_artiste, :categorie_artiste, :prix_vinyl, :prix_cassette, :nom_album, :description_musique, :pochette)', array('id_artiste' =>$id ,'nom_artiste' => $artiste, 'categorie_artiste' => $catego, 'prix_vinyl' => $prix_vi, 'prix_cassette' => $prix_cass, 'nom_album' => $album, 'description_musique' => $descri, 'pochette' => $pochette));
    } 
} 
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
  <link rel="stylesheet" href="../index.css">
  <title>La Boite à musique</title>
</head>
<body>
  <div class="inscrimage">
    <div class="inscription">
      <form method="post" action="admin.php">
      <div class="formulaire">
        <h1 class="index-h1">Ajouter un article</h1>
          <div class="s125">
            <div id="infoper" class="blok">
              <br>
              <label>* Catego :</label>
              <br>
              <input class="input" type="text" name="catego" placeholder="categorie artiste" value="<?php if (isset($catego)) echo $catego; ?>" maxlength="20" required>  
              <br>
              <label>* Artiste :</label>
              <br>
              <input class="input" type="text" name="artiste" placeholder="Nom de l'artiste" value="<?php if (isset($artiste)) echo $artiste; ?>" required>  
              <br>
				    <label>* Id de l'artiste :</label>
              <br>
              <input class="input" type="number" name="id" placeholder="Prix de la cassette" value="<?php if (isset($id)) echo $id; ?>" maxlength="5" required>  
              <br>  
              <label>* Pochette :</label>
              <input class="input" type="file" name="pochette" placeholder="Mot de passe" value="<?php if (isset($pochette)) echo $pochette; ?>" required>
              <br>
              <label>* Album :</label>
              <br>
              <input class="input" type="text" name="album" placeholder="Nom de l'album" value="<?php if (isset($album)) echo $album; ?>" maxlength="20" required>  
              <br>
              <label>* Prix du vinyl :</label>
              <br>
              <input class="input" type="number" name="prix_vi" placeholder="Prix du vinyl" value="<?php if (isset($prix_vi)) echo $prix_vi; ?>" maxlength="20" required>  
              <br>                                  
              <label>* Prix de la casette :</label>
              <br>
              <input class="input" type="number" name="prix_cass" placeholder="Prix de la cassette" value="<?php if (isset($prix_cass)) echo $prix_cass; ?>" maxlength="5" required>  
              <br>                   
              <label>* descri :</label>
              <br>
              <input class="input" type="text" name="descri" placeholder="Description de la musique" value="<?php if (isset($description_musique)) echo $description_musique; ?>" required>  
              <br>
          </div>
        
        <div id="inscribot">
          <button class="butinscri"id="btn-inscr" type="submit">Ajouter</button>
          <p>Retour à l'<a href="../index.php">accueil !</a></p>  
        </div>
      </div>
      </form>
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
  <script src="/commerce/E/index.js"></script>
</body>
</html>
