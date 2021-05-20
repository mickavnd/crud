<?php

//on verifie si le formualait a etait envoyer

if(!empty($_POST)){
    //
    //
    if(isset($_POST["mickaname"],$_POST["email"], $_POST["pass"])
    && !empty($_POST["mickaname"]) && !empty($_POST["email"]) && !empty($_POST["pass"])){

     //le formulaire et complet
     //on protzger les donnée
     $pseudo= strip_tags($_POST["mickaname"]);

     if(!filter_var($_POST["email"],FILTER_VALIDATE_EMAIL)){
         die("ladresse email est incorrect");
     }

     //on hasher le mot de passe 

     $pass=password_hash($_POST["pass"],PASSWORD_BCRYPT);


     //ajouter tout les controlle souhaiter

     //on va enregisté en bdd
     require_once('model/connexion.php');


     $sql="INSERT INTO `users`(`nom`,`email`,`pass`) VALUE(:pseudo,:email,'$pass')";

     $req =$db->prepare($sql);

     $req->bindValue(":pseudo",$pseudo,PDO::PARAM_STR);

     $req->bindValue(":email",$_POST["email"],PDO::PARAM_STR);


     $req->execute();

     //on recupere l'id  du nouvelle user
      $id =$db->lastInsertId();
 
    //on connectera lutilisateur
      
//ici lutilisateut est le mot de passe sont corrects
    //on va pouvoir "connecter lutilisateur 
    //on demarre un SESSION PHP

    session_start();

    //on va stoke dans $_SESSION les information de lutilisateur

    $_SESSION["user"]=[

        "id"=>$user['id'],
        "pseudo"=>$pseudo,
        "email"=>$_POST["email"]
    ];

    //on peut rediriger vers la page
    header("Location: admin.php");





 
    }  else{
    die("le formulaire et incomplet");
     }
}


include('common/header.php');




?>

<h1>inscription</h1>


<form method="POST">

<div>
<label for="pseudo">pseudo</label>
<input type="text" name="mickaname" id="pseudo">

</div>

<div>
<label for="email">email</label>
<input type="email" name="email" id="email">
</div>

<div>
<label for="pass">mot de passe</label>
<input type="password" name="pass" id="pass">

</div>


<button type="submit">m'inscrire</button>


</form>






















<?php
  include("common/footer.php");
?>