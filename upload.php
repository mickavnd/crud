<?php

include("common/header.php");

//  on verifi si un ficher a etait envoyer
if ($_POST) {
if( isset($_POST['id']) && !empty($_POST['id'])
    && isset($_FILES["image"]) && $_FILES["image"]["error"]===0){
    // on recu l'image
    //  on procede  aux verification 
    //on verifie toujour lextention  et type mime
    $allowed=[
        
        "jpg"=>"image/jpeg",
        "jpeg"=>"image/jpeg",
        "png"=>"image/png"

    ];

    $filename= $_FILES["image"]["name"];
    $fileType = $_FILES["image"]["type"];
    $fileSize =$_FILES["image"]["size"];


    $extension =pathinfo($filename,PATHINFO_EXTENSION);  

    //on verifier labsent de lextention dans les clés de $allowed

    if(!array_key_exists($extension,$allowed) || !in_array($fileType,$allowed)){

        //soit lextension soit le tupe est incorrect
        die("eereur : format de ficher incorect");

    }
    //ici  le type est correct 
    //on limit 1mo
    if($fileSize >1024*1024){
        die ("fichier trop volumineux");
    }

    //ongere un nom unique

    $newname= md5(uniqid());

     // on genre le chemain complet

     $newfilename= __DIR__ ."/uploads/$newname.$extension";

 var_dump($_newfilename);


     if( !move_uploaded_file($_FILES ["image"]["tmp_name"],$newfilename)){
         die("luploads a echouer");
     }

    //on se conncet a la bdd
     
    require_once("model/connexion.php");
          
       
    $sql='UPDATE `article` SET `image`= :photo  WHERE `id`=:id;';


     

    $query=$db->prepare($sql);


    $query->bindValue(':id', $id, PDO::PARAM_INT);
    $query->bindValue(':photo', $newfilename, PDO::PARAM_STR);


    $query->execute(); 
    
    //var_dump($query); 
}
}

// Est-ce que l'id existe et n'est pas vide dans l'URL
if (isset($_GET['id']) && !empty($_GET['id'])) {

    require_once('model/connexion.php');

    // On nettoie l'id envoyé
    $id = strip_tags($_GET['id']);

    $sql = 'SELECT * FROM `article` WHERE `id` = :id;';

    // On prépare la requête
    $query = $db->prepare($sql);

    // On "accroche" les paramètre (id)
    $query->bindValue(':id', $id, PDO::PARAM_INT);

    // On exécute la requête
    $query->execute();

    // On récupère le produit
    $article = $query->fetch();

    // On vérifie si le produit existe
    if (!$article) {
        http_response_code(404);
        echo "article inxeistant";
    }
}

?>




<form method="POST"enctype="multipart/form-data">

<div>
<label for="fichier"> ficher</label>
<input type="file" name="image" id="fichier">

</div>

<button type="submit">envoyer</button>

</form>


















<?php

include("common/footer.php");

?>
