<?php

//constant denvironnement

define("DBHOST","localhost");
define("DBUSER","root");
define("DBPASS","");
define("DBNAME","utilisateur");


//DSN de connexion

$dsn ="mysql:dbname=".DBNAME;";host=".DBHOST;

//connecter a la base
try{
    $db= new PDO($dsn,DBUSER,DBPASS);

    //on va sassure denvoyer les donnée en </utf-8>
    $db->exec("SET NAMES utf-8");

    echo "on est connecté";
    
    //on peut   definire le mode de "fetch" par default
    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_ASSOC);

} catch (PDOException $e){
    die ( "erreur:".$e->getMessage());
}
//ici on est connecté a la base 

$sql="SELECT * FROM `user`";

//on execute directement la requete
$req= $db->query($sql);

//on recupere les donné(fetch ou fetch all)
//$user= $req->fetch();

// echo"<pre>";
// var_dump($user);
// echo"</pre>";

//ajouté un utlisateur
//$sql="INSERT INTO`user`( `nom`,`email`,`pass`) VALUES ('papa','papa@gmail.com','azerty')";

$req=$db->query($sql);

//modifier utilisateur

$sql="UPDATE `user`SET `nom`= 'lol' WHERE `id`=4";

$req =$db->query($sql);


//suprimmé  un utilasateur

$sql ="DELETE FROM `user` WHERE `id`=2";

$req=$db->query($sql);

?>