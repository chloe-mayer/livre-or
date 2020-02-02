<?php session_start();

$connexion = mysqli_connect('localhost', 'root', '', 'livreor');
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
          <input class="inputpro" type="password" name="cmdp"/>
         <?php include 'include-php/php-inscription.php' ?>

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