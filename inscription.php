<?php session_start();

$connect = mysqli_connect('localhost', 'root', '', 'livreor');
$error = ''; ?>
<html>

<head>

  <meta charset="UTF-8">
  <title>Qui es tu mécréant?</title>
  <link rel="stylesheet" href="index.css">
  <link href="https://fonts.googleapis.com/css?family=Fondamento&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Underdog&display=swap" rel="stylesheet">

</head>

<body id="inscription">

  <header id="headerins">

    <div class="topnavins">

      <img src="">
      <h1 id="titreins">Inscription</h1>

    </div>

  </header>

  <form action="inscription.php" method="post">

    <section class="sectionins">

      <article>

        <fieldset class="fieldsetins">

          <legend id="legendins">
            <h1 id="titreins1">Informations : A quelles sauces veux-tu être malmené(e) ?</h1>
          </legend><br />

          <label for="login" class="infopro">Login :</label>

          <input class="inputpro" type="text" name="login"> <br /><br />


          <label for="mdp" class="infopro">Mot de passe :</label>
          <input class="inputpro" type="password" name="mdp" /><br>

          <label for="mdp" class="infopro">Confirmation du mot de passe :</label>
          <input class="inputpro" type="password" name="cmdp" />

        </fieldset>
        <?php
      if (isset($_POST["confirm_update"])) {
        $password = $_POST["mdp"];
        $passwordconfirm = $_POST['cmdp'];
        $login = htmlspecialchars($_POST["login"]);
        $request =  "SELECT login FROM utilisateurs WHERE login ='" . $_POST["login"] . "'";
        $query = mysqli_query($connect, $request);
        $result = mysqli_fetch_array($query);

        if (!empty($result)) {
          ?>
          <p class="infopro"> Ce nom de compte est déjà utilisé</p>
          <?php
        } else if ($password != $passwordconfirm) {
          ?>
          <p class="infopro"> Les mots de passe ne correspondent pas. </p>
          <?php
        } else if (empty($result) && $password == $passwordconfirm) {
          $pass = password_hash($password, PASSWORD_BCRYPT);

          $request2 = " INSERT INTO `utilisateurs` (`id`, `login`, `password`) VALUES (NULL,'" . $login . "','" . $pass . "')";
          $query2 = mysqli_query($connect, $request2);
          ?>
          <p class="infopro"> compte a bien été crée ! Bienvenue parmis nous ! </p>
          <?php
           header ("location:index.php");
        }
      }

      ?>
      </article>

    </section>

    <section class="blockbouton">

      <div>

        <br /><input class="boutonpro" type="submit" name="confirm_update" value="Allez viens, on est bien.." /></br></br>

      </div>


      <?php echo $error; ?>

    </section>


  </form>

  <section>

    <article class="articleins">

      <h2 id="charteins">Citation</h2>

      <p id="loi-ins">
        "Dieu donne le gouvernail, mais le diable donne les voiles"
      </p>

    </article>

  </section>


</body>

</html>