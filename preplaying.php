<?php
require 'dbconnection.php';
// Initialize the session
//https://www.youtube.com/watch?v=kffivnAYUAY
//https://w3schools.invisionzone.com/topic/57154-problem-with-user-registrtion-system/
if (!empty($_SESSION['id'])) {
    $id= $_SESSION["id"];
    $result= mysqli_query($conn, "SELECT * FROM users WHERE userId=$id");
    $imageRow = mysqli_fetch_assoc($result);
}
else{
        header("location: login.php");
            exit();
}

$rows =mysqli_query($conn, "SELECT * FROM image WHERE userIdFK= $id");
foreach($rows as $row) {
    $array[] = [$row['imagePath'], $row['Description']];
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
    <meta name = "viewport" content = "width=device-width, initial-scale = 1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lexend:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="mainstyle.css">
  <title>Home Page</title>
</head>
<body>
                <div class="container card border-primary mb-2">
                    <h2>Choose the level of the game you want to play</h2>
                    <div class="form-group mx-sm-3 mb-2">
                        <button onclick="easycheck()" class="btn btn-outline-primary btn-lg"> EASY </button><br> 
                    </div>
                    <div class="form-group mx-sm-3 mb-2">
                        <button onclick="medcheck()" class="btn btn-outline-primary btn-lg"> MEDIUM </button><br> 
                    </div>
                    <div class="form-group mx-sm-3 mb-2">
                        <button onclick="hardcheck()" class="btn btn-outline-primary btn-lg"> HARD </button><br>
                    </div>
                    <div class="form-group mx-sm-3 mb-2">
                        <a href="logout.php"> Or Logout Here </a>
                    </div>
                </div>
           <script>

           function easycheck()
             {
                 let getData= <?= json_encode($array); ?> 
                 
                 if(getData.length<6)
                 {
                     alert("You don't have enough photos. Please upload " + (6- getData.length) + " more photos to play");
                     document.location.href = 'upload.php';

                 }
                 else
                 {
                     console.log("it is bigger");
                    document.location.href = 'easy.php';
                 }
             }
             
             function medcheck()
             {
                 let getData= <?= json_encode($array); ?> 
                 
                 if(getData.length<8)
                 {
                    console.log(getData.length);
                    alert("You don't have enough photos. Please upload " + (8- getData.length) + " more photos to play");
                    document.location.href = 'upload.php';
                 }
                 else
                 {
                     console.log("it is bigger");
                     document.location.href = 'med.php';
                 }
             }
             function hardcheck()
             {
                 let getData= <?= json_encode($array); ?> 
                 if(getData.length<12)
                 {
                    console.log(getData.length);
                    alert("You don't have enough photos. Please upload " + (12- getData.length) + " more photos to play");
                    document.location.href = 'upload.php';
                 }
                 else
                 {
                     console.log("it is bigger");
                    document.location.href = 'hard.php';
                 }
             }
         </script>
</body>
</html