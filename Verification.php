<?php
session_start();
if(isset($_POST['username']) && isset($_POST['password']))
{
    // connexion à la base de données
    $db_username = 'root';
    $db_password = '';
    $db_name = 'test';
    $db_host = 'localhost';
    $db_port = 3307;
    // $db = mysqli_connect($db_host, $db_username, $db_password,$db_name)
    //      or die('Impossible de se connecter à la BDD');

    $pdo = new PDO('mysql:host='.$db_host.';port='.$db_port.';db_name='.$db_name.'',$db_username,$db_password);

    // $pdo = new PDO('mysql:host='.$dbhost.';port='.$db_port.';dbname='.$db.'', $dbuser, $dbpasswd);


    $pdo->exec("SET CHARACTER SET utf8");
    
    // on applique les deux fonctions mysqli_real_escape_string et htmlspecialchars
    // pour éliminer toute attaque de type injection SQL et XSS
    // $username = mysqli_real_escape_string($db,htmlspecialchars($_POST['username'])); 
    // $password = mysqli_real_escape_string($db,htmlspecialchars($_POST['password']));
    
    if($username !== "" && $password !== "")
    {
        $requete = "SELECT count(*) FROM utilisateur where 
        nom_utilisateur = '".$username."' and mot_de_passe = '".$password."' ";
        $exec_requete = $pdo->query($pdo,$requete);
        $reponse      = $pdo->query($exec_requete);
        $count = $reponse['count(*)'];
        if($count!=0) // nom d'utilisateur et mot de passe correctes
        {
           $_SESSION['admin'] = 'YUMEKO';
           header("Location: Etat.php");
         
        }
        else
        {
           header('Location: Connection.php?erreur=1'); // utilisateur ou mot de passe incorrect
        }
    }
    else
    {
       header('Location: Connection.php?erreur=2'); // utilisateur ou mot de passe vide
    }
}
else
{
   header('Location: Connection.php');
}
// mysqli_close($db); // fermer la connexion
$pdo = null;
?>