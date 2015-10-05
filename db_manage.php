<?php

/*
    Provide some functions used in database management
*/

//connect the database
function con_db()
{
    $con = mysql_connect("silva.computing.dundee.ac.uk", "14ac3u21", "132acb");
    if(!$con)
    {
       return -1;
    }
    mysql_select_db("14ac3d21", $con);
    return($con);
}

//check the admin's account
function CheckAdmin($username, $password)
{
    $rcode = "";
    $con = con_db();
    if($con == -1)
    {
        $rcode = "failure in connecting the database";
        return $rcode;
    }
    $sql = "select * from admin where username='" . $username 
            . "' and password='" . $password . "'";
    $result = mysql_query($sql, $con);
    $row = mysql_fetch_array($result);
    if(empty($row[0])) 
    {
        $rcode = "username or password is not correct!";  
        $_SESSION['login_info'] = $rcode;                                     
    }
    
    mysql_close($con);
    return $rcode;
}

//change the information of admin
function UpdateAdmin($username, $password)
{
    $rcode = "";
    $con = con_db();
    if($con == -1)
    {
        $rcode = "failure in connecting the database";
        return $rcode;
    }
    $sql = "update admin set password='" . $password 
            . "' where username='" . $username . "'";
    mysql_query($sql, $con);

    mysql_close($con);
    return $rcode;
} 

///////////////////////////////////////////////////////////////////////////////
/*
    about managing 
    food  add delete search modify 
*/
///////////////////////////////////////////////////////////////////////////////
 
//Add Non-Perishable food information
function AddNFood($foodname,$foodtype,$foodamount)
{
    
    $dbcon = con_db();
    if($dbcon == -1)
    {
        echo "<script>alert('failure in connecting the database');</script>";
     }
    $sql = "insert into NonPerishableFoodinfro( Foodname , Food_type, Amount,date_added ,
   date_modified )values('$foodname','$foodtype','$foodamount',now(),' ')";
       if(!mysql_query($sql, $dbcon)){
       echo " <script> alert('fail in inserting');</script>";
       echo "<script>location='nfood_add.php';</script>";
	   }
       else{
                      echo "<script>alert('Added Successfully');</script>";
                      echo "<script>location='nfood_add.php';</script>";
          }

    mysql_close($dbcon);
 }

//delete nfood
function DeleteNFood($nfid)
{
    $rcode = "";
    $con = con_db();
    if($con == -1)
    {
        echo"<script>alert('failure in connecting the database')</script>";
      }
    $sql = "delete from NonPerishableFoodinfro where NPF_id='" . $nfid . "'";
    if(!mysql_query($sql, $con))
    {
        echo"<script>alert('failing in deleting')</script>";  
 echo "<script>location='nfood_management.php'</script>";}
       else{
                      echo "<script>alert('DeletedSuccessfully')</script>";
echo"<script>location='nfood_management.php'</script>";                    
    }
    mysql_close($con);
    
} 


//modify nonperishable food infromation

function UpdateNFood($foodname,$foodamount,$nfid,$now)
{
    $rcode = "";
    $con = con_db();
    if($con == -1)
    {
        echo "<script>alert('fail in connecting database')</script>";
    }
    
    $sql = "update NonPerishableFoodinfro set  Foodname='{$foodname}',Amount='{$foodamount}',date_modify='{$now}'where NPF_id='{$nfid}'";
    if(!mysql_query($sql, $con))
    {
       echo"<script>alert('failing in updating')</script>";           echo "<script>location='nfood_management.php'</script>";}            
    else{ echo "<script>alert('Updated  Successfully')</script>";
          echo"<script>location='nfood_management.php'</script>";                    
}
    
    mysql_close($con);
   
} 

//return the whole information of the nonperishable food
/*function ReturnNFinfor($fx,$fn){
  $con = con_db();
    if($con == -1)
    {
        echo "<script>alert('fail in connecting database')</script>";
    }
    $sql = "select * from NonPerishableFoodinfro";
    $sql = $sql ."limit".$fx.",".$fn;
    $rst=mysql_query($sql,$con);

    mysql_close($con);
    return $rst;
}*/
//return total non-perishable food number
function TotalNonPershablefood(){
  $con = con_db();
    if($con == -1)
    {
        echo "<script>alert('fail in connecting database')</script>";
    }
  $sql = "select count(*) from NonPerishableFoodinfro ";
  $result = mysql_query($sql, $con);
    mysql_close($con);
    return $result;   
}
// return the whole information of the perishable food
/*function ReturnFinfor($fx,$fn){
  $con = con_db();
    if($con == -1)
    {
        echo "<script>alert('fail in connecting database')</script>";
    }
    $sql = "select * from PerishableFoodinfro";
    $sql = $sql ."limit".$fx.",".$fn;
    $rst=mysql_query($sql,$con);

    mysql_close($con);
    return $rst;
}
*/
//Add Perishable food information
function AddPFood($foodname,$foodtype,$foodamount)
{
    
    $dbcon = con_db();
    if($dbcon == -1)
    {
        echo "<script>alert('failure in connecting the database')</script>";
     }
    $sql = "insert into PerishableFoodinfro( Foodname , Food_type, Amount,date_added ,
   date_modified )  values('$foodname','$foodtype','$foodamount',now(),' ')";
       if(!mysql_query($sql, $dbcon)){
       echo "<script>alert('fail in inserting');</script>";
       echo"<script>location='pfood_add.php';</script>";
	   }
       else{
                      echo "<script>alert('Added Successfully');</script>";
                      echo "<script>location='pfood_add.php';</script>";
          }

    mysql_close($dbcon);
 }

