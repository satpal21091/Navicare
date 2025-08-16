<?php
if($_POST)
{
	$to_Email   	= "info@navicare.com.au"; //Replace with recipient email address
	$subject        = 'Referral From Navicare Website'; //Subject line for emails
		
	//check if its an ajax request, exit if not
    if(!isset($_SERVER['HTTP_X_REQUESTED_WITH']) AND strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) != 'xmlhttprequest') {
	
		//exit script outputting json data
		$output = json_encode(
		array(
			'type'=>'error', 
			'text' => 'Request must come from Ajax'
		));
		
		die($output);
    } 
	
	/*
	//check $_POST vars are set, exit if any missing
	if(
		!isset($_POST["FirstName"]) || 
		!isset($_POST["LastName"]) || 
		!isset($_POST["dob"]) || 
		!isset($_POST["PhoneNumber"]) ||
		!isset($_POST["NDISNumber"]) ||
		!isset($_POST["AddressLine1"]) ||
		!isset($_POST["Suburb"]) ||
		!isset($_POST["Postcode"]) ||
		!isset($_POST["PrimaryContactFullName"])
	)
	{
		$output = json_encode(array('type'=>'error', 'text' => 'Input fields are empty!'));
		die($output);
	}
*/
	$user_firstname	= filter_var($_POST["FirstName"], FILTER_SANITIZE_STRING);
	$user_lastname = filter_var($_POST["LastName"], FILTER_SANITIZE_STRING);
	$user_gender = filter_var($_POST["Gender"], FILTER_SANITIZE_STRING);
	$user_dob = filter_var($_POST["dob"], FILTER_SANITIZE_STRING);
	$user_participantEmail = filter_var($_POST["ParticipantEmail"], FILTER_SANITIZE_EMAIL);
	$user_PhoneNumber = filter_var($_POST["PhoneNumber"], FILTER_SANITIZE_STRING);
	$user_NDISNumber = filter_var($_POST["NDISNumber"], FILTER_SANITIZE_STRING);
	$user_PlanStartDate = filter_var($_POST["PlanStartDate"], FILTER_SANITIZE_STRING);
	$user_PlanEndDate = filter_var($_POST["PlanEndDate"], FILTER_SANITIZE_STRING);
	$user_Livingarrangements = filter_var($_POST["Livingarrangements"], FILTER_SANITIZE_STRING);
	$user_PreferredLanguage = filter_var($_POST["PreferredLanguage"], FILTER_SANITIZE_STRING);
	$user_PrimaryDisability = filter_var($_POST["PrimaryDisability"], FILTER_SANITIZE_STRING);
	$user_ComorbidDisability = filter_var($_POST["ComorbidDisability"], FILTER_SANITIZE_STRING);
	$user_PleaselistNDISgoals = filter_var($_POST["PleaselistNDISgoals"], FILTER_SANITIZE_STRING);
	$user_FundingAllocation = filter_var($_POST["FundingAllocation"], FILTER_SANITIZE_STRING);
	$user_SafetyConcerns = filter_var($_POST["SafetyConcerns"], FILTER_SANITIZE_STRING);
	$user_AdditionalComments = filter_var($_POST["AdditionalComments"], FILTER_SANITIZE_STRING);
	$user_AddressLine1 = filter_var($_POST["AddressLine1"], FILTER_SANITIZE_STRING);
	$user_AddressLine2 = filter_var($_POST["AddressLine2"], FILTER_SANITIZE_STRING);
	$user_Suburb = filter_var($_POST["Suburb"], FILTER_SANITIZE_STRING);
	$user_State = filter_var($_POST["State"], FILTER_SANITIZE_STRING);
	$user_Postcode = filter_var($_POST["Postcode"], FILTER_SANITIZE_STRING);
	$user_Country = filter_var($_POST["Country"], FILTER_SANITIZE_STRING);
	$user_PrimaryContactFullName = filter_var($_POST["PrimaryContactFullName"], FILTER_SANITIZE_STRING);
	$user_Relationshiptoclient = filter_var($_POST["Relationshiptoclient"], FILTER_SANITIZE_STRING);
	$user_SupportCoordinatorFullName = filter_var($_POST["SupportCoordinatorFullName"], FILTER_SANITIZE_STRING);
	$user_SupportCoordinatorCompany = filter_var($_POST["SupportCoordinatorCompany"], FILTER_SANITIZE_STRING);
	$user_supportCoordinatorPhoneNumber = filter_var($_POST["supportCoordinatorPhoneNumber"], FILTER_SANITIZE_STRING);
	$user_supportCoordinatorEmail = filter_var($_POST["supportCoordinatorEmail"], FILTER_SANITIZE_EMAIL);
	$user_PlanManagerFullName = filter_var($_POST["PlanManagerFullName"], FILTER_SANITIZE_STRING);
	$user_PlanManagerCompany = filter_var($_POST["PlanManagerCompany"], FILTER_SANITIZE_STRING);
	$user_PlanManagerPhoneNumber = filter_var($_POST["PlanManagerPhoneNumber"], FILTER_SANITIZE_STRING);
	$user_PlanManagerEmail = filter_var($_POST["PlanManagerEmail"], FILTER_SANITIZE_EMAIL);
	
	$user_ServicesRequired	= filter_var($_POST["ServicesRequired"], FILTER_SANITIZE_STRING);
	
	$user_PleaselistNDISgoals = str_replace("\&#39;", "'", $user_PleaselistNDISgoals);
	$user_PleaselistNDISgoals = str_replace("&#39;", "'", $user_PleaselistNDISgoals);
	
	$user_FundingAllocation = str_replace("\&#39;", "'", $user_FundingAllocation);
	$user_FundingAllocation = str_replace("&#39;", "'", $user_FundingAllocation);

	$user_SafetyConcerns = str_replace("\&#39;", "'", $user_SafetyConcerns);
	$user_SafetyConcerns = str_replace("&#39;", "'", $user_SafetyConcerns);

	$user_AdditionalComments = str_replace("\&#39;", "'", $user_AdditionalComments);
	$user_AdditionalComments = str_replace("&#39;", "'", $user_AdditionalComments);


	//Sanitize input data using PHP filter_var().	
	/*

	*/
	$address = $user_AddressLine1." ".$user_AddressLine2.", ".$user_Suburb." ".$user_Postcode.", ".$user_State.", ".$user_Country."\r\n";

	//proceed with PHP email.
	$headers = 'From: '.$user_participantEmail.'' . "\r\n" .
	'Reply-To: '.$user_participantEmail.'' . "\r\n" .
	'X-Mailer: PHP/' . phpversion();
	
	$sentMail = @mail($to_Email, $subject, "Congratulations, You have a new Referral. Please see the details below." . "\r\n\n"  .
				'FirstName -- '.$user_firstname. "\r\n" .
				'LastName -- '.$user_lastname. "\r\n" .
				'Gender -- '.$user_gender. "\r\n" .
				'DOB -- '.$user_dob. "\r\n" .
				'Participant Email -- '.$user_participantEmail. "\r\n" .
				'Phone Number -- '.$user_PhoneNumber. "\r\n" .
				'NDIS Number -- '.$user_NDISNumber. "\r\n" .
				'Plan Start Date -- '.$user_PlanStartDate. "\r\n" .
				'Plan End Date -- '.$user_PlanEndDate. "\r\n" .
				'Living Arrangements -- '.$user_Livingarrangements. "\r\n\n" .
				'Preferred Language -- '.$user_PreferredLanguage. "\r\n\n" .
				'Primary Disability -- '.$user_PrimaryDisability. "\r\n\n" .
				'Comorbid Disability -- '.$user_ComorbidDisability. "\r\n\n" .
				'NDIS Goals -- '.$user_PleaselistNDISgoals. "\r\n\n" .
				'Funding Allocation -- '.$user_FundingAllocation. "\r\n\n" .
				'Safety Concerns -- '.$user_SafetyConcerns. "\r\n\n" .
				'Additional Comments -- '.$user_AdditionalComments. "\r\n\n" .
				'Primary Contact FullName -- '.$user_PrimaryContactFullName. "\r\n\n" .
				'Relationship To Client -- '.$user_Relationshiptoclient. "\r\n\n" .
				'Support Coordinator FullName -- '.$user_SupportCoordinatorFullName. "\r\n\n" .
				'Support Coordinator Company -- '.$user_SupportCoordinatorCompany. "\r\n\n" .
				'Support Coordinator PhoneNumber -- '.$user_supportCoordinatorPhoneNumber. "\r\n\n" .
				'Support Coordinator Email -- '.$user_supportCoordinatorEmail. "\r\n\n" .
				'Plan Manager FullName -- '.$user_PlanManagerFullName. "\r\n\n" .
				'Plan Manager Company -- '.$user_PlanManagerCompany. "\r\n\n" .
				'Plan Manager PhoneNumber -- '.$user_PlanManagerPhoneNumber. "\r\n\n" .
				'Plan Manager Email -- '.$user_PlanManagerEmail. "\r\n\n" .
				'Services Required -- '.$user_ServicesRequired. "\r\n\n" .
				'Address -- '.$address, $headers);
	
	if(!$sentMail)
	{
		$output = json_encode(array('type'=>'error', 'text' => 'Could not send mail! Please check your PHP mail configuration.'));
		die($output);
	}else{
		$output = json_encode(array('type'=>'message', 'text' => 'Hi '.$user_firstname .'! Thank you for your email'));
		die($output);
	}

	
}
?>