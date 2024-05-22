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
		if (isset($_FILES['image']) AND !empty($_FILES['image']['name']) AND !empty(isset($_POST['auteur'])) AND !empty(isset($_POST['contenu']))) {
				$tailleMax=2097152;
				$extensionsValides= array('jpg','jpeg','gif','png');
				$auteur=htmlspecialchars($_POST['auteur']);
				$contenu=htmlspecialchars($_POST['contenu']);
				$titre=htmlspecialchars($_POST['titre']);
				$image=sha1($titre);

				if ($_FILES['image']['size']<=$tailleMax) {
					$extensionUpload=strtolower(substr(strrchr($_FILES['image']['name'], '.'), 1));				
						if (in_array($extensionUpload,$extensionsValides)) {
						
						$chemin = '../../vue/img/articles/'.$image.'.'.$extensionUpload;
						$resultat=move_uploaded_file($_FILES['image']['tmp_name'],$chemin);
						if($resultat)
						{
							$insert=$connexion->prepare('INSERT INTO articles(auteur,titre,contenu,photo,date_pub) VALUES(:auteur,:titre,:contenu,:photo,NOW())');
							$insert->execute(array(
								'auteur' =>$auteur,
								'titre' => $titre,
								'contenu' => $contenu,
								'photo'=>$image.'.'.$extensionUpload
							 ));
							echo"article ajouté avec succès";
							header('location:../../vue/admin/ajouter_articles.php');
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