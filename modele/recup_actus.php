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
$select_total=$connexion->query("SELECT COUNT(*) AS total FROM articles");
$total=$select_total->fetchAll();
$totalElements=$total[0]['total'];
$totalPages=ceil($totalElements/$elementsParPage);
$select_actus=$connexion->query("SELECT * FROM articles ORDER BY id DESC LIMIT $offset,$elementsParPage");
    while($result_select_actus=$select_actus->fetch()){
        ?>
        <div class="col-lg-4 col-md-6 single-blog" id="actus">
	<div class="thumb">
		<img class="img-fluid" src="../img/articles/<?php echo $result_select_actus["photo"];  ?>" alt="">								
	</div>
	<p class="meta"><?php echo $result_select_actus["date_pub"];  ?> |  Par <a href="#"><?php echo $result_select_actus["auteur"];  ?></a></p>
	<a href="actu_detail.php?id=<?php echo($result_select_actus["id"]) ;?>">
		<h5><?php echo $result_select_actus["titre"];  ?></h5>
	</a>
	
	<p><?php echo($result_select_actus["contenu"]) ;?> 
	</p>
	<hr>
	<a href="actu_detail.php?id=<?php echo($result_select_actus["id"]) ;?>" class="details-btn d-flex justify-content-center align-items-center"><span class="details">Details</span><span class="lnr lnr-arrow-right"></span></a>						
</div>

        <?php
    }
?>


