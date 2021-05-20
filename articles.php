<?php
include("common/header.php");

require_once("model/requete.php");


?>

<h2>liste articles </h2>

<?php foreach ($article as $articles) : ?>


    <article>
        <h1><a href="article.php?id=<?= $articles ["id"]?>"> <?=  $articles ["titre"]?></a></h1>
        <div><?=  $articles ["content"]?></div>
        <p><?=  $articles ["auteur"]?></p>
    </article>


<?php endforeach; ?>

<?php
include('common/footer.php');
?>