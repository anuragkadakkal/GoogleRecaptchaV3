<?php 
	if(isset($_POST['post'])) {
		$url = "https://www.google.com/recaptcha/api/siteverify";
		$data = [
			'secret' => "YOUR_SECRET_KEY",
			'response' => $_POST['token'],
		];

		$options = array(
		    'http' => array(
		      'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
		      'method'  => 'POST',
		      'content' => http_build_query($data)
		    )
		  );

		$context  = stream_context_create($options);
  		$response = file_get_contents($url, false, $context);

		$res = json_decode($response, true);
		if($res['success'] == true) {

			// Perform you logic here for ex:- save you data to database
  			echo '<div class="alert alert-success">
			  		<strong>Success!</strong> Your inquiry successfully submitted.
		 		  </div>'.$_POST['token'];
		} else {
			echo '<div class="alert alert-warning">
					  <strong>Error!</strong> You are not a human.
				  </div>';
		}
	}

 ?>