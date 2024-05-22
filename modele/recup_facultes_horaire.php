<?php 
include("../../controleur/connect_bdd.php");
    $select_fac=$connexion->query("SELECT * FROM facultes");
    while($result_select_fac=$select_fac->fetch()){
        ?>
        <fieldset class="border" style="margin:10px;padding:5px;">
          
        <div class="row mb-3">
                  <p>Horaire de la faculté de(d'):<?php echo $result_select_fac["nom_fac"];?></p>
                </div>
                
               
        </fieldset>
        
        <?php
    }






?>
