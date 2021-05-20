<?php

include('common/header.php');

?>

<?php


if ($_POST) {
    if (
        isset($_POST['id']) && !empty($_POST['id'])
        && isset($_POST['titre']) && !empty($_POST['titre'])
        && isset($_POST['content']) && !empty($_POST['content'])
    ) {
        // On inclut la connexion à la base
        require_once('model/connexion.php');

        // On nettoie les données envoyées
        $id = strip_tags($_POST['id']);
        $titre = strip_tags($_POST['titre']);
        $content = strip_tags($_POST['content']);;

        $sql = 'UPDATE `article` SET `titre`=:titre, `content`=:content WHERE `id`=:id;';

        $query = $db->prepare($sql);

        $query->bindValue(':id', $id, PDO::PARAM_INT);
        $query->bindValue(':titre', $titre, PDO::PARAM_STR);
        $query->bindValue(':content', $content, PDO::PARAM_STR);


        $query->execute();

      

        require_once('close.php');


        header('Location: articles.php'); 
        

    } 
    else {
        die("Le formulaire est incomplet");
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


<!-- </form>

<form method="POST">
    <div class="form-group">

        <label for="produit">Produit</label>
        <input type="hidden" value="" name="id">
        <input type="text" id="titre" name="titre" class="form-control" value="">
    </div>
    <div class="form-group">
        <label for="prix">Prix</label>
        <input type="text" id="content" name="content" class="form-control" value="">

    </div>


    <button class="btn btn-primary">Envoyer</button>
</form> -->


<form method="POST" >

    <div  class="form-group">
        <label for="titre">titre</label>
        <input type="hidden" value="<?=$article['id']?>" name="id">
        <input type="text" id="titre" name="titre" class="form-control" value="<?=$article['titre']?>">
    </div>

    <div class="form-group">
        <label for="content">content</label>
        <input type="text" id="content" name="content"class="form-control" value="<?=$article['content']?>">
    </div>



   
    <button class="btn btn-primary">Envoyer</button>

</form>

<!-- <form method="POST">
<div class="form-group">

<label for="titre">titre</label>
        <input type="hidden" value="" name="id">
        <input type="text" id="titre" name="titre" class="form-control" value="">
</div>

<div class="form-group">

<label for="content">content</label>
        <input type="text" id="content" name="content" class="form-control" value="">
</div>



<button>Envoyer</button>

</form> --> 





















<?php
include('common/footer.php');

?>