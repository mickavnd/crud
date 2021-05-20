<?php
session_start();
include("common/header.php");
?>

<div class="container">
    <div class="row">
        <div class="col-md-12 titre">
            <h1>le CRUD version PHP</h1>
        </div>
    </div>
</div>
<nav>
    <div class="container group-btn">
    <div class="row">
        <div class="col-md-3"class="btn">
        <a href="ajout-articles.php" class="btn btn-primary" type="submit" data-bs-toggle="submit">crée</a>
        </div>
        <div class="col-md-3"class="btn">
        <a href="articles.php" class="btn btn-success" role="submit" data-bs-toggle="submit">article</a>
        </div>
        <div class="col-md-3"class="btn">
        <a href="inscription.php" class="btn btn-danger" role="submit" data-bs-toggle="submit">inscription</a>
        </div>

        <div class="col-md-3"class="btn">
        <a href="pconnexion.php" class="btn btn-danger" role="submit" data-bs-toggle="submit">connexion</a>
        </div>
    </div>
</div>
</nav>
 
 






 <?php
        include("common/footer.php");
        ?>