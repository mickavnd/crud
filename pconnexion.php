<?php

//on verifie si le formualait a etait envoyer

if(!empty($_POST)){
      
    if(isset($_POST["email"],$_POST["pass"])
    && !empty ($_POST["email"] &&!empty($_POST["pass"]))){

        //on verfiere que cest une email
        if (!filter_var($_POST["email"],FILTER_VALIDATE_EMAIL)){

         die("ce nest pas un email");

    }


    //on se connecter a la bdd
    require_once("model/connexion.php");

    $sql="SELECT * FROM `users` WHERE `email`=:email";

    $req =$db->prepare($sql);

    $req->bindValue(":email",$_POST["email"], PDO::PARAM_STR);

    $req->execute();

    $user = $req->fetch();


    var_dump($user);

    if(!$user){
        die ('lutilisateur nexiste pas');
    }

    if(!password_verify($_POST["pass"], $user["pass"])){
        die ("lutilisateur et/ou le mot de pase es incorrect");
    }

    //ici lutilisateut est le mot de passe sont corrects
    //on va pouvoir "connecter lutilisateur 
    //on demarre un SESSION PHP

    session_start();

    //on va stoke dans $_SESSION les information de lutilisateur

    $_SESSION["user"]=[

        "id"=>$user['id'],
        "pseudo"=>$user["nom"],
        "email"=>$user["email"]
    ];

    //on peut rediriger vers la page
    header("Location: admin.php");









    die;




    }  else{
    die("le formulaire et incomplet");
     }

    }


include('common/header.php');




?>

<h1>inscription</h1>


<form method="POST">


<div>
<label for="email">email</label>
<input type="email" name="email" id="email">
</div>

<div>
<label for="pass">mot de passe</label>
<input type="password" name="pass" id="pass">

</div>


<button type="submit">me connecter</button>


</form>

<?php
  include("common/footer.php");
?>