$(document).ready((event)=> {
	//new_client_db_insertion
	$('#new_client').submit((event)=>{
		event.preventDefault()
		if($('#password').val() == $('#conf_password').val()){
			$.ajax({
				url: 'php/db_insert.php',
				type: 'POST',
				dataType: 'html',
				async: true,
				data: {
					'form_action': 'new_client',
					'general_user': $('#user').val(),
					'general_email': $('#email').val(),
					'general_password': $('#password').val(),
					'personal_complete_name': $('#complete_name').val(),
					'personal_birthdate': $('#birthdate').val(),
					'personal_cpf': $('#cpf').val(),
					'personal_phone': $('#phone').val(),
					'address_street': $('#street').val(),
					'address_neighborhood': $('#neighborhood').val(),
					'address_city': $('#city').val(),
					'address_state': $('#state').val(),
					'address_complement': $('#complement').val(),
					'address_zipcode': $('#zipcode').val()
				}
			})
			.done((data)=>{
				window.location.href = 'login.php'
			})
		}
		else{
			
		}
	})
	//client_login_db_select
	$('#login_client').submit((event)=>{
		event.preventDefault()
		$.ajax({
			url: 'php/db_select.php',
			type: 'POST',
			dataType: 'html',
			async: true,
			data: {
				'form_action': 'login_client',
				'login': $('#login').val(),
				'password': $('#password').val()
			}
		})
		.done((data)=>{
			if(data){
				window.location.reload()
				if(data == 0){
					window.location.href = 'index.php'
				}
				else if(data == 1){
					window.location.href = 'admin_panel.php'
				}
			}
			else{
				window.location.reload()
				alert('login ou senha incorretos')
			}
		})
	})
	//client_edit_db_update_data_select
	$('#edit_client_request').submit((event)=>{
		event.preventDefault()
		$.ajax({
			url: 'php/db_select.php',
			type: 'POST',
			dataType: 'html',
			async: true,
			data: {
				'form_action': 'edit_client',
				'client_access': $('#client_access').val()
			}
		})
		.done((data)=>{
			if(data){
				data_return = data.split('✁')
				$('#client_id').val(data_return[0])
				$('#user').val(data_return[1])
				$('#email').val(data_return[2])
				//$('#password').val()
				$('#complete_name').val(data_return[3])
				$('#birthdate').val(data_return[4])
				$('#cpf').val(data_return[5])
				$('#phone').val(data_return[6])
				$('#street').val(data_return[7])
				$('#neighborhood').val(data_return[8])
				$('#city').val(data_return[9])
				$('#state').val(data_return[10])
				$('#complement').val(data_return[11])
				$('#zipcode').val(data_return[12])
			}
		})
	}).submit()
	//client_edit_db_update_data_send
	$('#edit_client').submit((event)=>{
		event.preventDefault()
		if($('#password').val() == $('#conf_password').val()){
			$.ajax({
				url: 'php/db_update.php',
				type: 'POST',
				dataType: 'html',
				async: true,
				data: {
					'form_action': 'edit_client',
					'client_id': $('#client_id').val(),
					'general_user': $('#user').val(),
					'general_email': $('#email').val(),
					'general_password': $('#password').val(),
					'personal_complete_name': $('#complete_name').val(),
					'personal_birthdate': $('#birthdate').val(),
					'personal_cpf': $('#cpf').val(),
					'personal_phone': $('#phone').val(),
					'address_street': $('#street').val(),
					'address_neighborhood': $('#neighborhood').val(),
					'address_city': $('#city').val(),
					'address_state': $('#state').val(),
					'address_complement': $('#complement').val(),
					'address_zipcode': $('#zipcode').val()
				}
			})
			.done((data)=>{
				if(data){
					if(data == 1){
						alert('Sucesso!')
					}
					else if(data == 0){
						alert('Erro!')
					}
					else{

					}
				}
			})
		}
		else{
			
		}
	})
})