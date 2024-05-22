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
$select_total=$connexion->query("SELECT COUNT(*) AS total FROM memoires");
$total=$select_total->fetchAll();
$totalElements=$total[0]['total'];
$totalPages=ceil($totalElements/$elementsParPage);
$select_memoires=$connexion->prepare("SELECT * FROM memoires WHERE fac=? ORDER BY id DESC LIMIT $offset,$elementsParPage");
$select_memoires->execute(array(htmlspecialchars(intval($_GET['id']))));
    while($result_memoires=$select_memoires->fetch()){
        ?>
        <div class="col-lg-6 col-md-6">
		  <div class="single-carusel row align-items-center">
			  <div class="detials col-12 col-md-8">                                        
				  
				  <a href="../fichiers/memoires/<?php echo $result_memoires["fichier"];?>"><h2><?php echo $result_memoires["titre"];?></h4></a>
                  <p>Par <?php echo $result_memoires["etudiant"];?></p>
				  <p style="color:black;font-size:18px;text-align:justify;">
                  <?php echo  $result_memoires["intro"];?>
				  </p>
                  <a href="../fichiers/memoires/<?php echo $result_memoires["fichier"];  ?>" class="text-uppercase primary-btn mx-auto mt-40">Telecharger</a>
			  </div>
		  </div>
	  </div>
        <?php
    }
?>