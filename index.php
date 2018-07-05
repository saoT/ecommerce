<?php
session_start();
$titre="Connexion";
$titre="Enregistrement";
include("./includes/connexionDB.php");
include_once('./includes/includes.php');

if(isset($_SESSION['prenom']))
{
  header('Location: ./pages/page_acceuil.php');
  exit;
}

if(!empty($_POST))
{
  extract($_POST);
  $valid = true;
  
  $Mail = htmlspecialchars(trim($Mail));
  $Password = trim($Password);

  if(empty($Mail))
  {
    $valid = false;
    $_SESSION['flash']['warning'] = "Veuillez renseigner votre mail !";
  }
  
  if(empty($Password))
  {
    $valid = false;
    $error_password = "Veuillez renseigner un mot de passe !";
  }
  
  
  $req = $DB->query('Select * from client where mail_client = :mail_client and password = :password', array('mail_client' => $Mail, 'password' => crypt($Password, '$2a$10$1qAz2wSx3eDc4rFv5tGb5t')));
  $req = $req->fetch();

  if(!$req['mail_client'])
  {
    $valid = false;
    $_SESSION['flash']['danger'] = "Votre mail ou mot de passe ne correspondent pas";
  }
  
  
  if($valid)
  {
    $_SESSION['id'] = $req['id_client'];
    $_SESSION['nom'] = $req['nom_client'];
    $_SESSION['prenom'] = $req['prenom_client'];
    $_SESSION['adresse'] = $req['adresse_client'];
    $_SESSION['ville'] = $req['ville_client'];
    $_SESSION['cp'] = $req['cp_client'];
    $_SESSION['tel'] = $req['tel_client'];
    $_SESSION['mail'] = $req['mail_client'];
    $_SESSION['password'] = $req['password'];  
    $_SESSION['flash']['info'] = "Bonjour " . $_SESSION['prenom'];
    header('Location: ./pages/page_acceuil.php');
    exit;
  }
  
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
  <link rel="stylesheet" href="index.css">
  <title>La Boite à musique</title>
</head>
<body>
  <?php 
  require_once("./includes/bande_son.php"); 
  ?>
  <div class="Texte_accueil">
    <h2>Bienvenue sur La Boite à musique, le premier site numérique 100% analogique </h2>
  </div>
  
  <div class="indeximage">
    <div class="Connexion">
      <h1>Connexion</h1>
      <div class="full-width login tcenter">
       <!-- LOG IN --> 
       <form class="con-form" method="post" action="">
        <label>Mail :</label><br><br>
        <input class="input" type="email" name="Mail" placeholder="Mail" value="<?php if (isset($Mail)) echo  $Mail; ?>" required="required">  
        <br>
        <br>
        <label>Mot de passe :</label><br>
        <?php
        if(isset($error_password)){
          echo $error_password."<br/>";
        } 
        ?>
        <input class="input" type="password" name="Password" placeholder="Mot de passe" value="<?php if (isset($Password)) echo $Password; ?>" required="required">

        <div class="btn-con">
          <button type="submit" class="butinscri" id="butinscri2">Se connecter !</button>
        </div>
      </form> 
    </div>
    <p>Pas encore inscrit ? <a href="pages/inscription.php">Inscrivez-vous !</a></p>
  </div>
</div>
<?php
require_once("./includes/footer.php");
?>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
<script src="./index.js"></script>
</body>
</html>
