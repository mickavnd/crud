<?php
 
 //on traite le formulaire
 if(!empty($_POST)){
       
    //post n'est pas vide ,on verifie que tout les  données son presente
     if ( isset($_POST['titre'],$_POST['content'])
     && !empty($_POST['titre'])&& !empty($_POST['content'])){

        //on recupere les données en les protegant(failles XSS)
        $titre= strip_tags($_POST['titre']);

        //on netralise toute les balise du contenu 
        $contenu =htmlspecialchars($_POST['content']);

        //on peut les enregistre
        require_once ('model/connexion.php');
        
        $sql="INSERT INTO `article`(`titre`,`content`) VALUES(:titre,:content)";

        $req = $db->prepare($sql);

        $req->bindValue(":titre",$titre,PDO::PARAM_STR);
        $req->bindValue(":content",$contenu,PDO::PARAM_STR);

        if(!$req->execute()){
            die("une erreu et surnvenu");

        }
         header('Location: articles.php');
        $id= $db->lastInsertId();
       die("article ajoute sous le numero $id");
        
    


     }else{
         die("le formulaire  et incomplet");
     }
      

     } 




include('common/header.php');

?>





<h1>ajout articles</h1>

<form method="POST">
<div>
    <label for="titre"> titre</label>
    <input type="text" name="titre" id="titre">
</div>
<div>
    <label for="contenu">contenu</label>
    <textarea name="content" id="content" cols="30" rows="10"></textarea>
</div>
<div>
    <button type="submit"> crée </button>
</div>



</form>




















<?php

include('common/footer.php');

?>