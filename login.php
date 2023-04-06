<?php error_reporting(E_ALL); ini_set('display_errors', 1);

require "dbconnection.php";
if(!empty($_SESSION['id']))
{
        header("location: welcome.php");
}

if(isset($_POST['submit']))
{ 
    $email = $_POST['email'];
    $password = $_POST['password'];
    $sql = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";  
/*     echo "password: " . " $password <br>";
    echo "email: " . " $email <br>";
    echo "sql: " . " $sql <br>";*/
    
    $result = mysqli_query($conn, $sql);
    //$row = mysqli_fetch_array($result, MYSQLI_BOTH);
    $row = mysqli_fetch_assoc($result);
    $count = mysqli_num_rows($result);  

          
    if($count == 1){  
        //echo "<center> Login successful </center>";  
        if($password == $row['password']){
            $_SESSION["login"]= true;
              $_SESSION['id']= $row['userId'];
            // Redirect to user welcome page
            header("location: welcome.php"); //https://stackoverflow.com/questions/8028957/how-to-fix-headers-already-sent-error-in-php
            exit();
            
        }
        else
        {
            echo "<script> alert('Password is incorrect.'); </script>"; 

        }
    }  
    else{  
        echo "<script> alert('Login failed. Invalid username or password.'); </script>"; 
    } 

}

?>


<html>
    
    <head>
        <title>Simple User Login Demo</title>
        <meta name = "viewport" content = "width=device-width, initial-scale = 1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Lexend:wght@300&display=swap" rel="stylesheet">
<link rel="stylesheet" href="mainstyle.css">

    </head>
    <body>
        <style>
            .container{
                    justify-content: center;
            }
        </style>
        <div class="container card border-primary mb-3">
           <form method="post" action="" autocomplete="off">
            	<h2>Login Here</h2>
            	<div class="form-group mx-sm-3 mb-2">
                	<label for="email">Email:</label><br>
                    <input type="email" id="email" name="email" placeholder=""required value=""><br>
                </div>
                <div class="form-group mx-sm-3 mb-2">
                    <label for="password" placeholder="" required value="">password:</label><br>
                    <input type="password" id="password" name="password"><br>
                </div>
                <div class="form-group mx-sm-3 mb-2">
                     <input type="submit" name="submit" class="btn btn-primary btn-lg"><br>
                </div>
          </form>
      </div>
    </body>
    
</html>

