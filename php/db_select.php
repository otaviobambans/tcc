<?php
	session_start();
	include_once('db_connection.php');
	//client_database_select
	if(strcasecmp($_POST['form_action'], 'login_client') == 0){
		if(isset($_POST['login'])){
			$sql = "SELECT CD_CLIENT, DS_CLIENT_USER, ST_CLIENT_ADMIN, DS_CLIENT_PASSWORD FROM TB_CLIENTS WHERE DS_CLIENT_USER = '".$_POST['login']."' OR DS_CLIENT_EMAIL = '".$_POST['login']."'";
			if($query = $mysqli->query($sql)){
				while($obj = $query->fetch_object()){
					if(password_verify($_POST['password'], $obj->DS_CLIENT_PASSWORD)){
						$_SESSION['cd_client'] = $obj->CD_CLIENT;
						$_SESSION['ds_client_user'] = $obj->DS_CLIENT_USER;
						$_SESSION['st_client_admin'] = $obj->ST_CLIENT_ADMIN;
						echo $obj->ST_CLIENT_ADMIN;
					}	
				}
			}
		}
	}
	//edit_client_database_select
	if(strcasecmp($_POST['form_action'], 'edit_client') == 0){
		if(isset($_POST['client_access'])){
			$sql = "SELECT C.*, A.* FROM TB_CLIENTS AS C INNER JOIN TB_ADDRESS AS A ON C.ID_ADDRESS = A.CD_ADDRESS WHERE C.CD_CLIENT = '".$_POST['client_access']."'";
			$data_return = '';
			if($query = $mysqli->query($sql)){
				while($obj = $query->fetch_object()){
					$data_return .= $obj->CD_CLIENT;
					$data_return .= "✁";
					$data_return .= $obj->DS_CLIENT_USER;
					$data_return .= "✁";
					$data_return .= $obj->DS_CLIENT_EMAIL;
					$data_return .= "✁";
					//$data_return .= $obj->DS_CLIENT_PASSWORD;
					//$data_return .= "✁";
					//$data_return .= $obj->ST_CLIENT_ADMIN;
					//$data_return .= "✁";
					$data_return .= $obj->NM_CLIENT;
					$data_return .= "✁";
					$data_return .= $obj->DS_CLIENT_BIRTHDATE;
					$data_return .= "✁";
					$data_return .= $obj->DS_CLIENT_CPF;
					$data_return .= "✁";
					$data_return .= $obj->DS_CLIENT_PHONE;
					$data_return .= "✁";
					//$data_return .= $obj->ID_ADDRESS;
					//$data_return .= "✁";
					//$data_return .= $obj->ID_DS_IMG;
					//$data_return .= "✁";
					//$data_return .= $obj->CD_ADDRESS;
					//$data_return .= "✁";
					$data_return .= $obj->DS_ADDRESS_STREET;
					$data_return .= "✁";
					$data_return .= $obj->DS_ADDRESS_NEIGHBORHOOD;
					$data_return .= "✁";
					$data_return .= $obj->DS_ADDRESS_CITY;
					$data_return .= "✁";
					$data_return .= $obj->DS_ADDRESS_STATE;
					$data_return .= "✁";
					$data_return .= $obj->DS_ADDRESS_COMPLEMENT;
					$data_return .= "✁";
					$data_return .= $obj->DS_ADDRESS_ZIPCODE;
					echo $data_return;
				}
			}
		}
	}
?>