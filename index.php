<!DOCTYPE html>
<html>
  <head>
    <script src="https://www.google.com/recaptcha/api.js?render=YOUR_SITE_KEY"></script>
  </head>
  <body>  
	<form id="enq-frm" role="form" method="post" action="logincheck.php" class="form-horizontal">
    	<input type="submit" value="Post" class="btn btn-success btn-block" name="post">
		<input type="hidden" id="token" name="token">
	</form>
  </body>

  <script>
  grecaptcha.ready(function() {
      grecaptcha.execute('YOUR_SITE_KEY', {action: 'homepage'}).then(function(token) {
         document.getElementById("token").value = token;
      });
  });
  </script>

</html>