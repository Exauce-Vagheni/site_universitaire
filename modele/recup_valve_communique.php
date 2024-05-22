<?php 
include("../../controleur/connect_bdd.php");
$elementsParPage=6;
if(isset($_GET['page'])){
	$pageCourante=intval($_GET['page']);
}else{
	$_GET['page']=1;
	$pageCourante=$_GET['page'];
}
$offset=(($pageCourante-1)*$elementsParPage);
$select_total=$connexion->query("SELECT COUNT(*) AS total FROM infos_valve");
$total=$select_total->fetchAll();
$totalElements=$total[0]['total'];
$totalPages=ceil($totalElements/$elementsParPage);
$select_infos=$connexion->query("SELECT * FROM infos_valve ORDER BY id DESC LIMIT $offset,$elementsParPage");
    while($result_select_infos=$select_infos->fetch()){
        ?>
        <div class="single-post " >
		<div class="col-lg-12 col-md-12 " >
			<a class="posts-title" href="#"><h3><?php echo $result_select_infos["titre"]; ?></h3></a>
			<p class="excert">
            <?php echo $result_select_infos["contenu"]; ?>
			</p>
			<a href="../fichiers/pieces_jointes/<?php echo $result_select_infos["fichier"]; ?>" class="primary-btn btn btn-primary">Telecharger le fichier pdf</a>
		</div>
	</div>
	<hr>
        <?php
    }
?>


