
<?php
	
	require_once 'config/database.php';

	// Get the posted data.
	$postdata = file_get_contents("php://input");

	if (isset($_GET['list'])){

		$FROM = $_GET['from'];
		$TO = $_GET['to'];

		$sql = "SELECT * FROM ligne_facture WHERE `DATE_FACTURE` BETWEEN '$FROM' AND '$TO'";
            
        if($result = mysqli_query($con,$sql)){

            $ligne_factures = array();
			
            $i = 0 ;

            while($ligne_facture = mysqli_fetch_assoc($result)){
                
                $ligne_factures[$i]['ID_LIGNE_FACTURE'] = $ligne_facture['ID_LIGNE_FACTURE'];
                $ligne_factures[$i]['MONTANT_TTC'] = $ligne_facture['MONTANT_TTC'];
                $ligne_factures[$i]['FUSIONNEE'] = $ligne_facture['FUSIONNEE'];
                $ligne_factures[$i]['TYPE_LIGNE_FACTURE'] = $ligne_facture['TYPE_LIGNE_FACTURE'];
				$ligne_factures[$i]['NUMERO_BLOC_NOTE'] = $ligne_facture['NUMERO_BLOC_NOTE'];
				$ligne_factures[$i]['LIBELLE_FACTURE'] = $ligne_facture['LIBELLE_FACTURE'];
				$ligne_factures[$i]['CODE_UTILISATEUR_CREA'] = $ligne_facture['CODE_UTILISATEUR_CREA'];

                $i++;

            }

            echo json_encode($ligne_factures);

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