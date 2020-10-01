<?php
	session_start();
	include_once('db_connection.php');
	if(strcasecmp($_POST['form_action'], 'edit_client') == 0){
		if(isset($_POST['client_id'])){
			$password_hash = password_hash($_POST['general_password'], PASSWORD_DEFAULT);
			$sql =  "UPDATE TB_CLIENTS AS C INNER JOIN TB_ADDRESS AS A ON C.ID_ADDRESS = A.CD_ADDRESS SET C.DS_CLIENT_USER = '".$_POST['general_user']."', C.DS_CLIENT_EMAIL = '".$_POST['general_email']."', C.DS_CLIENT_PASSWORD = '".$password_hash."', C.NM_CLIENT = '".$_POST['personal_complete_name']."', C.DS_CLIENT_BIRTHDATE = '".$_POST['personal_birthdate']."', C.DS_CLIENT_CPF = '".$_POST['personal_cpf']."', C.DS_CLIENT_PHONE = '".$_POST['personal_phone']."', A.DS_ADDRESS_STREET = '".$_POST['address_street']."', A.DS_ADDRESS_NEIGHBORHOOD = '".$_POST['address_neighborhood']."', A.DS_ADDRESS_CITY = '".$_POST['address_city']."', A.DS_ADDRESS_STATE = '".$_POST['address_state']."', A.DS_ADDRESS_COMPLEMENT = '".$_POST['address_complement']."', A.DS_ADDRESS_ZIPCODE = '".$_POST['address_zipcode']."' WHERE C.CD_CLIENT = '".$_POST['client_id']."'";
			if($query = $mysqli->query($sql)){
				echo 1;
			}
			else{
				echo 0;
			}
		}

	}
?>