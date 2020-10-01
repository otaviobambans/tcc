<?php
	session_start();
	include_once('db_connection.php');
	//new_client_db_insertion
	if(strcasecmp($_POST['form_action'], 'new_client') == 0){
		if(isset($_POST['address_street'])){
			$sql = "INSERT INTO TB_ADDRESS VALUES (NULL, '".$_POST['address_street']."', '".$_POST['address_neighborhood']."', '".$_POST['address_city']."', '".$_POST['address_state']."', '".$_POST['address_complement']."', '".$_POST['address_zipcode']."')";
			if($query = $mysqli->query($sql)){
				echo "address";
			}
			else{
				
			}
		}
		if(isset($_POST['general_user'])){
			$password_hash = password_hash($_POST['general_password'], PASSWORD_DEFAULT);
			$sql = "INSERT INTO TB_CLIENTS VALUES (NULL, '".$_POST['general_user']."', '".$_POST['general_email']."', '".$password_hash."', 0, '".$_POST['personal_complete_name']."', '".$_POST['personal_birthdate']."', '".$_POST['personal_cpf']."', '".$_POST['personal_phone']."', (SELECT CD_ADDRESS FROM TB_ADDRESS ORDER BY CD_ADDRESS DESC LIMIT 1), NULL)";
			if($query = $mysqli->query($sql)){
				echo 'client';
			}
			else{
				
			}
		}
	}
?>