
<?php
	
	require_once 'config/database.php';

	// Get the posted data.
	$postdata = file_get_contents("php://input");

	if (isset($_GET['working_date'])){

		$sql = "SELECT * FROM cloture";
            
        if($result = mysqli_query($con,$sql)){

            $clotures = array();

            $i = 0 ;

            while($cloture = mysqli_fetch_assoc($result)){
                
                $clotures[$i]['ID_CLOTURE'] = $cloture['ID_CLOTURE'];
                $clotures[$i]['CODE_CLOTURE'] = $cloture['CODE_CLOTURE'];
                $clotures[$i]['DATE_DE_TRAVAIL'] = $cloture['DATE_DE_TRAVAIL'];
				$clotures[$i]['ETAT'] = $cloture['ETAT'];
				$clotures[$i]['DATE_DE_CONTROLE'] = $cloture['DATE_DE_CONTROLE'];

                $i++;

            }

            echo json_encode($clotures);

        }else{
            http_response_code(422);
        }

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