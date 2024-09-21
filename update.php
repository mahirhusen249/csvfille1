<?php   
include 'conn.php';  
if(isset($_GET['updateid'])){    
    $uid=$_GET['updateid'];    

    $sql= "SELECT * FROM `tbluserdata` WHERE id=$uid";  

    $result=mysqli_query($con,$sql);    
    $row = mysqli_fetch_assoc($result);

    if(isset($_POST['submit'])){   

        $name = $_POST['name'];   
        $email= $_POST['email'];   
        $password = $_POST['password'];
        $mobileno = $_POST['phonenumber'];     
        // print_r($_POST['submit']); 
        // exit;
      
      
$sql="UPDATE `tbluserdata` SET `name`='$name',`email`='$email',`password`='$password',`mobileno`='$mobileno'where id='$uid'";    
  
$result=mysqli_query($con,$sql);

if ($result) {
    echo "Update successfully...";
  } else {
    die(mysqli_error($con));
  }
} 
}


?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>update the data</title>   
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"> 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</head>
<body>
<nav class="navbar navbar-expand-lg  navbar-light text text-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand " href="#"> crud</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <!-- <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="login.php">login</a>
                    </li> -->
                    <li class="nav-item">
                        <a class="nav-link" href="register.php">Register</a>


                </ul>

            </div>
        </div>

    </nav>  
    <div class="container mt-5">
        <h1 class="text-center">Update the data</h1>
        <form  id="#registrationForm" action="" method="POST">
            <div class="mb-3">
                <label for="username" class="form-label">name</label>
                <input type="text" name="name" id="username" value="<?php echo $row['name']; ?> " class="form-control" placeholder="Enter your name">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" name="email" id="email" class="form-control"value="<?php echo $row['email']; ?>" placeholder="Enter your email">  
                <p id="message"></p>
           
            </div>
            <div class="mb-3">
                <label for="phonenumber" class="form-label">Phone number</label>
                <input type="text" name="phonenumber" id="phonenumber"value="<?php echo $row['mobileno']; ?>"class="form-control" placeholder="Enter your phone number" maxlength="10">
            </div> 

              <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" id="password" value="<?php echo $row['password']; ?>" class="form-control" placeholder="Enter password">
            </div>

            <!-- <div class="mb-3">
                <label for="cpassword" class="form-label">Confirm Password</label>
                <input type="password" name="cpassword" id="cpassword" class="form-control" placeholder="Confirm your password">
            </div>  -->

            <button type="submit" name="submit" class="btn btn-primary">Register</button>
        </form>     

</body>
</html>