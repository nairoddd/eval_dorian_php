<?php
//Connexion à notre BDD
$pdo = new PDO(
    "mysql:host=localhost;dbname=wf3_php_intermediaire_prenom","root","",
    array(
        PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, //emet un avertissement sur les erreurs sql
        PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8' //Utilise l'encodage utf8 lors des échanges avec la BDD 
    )
);
// var_dump($pdo);

$content = "";