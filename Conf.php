<?php
session_start();
if(isset($_POST['login']) && isset($_POST['mdp']))
{
    // connexion à la base de données
    $db_username = 'root';
    $db_password = '';
    $db_name = 'user';
    $db_host = 'localhost';
    $db_port = 3307;
    // $db = mysqli_connect($db_host, $db_username, $db_password,$db_name)
    //      or die('Impossible de se connecter à la BDD');

    $pdo = new PDO('mysql:host='.$db_host.';port='.$db_port.';db_name='.$db_name.'',$db_username,$db_password);

    // $pdo = new PDO('mysql:host='.$dbhost.';port='.$db_port.';dbname='.$db.'', $dbuser, $dbpasswd);


    $pdo->exec("SET CHARACTER SET utf8");
    
    // on applique les deux fonctions mysqli_real_escape_string et htmlspecialchars
    // pour éliminer toute attaque de type injection SQL et XSS
    $username = $_POST['login']; 
    $password = $_POST['mdp'];
    
    if($username !== "" && $password !== "")
    {
        $requete = "INSERT into 'user' FROM (login,mdp,nom) 
        VALUES ('$login','$nom','$mdp');
    
        $exec_requete = $pdo->query($pdo,$requete);
        $reponse = $pdo->query($exec_requete);
        $count = $reponse['count(*)'];
        if($count!=0) // nom d'utilisateur et mot de passe correctes
        {
            echo "<div class='sucess'>
            <h3>Vous êtes inscrit avec succès.</h3>
            <p>Cliquez ici pour vous <a href='login.php'>connecter</a></p>
      </div>";
        }
        ?>