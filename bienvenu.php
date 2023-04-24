<?php
// on demarre la session sur cette page 
session_start();
// ensuite on affiche le contenue 
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>bienvenue</title>
</head>
<body>
    <?php
    // ensuite on affiche le contenu de la variable session       
     echo " <p class='message'>bonjour  ". $_SESSION['email'] ."</p>" ;
    ?>
</body>
</html>