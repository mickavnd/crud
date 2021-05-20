<?php


if(isset($_GET['id'])|| !empty($_GET["id"])){
    //je recupere id
    require_once('model/connexion.php');

    $id= strip_tags($_GET['id']);

    $sql="SELECT * FROM `article`WHERE`id`=:id";

    $req= $db->prepare($sql);
    
    $req->bindValue(":id",$id,PDO::PARAM_INT);
    
    $req->execute();
    
    $article= $req->fetch();


     

$sql="DELETE  FROM `article`WHERE`id`=:id";

    $req= $db->prepare($sql);
    
    $req->bindValue(":id",$id,PDO::PARAM_INT);
    
    $req->execute();
    
    $article= $req->fetch();


    $id= $db->lastInsertId();
  
    header('Location: articles.php'); 
     die("article supprime sous le numero $id");
    
    }
    else{

        header("Location:articles.php");
        exit;
    }
    
    



  
?>
