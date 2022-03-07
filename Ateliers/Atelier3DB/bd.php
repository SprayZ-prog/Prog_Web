<?php
$bd = new PDO('mysql:dbname=test;host=host.docker.internal;port=3306', 'root', 'root');
$result = $bd->query("SHOW TABLES LIKE 'categorie'");
$tableExists = $result !== false && $result->rowCount() > 0;
if (!$tableExists) {
    $query = $bd->query("CREATE TABLE `test`.`jeux` ( `id` INT NOT NULL AUTO_INCREMENT , `nom` VARCHAR(255) NOT NULL , `categ_id` INT NOT NULL, PRIMARY KEY (`id`)) ENGINE = InnoDB");
    $query = $bd->query("CREATE TABLE `test`.`categorie` ( `id` INT NOT NULL AUTO_INCREMENT , `nom` VARCHAR(255) NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB");
    $query = $bd->query("ALTER TABLE `jeux` ADD CONSTRAINT `fk_jeux_id__categorie_categ_id` FOREIGN KEY (`categ_id`) REFERENCES `categorie`(`id`) ON DELETE CASCADE ON UPDATE RESTRICT");
    $query = $bd->query("INSERT INTO `categorie` (`id`, `nom`) VALUES (NULL, 'Jeu de tir')");
    $query = $bd->query("INSERT INTO `categorie` (`id`, `nom`) VALUES (NULL, 'Action')");
    $query = $bd->query("INSERT INTO `categorie` (`id`, `nom`) VALUES (NULL, 'Survie')");
    $query = $bd->query("INSERT INTO `categorie` (`id`, `nom`) VALUES (NULL, 'Plateforme')");
    $query = $bd->query("INSERT INTO `categorie` (`id`, `nom`) VALUES (NULL, 'Combat')");
}