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
		if (isset($_FILES['image']) AND !empty($_FILES['image']['name']) AND isset($_FILES['f_description']) AND !empty($_FILES['f_description']['name']) AND !empty(isset($_POST['nom_fac'])) AND !empty(isset($_POST['description_fac'])) AND !empty(isset($_POST['f_academiques']))) {
				$tailleMax=2097152;
				$extensionsValides= array('jpg','jpeg','gif','png');
				$extensionsValides2= array('pdf','docx','xls','xlsx','txt');
				$nom_fac=htmlspecialchars($_POST['nom_fac']);
				$description_fac=htmlspecialchars($_POST['description_fac']);
				$f_academiques=htmlspecialchars($_POST['f_academiques']);
				$image=str_shuffle($nom_fac);
				$f_description=$_FILES['f_description']['name'];

				if ($_FILES['image']['size']<=$tailleMax AND $_FILES['f_description']['size']<=$tailleMax) {
					$extensionUpload=strtolower(substr(strrchr($_FILES['image']['name'], '.'), 1));
					$extensionUpload2=strtolower(substr(strrchr($_FILES['f_description']['name'], '.'), 1));				
						if (in_array($extensionUpload,$extensionsValides) AND in_array($extensionUpload2,$extensionsValides2)) {
						
						$chemin = '../../vue/img/facultes/'.$image.'.'.$extensionUpload;
						$chemin2= '../../vue/fichiers/f_description/'.$f_description;
						$resultat=move_uploaded_file($_FILES['image']['tmp_name'],$chemin);
						$resultat2=move_uploaded_file($_FILES['f_description']['tmp_name'],$chemin2);
						if($resultat)
						{
							$insert=$connexion->prepare('INSERT INTO facultes(nom_fac,description_fac,image_fac,f_academiques,f_description) VALUES(:nom_fac,:description_fac,:image_fac,:f_academiques,:f_description)');
							$insert->execute(array(
								'nom_fac' =>$nom_fac,
								'description_fac' => $description_fac,
								'image_fac'=>$image.'.'.$extensionUpload,
                                'f_academiques' => $f_academiques,
								'f_description' => $f_description
							 ));
							echo"faculté ajouté avec succès";
							header('location:../../vue/admin/ajout_facultes.php');
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
					
					$msg='votre photo de profil ne doit pas depasser ...';
				}

			}

			?>