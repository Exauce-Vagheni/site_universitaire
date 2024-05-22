<?php 
	try
		{
			  include("../../controleur/connect_bdd.php");
			$connexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

            $select=$connexion->query('SELECT * FROM facultes');
            while($resultat=$select->fetch()){
                ?>
                      <option value="<?php echo $resultat['id'];?>"><?php echo $resultat['nom_fac'];?></option>
                <?php
            }
		}
		catch(PDOException $e)
		{
			echo 'Echec : '.$e->getMessage();
		}
		
			

			?>