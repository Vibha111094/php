<?php
	
	//$object1 = new services ;
    //$details = "{'user_name':'test@test.com','password':'1212121','first_name':'Surya','last_name':'Sarvanan','address':'#536,hfdsfhjds','phone_number':'7873847893'}";
	//$object1.create_user($details) ;
	class services {
		
		function retrieve_user($auth) {
			$url = "http://localhost:8080/web_service/webapi/myresource/retrieve";
			$retrieve = curl_init($url);

			curl_setopt($retrieve, CURLOPT_URL, $url);
			curl_setopt($retrieve, CURLOPT_RETURNTRANSFER, true);
			//curl_setopt($service, CURLOPT_POST, true);
			curl_setopt($retrieve, CURLOPT_HTTPHEADER, $auth);
			$retrieve_status = curl_getinfo($retrieve, CURLINFO_HTTP_CODE);
			
			$response = json_decode(curl_exec($retrieve), TRUE);
			curl_close($retrieve);
			
			
			echo $retrieve_status;

			print_r($response);
		}
		
		function create_user($details) {
			$url = "http://localhost:8080/web_service/webapi/myresource/create";
			$create = curl_init($url);
			curl_setopt($create, CURLOPT_HTTPHEADER, array("Content-type: application/json"));
			curl_setopt($create, CURLOPT_URL, $url);
			curl_setopt($create, CURLOPT_POST, true);
			curl_setopt($create, CURLOPT_RETURNTRANSFER, true);
			//curl_setopt($user, CURLOPT_HTTPHEADER, $auth);		
			curl_setopt($create, CURLOPT_POSTFIELDS, $details);
			print_r($result = curl_exec($create));
			
			$create_status = curl_getinfo($create, CURLINFO_HTTP_CODE);
			echo $create_status;
			
						
			curl_close($create);
			
		}
		
		function update_pin($pin_details, $auth){
			print_r($pin_details);
			$url = "http://192.168.10.112:8080/test003/webapi/update";
			$update = curl_init($url);
			curl_setopt($update, CURLOPT_HTTPHEADER, array("Authorization: $auth", "Content-type: application/json"));
			curl_setopt($update, CURLOPT_URL, $url);
			//curl_setopt($update, CURLOPT_POST, true);
			curl_setopt($update, CURLOPT_CUSTOMREQUEST, 'PATCH');
			curl_setopt($update, CURLOPT_POSTFIELDS, $pin_details);
			curl_setopt($update, CURLOPT_RETURNTRANSFER, true);	
			$after_patch = curl_exec($update);
			$status = curl_getinfo($update, CURLINFO_HTTP_CODE);
			
			print_r($after_patch);
			echo $status;
			
			curl_close($update);
			
		}
	}
	$object1 = new services ;
    $details = "{'user_name':'test@test.com','password':'1212121','first_name':'Surya','last_name':'Sarvanan','address':'#536,hfdsfhjds','phone_number':'7873847893'}";
	$object1.create_user($details) ;

 ?>
	