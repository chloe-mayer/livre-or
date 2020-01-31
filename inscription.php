<?php session_start();

$connect = mysqli_connect('localhost', 'root', '', 'livreor');
$error = '';


if (isset($_SESSION['loginco'])) {
  header('Location: index.php');
}
if (isset($_POST['confirm_update'])) {
  $login = $_POST['login'];
  $mdp = $_POST['mdp'];
  $cmdp = $_POST['cmdp'];
  $query = "SELECT login FROM utilisateurs WHERE login = '$login'";
  $executequery = mysqli_query($connect, $query);
  $verify = mysqli_num_rows($executequery);

  if ($verify == 0) {

    if (strlen($mdp) && strlen($cmdp) > 3) {

      if ($mdp == $cmdp) {
        $mdp = password_hash($mdp, PASSWORD_BCRYPT);
        $insertmbr = "INSERT INTO utilisateurs(login,password) VALUES('$login','$mdp')";
        $executequeryall = mysqli_query($connect, $insertmbr);
        header('Location: connexion.php');
      } else {

        $error = 'Les mots de passes ne correspondent pas';
      }
    } else {

      $error = 'Ton mot de passe est trop court le sang';
    }
  } else {

    $error = 'Ce pseudo est déja existant';
  }
}

?>

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