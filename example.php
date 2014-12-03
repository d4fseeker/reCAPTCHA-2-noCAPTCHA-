<?php

//Require the recaptcha class
require_once 'recaptcha.php';

//Define the keys for the api, you can get them from https://www.google.com/recaptcha/
$keys = array(
	'site_key' => '6LeWrv4SAAAAAEWu8fPPtss4QFwNcRdA3KUw1B-6',
	'secret_key' => '6LeWrv4SAAAAAM_RBF8srBBpdIrF-0lHY4VlIt7i'
);

//Instantiate the Recaptcha class as $recaptcha
$recaptcha = new Recaptcha($keys);

//If the form is submitted, then check if the response was correct
if(isset($_POST['g-recaptcha-response'])) {
	var_dump($recaptcha->verify($_POST['g-recaptcha-response']));
}


?>
<!DOCTYPE html>
<html>
<head>
	<title>reCAPTCHA 2 Example</title>
</head>
<body>
	<form action="" method="post">
		
		<?php 
			//Render the recaptcha form
			echo $recaptcha->render(); 
		
		?>
	  <input type="submit"/>
	  
	</form>
</body>