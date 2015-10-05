<?php 
require_once("head.php");

?>

<form method="POST"  action="nonindividualdonator_manage.php" >
<p><strong>For Non-Individual Donator to Register</strong></p></br></br>
Group Name: <input type="text" name="groupname" size=30 maxlength=50></br></br>

<p> Group Type : </p></br>
<input type="radio" name="grouptype" value="Company">Company
<input type="radio" name="grouptype" value="Supermarket">Supermarket
<input type="radio" name="grouptype" value="Manufacture">Manufacture
<input type="radio" name="grouptype" value="School">School
<input type="radio" name="grouptype" value="Community">Community
<input type="radio" name="grouptype" value="Factory">Factory
<input type="radio" name="grouptype" value="Others">Others</br></br>

Weight of Donation:  <input type="text" name="weight" size=10 maxlength=20></br></br>
Telephone Number:    <input type="text" name="tel" size=20 maxlength=25></br></br>
Email Address   :    <input type="text" name="email" size=30 maxlength=55></br></br>
Address         :    <input type="text" name="address" size=40 maxlength=100></br></br>
City/Zip
<input type="text" name="city" size=20 maxlength=25><input type="text" name="zip" size=10 maxlength=20></br></br>


<input type="submit" value="OK">
<input type="reset" value="cancel"></br></br></br>



<a href="homepage.php" > [Home] </a>

</form>
