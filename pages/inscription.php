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
  $Mail = htmlspecialchars(trim($Mail));
  $Nom = htmlspecialchars(ucfirst(trim($Nom)));
  $Prenom = htmlspecialchars(ucfirst(trim($Prenom)));
  $Adresse = htmlspecialchars(ucfirst(trim($Adresse)));
  $Cp = htmlspecialchars(ucfirst(trim($Cp)));
  $Ville = htmlspecialchars(ucfirst(trim($Ville)));
  $Tel = htmlspecialchars(ucfirst(trim($Tel)));
  $Password = trim($Password);
  $PasswordConfirmation = trim($PasswordConfirmation);
  
  /*if(empty($Nom))
  {
    $valid = false;
    $_SESSION['flash']['danger'] = "Veuillez mettre un pseudo !";
  }
  
  if(empty($Mail))
  {
    $valid = false;
    $_SESSION['flash']['danger'] = "Veuillez mettre un mail !";
  }*/
  
  $req = $DB->query('Select mail_client from client where mail_client = :mail_client', array('mail_client' => $Mail));
  $req = $req->fetch();

  if(!empty($Mail) && $req['mail_client'])
  {
    $valid = false;
    echo "Ce mail existe déjà.";;  
  }
  if(!preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#", $Mail))
  {
    $valid = false;
    echo "Veuillez mettre un mail conforme !";
  }
  if(empty($Password))
  {
    $valid = false;
    echo "Veuillez renseigner votre mot de passe !";
  }
  elseif($Password && empty($PasswordConfirmation))
  {
    $valid = false;
    echo "Veuillez confirmer votre mot de passe !";  
  }
  elseif(!empty($Password) && !empty($PasswordConfirmation))
  {
    if($Password != $PasswordConfirmation)
    {
      $valid = false; 
      echo "La confirmation est différente !";
    }
  }
  if($valid)
  { 
    $DB->insert('INSERT INTO client (nom_client, prenom_client, adresse_client, cp_client, ville_client, mail_client, tel_client, password) values (:nom_client, :prenom_client, :adresse_client, :cp_client, :ville_client, :mail_client, :tel_client, :password)', array('nom_client' => $Nom, 'prenom_client' => $Prenom, 'adresse_client' => $Adresse, 'cp_client' => $Cp, 'ville_client' => $Ville, 'mail_client' => $Mail, 'tel_client' => $Tel, 'password' => crypt($Password, '$2a$10$1qAz2wSx3eDc4rFv5tGb5t')));
    
    echo "Votre inscription a bien été prise en compte, connectez-vous !";
    header('Refresh: 3;url= /commerce/E/index.php');
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
  <title>La Boite à musique</title>
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
      <form method="post" action="inscription.php">
      <div class="formulaire">
        <h1 class="index-h1">Inscription</h1>
          <div class="s125">
            <div id="infoper" class="blok">
              <label>* Nom :</label>
              <br>
              <input class="input" type="text" name="Nom" placeholder="Nom" value="<?php if (isset($Nom)) echo $Nom; ?>" maxlength="20" required>  
              <br>
              <label>* Prenom :</label>
              <br>
              <input class="input" type="text" name="Prenom" placeholder="Prenom" value="<?php if (isset($Prenom)) echo $Prenom; ?>" maxlength="20" required>  
              <br>
              <label>* Mail :</label>
              <br>
              <input class="input" type="email" name="Mail" placeholder="Votre mail" value="<?php if (isset($Mail)) echo $Mail; ?>" required>  
              <br>
              <label for="Password">* Mot de passe :</label>
              <br>
              <?php
              if(isset($error_password))
              {
                echo $error_password."<br/>";
              } 
              ?>
              <input class="input" type="password" name="Password" placeholder="Mot de passe" value="<?php if (isset($Password)) echo $Password; ?>" required>
              <br>
              <label>* Confirmez votre mot de passe :</label>
              <br>
              <?php
              if(isset($error_passwordConf))
              {
                echo $error_passwordConf."<br/>";
              } 
              ?>
              <input class="input" type="password" name="PasswordConfirmation" placeholder="Confirmation du mot de passe" required>
            </div>
            <div id="infociv" class="blok">
              <label>* Adresse :</label>
              <br>
              <input class="input" type="text" name="Adresse" placeholder="Adresse" value="<?php if (isset($Adresse)) echo $Adresse; ?>" maxlength="20" required>  
              <br>                                  
              <label>* Ville :</label>
              <br>
              <input class="input" type="text" name="Ville" placeholder="Ville" value="<?php if (isset($Ville)) echo $Ville; ?>" maxlength="20" required>  
              <br>
              <label>* Code Postal :</label>
              <br>
              <input class="input" type="number" name="Cp" placeholder="Code Postal" value="<?php if (isset($Cp)) echo $Cp; ?>" maxlength="5" required>  
              <br>                   
              <label>* Tel :</label>
              <br>
              <input class="input" type="tel" name="Tel" placeholder="Tel" value="<?php if (isset($Tel)) echo $Tel; ?>" maxlength="10" required>  
              <br>
            </div>
          </div>
        
        <div id="inscribot">
          <button class="butinscri"id="btn-inscr" type="submit">S'inscrire</button>
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
