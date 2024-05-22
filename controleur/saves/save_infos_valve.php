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
		if (isset($_FILES['fichier']) AND !empty($_FILES['fichier']['name']) AND !empty(isset($_POST['titre'])) AND !empty(isset($_POST['contenu']))) {
				$tailleMax=2097152;
				$extensionsValides= array('pdf','doc','docx','xls','xlsx');
				$titre=htmlspecialchars($_POST['titre']);
				$contenu=htmlspecialchars($_POST['contenu']);
				$fichier=$_FILES['fichier']['name'];

				if ($_FILES['fichier']['size']<=$tailleMax) {
					$extensionUpload=strtolower(substr(strrchr($_FILES['fichier']['name'], '.'), 1));				
						if (in_array($extensionUpload,$extensionsValides)) {
						
						$chemin = '../../vue/fichiers/pieces_jointes/'.$fichier.'.'.$extensionUpload;
						$resultat=move_uploaded_file($_FILES['fichier']['tmp_name'],$chemin);
						if($resultat)
						{
							$insert=$connexion->prepare('INSERT INTO infos_valve(titre,contenu,fichier,date_pub) VALUES(:titre,:contenu,:fichier,NOW())');
							$insert->execute(array(
								'titre' => $titre,
								'contenu' => $contenu,
								'fichier'=>$fichier.'.'.$extensionUpload,
							 ));
							echo"info ajouté avec succès";
							header('location:../../vue/admin/ajout_infos_valve.php');
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