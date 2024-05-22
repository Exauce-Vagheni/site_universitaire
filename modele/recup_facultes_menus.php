<?php 
include("../../controleur/connect_bdd.php");
    $select_fac=$connexion->query("SELECT * FROM facultes");
    while($result_select_fac=$select_fac->fetch()){
        ?>
        <li><a href="liste_memoires.php?id=<?php echo $result_select_fac["id"];?>"><?php echo $result_select_fac["nom_fac"];?></a></li>

        <?php
    }
?>
