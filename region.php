<?php
    session_start();
    if(!$_SESSION['admin'])
    {
        header("Location:login.php");                       
    }

    require_once("head.php");
    require_once("db_manage.php");







   $line=5;
   $pagenum=$_GET['page']?$_GET['page']:1;
   //total rows
   $totsql="select count(*) from NonPerishableFoodinfro";
   $totarr=mysql_fetch_row(mysql_query($totsql));
   $pagetot=ceil($totarr[0]/$line);

   // limit the max page
   if($pagenum>=$pagetot){
    $pagenum=$pagetot;
   }
   $offset=($pagenum-1)*$line;

   
   //get all the data
   con_db();
   $sql="select * from Region order by R_id limit {$offset},{$length}";
   $rst=mysql_query($sql);

echo "<center>";
echo "<h2>view the Region List </h2>";
echo "<table width='700px' border='1px'>";
echo "<tr>";
echo "<th>ID</th>";
echo "<th>REGION NAME</th>";
echo "<th>EMPLOYMENT PERCENTAGE</th>";
echo "<th>GDP</th>";
echo "<th>POPULATION</th>";
echo "<th>AVERAGE COST</th>";
echo "<th>Branch In here</th>";
echo "<th>Donators In here</th>";
echo "<th>Clients In here</th>";
//echo "<th>DELETE</th>";
echo "</tr>";

while($row=mysql_fetch_assoc($rst)){
echo "<tr>";
echo "<td>{$row['R_id']}</td>";
echo"<td>{$row['RegionName']}</td>";
echo"<td>{$row['EmploymentPercentage']}</td>";
echo"<td>{$row['GDP']}</td>";
echo"<td>{$row['Population']}</td>";
echo"<td>{$row['AverageCost']}</td>";
echo"<td><a href='branches.php?regionname={$row['RegionName']}'>Branch in here</a></td>";
echo"<td><a href='donator_infro.php?regionname={$row['RegionName']}'>Donators in here</a></td>";
echo"<td><a href='client_infro.php?regionname={$row['RegionName']}'>Clients in here</a></td>";
//echo"<td><a href='region_delete.php?id={$row['R_id']}'>Delete</a></td>";
}
echo"</table>";
$prevpage=$pagenum-1;
$nextpage=$pagenum+1;
?>
<p align="center">
   
   <a href='region.php?page={$prevpage}'>LastPage</a>|
   No.<?php echo $p+1;?>Page
   <a href='region.php?page={$nextpage}'>NextPage</a>
    
</p>
