<?php 
include("../../controleur/connect_bdd.php");
if(isset($_GET["id"]) AND !empty($_GET["id"]))
//recuperation article choisi
$select_actus=$connexion->prepare("SELECT * FROM articles WHERE id=?");
$select_actus->execute(array(intval($_GET["id"])));
//recuperation article precedent
$select_actus_popular=$connexion->prepare("SELECT * FROM articles WHERE id!=? ORDER BY id DESC LIMIT 0,5");
$select_actus_popular->execute(array(intval($_GET["id"])));
while($result_select_actus=$select_actus->fetch()){
        ?>
        <div class="container">
					<div class="row">
						<div class="col-lg-8 posts-list">
							<div class="single-post row">
								<div class="col-lg-12">
									<div class="feature-img">
										<img class="img-fluid" src="../img/articles/<?php echo $result_select_actus["photo"]; ?>" alt="">
									</div>									
								</div>
								<div class="col-lg-3  col-md-3 meta-details">
									<div class="user-details row">
										<p class="user-name col-lg-12 col-md-12 col-6"><a href="#"><?php echo $result_select_actus["auteur"]; ?></a> <span class="lnr lnr-user"></span></p>
										<p class="date col-lg-12 col-md-12 col-6"><a href="#"><?php echo $result_select_actus["date_pub"]; ?></a> <span class="lnr lnr-calendar-full"></span></p>																				
									</div>
								</div>
								<div class="col-lg-9 col-md-9">
									<h3 class="mt-20 mb-20"><?php echo $result_select_actus["titre"]; ?></h3>
									<p><?php echo $result_select_actus["contenu"]; ?></p>
								</div>
							</div>
							
							
							<div class="comment-form" style="display:none;">
								<h4>Leave a Comment</h4>
								<form>
									<div class="form-group form-inline">
									  <div class="form-group col-lg-6 col-md-12 name">
									    <input type="text" class="form-control" id="name" placeholder="Enter Name" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Name'">
									  </div>
									  <div class="form-group col-lg-6 col-md-12 email">
									    <input type="email" class="form-control" id="email" placeholder="Enter email address" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter email address'">
									  </div>										
									</div>
									<div class="form-group">
										<input type="text" class="form-control" id="subject" placeholder="Subject" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Subject'">
									</div>
									<div class="form-group">
										<textarea class="form-control mb-10" rows="5" name="message" placeholder="Messege" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Messege'" required=""></textarea>
									</div>
									<a href="#" class="primary-btn text-uppercase">Post Comment</a>	
								</form>
							</div>
						</div>
						<div class="col-lg-4 sidebar-widgets">
							
								<div class="single-sidebar-widget popular-post-widget">
									<h4 class="popular-title">Publications récentes</h4>
                                    <?php 
                                        while($result_actus_popular=$select_actus_popular->fetch()){
                                            ?>
                                        <div class="popular-post-list">
										<div class="single-post-list d-flex flex-row align-items-center">
											<div class="thumb">
												<img style="max-width:80px;margin:5px;" class="img-fluid" src="../img/articles/<?php echo $result_actus_popular["photo"]; ?>" alt="">
											</div>
											<div class="details">
												<a href="actu_detail.php?id=<?php echo $result_actus_popular["id"]; ?>"><h6><?php echo $result_actus_popular["titre"]; ?></h6></a>
												<p>Publication: <?php echo $result_actus_popular["date_pub"]; ?></p>
											</div>
										</div>
                                            <?php
                                        }
                                    ?>
									
										
																							
									</div>
								</div>
														
							</div>
						</div>
					</div>
				</div>	
        <?php
    }
?>


