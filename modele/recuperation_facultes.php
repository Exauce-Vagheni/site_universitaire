<?php 
include("../../controleur/connect_bdd.php");
    $select_fac=$connexion->query("SELECT * FROM facultes");
    while($result_select_fac=$select_fac->fetch()){
        ?>
        
<div class="single-popular-carusel">
    <div class="thumb-wrap relative">
        <div class="thumb relative">
            <div class="overlay overlay-bg"></div>	
            <img class="img-fluid" src="../img/facultes/<?php echo $result_select_fac["image_fac"]; ?>" alt="">
        </div>
        <div class="meta d-flex justify-content-between">
            <h4><?php echo $result_select_fac["f_academiques"]; ?></h4>
        </div>									
    </div>
    <div class="details">
        <a href="#">
            <h4>
            <?php echo $result_select_fac["nom_fac"]; ?>
            </h4>
        </a>
        <p>
        <?php echo $result_select_fac["description_fac"]; ?>										
        </p>
        <a href="../fichiers/f_description/<?php echo $result_select_fac["f_description"]; ?>">Telecharger fichier details</a>
    </div>
    
</div>
        
        <?php
    }
?>
