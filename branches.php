<?php
    session_start();
    if(!$_SESSION['admin'])
    {
        header("Location:login.php");                       
    }

    require_once("head.php");
    require_once("db_manage.php");

   $regionname=$_GET['regionname'];
   con_db();
   $sql="select R_id,Branchname,Tel ,Email,Address,Zipcode,Staffnumber,Amountgoffood from Branches where RegionName='" . $regionname . "'";
   $rst=mysql_query($sql); 
if( !(mysql_fetch_assoc($rst)))
{
echo "<center>";
echo "<h2>view the Information of  Branches in <?php echo ' {$regionname} ';?></h2>";
echo "<table width='700px' border='1px'>";
echo "<tr>";
echo "<th>ID</th>";
echo "<th>BRANCH NAME</th>";
echo "<th>TELEPHONE NUMBER </th>";
echo "<th>EMAIL</th>";
echo "<th>ADDRESS</th>";
echo "<th>ZIP CODE</th>";
echo "<th>STAFF NUMBER</th>";
echo "<th>AMOUNT OF FOOD</th>";
echo "</tr>";

while($row=mysql_fetch_assoc($rst)){
echo "<tr>";
echo "<td>{$row['R_id']}</td>";
echo"<td>{$row['Branchname']}</td>";
echo"<td>{$row['Tel']}</td>";
echo"<td>{$row['Email']}</td>";
echo"<td>{$row['Address']}</td>";
echo"<td>{$row['Zipcode']}</td>";
echo"<td>{$row['Staffnumber']}</td>";
echo"<td>{$row['Amountgoffood']}</td>";
}

echo"</table>";
}else{
    echo "<p>No branches in this region</p>";
    header("region.php");
}