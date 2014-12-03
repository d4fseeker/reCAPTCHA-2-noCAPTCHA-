reCAPTCHA-2-noCAPTCHA-
======================

Google's new version of reCAPTCHA called noCAPTCHA
<br>
<p>
This is a simple class written to use the new Google reCAPTCHA 2 (noCAPTCHA)
You can find a basic example below :)
</p>
<h2>Basic Example</h2>
PHP:
<code>
	<?php
	
	//Require the recaptcha class
	require_once 'recaptcha.php';
	
	//Define the keys for the api, you can get them from https://www.google.com/recaptcha/
	$keys = array(
		'site_key' => 'XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX',
		'secret_key' => 'XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX'
	);
	
	//Instantiate the Recaptcha class as $recaptcha
	$recaptcha = new Recaptcha($keys);
	
	//If the form is submitted, then check if the response was correct
	if(isset($_POST['g-recaptcha-response'])) {
		var_dump($recaptcha->verify($_POST['g-recaptcha-response']));
	}
	
	
	?>

</code>

HTML:

<code>
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
</code>