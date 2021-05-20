<?php
include("common/header.php");

require_once('connexion.php');

?>
 <h2>tableau des utilisateur</h2>

<?php

$passWord='lala';

$sql="SELECT * FROM `user`WHERE `pass`=:pass";

//on prepare la requéte

$req=$db->prepare($sql);

//on  injecte les valeur bindValue

$req->bindValue(":pass",$passWord,PDO::PARAM_STR);

//on execute
$req-> execute();

$user =$req->fetch();

echo"<pre>";
var_dump($user);
echo"</pre>";





?>


<?php
include("common/footer.php");

?>