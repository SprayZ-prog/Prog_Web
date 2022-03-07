<?php
// À optimiser: METTRE DES BINDVALUE pour mes requetes, mettre en post et ne pas être obliger de créer une deuxieme page modify et add, Créer la table si elle n'existe pas.
include 'bd.php';
$query = $bd->prepare("SELECT * FROM jeux");
$query->execute();
$find = $query->fetch();


/*if (isset($_POST['username'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    //if (strlen($username) < 10) 
    
    //(sans sécurité) : $bd->query("INSERT INTO users (username, password) VALUES ('$username','$password')");
    //echo $bd->lastInsertId();
    
    /*Contrer injection sql
    $query = $bd->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
    $query->bindParam(1, $username, PDO::PARAM_STR);
    $query->bindParam(2, $password, PDO::PARAM_STR);
    $query->execute([$username, password_hash($password, PASSWORD_DEFAULT)]); 

    $query = $bd->prepare("SELECT * FROM users WHERE username = ?");
    $query->bindParam(1, $username);
    $query->execute();
    $user = $query->fetch()
    // fetch retourne le dernier résultat de la requête en mémoire pour la mettre dans une variable 
    if ($user) {
        if (password_verify($password, $user->password)) {
            echo "login réussi";
        }
        else {
            echo "mauvais mot de passe";
        }
        
    }
    else {
        $query = $bd->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
        $query->bindParam(1, $username, PDO::PARAM_STR);
        $query->bindParam(2, $password, PDO::PARAM_STR);
        $query->execute([$username, password_hash($password, PASSWORD_DEFAULT)]);
    }
    bindValue
} */
?>
<!DOCTYPE html>
<html>
    <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="styles.css">
        
    </head>
    <body class="container">
        <header>
            
            <h1  style="display:inline-block;">Ma liste de jeux </h1> 
            <a href="add.php" class="primary">
            <svg xmlns="http://www.w3.org/2000/svg" width="1.6rem" height="1.6rem" fill="currentColor" class="bi bi-plus-circle-fill mb-1" viewBox="0 0 16 16">
                <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z"/>
            </svg>
            </a>

        </header>
        <?php
            
            if ($find) {
                $i = 1;
                echo "<ul class='list-group d-flex'>";
                $query = $bd->prepare("SELECT jeux.id, jeux.nom, categorie.nom FROM jeux INNER JOIN categorie ON jeux.categ_id = categorie.id");
                $query->execute();
                $find = $query->fetchAll();
                foreach ($find as $item) {

                    echo "<li class='list-group-item d-flex'>";
                    
                    echo "<p class='flex-grow-1'>$item[1]<span class='text-muted'> - $item[2]</span></p>" ?>
                     
                    <button onclick="location.href = 'modify.php?id=<?=$item[0] ?>'" class="btn btn-primary rounded-start rounded-0 me-1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                        <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
                        </svg>
                    </button>
                    <button type="submit" onclick="location.href = 'delete.php?id=<?=$item[0] ?>'" class="btn btn-danger rounded-end rounded-0">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                        <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
                        </svg>
                    </button>
                    </li>
                    
                    <?php
                    $i++;
                }
                echo '</ul>';
            }

        ?> 
    </body>
</html> 
