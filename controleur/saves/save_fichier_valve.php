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
		if (isset($_FILES['fichier']) AND !empty($_FILES['fichier']['name']) AND !empty(isset($_POST['fac']))) {
				$tailleMax=2097152;
				$extensionsValides= array('pdf','doc','docx','xls','xlsx');
				$fac=htmlspecialchars($_POST['fac']);
                $fichier=$_FILES['fichier']['name'];

				if ($_FILES['fichier']['size']<=$tailleMax) {
					$extensionUpload=strtolower(substr(strrchr($_FILES['fichier']['name'], '.'), 1));				
						if (in_array($extensionUpload,$extensionsValides)) {
						
						$chemin = '../../vue/fichiers/fichiers_horaire/'.$fichier;
						$resultat=move_uploaded_file($_FILES['fichier']['tmp_name'],$chemin);
						if($resultat)
						{
							$insert=$connexion->prepare('INSERT INTO fichiers_valve_horaire(id_fac,fichier) VALUES(:id_fac,:fichier)');
							$insert->execute(array(
								'id_fac' =>$fac,
								'fichier'=>$fichier
							 ));
							echo"Horaire ajouté avec succès";
							header('location:../../vue/admin/ajout_fichier_valve.php');
						}
						else
						{
							echo $msg='erreur durant l\'enregistrement';
						}
					}
					else
					{
						echo $msg='Votre fichier doit etre au format pdf,doc,docx,xls,xlsx';
					}
				}
				else{
					
					echo $msg='votre fichier de profil ne doit pas depasser ...';
				}

			}

			?>