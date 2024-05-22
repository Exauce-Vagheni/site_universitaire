<?php 
include("../../controleur/connect_bdd.php");
$select_horaire=$connexion->query("SELECT * FROM fichiers_valve_horaire");
    while($result_select_horaire=$select_horaire->fetch()){
        ?>
        <div class="single-post " >
		<div class="col-lg-12 col-md-12 " >

			<a class="posts-title" href="#"><h3><?php
            $select_fac=$connexion->prepare("SELECT nom_fac FROM facultes WHERE id=?");
            $select_fac->execute(array($result_select_horaire["id_fac"]));
            $result_fac=$select_fac->fetchAll();
            echo $result_fac[0]['nom_fac']; ?></h3></a>
			
			<a href="../fichiers/fichiers_horaire/<?php echo $result_select_horaire["fichier"]; ?>" class="btn btn-primary">Telecharger l'horaire</a>
		</div>
	</div>
	<hr>
        <?php
    }
?>


