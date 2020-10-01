<?php
    include_once('db_connection.php');
    function ProductList(){
        if(strcasecmp($_POST['campo'], 'valor_do_campo') == 0){
			if(isset($_POST[''])){
				$sql = "SELECT * FROM WHERE ";
				if($query = $mysqli->query($sql)){
					while($obj = $query->fetch_object()){

					}
				}
				else{
					$error = printf("Error: %s\n", $mysqli->error);
				}
			}
		}
	}
	function NewProduct(){
		if(strcasecmp($_POST['campo'], 'valor_do_campo') == 0){
			if(isset($_POST[''])){
				$sql = "INSERT INTO VALUES (NULL, )";
				if($query = $mysqli->query($sql)){

				}
				else{

				}
			}
		}
	}
	function UpdateProduct(){
		if(strcasecmp($_POST['campo'], 'valor_do_campo') == 0){
			if(isset($_POST[''])){
				$sql =  "UPDATE SET ";
				if($query = $mysqli->query($sql)){

				}
				else{
					
				}
			}
		}
	}
?>