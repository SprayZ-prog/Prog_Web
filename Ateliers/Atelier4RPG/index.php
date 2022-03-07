
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="Styles/styles.css">
        <meta charset="UTF-8">
    </head>
    <body class="container">
        <h2>
            Atelier 1.4
        </h2>
        <p>Choisir votre classe pour le combat</p>
        <form method="get" action="Affrontement/affrontement.php">
            <div class="form-check">
                <input type="radio" class="form-check-input" id="radio1" name="Combattant" value="Guerrier" checked>
                <label class="form-check-label" for="radio1">Guerrier</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" id="radio2" name="Combattant" value="Magicien">
                <label class="form-check-label" for="radio2">Magicien</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" id="radio3" name="Combattant" value="Barbare">
                <label class="form-check-label" for="radio3">Barbare</label>
            </div>
            <button type="submit" class="btn btn-primary mt-3">Commencer</button>
        </form>
    
    </body>

</html>