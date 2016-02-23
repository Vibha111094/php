<?php
	$user_name = $_POST["user_name"];
	$first_name = $_POST["first_name"];
	$last_name = $_POST["last_name"];
	$password = $_POST["password"];
	$phone_number = $_POST["phone_number"];
	$address = $_POST["address"];
	
	$details = "{'user_name':$user_name,'password':$password,'first_name':$first_name,'last_name':$last_name,'address':$address,'phone_number':$phone_number}";
	
	$object = new services;
	$object.create_user($details);
	
	
?>