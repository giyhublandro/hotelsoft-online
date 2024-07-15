
<?php
	
	require_once 'config/database.php';

	// Get the posted data.
	$postdata = file_get_contents("php://input");

	if (isset($_GET['room_list'])){

		$TYPE = $_GET['room_list'];

		$sql = "SELECT * FROM chambre WHERE `TYPE` = '$TYPE' ORDER BY CODE_CHAMBRE ASC";
            
        if($result = mysqli_query($con,$sql)){

            $chambres = array();
			
            $i = 0 ;

            while($chambre = mysqli_fetch_assoc($result)){
                
                $chambres[$i]['ID_CHAMBRE'] = $chambre['ID_CHAMBRE'];
                $chambres[$i]['CODE_CHAMBRE'] = $chambre['CODE_CHAMBRE'];
                $chambres[$i]['CODE_TYPE_CHAMBRE'] = $chambre['CODE_TYPE_CHAMBRE'];
                $chambres[$i]['ETAT_CHAMBRE_NOTE'] = $chambre['ETAT_CHAMBRE_NOTE'];
				$chambres[$i]['ETAT_CHAMBRE'] = $chambre['ETAT_CHAMBRE'];
				$chambres[$i]['LOCALISATION'] = $chambre['LOCALISATION'];
				$chambres[$i]['TYPE'] = $chambre['TYPE'];

                $i++;

            }

            echo json_encode($chambres);

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
	}else if (isset($_GET['reservationType'])){

		$DATE_DEBUT = $_GET['date_debut'];
		$DATE_FIN = $_GET['date_fin'];

		$type = intval($_GET['reservationType']);
		$TYPE_CHAMBRE_SALLE = $_GET['chambre_salle'];

		if($type === 0){
			//CANCELED
			$ETAT_RESERVATION = 2;
			$sql = "SELECT * FROM reservation WHERE ETAT_RESERVATION = '$ETAT_RESERVATION' AND `DATE_ENTTRE` BETWEEN '$DATE_DEBUT' AND '$DATE_FIN' AND `TYPE`='$TYPE_CHAMBRE_SALLE'";
		}else if($type === 1){
			//EXPECTED
			$ETAT_RESERVATION = 0;
			$sql = "SELECT * FROM reservation WHERE ETAT_RESERVATION = '$ETAT_RESERVATION' AND `DATE_ENTTRE` BETWEEN '$DATE_DEBUT' AND '$DATE_FIN' AND `TYPE`='$TYPE_CHAMBRE_SALLE'";
		}else if($type === 2){
			//IN HOUSE
			$ETAT_RESERVATION = 1;
			$sql = "SELECT * FROM reserve_conf WHERE ETAT_RESERVATION = '$ETAT_RESERVATION' AND `DATE_ENTTRE` <= '$DATE_DEBUT' AND `DATE_SORTIE` >= '$DATE_FIN' AND `TYPE`='$TYPE_CHAMBRE_SALLE' ORDER BY CHAMBRE_ID ASC";
		}else if($type === 3){
			//DUE OUT
			$ETAT_RESERVATION = 1;
			$sql = "SELECT * FROM reserve_conf WHERE ETAT_RESERVATION = '$ETAT_RESERVATION' AND `DATE_SORTIE` <= '$DATE_DEBUT' AND `DATE_SORTIE` >= '$DATE_FIN' AND `TYPE`='$TYPE_CHAMBRE_SALLE' ORDER BY CHAMBRE_ID ASC";
		}else if($type === 4){
			//ATTRIBUTE ROOM
			$ETAT_RESERVATION = 1;
			$sql = "SELECT * FROM reservation WHERE ETAT_RESERVATION = '$ETAT_RESERVATION' AND `DATE_ENTTRE` BETWEEN '$DATE_DEBUT' AND '$DATE_FIN' AND CODE_CHAMBRE IN ('','-') AND `TYPE`='$TYPE_CHAMBRE_SALLE'";
		}else if($type === 5){
			//NO SHOW
			$ETAT_RESERVATION = 1;
			$sql = "SELECT * FROM reserve_temp WHERE ETAT_RESERVATION = '$ETAT_RESERVATION' AND `DATE_ENTTRE` BETWEEN '$DATE_DEBUT' AND '$DATE_FIN' AND `TYPE`='$TYPE_CHAMBRE_SALLE'";
		}else if($type === 8){
			//CHECKED OUT
			$ETAT_RESERVATION = 0;
			$sql = "SELECT * FROM reserve_conf WHERE ETAT_RESERVATION = '$ETAT_RESERVATION' AND `DATE_SORTIE` <= '$DATE_DEBUT' AND `DATE_SORTIE` >= '$DATE_FIN' AND `TYPE`='$TYPE_CHAMBRE_SALLE' ORDER BY CHAMBRE_ID ASC";
		}else if($type === 7){
			//RESERVATIONS

		}else if($type === 9){
			//TOTAL DEPARTURE
			$sql = "SELECT * FROM reserve_conf WHERE `DATE_SORTIE` <= '$DATE_DEBUT' AND `DATE_SORTIE` >= '$DATE_FIN' ORDER BY CHAMBRE_ID ASC";
		}

		if($result = mysqli_query($con,$sql)){
			
			$reservations = array();

			$i = 0 ;
			

			while($reservation = mysqli_fetch_assoc($result)){

				$reservations[$i]['ID_RESERVATION'] = $reservation['ID_RESERVATION'];
				$reservations[$i]['CHAMBRE_ID'] = $reservation['CHAMBRE_ID'];
				$reservations[$i]['CLIENT_ID'] = $reservation['CLIENT_ID'];
				$reservations[$i]['UTILISATEUR_ID'] = $reservation['UTILISATEUR_ID'];
				$reservations[$i]['NOM_CLIENT'] = $reservation['NOM_CLIENT'];
				$reservations[$i]['DATE_ENTTRE'] = $reservation['DATE_ENTTRE'];
				$reservations[$i]['DATE_SORTIE'] = $reservation['DATE_SORTIE'];
				$reservations[$i]['NB_PERSONNES'] = $reservation['NB_PERSONNES'];
				$reservations[$i]['AGENCE_ID'] = $reservation['AGENCE_ID'];
				$reservations[$i]['MONTANT_ACCORDE'] = $reservation['MONTANT_ACCORDE'];
				$reservations[$i]['ETAT_RESERVATION'] = $reservation['ETAT_RESERVATION'];
				$reservations[$i]['MONTANT_ACCORDE'] = $reservation['MONTANT_ACCORDE'];
				$reservations[$i]['SOLDE_RESERVATION'] = $reservation['SOLDE_RESERVATION'];
				$reservations[$i]['ETAT_NOTE_RESERVATION'] = $reservation['ETAT_NOTE_RESERVATION'];

				$i++;
			}
		
			echo json_encode($reservations);

		}else{

		}

	}else if (isset($_GET['room'])){

		$DATE_DEBUT = $_GET['date_debut'];
		$DATE_FIN = $_GET['date_fin'];

		$image_check_out = "../../assets/img/CHECK-OUT.png";
		$image_occupied = "../../assets/img/OCCUPIED.png";
		$image_free = "../../assets/img/FREE-ROOM.png";

		$TYPE_CHAMBRE_SALLE = $_GET['chambre_salle'];

		$rooms = array();

		$sql = "SELECT * FROM chambre WHERE `TYPE` = '$TYPE_CHAMBRE_SALLE' ORDER BY CODE_CHAMBRE ASC";
            
        if($result = mysqli_query($con,$sql)){

            $chambres = array();
			
            $i = 0 ;

            while($chambre = mysqli_fetch_assoc($result)){

                $chambres[$i]['CODE_CHAMBRE'] = $chambre['CODE_CHAMBRE'];
				//$chambres[$j]['ETAT_CHAMBRE_NOTE'] = $chambre['ETAT_CHAMBRE_NOTE'];
                $i++;

            }

			for ($j=0; $j < $i; $j++) { 
				
				$CHAMBRE_ID = $chambres[$j]['CODE_CHAMBRE'];

				$rooms[$j]['IMAGE'] = $image_free;
				$rooms[$j]['CODE_CHAMBRE'] = $CHAMBRE_ID;
				//$rooms[$j]['ETAT_CHAMBRE_NOTE'] = $CHAMBRE_ID;
				
				$ETAT_RESERVATION = 1;
				$sql = "SELECT * FROM reserve_conf WHERE ETAT_RESERVATION = '$ETAT_RESERVATION' AND `DATE_ENTTRE` <= '$DATE_DEBUT' AND `DATE_SORTIE` >= '$DATE_FIN' AND `TYPE`='$TYPE_CHAMBRE_SALLE' AND `CHAMBRE_ID` ='$CHAMBRE_ID' ";

				if($result = mysqli_query($con,$sql)){

					while($room = mysqli_fetch_assoc($result)){

						if($room['DATE_SORTIE'] == $DATE_DEBUT){

							$rooms[$j]['IMAGE'] = $image_check_out;
							$rooms[$j]['CODE_CHAMBRE'] = $CHAMBRE_ID;

						}else{

							$rooms[$j]['IMAGE'] = $image_occupied;
							$rooms[$j]['CODE_CHAMBRE'] = $CHAMBRE_ID;

						}

					}

				}

			}

			echo json_encode($rooms);

        }

	}
?>