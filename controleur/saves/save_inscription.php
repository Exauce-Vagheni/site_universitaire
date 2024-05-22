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
		if (isset($_FILES['fichier']) AND !empty($_FILES['fichier']['name']) AND isset($_FILES['photo']) AND !empty($_FILES['photo']['name']) AND !empty(isset($_POST['nom'])) AND !empty(isset($_POST['telephone'])) AND !empty(isset($_POST['email'])) AND !empty(isset($_POST['fac']))) {
				$tailleMax=20971520;
				$extensionsValides= array('pdf','doc','docx','xls','xlsx');
                $extensionsValides2= array('png','jpeg','jpg','gif');
				$nom=htmlspecialchars($_POST['nom']);
				$telephone=htmlspecialchars($_POST['telephone']);
				$email=htmlspecialchars($_POST['email']);
				$fichier=$_FILES['fichier']['name'];
                $fac=htmlspecialchars($_POST['fac']);
                $photo=sha1($_FILES['photo']['name']);

				if ($_FILES['fichier']['size']<=$tailleMax AND $_FILES['photo']['size']<=$tailleMax) {
					$extensionUpload=strtolower(substr(strrchr($_FILES['fichier']['name'], '.'), 1));
                    $extensionUpload2=strtolower(substr(strrchr($_FILES['photo']['name'], '.'), 1));				
						if (in_array($extensionUpload,$extensionsValides) AND in_array($extensionUpload2,$extensionsValides2)) {
						
						$chemin = '../../vue/fichiers/inscription/'.$fichier.'.'.$extensionUpload;
                        $chemin1 = '../../vue/img/inscription/'.$photo.'.'.$extensionUpload2;
						$resultat=move_uploaded_file($_FILES['fichier']['tmp_name'],$chemin);
                        $resultat1=move_uploaded_file($_FILES['photo']['tmp_name'],$chemin1);
						if($resultat AND $resultat1)
						{
							$insert=$connexion->prepare('INSERT INTO inscriptions_online(nom,telephone,email,fac,fichier,photo) VALUES(:nom,:telephone,:email,:fac,:fichier,:photo)');
							$insert->execute(array(
								'nom' =>$nom,
								'telephone' => $telephone,
								'email' => $email,
								'fac'=> $fac,
								'fichier'=>$fichier.'.'.$extensionUpload,
                                'photo'=>$photo.'.'.$extensionUpload2
							 ));
							echo"memoire ajouté avec succès";
							header('location:../../vue/utilisateur/index.php');
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
					
					echo $msg='votre fichier ou votre photo ne doit pas depasser ...';
				}

			}

			?>