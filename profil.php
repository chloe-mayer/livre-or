<?php
session_start();

$connexion = mysqli_connect("localhost", "root", "", "livreor");
?>

<html>

<head>

  <meta charset="UTF-8">
  <title>Qui veux tu être succube?</title>
  <link rel="stylesheet" href="index.css">
  <link href="https://fonts.googleapis.com/css?family=Fondamento&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Underdog&display=swap" rel="stylesheet">

</head>

<body id="profil">

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
              <!-- <img id="diablotin" src="diablotin1.jpg" width="90%"> !---->
            </div>
          </li>

          <li class="btn">
            <?php if (isset($_SESSION['loginco'])) {
            ?>

              <a class="btnch" href="profil.php">Profil</a>
            <?php } ?>
          </li>
          <?php
          if (isset($_SESSION['loginco'])) {
          ?>
            <li class="btn">
              <a id="deco" href="deco.php">Déconnexion</a>
            </li>
          <?php
          }

          ?>
        </ul>

      </div>
    </nav>
  </header>
  <section>

    <div>
      <img src="">
    </div>

    <div class="titre">
      <h1> PROFIL de <?php $logaf = $_SESSION['loginco'];
                      echo "<b>" . "$logaf" . "</b>";
                       ?></h1>
    </div>

    <div>
      <img src="">
    </div>
  </section>

  <form method="post" action="" enctype="multipart/form-data">

    <section class="sectionpro">

      <article>

        <fieldset class="fieldsetpro">

          <legend>
            <h1 class="titrepro">Informations :Avec quel blase voudras-tu être fouaillé(e)?</h1>
          </legend><br />

          <div class="infoblock">

            <label for="login" class="infopro">Login :</label><br />
            <input class="inputpro" type="textarea" name="login" placerholder="<?php echo $_SESSION['loginco']; ?> "/> <br /><br />
            <label for="mdp" class="infopro">Mot de passe :</label><br />
            <input class="inputpro" type="password" placeholder="MDP" name="mdp" />
            <input class="inputpro" type="password" placeholder="Nouveau MDP" name="new_mdp" />
            <input class="inputpro" type="password" placeholder="Confirmez nouveau MDP" name="cnew_mdp" />
            <input class="boutonpro" type="submit" name="confirm_update" value="Mettre à jour votre profil" />
            </div>
          <?php
           include 'include-php/profil-php.php'
          ?>

        </fieldset>

      </article>

    </section>

  </form>

  <article class="blockbouton">

    <div>
      </br></br>
    </div>

    <div>
      <a class="deco" href="deco.php"> Se déconnecter </a>
    </div>

  </article>
  </section>

</body>

</html>