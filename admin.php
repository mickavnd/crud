<?php
  session_start();

  if (!isset($_SESSION['user'])){
    header("Location: index.php");
    exit;
  }

 include ('common/header.php');

 require_once('model/requete.php');



 ?>

<h1> bonjour <?=$_SESSION["user"]["pseudo"]?></h1>

<table class="table">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">nom</th>
      <th scope="col">content</th>
      <th scope="col">modifier</th>
      <th scope="col">supprimer</th>


    </tr>
  </thead>
  <?php foreach($article as $articles) :?>
  <tbody>
    <tr>
      <td><?= $articles['id']?></td>
      <td><?= $articles['titre']?></td>
      <td><?= $articles['content']?></td>
      <td><a href="edit.php?id=<?=$articles['id']?>" class="btn btn-primary" role="submit" data-bs-toggle="submit">modifier</a></td>  
             <td><a href="delete.php?id=<?=$articles['id']?>" class="btn btn-danger" role="submit" data-bs-toggle="submit">supprimé</a></td>  
      
   
    </tr>
  </tbody>
  <?php endforeach;?>
</table>


<div class="col-md-4"class="btn">
        <a href="ajout-articles.php" class="btn btn-primary" type="submit" data-bs-toggle="submit">crée</a>
        </div>


        <a href="index.php" class="btn btn-primary" type="submit" data-bs-toggle="submit">page d'acceuil</a>


        <a href="deconnection.php" class="btn btn-primary" type="submit" data-bs-toggle="submit">deconnexion</a>




















 <?php

 include('common/footer.php');

 ?>