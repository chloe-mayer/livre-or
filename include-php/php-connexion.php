<?php


if (isset($_POST['bouttonco'])) {
    $login = $_POST['login'];
    $request = "SELECT * FROM utilisateurs WHERE login ='" . $login . "'";  #selectionne le login et le password du tableau utilisateurs ou le login est égal au login entré dans l'input "login"
    $query = mysqli_query($connexion, $request);
    $result = mysqli_fetch_assoc($query);
    var_dump($result);


    if (empty($result)) {  # si l'ont trouve un resultat correspondant exécuter le code si dessous.

        echo "ce nom d'utilisateur n'existe pas";
    }

    if (!empty($result)) {


        if (password_verify($_POST['passwordco'], $result['password'])) {
            #si le mdp entré dans le post est égal au mdp dans la base de donnée, créer une session au nom du login.
            $_SESSION['id'] = $result['id'];
            $_SESSION['loginco'] = $result['login'];

            echo "Félicitation ! vous voilà connecté !";
            header("location:index.php");
?>
            <form method="POST">
                <input type="submit" value="deconnexion" name="deco_button">
            </form>
<?php

            if (isset($_POST['deco_button'])) {

                session_destroy();
                header("location:index.php");
            }
        } else {
            echo "le mot de passe est incorrect.";
        }
    }
}


?>