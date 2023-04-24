<?php 
//nous allons demarrer la session avant toute chose 
  session_start(); 
 if (isset($_POST['boutton-valider'])){
    if (isset($_POST['email']) && isset ($_POST['mdp'])) {// on verifie si l'utilisateur a rentré des informations
        // nous allons mettre l'email et le mot de passe dans des variables 
        $email = $_POST['email'] ;
        $mdp = $_POST['mdp'] ;
        $erreur = "";
        //nous allons verifier si les informations entree sont correctes
        //connexion a la base de donnée
        $nom_serveur = "localhost";
        $utilsateur = "root";
        $mot_de_passe ="";
        $nom_base_données = "form";
        $con =  mysqli_connect($nom_serveur,$utilsateur, $mot_de_passe, $nom_base_données);
        //requete pour selectionner touts l' utilisateur qui a pour email et mot de passe les identifinats qui ont ete entrees
        $req=mysqli_query($con , " SELECT * FROM utilisateurs  WHERE email = '$email' AND mdp = '$mdp' ");
        $num_ligne = mysqli_num_rows($req);
        if($num_ligne > 0){
            header("location:bienvenu.php "); //si le nombre de ligne est > 1 ? on sera redigire  vers la page bienvenu
            $_SESSION['email'] = $email;
        }else { //si non
            $erreur = "adresse email ou mot de passe incorrectes !";
            
        }
    }
 }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>formulaire de connexion </title>
</head>
<body>
    <section>
        <?php
        if(isset($erreur)) {//si la variable erreur existe , on affiche le contenu ;
            echo "<p class ='Erreur'>".$erreur. "</p>";
        }
        ?>
        <h1>connexion</h1>
        <form action="" method="POST">
            <label >Adresse mail </label>
            <input type="text" name="email">
            <label >mot de passe  </label>
            <input type="password" name="mdp" >
            <input type="submit" value="valider" name="boutton-valider">
        </form>
    </section>
</body>
</html>