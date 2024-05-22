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
		if (isset($_FILES['fichier']) AND !empty($_FILES['fichier']['name']) AND !empty(isset($_POST['etudiant'])) AND !empty(isset($_POST['intro'])) AND !empty(isset($_POST['fac']))) {
				$tailleMax=2097152;
				$extensionsValides= array('pdf','doc','docx','xls','xlsx');
				$etudiant=htmlspecialchars($_POST['etudiant']);
				$intro=htmlspecialchars($_POST['intro']);
				$titre=htmlspecialchars($_POST['titre']);
				$fichier=$_FILES['fichier']['name'];
                $fac=htmlspecialchars($_POST['fac']);

				if ($_FILES['fichier']['size']<=$tailleMax) {
					$extensionUpload=strtolower(substr(strrchr($_FILES['fichier']['name'], '.'), 1));				
						if (in_array($extensionUpload,$extensionsValides)) {
						
						$chemin = '../../vue/fichiers/memoires/'.$fichier.'.'.$extensionUpload;
						$resultat=move_uploaded_file($_FILES['fichier']['tmp_name'],$chemin);
						if($resultat)
						{
							$insert=$connexion->prepare('INSERT INTO memoires(etudiant,titre,intro,fichier,date_pub,fac) VALUES(:etudiant,:titre,:intro,:fichier,NOW(),:fac)');
							$insert->execute(array(
								'etudiant' =>$etudiant,
								'titre' => $titre,
								'intro' => $intro,
								'fichier'=>$fichier.'.'.$extensionUpload,
                                'fac'=>$fac
							 ));
							echo"memoire ajouté avec succès";
							header('location:../../vue/admin/ajouter_memoires.php');
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