<?php
session_start();
$connexion = mysqli_connect("localhost", "root", "", "livreor");

?>

<html lang="fr">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="index.css">
    <title> Hades </title>
    <link href="https://fonts.googleapis.com/css?family=Fondamento&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Underdog&display=swap" rel="stylesheet">

</head>

<body class="accueil">
    <header>
        <?php
        if (isset($_SESSION["loginco"])) {

        ?>
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

                        <li class="btn">
                            <a class="btnch" href="profil.php">Profil</a>
                        </li>
                    </ul>

                </div>
            </nav>

    </header>
<?php }
?>

<main>

    <div class="homeleftdiv">
        <h1 class="h1accueil">Bienvenue chez vous !</h1>
        <h3 class="h3accueil">On a appris la nouvelle.</br>Entrez donc, ne soyez pas timides !</h3>

        <?php

        if (!isset($_SESSION["loginco"])) {
        ?>
        <div class="co">
            <p class="paccueil"> Inscrivez vous ! : </p>

            <form action="inscription.php">
            <input class="buttonindex" type="submit" value="S'inscrire" name="buttoninscr">
            </form>

            <p class="paccueil">Connectez vous ! : </p>
            <form action="connexion.php">
            <input class="buttonindex" type="submit" value="Connexion" name="buttonco"></a>
            </form>

        </div>
    </div>

    <div class="rightdiv">
        <img src="hellgates.jpg" height=950px>
    </div>



<?php } else if (isset($_SESSION["loginco"])) {
?>
    <div class="homeleftdiv">
        <p> Oh je vois que vous êtes un habitué, parfait ! Entrez donc !</p>
    </div>

    <form method="post">
        <a class="buttonindex" href="livre-or.php"><input type="submit" value="Livre d'or" name="buttonlivre"></a>
        <input type="submit" value="deconnexion" name="buttondeco">
    </form>
    
    <?php
            if (isset($_POST['buttondeco'])) {


                session_destroy();
                header("Location: connexion.php");
            }
    ?>

    <div class="rightdiv">
        <img src="images/hellgates.jpg" height=950px>
    </div>


<?php }
?>

</main>

<footer>
</footer>
</body>


</html>