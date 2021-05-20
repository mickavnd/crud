<?php

require_once('model/connexion.php');

//requete sql articles
$sql = "SELECT * FROM `article`";

$req = $db->query($sql);

$article = $req->fetchAll();


// recupere un artilce avec l'id


// $sql="SELECT * FROM `articles`WHERE`id`=:id";

// $req= $db->prepare($sql);

// $req->bindValue(":id",$id,PDO::PARAM_INT);

// $req->execute();

// $article= $req->fetch();



?>