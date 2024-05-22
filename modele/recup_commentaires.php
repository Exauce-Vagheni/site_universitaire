<?php 
include("../../controleur/connect_bdd.php");
    $select_commentaire=$connexion->query("SELECT * FROM commentaires");
    while($result_select_commentaire=$select_commentaire->fetch()){
        ?>
        <div class="single-review item">
                <img src="../img/user_comments/<?php echo $result_select_commentaire["img"];?>" style="max-width:150px;display:inline-block;vertical-align:top;border-radius:50%;height:150px;border:10px solid rgba(4,9,30,0.9);padding:5px;" class="img-fluid rounded-5 border-black" alt="">
                <div style="display:inline-block;vertical-align:top;">
                    <div class="title justify-content-start d-flex">
					<a href="#"><h4><?php echo $result_select_commentaire["nom"]." ";?></h4><br></a><br>
                    <p>(<?php echo $result_select_commentaire["fonction"];?>)</p>
				 </div>
				<p>
                <?php echo $result_select_commentaire["commentaire"];?>
				</p>
                </div>
				
		</div>
        <?php
    }
?>
