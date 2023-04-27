<?php
require 'dbconnection.php';
//https://www.youtube.com/watch?v=1bUc4tMX7i4
// Initialize the session
//https://www.youtube.com/watch?v=kffivnAYUAY
//https://w3schools.invisionzone.com/topic/57154-problem-with-user-registrtion-system/
if (!empty($_SESSION['id'])) {
    $id= $_SESSION["id"];
    
}
else{
        header("location: login.php");
            exit();
}
?>

<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=fit">
                <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

            <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Lexend:wght@300&display=swap" rel="stylesheet">
<link rel="stylesheet" href="mainstyle.css">

        <title>Your Images</title>
        
    </head>
    <body>
        <div class="table-responsive">          
            <table class="table table-bordered table-sm" border = 1 cellspacing = 0 cellpadding= 10>
                <tr>
                    <td> NO. </td>
                    <td>Description</td>
                    <td>Image</td>
                </tr>
                    <?php
                    $i = 1;
                    $rows =mysqli_query($conn, "SELECT * FROM image WHERE userIdFK= $id");
                    ?>
                    <?php foreach ($rows as $row) : ?>
                <tr>
                    <td> <?php echo $i++; ?></td>
                    <td><?php echo $row['Description']; ?></td>
                    <td> <img src= "img/<?php echo $row['imagePath']; ?>" alt ="<?php echo $row['Description']; ?>" width =200></td>
                    <td><form method="post" action="deleteImg.php">
                        <input type="hidden" value="<?php echo $row['imageId'];?>" name="imgid">
                        <input type="submit" name="submit" value="Delete">
                        </td></form>
                </tr>
                <?php endforeach; ?>
            </table>
        </div>
                <br>

         <div class="container card border-primary mb-3">
                             <br>

                    <div class="form-group mx-sm-3 mb-2">
                        <button onClick="location.href='preplaying.php'" type="button" class="btn btn-outline-primary btn-lg">Start Playing</button>
                    </div>
                    
                    <div class="form-group mx-sm-3 mb-2">
                        <button onClick="location.href='welcome.php'" type="button" class="btn btn-outline-primary btn-lg">Go back to the preivous page</button>
                    </div>
                    <div class="form-group mx-sm-3 mb-2">
                        <button onClick="location.href='upload.php'" type="button" class="btn btn-outline-primary btn-lg">Please upload your photos here</button>
                    </div>
                    <div class="form-group mx-sm-3 mb-2">
                        <a href="logout.php"> Logout </a>
                    </div>
        </div>

    </body>
</html>