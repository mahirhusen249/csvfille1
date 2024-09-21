 <?php

include 'conn.php';
// include 'index.php';

if(isset($_POST['submit'])){   
     $name = $_POST['name'];   
     $email= $_POST['email'];   
     $password = $_POST['password'];
     $mobileno = $_POST['phonenumber'];   
      
   
// $sql="INSERT INTO `crudprecties`,'name', 'email','password','phonenumber'VALUE `$name`,`$email,`$password,`$mobileno`";    
$sql="INSERT INTO `tbluserdata` ( `name`, `email`, `password`, `mobileno`) VALUES ('$name', '$email', '$password', '$mobileno')"; 
$result=mysqli_query($con,$sql);  
// print_r($result);    
//      exit;     
if($result){   
   
    header('location:index.php');  
    echo"sucessfully inserted";   
}

}

if (isset($_POST['export'])) {   
   
     $name = $_POST['name'];   
     $email = $_POST['email'];   
     $password = $_POST['password'];
     $mobileno = $_POST['phonenumber'];  
     $file_name = "Emp.csv";

    // First SQL query to get user data
    $sql = "SELECT id, `name`, `email`, `password`, `mobileno` FROM `tbluserdata`";
    $result = mysqli_query($con, $sql);

    if (!$result) {
        die("Query failed: " . mysqli_error($con));
    }

    $data_arr = [];

    while ($row = mysqli_fetch_assoc($result)) {
 $sql1 = "SELECT `dob`, `gender`, `address`, `user_id` FROM `tbl_userdetails` 
 WHERE user_id = " . $row['id'];
        
        $result1 = mysqli_query($con, $sql1);

        if (!$result1) {
            die("Query failed: " . mysqli_error($con));
        }

        if (mysqli_num_rows($result1) > 0) {
            $details = mysqli_fetch_assoc($result1);
            $data_arr[] = array_merge($row, $details); 
        } else {
            $data_arr[] = array_merge($row, ['dob' => '', 'gender' => '', 'address' => '', 'user_id' => '']);
        }
    }

    if (!empty($data_arr)) {
        header('Content-Type: text/csv');
        header('Content-Disposition: attachment; filename="' . $file_name . '"');
        $output = fopen('php://output', 'w');

        fputcsv($output, array('id', 'name', 'email', 'password', 'mobileno', 'dob', 'gender', 'address', 'user_id'));

        foreach ($data_arr as $data) {
            fputcsv($output, $data);
        }

        fclose($output);
        exit();
    } else {
        echo "No records found.";
    }
}

?>

  <?
// include 'conn.php';  
// include 'index.php';  

// if (isset($_POST['submit'])) {   

//     $name = $_POST['name'];   
//     $email = $_POST['email'];   
//     $password = $_POST['password'];
//     $mobileno = $_POST['phonenumber'];   
//     $file_name = "Emp.csv";  

 
// $sql = "SELECT u.id, u.name, u.email, d.mobile, d.address FROM `tbluserdata u` JOIN `tbl_userdetails d` ON u.id = d.user_id";

   
//     $result = mysqli_query($con, $sql);     

//     if (mysqli_num_rows($result) > 0) {   
       
//         header('Content-Type: text/csv');
//         header('Content-Disposition: attachment; filename="' . $file_name . '"');
//         $output = fopen('php://output', 'w');
 
//         fputcsv($output, array('id', 'name', 'email', 'mobile', 'address')); 

       
//         while ($row = mysqli_fetch_assoc($result)) {
//             fputcsv($output, $row);
//         }
        
//         fclose($output);
//         exit();
//     } else {    
//         echo "No records found.";
//     }
// } 
// $sql="SELECT `id`, `dob`, `gender`, `address`, `user_id`FROM `tbl_userdetails`WHERE `user_id` INSELECT `id` FROM `tbluserdata`"; 
