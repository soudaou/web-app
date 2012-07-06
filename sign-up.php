<?php 

require_once 'includes/form-processor.php';

?><!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
	<title>Registration Form Validation</title>
	<link href="css/general.css" rel="stylesheet">
</head>

<body>

	<h1>Sign up:</h1>
    
	<form method="post" action="index.php">
         <div>
            <label for="email">
            	<strong>Email </strong>
				<?php if (isset($errors['email'])): ?> 
            	<strong class="error">is required</strong> 
				<?php endif; ?>
            </label>
            <input id="email" name="email" required value="<?php echo $email; ?>">
        </div>

        <button types="submit">Sign Up</button>
    </form>
</body>
</html>