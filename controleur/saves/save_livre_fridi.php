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
		if (isset($_FILES['fichier']) AND !empty($_FILES['fichier']['name']) AND !empty(isset($_POST['auteur'])) AND !empty(isset($_POST['intro'])) AND !empty(isset($_POST['categorie']))) {
				$tailleMax=2097152;
				$extensionsValides= array('pdf','doc','docx','xls','xlsx');
				$auteur=htmlspecialchars($_POST['auteur']);
				$intro=htmlspecialchars($_POST['intro']);
				$titre=htmlspecialchars($_POST['titre']);
                $categorie=htmlspecialchars($_POST['categorie']);
				$fichier=$_FILES['fichier']['name'];

				if ($_FILES['fichier']['size']<=$tailleMax) {
					$extensionUpload=strtolower(substr(strrchr($_FILES['fichier']['name'], '.'), 1));				
						if (in_array($extensionUpload,$extensionsValides)) {
						$chemin='../../vue/fichiers/livres/'.$fichier.'.'.$extensionUpload;
						$resultat=move_uploaded_file($_FILES['fichier']['tmp_name'],$chemin);
						if($resultat)
						{
							$insert=$connexion->prepare('INSERT INTO livres_fridi(titre,auteur,id_categorie,intro,date_pub,fichier) VALUES(:titre,:auteur,:id_categorie,:intro,NOW(),:fichier)');
							$insert->execute(array(
								'titre' => $titre,
                                'auteur' =>$auteur,
                                'id_categorie'=>$categorie,
								'intro' => $intro,
								'fichier'=>$fichier.'.'.$extensionUpload
							 ));
							echo"livre ajouté avec succès";
							header('location:../../vue/admin/ajout_livre_fridi.php');
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
					
					echo $msg='votre fichier ne doit pas depasser 20mb';
				}

			}

			?>