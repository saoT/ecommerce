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
  $Adressen = htmlspecialchars(ucfirst(trim($Adressen)));
  $Cpn = htmlspecialchars(ucfirst(trim($Cpn)));
  $Villen = htmlspecialchars(ucfirst(trim($Villen)));
  if($valid)
  { 
  $DB->update('UPDATE client SET adresse_client ="'.$Adressen.'",cp_client ="'.$Cpn.'",ville_client="'.$Villen.'" WHERE id_client="'.$_SESSION["id"] .'"');

    $_SESSION['flash']['success'] = "Votre modification a bien été prise en compte !";
    header('Location: ../pages/profil.php');
    exit;  
  } 
} 
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
  <link rel="stylesheet" href="../index.css">
  <title>Modifprofil</title>
</head>
<body>
  <div class="inscrimage">
    <div class="inscription">
      <?php 
      if(isset($_SESSION['flash']))
      { 
        foreach($_SESSION['flash'] as $type => $message): 
        endforeach;
        unset($_SESSION['flash']);
      }
      ?> 
      <div class="formulaire">
        <h1 class="index-h1">Modif Profil</h1>
        <form method="post" action="modifprofil.php">
          <div class="s125">
            <div id="infoper" class="blok">
              <br>
              <div id="infociv" class="blok">
              <label>* Adresse :</label>
              <br>
              <input class="input" type="text" name="Adressen" placeholder="Nouvelle adresse" value="<?php if (isset($Adressen)) echo $Adressen; ?>" maxlength="20" required="required">  
              <br>                                  
              <label>* Ville :</label>
              <br>
              <input class="input" type="text" name="Villen" placeholder="Nouvelle ville" value="<?php if (isset($Villen)) echo $Villen; ?>" maxlength="20" required="required">  
              <br>
              <label>* Code Postal :</label>
              <br>
              <input class="input" type="number" name="Cpn" placeholder="Nouveau CP" value="<?php if (isset($Cpn)) echo $Cpn; ?>" maxlength="5" required="required">  
              <br>
              <br>
              </div>
            </div>
          </div>
        </form>
        <div id="inscribot">
          <button id="btn-inscr" type="submit">Modifier</button>
          <p>Retour à l'<a href="../index.php">accueil !</a></p>  
        </div>
      </div>
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
  <script src="./index.js"></script>
</body>
</html>
