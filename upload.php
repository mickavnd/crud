<?php

include("common/header.php");

//  on verifi si un ficher a etait envoyer

if(isset($_FILES["image"]) && $_FILES["image"]["error"]===0){
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

//  var_dump($_)


     if( !move_uploaded_file($_FILES ["image"]["tmp_name"],$newfilename)){
         die("luploads a echouer");
     }

     chmod($newfilename,0644);

     

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
