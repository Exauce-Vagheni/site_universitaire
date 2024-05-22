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
		if (!empty(isset($_POST['titre'])) AND !empty(isset($_POST['description'])) ) {
				$titre=htmlspecialchars($_POST['titre']);
                $description=htmlspecialchars($_POST['description']);
				
							$insert=$connexion->prepare('INSERT INTO qualites_univ(titre,description) VALUES(:nom)');
							$insert->execute(array(
								'nom' =>$nom,
							 ));
							echo"categorie ajouté avec succès";
							header('location:../../vue/admin/ajout_categorie.php');
			}

			?>