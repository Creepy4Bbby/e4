<?php

Include 'Conf.php';

?>

<html>
    <header>
    <meta charset="utf-8">
        <!-- importer le fichier de style -->
        <link rel="stylesheet" href="assets/css/co.css" />
</header>
        <body>
        <div id="container">
            <!-- zone de connexion -->
            
            <form action="Connection.php" method="POST">
                <h1>Inscription</h1>

                <label><b>Nom</b></label>
                <input type="text" placeholder="Entrer Votre Nom" name="nom" required>

                <label><b>Adresse email</b></label>
                <input type="text" placeholder="Entrer Votre Email" name="login" required>

                <label><b>Mot de passe</b></label>
                <input type="password" placeholder="Entrer le mot de passe" name="mdp" required>

                <input type="submit" id='submit' value='LOGIN'>

                </form>
        </div>
    </body>
</html>