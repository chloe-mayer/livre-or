<?php
session_start();
$connexion = mysqli_connect("localhost", "root", "", "livreor");

/* if (!isset($_SESSION["loginco"])) {
    header("location:connexion.php");
}
*/
?>
<html>

<head>
  <meta charset="UTF-8">
  <title></title>
  <link rel="stylesheet" href="index.css">
  <link href="https://fonts.googleapis.com/css?family=Fondamento&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Underdog&display=swap" rel="stylesheet">
  <title>Livre d'Or</title>
</head>

<body class="body_livre">

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
                <a class="btnch" href="deco.php">Deconnexion</a>
              </li>             
              <?php } ?>       
        </ul>

      </div>
    </nav>
  </header>


  <main>

    <article id="blocklivre">
      <h1 class="livre_h1"> Livre d'or </h1>
    </article>

    <section class="section_com">
      <article class="commentaire_livre">
        <?php
        $connexion = mysqli_connect("localhost", "root", "", "livreor");
        $requete = "SELECT commentaire,date,login FROM commentaires JOIN utilisateurs ON commentaires.id_utilisateur = utilisateurs.id ORDER BY date DESC";
        $query = mysqli_query($connexion, $requete);
        $result = mysqli_fetch_all($query);

        $full = count($result);
        $i = 0;
        while ($i < $full) {
          $date = date('d-m-Y', strtotime($result[$i][1]));
          $log = ": " . $result[$i][2];
          echo "<h1> Posté le " . $date . " par " . $log . " :<br></h1>" . $result[$i][0];
          $i = $i + 1;
        }
        ?>
      </article>
    </section>

  </main>

</body>

</html>