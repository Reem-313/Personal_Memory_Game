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
            <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Lexend:wght@300&display=swap" rel="stylesheet">
<link rel="stylesheet" href="mainstyle.css">

        <title>Your Images</title>
        
    </head>
    <body>
        <table border = 1 cellspacing = 0 cellpadding= 10>
            <tr>
                <td> NO. </td>
                <td>Decription</td>
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
                <td><form method="post" action="">
                    <input type="submit" name="submit" value="Delete" onclick="delete_image(<?php echo $row['imageId']; ?>)">
                    </td></form>
            </tr>
            <?php endforeach; ?>
        </table>
        <br>
        <h3><a href="upload.php"> Please upload more photos here </a><br></h3>
        <script>
            function delete_image(imgid)
            {
                console.log(imgid);
                 <?php
                 if(isset($_POST['submit']))
{ 
        $imgID = $_POST['imgid'];

                $query=  "DELETE FROM image WHERE imageId = $imgID";
                 if(mysqli_query($conn, "DELETE FROM image WHERE imageId = $imgID"))
                    {
                          echo
                    "<script>
                     alert('Image successfully deleted!');
                    </script>";
                    }
}
                ?>
                }
        </script>
    </body>
</html>