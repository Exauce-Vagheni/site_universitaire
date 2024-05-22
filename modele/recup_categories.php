<?php 
include("../../../controleur/connect_bdd.php");
    $select_livre=$connexion->query("SELECT * FROM categories_livres_fridi");
    while($result_livre=$select_livre->fetch()){
        ?>
        <li><a href="#"><?php echo $result_livre["nom"]; ?></a></li>
        <?php
    }
?>
