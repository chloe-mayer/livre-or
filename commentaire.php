<?php session_start() ;


?>

<html>

  <head>

    <meta charset="UTF-8">
    <title>Doléances</title>
    <link rel="stylesheet" href="index.css">
    <link href="https://fonts.googleapis.com/css?family=Fondamento&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Underdog&display=swap" rel="stylesheet">

  </head>

<body id="commentaire">

<header> <a href=""></a>
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
                </div>
              </li>

              <li class="btn">
                <a class="btnch" href="profil.php">Profil</a>
              </li>             
            </ul>

          </div>
      </nav>
  </header>

  <h2 id="com">Commentaire</h2>

  <section id="sectioncom">

    <article class="articlecom">
    <form method="POST">
        <div>
          <p class="textcom" id="textcom1">Dis nous ce que tu penses, tes ressentis ci dessous :</p>
        </div>
      
        <div id="divtext">
          <input id="inputcom" type="text" style="height:135px;" name="com" required>
        </div>
      
        <div>
          <br /><input class="boutonpro" type="submit" name="confirm_update" value="Confirmer" /></br></br>
        </div>
    </form>
      <?php 

      if (isset($_POST["confirm_update"])) {
        $log = $_SESSION['loginco'];
        $message = $_POST['com'];
        $connexion = mysqli_connect("localhost", "root", "", "livreor");
        $requete =  "SELECT `id` FROM `utilisateurs` WHERE login ='" . $log . "'";
        $query =  mysqli_query($connexion, $requete);
        $result = mysqli_fetch_all($query);
        var_dump($result);
        $requete2 = "INSERT INTO `commentaires`(`id`, `commentaire`, `id_utilisateur`, `date`) VALUES (NULL, '".$message."', '".$result[0][0]."', curdate())";
        $query2 = mysqli_query($connexion, $requete2);
      }

      ?>
  
      <div>
        <p class="textcom">( Bien evidemment, on ne pourras rien y faire) <br>
          T'avais pas qu'a être là baby. Tu auras tout ton temps; alors plains toi tant que tu le souhaites.<br>
          On adore !</p>
      </div>

    </article>

  </section>

  </body>

</html>