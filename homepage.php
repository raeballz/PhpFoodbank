<?php
    session_start();

    require_once("head.php");
    require_once("db_manage.php");
?>
<center>
<h1><strong>If you want to donate food</strong></h1></br>
<a href="Readme1.php">Before Your kind donation Please READ ME first!</a></br>
<a href="individualdonator.php">Register As Donator(Individual)</a></br>
<a href="nonindividualdonator.php">Register As a Group</a></br></br>

<h1><strong>If you need food</strong></h1></br>
<a href="Readme2.php">Before YOU APPLY FOR HELP Please read me first!</a></br></br>
<a href="Client.php">Register As a Client</a></br></br>

<h1><strong>If you want to join us as VOLUNTEER</strong></h1></br>
<a href="Readme3.php">Before Register as a volunteer Please READ ME first!</a></br></br>
<a href="volunteer.php">Register As a Volunteer</a></br></br>
</center>
<?php
include"bottom.php";
?>