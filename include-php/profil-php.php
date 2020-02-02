
<?php

if (!isset($_SESSION['loginco'])) {
    header("location:index.php");
}


if (isset($_POST['confirm_update'])) {

    $request = "SELECT * FROM utilisateurs WHERE id = '" . $_SESSION['id'] . "'";
    $query = mysqli_query($connexion, $request);
    $result = mysqli_fetch_assoc($query);
    $login = $result["login"];
    $log = htmlspecialchars($_POST["login"]);

    if (empty($_POST['mdp'])) {

        echo "Veuillez entrez un mot de passe.";
    } else if (password_verify($_POST['mdp'], $result['password'])) {

        if (!empty($_POST["login"])) {
            $request2 = "SELECT * FROM utilisateurs WHERE login = '" . $log . "'";
            $query2 = mysqli_query($connexion, $request2);
            $result2 = mysqli_fetch_assoc($query);

            if (empty($result2['login'])) {

                if (!empty($log) && $log != $result2['login']) {
                    $request3 = "UPDATE utiisateurs SET login='" . $log . "' WHERE id = '" . $_SESSION['id'] . "'";
                    $query3 = mysqli_query($connexion, $request3);
                    $_SESSION['loginco'] = $log;

                    echo "Votre login a été modifié avec succès.";
                } else {
                    echo "Ce Login est déjà utilisé";
                }
            }
            if (!empty($_POST['new_mdp']) && !empty($_POST['cnew_mdp'])) {

                if ($_POST['new_mdp'] == $_POST['cnew_mdp']) {
                    $request4 = "UPDATE utilisateurs SET password='" . password_hash($_POST['cnew_mdp'], PASSWORD_BCRYPT) . "' WHERE id = '" . $_SESSION['id'] . "'";
                    $query4 = mysqli_query($connexion, $request4);

                    echo "Votre mot de passe a été mis a jour.";
                } else {

                    echo "Les mots de passe ne correspondent pas.";
                }
            }
            
        }
        header("Refresh:1;URL=profil.php");
    } else {

        echo "le mot de passe est éronné.";

        
    }
   
}

if (isset($_POST['deco_button'])) {

    session_destroy();
    header("location:index.php");
}
