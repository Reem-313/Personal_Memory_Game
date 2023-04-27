<?php
require 'dbconnection.php';
if (!empty($_SESSION['id'])) {
    $id= $_SESSION["id"];
    
}
else{
        header("location: login.php");
            exit();
}


if(isset($_POST['submit']))
{ 
        $imgID = $_POST['imgid'];
               if( mysqli_query($conn, "DELETE FROM image WHERE imageId = $imgID"))
               {
/*                   echo
                    "<script>
                     alert('Image successfully deleted!');
                    </script>";*/
                header("location: data.php");
               }


                    
}
?>