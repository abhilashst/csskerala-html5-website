<?php
	$owner_email ='contact@csskerala.in';
	$headers = 'From:' . $_POST["email"];
	$subject = 'A message from your site visitor ' . $_POST["name"];
	//$messageBody = $_POST['msg'];
	$messageBody="";
	if($_POST['name']!='nope'){
		$messageBody .= 'Visitor: ' . $_POST["name"] . '' . "\n";
		
	}
	if($_POST['email']!='nope'){
		$messageBody .= 'Email Address: ' . $_POST['email'] . '' . "\n";
		
	}else{
		$headers = '';
	}
	
	if($_POST['phone']!='nope'){		
		$messageBody .= 'Phone Number: ' . $_POST['number'] . '' . "\n";
		
	}	
	
	if($_POST['message']!='nope'){
		$messageBody .= 'Message: ' . $_POST['msg'] . '' . "\n";
	}
	
	if($_POST["stripHTML"] == 'true'){
		$messageBody = strip_tags($messageBody);
	}
	
	try{
		if(!mail($owner_email, $subject, $messageBody, $headers)){
			throw new Exception('mail failed');
		}else{
			echo '<button type="submit" class="btn btn-orange pull-right">Message Send Successfully</button>';
		}
	}catch(Exception $e){
		echo $e->getMessage() ."\n";
	}
?>