<?php
require 'dbconnection.php';
if(!empty($_SESSION['id']))
{
        header("location: welcome.php");
}
if(isset($_POST['submit']))
{
    $firstName= $_POST['firstName'];
    $lastName= $_POST['lastName'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    $sql= "SELECT * FROM users WHERE email='$email' AND 
    password = '$password'";
    $result =mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);
      if ($num > 0) {
            echo "User already exist! Please login";

     } else {
          $sqlU="INSERT into users (firstName, lastName, email, password) VALUES
     ('$firstName', '$lastName', '$email', '$password')";
     if (mysqli_query($conn, $sqlU)) {
         echo
          "<script> alert('Registration done successfully!'); </script>";
     } 
     }
     
     mysqli_close($conn);
    
}
?>

<!DOCTYPE html>
<html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <meta name = "viewport" content = "width=device-width, initial-scale = 1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Lexend:wght@300&display=swap" rel="stylesheet">
<link rel="stylesheet" href="mainstyle.css">
    <title>Store user input database</title>
</head>
<body>
    <div class="container card border-primary mb-3">
      <form method="post" action="" autocomplete="off">
        <div class="form-group mx-sm-3 mb-2">
            <p>‘Personal memory game’ it is a matching pairs memory game where you can import any preferred personal photos to be used in the game. These photos can be 
            photos of family members or venues/places of special occasions in your life.</p>
        </div>
          <h3>Sound interesting? Register here to start playing!</h3>
          <div class="form-group mx-sm-3 mb-2">
        	<label for="firstName">first name:</label><br>
            <input type="text" id="firstName" name="firstName" required value=""><br>
        </div>
        
        <div class="form-group mx-sm-3 mb-2">
            <label for="lastName">last name:</label><br>
            <input type="text" id="lastName" name="lastName" required value=""><br>
        </div>
        
        <div class="form-group mx-sm-3 mb-2">
            <label for="email">email:</label><br>
            <input type="email" name="email" placeholder="" required value=""><br>
        </div>
        <div class="form-group mx-sm-3 mb-2">
             <label for="password" placeholder="" required value="">password:</label><br>
            <input type="password" name="password"><br>
        </div>
        <div class="form-group mx-sm-3 mb-2">
            <input type="submit" name="submit" class="btn btn-primary mb-3"><br>
        </div>
        <div class="form-group mx-sm-3 mb-2">
            <span> Already have an account? </span><a href="login.php"> Login Here </a>
        </div>
      </form>
  </div>
</body>
</html>


