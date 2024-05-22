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
		if (isset($_FILES['image']) AND !empty($_FILES['image']['name']) AND !empty(isset($_POST['nom'])) AND !empty(isset($_POST['commentaire']) AND !empty(isset($_POST['fonction'])))) {
				$tailleMax=2097152;
				$extensionsValides= array('jpg','jpeg','gif','png');
				$nom=htmlspecialchars($_POST['nom']);
				$commentaire=htmlspecialchars($_POST['commentaire']);
				$image=sha1($nom);
                $fonction=htmlspecialchars($_POST['fonction']);

				if ($_FILES['image']['size']<=$tailleMax) {
					$extensionUpload=strtolower(substr(strrchr($_FILES['image']['name'], '.'), 1));				
						if (in_array($extensionUpload,$extensionsValides)) {
						
						$chemin = '../../vue/img/user_comments/'.$image.'.'.$extensionUpload;
						$resultat=move_uploaded_file($_FILES['image']['tmp_name'],$chemin);
						if($resultat)
						{
							$insert=$connexion->prepare('INSERT INTO commentaires(nom,commentaire,img,fonction) VALUES(:nom,:commentaire,:img,:fonction)');
							$insert->execute(array(
								'nom' =>$nom,
								'commentaire' =>$commentaire,
								'img'=>$image.'.'.$extensionUpload,
                                'fonction' =>$fonction,
							 ));
							echo"faculté ajouté avec succès";
							header('location:../../vue/admin/ajout_commentaire.php');
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