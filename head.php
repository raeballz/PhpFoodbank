<?php 
session_start(); 

?>
<html>
<body>

<p align="right"> 
  <?php
    if($_SESSION['admin'] == "")
    {
  ?>
       <a href="login.php">Administrator To Login</a>
  <?php
    }
    else
    {
  ?>
       <a href="homepage.php">Home</a>|
       <a href="warehouse.php">Warehouse Management</a>|
       
       <a href="region.php">Region Information</a>|
       <a href="check.php?fun=logout">Logout</a>
  <?php  
    }
  ?>
</p>

<h2 align="center"> T&H FOOD BANK </h2>

<p align="center">
<?php
  for($i=0; $i<150; $i++)
  {
     print "_";
  }
?>
</p>
<br>

</body>
</html>