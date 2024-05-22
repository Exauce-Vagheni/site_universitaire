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
		if (isset($_FILES['image']) AND !empty($_FILES['image']['name']) AND !empty(isset($_POST['nom_groupe'])) AND !empty(isset($_POST['description']))) {
				$tailleMax=2097152;
				$extensionsValides= array('jpg','jpeg','gif','png');
				$nom_groupe=htmlspecialchars($_POST['nom_groupe']);
				$description_groupe=htmlspecialchars($_POST['description']);
				$image=sha1(str_shuffle($nom_groupe));

				if ($_FILES['image']['size']<=$tailleMax) {
					$extensionUpload=strtolower(substr(strrchr($_FILES['image']['name'], '.'), 1));				
						if (in_array($extensionUpload,$extensionsValides)) {
						
						$chemin = '../../vue/img/logos_groupes/'.$image.'.'.$extensionUpload;
						$resultat=move_uploaded_file($_FILES['image']['tmp_name'],$chemin);
						if($resultat)
						{
							$insert=$connexion->prepare('INSERT INTO groupes(nom_groupe,description_groupe,image_groupe) VALUES(:nom_groupe,:description_groupe,:image_groupe)');
							$insert->execute(array(
								'nom_groupe' =>$nom_groupe,
								'description_groupe' => $description_groupe,
								'image_groupe'=>$image.'.'.$extensionUpload,
							 ));
							echo"groupe ajouté avec succès";
							header('location:../../vue/admin/ajout_groupe_univ.php');
						}
						else
						{
							echo $msg='erreur durant l\'enregistrement';
						}
					}
					else
					{
						echo $msg='Votre photo doit etre au format jpg , jpeg , png , gif';
					}
				}
				else{
					
					echo $msg='votre photo de profil ne doit pas depasser ...';
				}

			}

			?>