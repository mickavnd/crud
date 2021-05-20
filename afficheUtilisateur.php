<?php
include("common/header.php");

?>

<div class="container titre">
   <h2>creation d'un nouvelle utilisateur</h2> 
</div>


<?php

echo '<form method="POST"action="#"';
echo '<div class="container formulaire">';
echo '<div class="Nom">';
echo '<label for="clientN">Nom : </label>';
echo '<input type="text" name="Nom" id="Nom"required/> ';
echo '</div>';
echo '<div class="Prenom">';
echo '<label for="clientP">prenom : </label>';
echo '<input type="text" name="Prenom" id="Prenom"required/> ';
echo '</div>';
echo '<div class="age">';
echo '<label for="age">prenom : </label>';
echo '<input type="Number" name="age" id="age"required/> ';
echo '</div>';
echo '</div">';
echo '<input type="submit" value="Créer utilisateur" />';
echo'</form >';



?>










<?php
include("common/footer.php");

?>