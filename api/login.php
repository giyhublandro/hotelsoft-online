
<?php
	
	require_once 'config/database.php';

	// Get the posted data.
	$postdata = file_get_contents("php://input");

	if (isset($_GET['logOut'])){

		$code = (int)$_GET['logOut'];
		$actif = 0;
		$sql2= "UPDATE `utilisateur` SET `actif`='$actif' WHERE `id` ='$code'";

		if(mysqli_query($con,$sql2)){

			$sql = "SELECT * FROM utilisateur WHERE id='$code'";

			if($result = mysqli_query($con,$sql)){

				$users = array();

				$i = 0 ;

				while($user = mysqli_fetch_assoc($result)){
					
					$users[$i]['id'] = $user['id'];
					$code =$user['id'];
					$users[$i]['mot_de_passe'] = $user['mot_de_passe'];
					$users[$i]['nom'] = $user['nom'];
					$nom = $user['nom'];
					$users[$i]['prenom'] = $user['prenom'];
					$prenom = $user['prenom'];
					$users[$i]['email'] = $user['email'];
					$email = $user['email'];
					$users[$i]['telephone'] = $user['telephone'];

					$i++;
				}

			}

			$CODE_USER = $email; 
			$NOM =$nom;
			$PRENOM = $prenom;
			$LIBEL_OPER = "Deconnexion de ".$prenom." ".$nom  ;
			$NOM_POSTE = "ip(167.150.140.152)";
		
			// Create.
			$sql = "INSERT INTO `mouchard`(`CODE_USER`, `NOM`, `PRENOM`, `LIBEL_OPER`, `NOM_POSTE`) 
			VALUES ('$CODE_USER','$NOM','$PRENOM','$LIBEL_OPER','$NOM_POSTE')";

			if(mysqli_query($con,$sql)){}	

		}

		echo json_encode("Updated");

	}else if(isset($postdata) && !empty($postdata)){
		// Extract the data.
		$request = json_decode($postdata);
		
		// Validate.
		if(trim($request->CODE_UTILISATEUR) === '' || trim($request->PASSWORD_UTILISATEUR) === ''){
			return http_response_code(400);			
		}

		// Sanitize.
		$CODE_UTILISATEUR = mysqli_real_escape_string($con, $request->CODE_UTILISATEUR);
		$PASSWORD_UTILISATEUR = mysqli_real_escape_string($con, $request->PASSWORD_UTILISATEUR);
		
		// Create.

		$sql = "SELECT * FROM utilisateurs WHERE CODE_UTILISATEUR = '{$CODE_UTILISATEUR}' AND PASSWORD_UTILISATEUR = '{$PASSWORD_UTILISATEUR}'";
		
		if($result = mysqli_query($con,$sql)){
			
			$users = array();

			$i = 0 ;

			while($user = mysqli_fetch_assoc($result)){

				$users[$i]['ID_UTILISATEUR'] = $user['ID_UTILISATEUR'];
				$users[$i]['PASSWORD_UTILISATEUR'] = $user['PASSWORD_UTILISATEUR'];
				$users[$i]['NOM_UTILISATEUR'] = $user['NOM_UTILISATEUR'];
				$users[$i]['GRIFFE_UTILISATEUR'] = $user['GRIFFE_UTILISATEUR'];
				$users[$i]['CODE_UTILISATEUR'] = $user['CODE_UTILISATEUR'];
				$users[$i]['CATEG_UTILISATEUR'] = $user['CATEG_UTILISATEUR'];
				$users[$i]['POSTE_UTILISATEUR'] = $user['POSTE_UTILISATEUR'];

				$i++;
			}
		
			echo json_encode($users);

		}else{

		}
	}
?>