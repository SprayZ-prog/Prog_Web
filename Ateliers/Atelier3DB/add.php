<?php 
$bd = new PDO('mysql:dbname=test;host=host.docker.internal;port=3306', 'root', 'root');  
if (isset($_POST['jeu']) && isset($_POST['categorie'])) {
    $jeu = $_POST['jeu'];
    $categorie = $_POST['categorie'];
    $query = $bd->prepare("INSERT INTO jeux (id, nom, categ_id) VALUES (NULL, '$jeu', '$categorie');");
    $query->execute();
    header("location: index.php");
}?>
<!DOCTYPE html>
<html>
    <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="styles.css">
    </head>
    <body class="container">
        <h1>Ajouter un jeu</h1>
    <form class="form-inline" method="post">
        <div class="form-group">
            <label class="my-1 mr-2" for="inlineFormCustomSelectPref">Nom</label>
            <input id="nom" type="text" class="form-control" name="jeu" required>
        </div>
        <div class="form-group">
            <label class="my-1 mr-2" for="inlineFormCustomSelectPref">Catégorie</label>
            <select class="custom-select my-1 mr-sm-2 form-control" id="inlineFormCustomSelectPref" name="categorie">
                <?php
                $query = $bd->prepare("SELECT id, nom FROM categorie");
                $query->execute();
                $categs = $query->fetchAll();
                $selected = true;
                foreach ($categs as $categ) {
                    if ($selected) {
                        ?> <option value="<?= $categ[0] ?>" selected><?=$categ[1]?></option>
                        <?php
                        $selected = false;
                    }
                    else {
                        ?> <option value="<?= $categ[0] ?>"><?=$categ[1]?></option>
                        <?php
                    }
                    
                } ?>
            </select>
            
        </div>
        <button type="submit"class="btn btn-primary my-1">Enregistrer</button>
        <button type="cancel" name="Annuler" class="btn btn-secondary" onclick="location.href = 'index.php'">Annuler</button>
    </form>
</body>
</html>