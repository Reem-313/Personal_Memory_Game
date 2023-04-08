<?php error_reporting(E_ALL); ini_set('display_errors', 1);
require 'dbconnection.php';

if (!empty($_SESSION['id'])) {
    $id= $_SESSION["id"];
    $result= mysqli_query($conn, "SELECT * FROM users WHERE userId=$id");
    $row = mysqli_fetch_assoc($result);
}
else{
        header("location: login.php");
            exit();
}
if(isset($_POST["submit"])){
    $name = $_POST["name"];
    if($_FILES["image"]["error"]===4){
        echo
        "<script> alert('Image does not exsit'); </script>";
    }
    else{
        $fileName =$_FILES["image"]["name"];
        $fileSize = $_FILES["image"]["size"];
        $tmpName =$_FILES["image"]["tmp_name"];

        $validExtension =['jpg', 'jpeg', 'png'];
        $imgExtension =explode('.', $fileName);
        $imgExtension= strtolower(end($imgExtension));
        if(!in_array($imgExtension, $validExtension)){
            echo
        "<script> alert('Invalid image extension'); </script>"
        ; 
        }
        else if($fileSize > 100000000){
            echo
            "<script> alert('Image size is too big'); </script>"
            ;
        }
        else{
            $newImgName = uniqid();
            $newImgName .= '.' . $imgExtension;

            move_uploaded_file($tmpName, 'img/' . $newImgName);
            $query = "INSERT INTO image (Description, imagePath, userIdFK) VALUES('$name', '$newImgName', $id)";
            if(mysqli_query($conn, $query))
            {
                  echo
            "<script>
             alert('Image successfully added!');
            </script>"
            ;
            }else
            {
                        echo "Error: " . $query . ":-" . mysqli_error($conn);

            }
        }
    }
   // $sql =mysqli_query($conn, "SELECT * FROM image WHERE userIdFK= $id");
    
  /*  $result =mysqli_query($conn, "SELECT * FROM image WHERE userIdFK= $id");
    $num = mysqli_num_rows($result);
      if ($num =6) {
     echo "<script> alert('You Have Enough Photos to play The easy Level'); </script>"; 

     }
    if ($num =8) {
     echo "<script> alert('You Have Enough Photos to play The easy and medium Level'); </script>"; 

     }
         if ($num =12) {
     echo "<script> alert('You Have Enough Photos to play The hard Level'); </script>"; 

     }*/
}

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
         <meta name = "viewport" content = "width=device-width, initial-scale = 1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
        <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Lexend:wght@300&display=swap" rel="stylesheet">
<link rel="stylesheet" href="mainstyle.css">
        <title>Upload images</title>
    </head>
    <body>
        <div class="container card border-primary mb-3">
                  <h2> Please upload your photos here</h2>
            <form action="" class="" method="post" autocomplete="off" enctype="multipart/form-data">
                <div class="form-group mx-sm-3 mb-2">
                    <label for="name">Name : </label>
                    <input type="text" name="name" id="name" required value=""><br>
                </div>
                <div class="form-group mx-sm-3 mb-2">
                    <label for="image">Image : </label>
                    <input type="file" name="image" id="image" accept=".jpg, .jpeg, .png" value=""> <br>
                </div>
                <div class="form-group mx-sm-3 mb-2">
                    <button type="submit" name="submit" class="btn btn-primary mb-3">Submit</button>
                </div>
            </form>
            <div class="form-group mx-sm-3 mb-2">
                <a href="logout.php"> Logout </a><br>
            </div>
            <div class="form-group mx-sm-3 mb-2">
                <a href= "data.php">View Your Image</a>
            </div>
        </div>
    </body>
</html>
