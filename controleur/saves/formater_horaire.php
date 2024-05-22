<?php 
include("../connect_bdd.php");
    $recup_horaire=$connexion->query("SELECT * FROM fichiers_valve_horaire");
    while($reponse=$recup_horaire->fetch()){
        unlink('../../vue/fichiers/fichiers_horaire/'.$reponse["fichier"].'');
    }
    $vider_table=$connexion->query("TRUNCATE TABLE fichiers_valve_horaire");
     header('location:../../vue/admin/ajout_fichier_valve.php');
?>
