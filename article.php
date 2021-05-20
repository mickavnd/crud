<?php

include('common/header.php');

require_once('model/connexion.php');

if(!isset($_GET['id'])|| empty($_GET["id"])){

    //je nai pas d'id
    header("Location:articles.php");
    exit;
    }
    //je recupere id
    
    $id= $_GET['id'];

    $sql="SELECT * FROM `article`WHERE`id`=:id";

    $req= $db->prepare($sql);
    
    $req->bindValue(":id",$id,PDO::PARAM_INT);
    
    $req->execute();
    
    $article= $req->fetch();


    if(!$article){
         http_response_code(404);
         echo "article inxeistant";
    }


?>



<h1><?= $article['titre'] ?></h1>

<a href="articles.php" class="btn btn-primary" role="submit" data-bs-toggle="submit">retour</a>












<?php
include('common/footer.php');

?>


