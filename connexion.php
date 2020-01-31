
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

              <?php if (isset($_SESSION["loginco"])) { ?>
              <li class="btn">
                <a class="btnch" href="deconnexion.php">Deconnexion</a>
              </li>             
              <?php } ?>       
            </ul>

          </div>
        </nav>
      </header>

  <?php
  session_start();
  $connexion = mysqli_connect("localhost", "root", "", "livreor");

  if (isset($_SESSION["loginco"])) #si la personne est déjà connectée cela affiche ce message.
  {

    header("Location: index.php");
   
  }

  if (!isset($_SESSION["loginco"])) {
    ?>

      <h1 class="titreconnexion">Connexion</h1>
        <form class="formco" method="post" action="connexion.php">
          <input class="input_login_connexion" type="text" value="login" name="loginco" required>
          <input class="input_password_connexion" type="password" value="password" name="passwordco" required>
          <input class="buttonindex" type="submit" value="Connexion" name="bouttonco">
        </form>

    <?php
  }

  if (isset($_POST["bouttonco"])) {
    $request =  "SELECT login, password FROM utilisateurs WHERE login ='" . $_POST["loginco"] . "'";
    $query = mysqli_query($connexion, $request);
    $result = mysqli_fetch_assoc($query);
    if (!empty($result)) {

      if (password_verify($_POST['passwordco'], $result['password']))  {
        $_SESSION['loginco'] = $_POST['loginco'];
        $_SESSION['passwordco'] = $_POST['passwordco'];
        header("location:connexion.php");
      } else {
    ?>
        <h1 class="titreconnexion">Ton password n'est pas bon !</h1>
      <?php
      }
    } else {
      ?>
      <h1 class="titreconnexion">Ton nom d'utilisateur n'existe pas, peut être n'es tu pas a ta place ici ?</h1>
  <?php
      mysqli_close($connexion);
    }
  }

  ?>
  <!--<img src="images/reculesheitan.jpg"> !-->

</body>

</html>
<?php

?>