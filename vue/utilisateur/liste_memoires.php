<!DOCTYPE html>
	<html lang="zxx" class="no-js">
	<head>
		<!-- Mobile Specific Meta -->
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<!-- Favicon-->
		<link rel="shortcut icon" href="img/fav.png">
		<!-- Author Meta -->
		<meta name="author" content="uniluk">
		<!-- Meta Description -->
		<meta name="description" content="">
		<!-- Meta Keyword -->
		<meta name="keywords" content="">
		<!-- meta character set -->
		<meta charset="UTF-8">
		<!-- Site Title -->
		<title>UNILUK</title>

		<link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet"> 
			<!--
			CSS
			============================================= -->
			<link rel="stylesheet" href="css/linearicons.css">
			<link rel="stylesheet" href="css/font-awesome.min.css">
			<link rel="stylesheet" href="css/bootstrap.css">
			<link rel="stylesheet" href="css/magnific-popup.css">
			<link rel="stylesheet" href="css/nice-select.css">							
			<link rel="stylesheet" href="css/animate.min.css">
			<link rel="stylesheet" href="css/owl.carousel.css">			
			<link rel="stylesheet" href="css/jquery-ui.css">			
			<link rel="stylesheet" href="css/main.css">
		</head>
		<body>	
		  <header id="header" id="home">
	  		<div class="header-top">
	  			<div class="container">
			  		<div class="row">
			  			<div class="col-lg-6 col-sm-6 col-8 header-top-left no-padding">
			  				<ul>
								<li><a href="#"><i class="fa fa-facebook"></i></a></li>
								<li><a href="#"><i class="fa fa-twitter"></i></a></li>
								<li><a href="#"><i class="fa fa-dribbble"></i></a></li>
								<li><a href="#"><i class="fa fa-behance"></i></a></li>
			  				</ul>			
			  			</div>
			  			<div class="col-lg-6 col-sm-6 col-4 header-top-right no-padding">
			  				<a href="tel:+243876425537"><span class="lnr lnr-phone-handset"></span> <span class="text">+243876425537</span></a>
			  				<a href="mailto:support@uniluk.com"><span class="lnr lnr-envelope"></span> <span class="text">support@uniluk.com</span></a>			
			  			</div>
			  		</div>			  					
	  			</div>
			</div>
		    <div class="container main-menu">
			      <?php include("nav_user.php"); ?>
                  <!-- #nav-menu-container -->		    		
		    	</div>
		    </div>
		  </header><!-- #header -->
			<!-- start banner Area -->
			<section class="banner-area relative" id="home">	
				<div class="overlay overlay-bg"></div>
				<div class="container">				
					<div class="row d-flex align-items-center justify-content-center">
						<div class="about-content col-lg-12">
							<h1 class="text-white">
								TFC et Memoires				
							</h1>	
							<p class="text-white link-nav"><a href="index.php">Accueil </a>  <span class="lnr lnr-arrow-right"></span><a href="valve_communique.php">Memoires </a> <span class="lnr lnr-arrow-right"></span> <a href="#"> TFC</a></p>
						</div>	
					</div>
				</div>
			</section>
			<!-- End banner Area -->					  
			
			<!-- Start post-content Area -->
			<section class="post-content-area single-post-area">
				<div class>
                <div class="col-lg-8 posts-list" style="margin:auto;" align="center">
                <!-- Start events-list Area -->
			<section class="events-list-area section-gap event-page-lists">
            <h1 style="margin-top:-160px;margin-bottom:15px;">Faculté:  <?php
            $select_fac=$connexion->prepare("SELECT nom_fac FROM facultes WHERE id=?");
            $select_fac->execute(array(htmlspecialchars($_GET["id"])));
            $id=htmlspecialchars($_GET["id"]);
            $result_fac=$select_fac->fetchAll();
            echo $result_fac[0]['nom_fac']; ?></h1>
				<div class="container">
                    
					<div class="row align-items-center">
                    <?php include("../../modele/recup_memoires.php"); ?>																
								
					</div>
                    <?php
if($pageCourante>1){
   echo "<a class='pagination_button btn btn-primary' href='?id=$id&amp page=".($pageCourante-1)."#actus'>Precedent</a>";
}
for($i=1;$i<=$totalPages;$i++){
    echo "<a class='pagination_chiffre ' href='?id=$id&amp page=$i'>$i</a>";
}
if($pageCourante<$totalPages){
    echo "<a class='pagination_button btn btn-primary' href='?id=$id&amp page=".($pageCourante+1)."#actus'>Suivant</a>";
 }
?>
				</div>	
			</section>
			<!-- End events-list Area -->

							</div>														  
						</div>
                </div>
			</section>
			<!-- End post-content Area -->
			
			<!-- start footer Area -->		
			<?php include("footer.php"); ?>	
			</footer>	
			<!-- End footer Area -->	


			<script src="js/vendor/jquery-2.2.4.min.js"></script>
			<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
			<script src="js/vendor/bootstrap.min.js"></script>			
			<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBhOdIF3Y9382fqJYt5I_sswSrEw5eihAA"></script>
  			<script src="js/easing.min.js"></script>			
			<script src="js/hoverIntent.js"></script>
			<script src="js/superfish.min.js"></script>	
			<script src="js/jquery.ajaxchimp.min.js"></script>
			<script src="js/jquery.magnific-popup.min.js"></script>	
    		<script src="js/jquery.tabs.min.js"></script>						
			<script src="js/jquery.nice-select.min.js"></script>	
			<script src="js/owl.carousel.min.js"></script>									
			<script src="js/mail-script.js"></script>	
			<script src="js/main.js"></script>	
		</body>
	</html>