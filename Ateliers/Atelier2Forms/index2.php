<?php

    if (trim($_POST['prenom']) && ($_POST['nom'])) {
       $nom =  "<p>" . $_POST['prenom'] . " " . $_POST['nom'] . "</p>";
    }
    else {
        header('location: index.php');
        die();
    }
    ?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="Styles/styles.css">
</head>
<body>


    <h1>Votre nom</h1>
    <p><?php echo "$nom" ?></p>
    <a href="index.php">Retour au formulaire</a>
    
</body>
</html>
