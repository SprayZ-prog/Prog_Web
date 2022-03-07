<?php

include 'EtreVivant.php';
include 'Guerrier.php';
include 'Magicien.php';
include 'Barbare.php';
include 'Monstre.php';

use combat\Guerrier as Guerrier;
use combat\Magicien as Magicien;
use combat\Barbare as Barbare;
use combat\Monstre as Monstre;


session_start();
if (isset($_GET['Combattant'])) {
    switch ($_GET['Combattant']) {
        case 'Guerrier':
            $_SESSION['Combattant'] = new Guerrier();
            break;
        case 'Magicien':
            $_SESSION['Combattant'] = new Magicien();
            break;
        case 'Barbare':
            $_SESSION['Combattant'] = new Barbare();
            break;  
    }
    $_SESSION['Monstre'] = new Monstre();
}
else {
    //Attaque du combattant
    $succesAttack = 0;
    $succesDefense = 0;
    
    switch ($_SESSION['Combattant']->getName()) {
        
        case 'Guerrier':
            
            for ($i = 0; $i < $_SESSION['Combattant']->getForce(); $i++) {
                if (rand(1, 10) > 6) {
                    $succesAttack++;
                }
            }
            for ($i = 0; $i < $_SESSION['Monstre']->getDefense(); $i++) {
                if (rand(1, 10) > 6) {
                    $succesDefense++;
                }
            }
            if ($succesAttack > $succesDefense) {
                $_SESSION['Monstre']->setHpDamage($succesAttack - $succesDefense);
            }
            $succesAttack = 0;
            $succesDefense = 0;
            for ($i = 0; $i < $_SESSION['Monstre']->getForce(); $i++) {
                if (rand(1, 10) > 6) {
                    $succesAttack++;
                }
            }
            for ($i = 0; $i < $_SESSION['Combattant']->getDefense(); $i++) {
                if (rand(1, 10) > 6) {
                    $succesDefense++;
                }
            }
            if ($succesAttack > $succesDefense) {
                $_SESSION['Combattant']->setHpDamage($succesAttack - $succesDefense);
            }
            break;

        case 'Magicien':

            for ($i = 0; $i < $_SESSION['Combattant']->getForce(); $i++) {
                if (rand(1, 10) > 6) {
                    $succesAttack++;
                }
            }
            for ($i = 0; $i < $_SESSION['Monstre']->getDefense(); $i++) {
                if (rand(1, 10) > 6) {
                    $succesDefense++;
                }
            }
            if ($succesAttack > $succesDefense) {
                $_SESSION['Monstre']->setHpDamage($succesAttack);
            }
            $succesAttack = 0;
            $succesDefense = 0;
            for ($i = 0; $i < $_SESSION['Monstre']->getForce(); $i++) {
                if (rand(1, 10) > 6) {
                    $succesAttack++;
                }
            }
            for ($i = 0; $i < $_SESSION['Combattant']->getDefense(); $i++) {
                if (rand(1, 10) > 6) {
                    $succesDefense++;
                }
            }
            if ($succesAttack > $succesDefense) {
                $_SESSION['Combattant']->setHpDamage($succesAttack - $succesDefense);
            }
            break;

        case 'Barbare':

            for ($i = 0; $i < $_SESSION['Combattant']->getForce(); $i++) {
                if (rand(1, 10) > 3) {
                    $succesAttack++;
                }
            }
            for ($i = 0; $i < $_SESSION['Monstre']->getDefense(); $i++) {
                if (rand(1, 10) > 6) {
                    $succesDefense++;
                }
            }
            if ($succesAttack > $succesDefense) {
                $_SESSION['Monstre']->setHpDamage($succesAttack);
            }
            $succesAttack = 0;
            $succesDefense = 0;
            for ($i = 0; $i < $_SESSION['Monstre']->getForce(); $i++) {
                if (rand(1, 10) > 6) {
                    $succesAttack++;
                }
            }
            for ($i = 0; $i < $_SESSION['Combattant']->getDefense(); $i++) {
                if (rand(1, 10) > 7) {
                    $succesDefense++;
                }
            }
            if ($succesAttack > $succesDefense) {
                $_SESSION['Combattant']->setHpDamage($succesAttack - $succesDefense);
            }

            break;        
    }
}

?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="../Styles/styles.css">
        <meta charset="UTF-8">
    </head>
    <body class="container">
        <?php if ($_SESSION['Monstre']->getHP() > 0 && $_SESSION['Combattant']->getHP() > 0) { ?>
        <h1>
            Atelier 1.4 - Combat
        </h1>
        <div class="row">
            <div class="col-6">
                <h3>Personnage</h3>
                <p>Classe: <?= $_SESSION['Combattant']->getName()?></p>
                <p>HP: <?= $_SESSION['Combattant']->getHP() . "/" . $_SESSION['Combattant']->getHPMax()?></p>
                <p>Force: <?= $_SESSION['Combattant']->getForce()?></p>
                <p>Défense: <?= $_SESSION['Combattant']->getDefense()?></p>
                <button class="btn btn-danger" onclick="location.href = 'affrontement.php'">Attaquer!</button>
            </div>
            <div class="col-6">
            <h3>Monstre</h3>
                <p>Classe: <?= $_SESSION['Monstre']->getName()?></p>
                <p>HP: <?= $_SESSION['Monstre']->getHP() . "/" . $_SESSION['Monstre']->getHPMax()?></p>
                <p>Force: <?= $_SESSION['Monstre']->getForce()?></p>
                <p>Défense: <?= $_SESSION['Monstre']->getDefense()?></p>
            </div>
        </div>
        <?php 
        } 
        else if ($_SESSION['Monstre']->getHP() < 1) { ?>
        <p>Le <?= $_SESSION['Combattant']->getName() ?> a gagné le combat!</p>
        <button class="btn btn-primary" onclick="location.href = '../index.php'">Rejouer</button>
        
        <?php } 
        else { ?>
            <p>Le <?= $_SESSION['Combattant']->getName() ?> a perdu le combat!</p>
            <button class="btn btn-primary" onclick="location.href = '../index.php'">Rejouer</button>
        <?php } ?>
        
    </body>
</html>