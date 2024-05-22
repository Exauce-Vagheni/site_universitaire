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
		if (isset($_FILES['image']) AND !empty($_FILES['image']['name'])) {
				$tailleMax=2097152;
				$extensionsValides= array('jpg','jpeg','gif','png');
                $name_photo=sha1($_FILES['image']['name']);

				if ($_FILES['image']['size']<=$tailleMax) {
					$extensionUpload=strtolower(substr(strrchr($_FILES['image']['name'], '.'), 1));				
						if (in_array($extensionUpload,$extensionsValides)) {
						
						$chemin = '../../vue/img/album/'.$name_photo.'.'.$extensionUpload;
						$resultat=move_uploaded_file($_FILES['image']['tmp_name'],$chemin);
						if($resultat)
						{
							$insert=$connexion->prepare('INSERT INTO photos(img_src) VALUES(:img_src)');
							$insert->execute(array(
								'img_src' =>$name_photo.'.'.$extensionUpload
							 ));
							echo"photo ajouté avec succès";
							header('location:../../vue/admin/ajout_img_album.php');  C GU 
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