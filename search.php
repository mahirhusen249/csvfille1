<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>read</title>  
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"> 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<body>   
    <h1>record delete and update</h1>
    <style>
        tr,th,td{
            border: 2px solid black;
        }     
        table{   
            background-color:navajowhite ;    
            margin: auto;   
            margin-top: 40px;
          
        }  
        button a{    
       
             text-decoration: none;  
        
             
        }   
        h1{   
            text-align: center;
        }
        
    </style>
 
</body>
</html>   
<!-- <button class="btn btn-primary"href="index.php">add data</a></button> -->
<?php    
include  'conn.php';   
   
$sql="SELECT * FROM `tbluserdata`";
  
$result=mysqli_query($con,$sql);   

 $num=mysqli_num_rows($result);    
    
 if($num > 0) {      
   
    echo '<table border="2">';
    echo '<thead>';
    echo '<tr>
<th>id</th>
<th>name</th>
<th>email</th> 
<th>password</th>
<th>mobileno</th>
   
 
</tr> '; 
echo '</thead>';  


echo'<tboday>';
     while($row=mysqli_fetch_array($result)){  
echo '<tr>
  
    <td>'.($row["id"]).'</td>
    <td>'.($row["name"]).'</td>
    <td>'.($row["email"]).'</td>
    <td>'.($row["password"]).'</td>
     <td>'.($row["mobileno"]).'</td>  
    <td><button type="submit" name="delete" value="Delete"><a href="delete.php?deleteid='.($row["id"]).'">Delete</a></button></td>  
    <td><button type="submit" name="update" value="update"><a href="update.php?updateid='.($row["id"]).'">update</a></button></td>  
    
 </tr>';
}


echo'</tboday>';
echo  '</table>';   
    
 
 } else{    
    echo"record not found";
 }

?>