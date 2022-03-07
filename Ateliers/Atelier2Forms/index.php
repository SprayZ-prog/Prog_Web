<?php 
$list = ["Dark Souls 1", "Dark Souls 2", "Dark Souls 3", "GTA 5", "Assassin's Creed", "Sea of thieves", "Red Dead Redemption", "Riders Republic", "The Escapists 2", "Watch Dogs 2"]; 
if (isset($_POST['nb1']) && isset($_POST['nb2'])) {
    $nb1 = intval($_POST['nb1']);
    $nb2 = intval($_POST['nb2']);
    $ppcm = PPCM($nb1, $nb2);
    $pgcd = PGCD($nb1, $nb2);
    
    
}
else {
    $nb1 = ' ';
    $nb2 = ' ';
    $ppcm = ' ';
    $pgcd = ' ';
}
function PGCD(int $nb1, int $nb2): int {
    $rep = 1;
    if ($nb1 < $nb2) {
        $max = $nb1;
    }
    else {
        $max = $nb2;
    }

    for ($i = 1; $i <= $max; $i++) {
        if ($nb1 % $i == 0 && $nb2 % $i == 0) {
            $rep = $i;
        }
        
    }
    return $rep;
    }
function PPCM(int $nbr1, int $nbr2) : int {
    return ($nbr1 * $nbr2) / PGCD($nbr1, $nbr2);
}
/*
    sort($list);
    if (isset($_GET['filtre'])) {
        $list = array_filter($list, function($s) {      $s = chaque item de $list c'est comme un foreach en paramètres
            return str_contains($s, $_GET['s']);
        }); 
    }
*/
?>

<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="Styles/styles.css">
        <title>Atelier 2</title>
    </head>
    <body>
        <div class="container">
            <div>
                <h2>Numéro 1</h2>
                <form method="get" action="index.php">
                    <div class="form-group">
                        <label for="filtre"><strong>Filtre</strong></label>
                        <input class="form-control"
                            type="text"
                            id="filtre"
                            name="filtre">
                    </div>
                    <button type="submit"
                            class="btn btn-primary mt-2 mb-2">
                        Filtrer
                    </button>
                </form>
                <ul class="list-group">
                    <?php 
                    if (isset($_GET['filtre'])) {

                        $filter = $_GET['filtre'];
                        
                        foreach ($list as $item) {
                            $pos = strpos($item, $filter);
                            if ($pos !== false) {
                                echo '<li class="list-group-item">' . $item . '</li>';
                            }
                        }
                    }
                    else {
                        for ($i = 0; $i < count($list); $i++) { 
                        echo '<li class="list-group-item">' . $list[$i] . '</li>';
                        } 
                    }
                    ?>
                </ul>
            </div>
            <div class="mt-3">
                <h2>Numéro 2</h2>
                <h1>Calcul PPCM et PGCD</h1>
                <form method="post" action="index.php">
                    <div class="form-group">
                        <label for="nb1"><strong>Nombre 1</strong></label>
                        <input class="form-control" type="text" id="nb1" name="nb1" required
                            value=
                            <?php
                             
                                echo "$nb1";
                                
                            ?>
                            >
                    </div>
                    <div class="form-group">
                        <label for="nb2"><strong>Nombre 2</strong></label>
                        <input class="form-control"
                            type="text"
                            id="nb2"
                            name="nb2"
                            required
                            value= <?php echo "$nb2";?>>
                    </div>
                    <div class="form-group">
                        <label for="pgcd"><strong>PGCD</strong></label>
                        <input class="form-control"
                            type="text"
                            id="pgcd"
                            name="pgcd" 
                            readonly 
                            value=
                            <?php
                                echo "$pgcd";
                            ?>
                            ></input>
                    </div>
                    <div class="form-group">
                        <label for="ppcm"><strong>PPCM</strong></label>
                        <input class="form-control"
                            type="text"
                            id="ppcm"
                            name="ppcm" 
                            
                            readonly 
                            value=
                            <?php
                             
                                echo "$ppcm";
                                
                            ?>
                            ></input>
                    </div>
                    <button type="submit"
                            class="btn btn-primary mt-2 mb-2">
                        Soumettre
                    </button>
                </form>
            </div>
            <div>
                <h2>
                    Numéro 3
                </h2>
                <h1>
                    Trouvez votre nom
                </h1>
                <p>La réponse vous étonnera</p>
                <form method="post" action="index2.php">
                    <div class="form-group">
                        <label for="prenom">Prénom</label>
                        <input class="form-control" type="text" id="prenom" name="prenom" >

                    </div>
                    <div class="form-group">
                        <label for="nom">Nom</label>
                        <input class="form-control" type="text" id="nom" name="nom" >
                    </div>
                    <button type="submit"
                            class="btn btn-primary mt-2 mb-2">
                        Combiner
                    </button>
                </form>    
            </div>
        </div>
       
    </body>
</html>