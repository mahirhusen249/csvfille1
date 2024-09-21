<?php    
include "conn.php";
 if(isset($_GET['deleteid'])){
    $did=$_GET['deleteid']; 

   $sql= "DELETE FROM `tbluserdata` WHERE id=$did";  
  $result=mysqli_query($con,$sql);   
  if($result){
    header("Location:search.php");
}
}
?>