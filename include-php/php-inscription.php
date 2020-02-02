    <?php
            if (isset($_POST["confirm_update"])) {
                $password = $_POST["mdp"];
                $passwordconfirm = $_POST['cmdp'];
                $login = htmlspecialchars($_POST["login"]);
                $request =  "SELECT login FROM utilisateurs WHERE login ='" . $_POST["login"] . "'";
                $query = mysqli_query($connexion, $request);
                $result = mysqli_fetch_array($query);

                if (!empty($result)) {
                   echo "Nom d'utilisateur déjà utilisé.";
               }

               else if ($password != $passwordconfirm) {
                   echo "les mots de passe ne correspondent pas";
               }
               else if (empty($result) && $password == $passwordconfirm) {
                $pass = password_hash($password, PASSWORD_BCRYPT);

               $request2= " INSERT INTO `utilisateurs` (`id`, `login`, `password`) VALUES (NULL,'" .$login . "','".$pass."')";
               $query2 = mysqli_query($connexion, $request2);
                echo "Le compte a bien été crée ! Bienvenue parmis nous !";
                header("location:index.php");

            }
         
            }

            ?>