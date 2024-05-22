<?php 
	try
		{
			include("../connect_bdd.php");
			$connexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
		}
		catch(PDOException $e)
		{
			echo 'Echec : '.$e->getMessage();
		}
		if (!empty(isset($_POST['categorie']))) {
				$nom=htmlspecialchars($_POST['categorie']);
				
							$insert=$connexion->prepare('INSERT INTO categories_livres_fridi(nom) VALUES(:nom)');
							$insert->execute(array(
								'nom' =>$nom
							 ));
							echo"categorie ajouté avec succès";
							header('location:../../vue/admin/ajout_categorie.php');
			}

			?>