<?php
require_once("head.php");

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Register as Donator</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body>
<h1>Please Fill In The Form For Us To Record Your Information</h1>
	
	<form action="individualdonator_manage.php"  method="post">
		
     	Firstname     : <input type="text" name="firstname" /><br>
		 Lastname     : <input type="text" name="lastname" /><br>
    Weight of Donation: <input type="text" name="weight" /><br>
		 Your Address : <input type="text" name="address"/><br>
		 City/Zip</br>
<input type="text" name="city"/>                            <input type="text" name="zip"/></br>
		 Your Email   : <input type="text" name="email"/><br>
         Your Telephone Number: <input type="text" name="tel"/><br>
		<input type="submit" value="Add Person"/>
		<input type="reset" value="Cancle"/><br>
		
	</form>
	
<a href="homepage.php" > [Home] </a>
</body>
</html>



