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
   
   $sql1="select ID_id,Firstname,Lastname,Tel,Email,Address,Zipcode,date_added from individualdonator where City='" . $regionname . "'";
   $sql2="select ND_id,GroupName,Group_type,Tel,Email,Address,Zipcode,date_added from nonindividualdonator where City='" . $regionname . "'";
   $rst1=mysql_query($sql1); 
   $rst2=mysql_query($sql2);

if( !(mysql_fetch_assoc($rst1)))
{
echo "<center>";
echo "<h2>view the Information of Individual Donators in <?php echo ' {$regionname} ';?></h2>";
echo "<table width='700px' border='1px'>";
echo "<tr>";
echo "<th>ID</th>";
echo "<th>NAME</th>";
echo "<th>TELEPHONE NUMBER </th>";
echo "<th>EMAIL</th>";
echo "<th>ADDRESS</th>";
echo "<th>ZIP CODE</th>";
echo "<th>DATE OF DONATION</th>";
echo "</tr>";

while($row=mysql_fetch_assoc($rst)){
echo "<tr>";
echo "<td>{$row['ID_id']}</td>";
echo"<td>{$row['Firstname']}  {$row['Lastname']}</td>";
echo"<td>{$row['Tel']}</td>";
echo"<td>{$row['Email']}</td>";
echo"<td>{$row['Address']}</td>";
echo"<td>{$row['Zipcode']}</td>";
echo"<td>{$row['date_added']}</td>";
}
echo"</table>";
}else{echo "NO Information of Individual Donators in this region";
       header("region.php");
       }


if( !(mysql_fetch_assoc($rst2)))
{
echo "<center>";
echo "<h2>view the Information of Non-Individual Donators in <?php echo ' {$regionname} ';?></h2>";
echo "<table width='700px' border='1px'>";
echo "<tr>";
echo "<th>ID</th>";
echo "<th>GROUPNAME</th>";
echo "<th>GROUPTYPE</th>";
echo "<th>TEL</th>";
echo "<th>EMAIL</th>";
echo "<th>ADDRESS</th>";
echo "<th>ZIP CODE</th>";
echo "<th>DATE OF DONATION</th>";
echo "</tr>";

while($row=mysql_fetch_assoc($rst2)){
echo"<tr>";
echo"<td>{$row['ID_id']}</td>";
echo"<td>{$row['GroupName']}</td>";  
echo"<td>{$row['Group_type']}</td>";
echo"<td>{$row['Tel']}</td>";
echo"<td>{$row['Email']}</td>";
echo"<td>{$row['Address']}</td>";
echo"<td>{$row['Zipcode']}</td>";
echo"<td>{$row['date_added']}</td>";
}
echo"</table>";
}else{echo "NO Information of Non-Individual Donators in this region";
       header("region.php");
       }
     

     