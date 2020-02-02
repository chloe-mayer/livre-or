
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="index.css">
    <title> Connexion </title>
    <link href="https://fonts.googleapis.com/css?family=Fondamento&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Underdog&display=swap" rel="stylesheet">

</head>

<body class="cobody">

  <header>
        <nav>
          <div class="topnav">

            <ul id="menuchlo">

              <li class="btn">
                <a class="btnch" href="livre-or.php">Livre D'or</a>
              </li>

              <li class="btn deroulant">
                <a class="btnch" href="Index.php">Accueil ↓ </a>
                  <ul class="sous">
                    <li><a id="comchlo" href="commentaire.php">Commentaire</a></li>
                  </ul>
              </li> 

              <li>
                <div id="diablechlo">
                  <img id="diablotin" src="diablotin1.jpg" width="90%">
                </div>
              </li>

              <li class="btn">
                <?php if (isset($_SESSION["loginco"])) { ?>
                <a class="btnch" href="profil.php">Profil</a>
              </li>      
                <?php } ?>
                <?php
          if (isset($_SESSION['loginco']))
          {
          ?>
          <li class="btn" >
            <a id="deco" href="deco.php">Déconnexion</a>
          </li>
          <?php
          }

          ?>
            </ul>

          </div>
        </nav>
      </header>

  <?php
  session_start();
  $connexion = mysqli_connect("localhost", "root", "", "livreor");

  if (isset($_SESSION["loginco"])) #si la personne est déjà connectée cela affiche ce message.
  {

    header("location:index.php");
   
  }

  if (!isset($_SESSION["loginco"])) {
    ?>

      <h1 class="titreconnexion">Connexion</h1>
        <form class="formco" method="post" action="connexion.php">
          <input class="input_login_connexion" type="text" placeholder="login" name="login" required>
          <input class="input_password_connexion" type="password" placeholder="password" name="passwordco" required>
          <input class="buttonindex" type="submit" value="Connexion" name="bouttonco">
        </form>

    <?php
  }include 'include-php/php-connexion.php'

  ?>
  <!--<img src="images/reculesheitan.jpg"> !-->

</body>

</html>
<?php

?>