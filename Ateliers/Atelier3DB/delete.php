<?php
if (!isset($_GET['id'])) {
    header("location: index.php");
}
else {
    $id = intval($_GET['id']);
    $bd = new PDO('mysql:dbname=test;host=host.docker.internal;port=3306', 'root', 'root');
    $query = $bd->prepare("DELETE FROM jeux WHERE jeux.id = $id");
    $query->execute();
    header("location: index.php");
} 
?>