//delete perishable food
function DeletePFood($fid)
{
    $rcode = "";
    $con = con_db();
    if($con == -1)
    {
        echo"<script>alert('failure in connecting the database')</script>";
      }
    $sql = "delete from PerishableFoodinfro where PF_id='" . $fid . "'";
    if(!mysql_query($sql, $con))
    {
        echo "<script>alert('failing in deleting')</script>";  
        echo "<script>location='pfood_management.php'</script>";}
       else{
                echo "<script>alert('DeletedSuccessfully')</script>";
                echo "<script>location='pfood_management.php'</script>";                    
    }
    mysql_close($con);
    
} 


//modify perishable food infromation

function UpdatePFood($foodname,$foodamount,$fid,$now)
{
    $rcode = "";
    $con = con_db();
    if($con == -1)
    {
        echo "<script>alert('fail in connecting database')</script>";
    }
    
    $sql = "update PerishableFoodinfro set  Foodname='{$foodname}',Amount='{$foodamount}' date_modify='{$now}' where PF_id='{$fid}'";
    if(!mysql_query($sql, $con))
    {
       echo"<script>alert('failing in updating')</script>";           
       echo "<script>location='pfood_management.php'</script>";
     }  else{ echo "<script>alert('Updated  Successfully')</script>";
               echo "<script>location='pfood_management.php'</script>";                    
        }
    
    mysql_close($con);
   
} 

function AddNIndividualDonator($groupname,$weight,$grouptype,$tel,$email,$address,$zip,$city)
{
    
    $dbcon = con_db();
    if($dbcon == -1)
    {
        echo "<script>alert('failure in connecting the database')</script>";
     }
    $sql = "insert into nonindividualdonator(GroupName,Group_type,WeightOfDonation,Tel,Email,Address,City,Zipcode,date_added)  
    values('$groupname','$grouptype','$weight','$tel','$email','$address','$city','$zip',now())";
       if(!mysql_query($sql, $dbcon)){
       echo "<script>alert('fail in inserting');</script>";
       echo "<script>location='homepage.php';</script>";
     }else{
                      echo "<script>alert('Added Successfully');</script>";
                      echo "<script>location='homepage.php';</script>";
          }

    mysql_close($dbcon);
 }


function AddIndividualDonator($firstname,$lastname,$weight,$tel,$email,$address,$zip,$city)
{
    
    $dbcon = con_db();
    if($dbcon == -1)
    {
        echo "<script>alert('failure in connecting the database');</script>";
     }
    $sql = "insert into individualdonator(Firstname,Lastname,WeightOfDonation,Tel,Email,Address,City,Zipcode,date_added)  
    values('$firstname','$lastname','$weight','$tel','$email','$address','$city','$zip',now())";
       if(!mysql_query($sql, $dbcon)){
       echo "<script>alert('fail in inserting');</script>";
       echo "<script>location='homepage.php';</script>";
     }else{
                      echo "<script>alert('Added Successfully');</script>";
                      echo "<script>location='homepage.php';</script>";
          }

    mysql_close($dbcon);
 }

function AddClient ($firstname,$lastname,$tel,$email,$address,$zip,$city)
{
    
    $dbcon = con_db();
    if($dbcon == -1)
    {
        echo "<script>alert('failure in connecting the database')</script>";
     }
    $sql = "insert into Client(Firstname,Lastname,Tel,Email,Address,City,Zipcode,date_added)  
    values('$firstname','$lastname','$tel','$email','$address','$city','$zip',now())";
       if(!mysql_query($sql, $dbcon)){
       echo "<script>alert('fail in inserting')</script>";
       echo"<script>location='homepage.php'</script>";
     }else{
                      echo "<script>alert('Added Successfully');</script>";
                      echo "<script>location='homepage.php';</script>";
          }

    mysql_close($dbcon);
 }

 function AddVolunteer ($firstname,$lastname,$tel,$email,$address,$zip,$city)
{
    
    $dbcon = con_db();
    if($dbcon == -1)
    {
        echo "<script>alert('failure in connecting the database')</script>";
     }
    $sql = "insert into Volunteer(Firstname,Lastname,Tel,Email,Address,City,Zipcode,date_added)  
    values('$firstname','$lastname','$tel','$email','$address','$city','$zip',now())";
       if(!mysql_query($sql, $dbcon)){
       echo "<script>alert('fail in inserting')</script>";
       echo "<script>location='homepage.php'</script>";
     }else{
                      echo "<script>alert('Added Successfully');</script>";
                      echo "<script>location='homepage.php';</script>";
          }

    mysql_close($dbcon);
 }

 function DeleteRegion($rid)
{
    $rcode = "";
    $con = con_db();
    if($con == -1)
    {
        echo"<script>alert('failure in connecting the database')</script>";
      }
    $sql = "delete from Region where R_id='" . $rid . "'";
    if(!mysql_query($sql, $con))
    {
        echo"<script>alert('failing in deleting')</script>";  
        echo "<script>location='region.php'</script>";}
       else{
                echo "<script>alert('DeletedSuccessfully')</script>";
                echo "<script>location='region.php'</script>";                    
    }
    mysql_close($con);
    
} 
?>
