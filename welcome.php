<?php
require 'dbconnection.php';
// Initialize the session
//https://www.youtube.com/watch?v=kffivnAYUAY
//https://w3schools.invisionzone.com/topic/57154-problem-with-user-registrtion-system/
if (!empty($_SESSION['id'])) {
    $id= $_SESSION["id"];
    $result= mysqli_query($conn, "SELECT * FROM users WHERE userId=$id");
    $row = mysqli_fetch_assoc($result);
}
else{
        header("location: login.php");
            exit();
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
    <style>
    .container{
        padding: 25px;
        margin:25px;
    }
        /* The grid: Three equal columns that floats next to each other */
.column {
  float: left;
  width: 33.33%;
  padding: 50px;
  text-align: center;
  font-size: 25px;
  cursor: pointer;
  color: black;
}

.containerTab {
  padding: 20px;
  color: black;
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

/* Closable button inside the container tab */
.closebtn {
  float: right;
  color: white;
  font-size: 35px;
  cursor: pointer;
}
    </style>
    <h2>Welcome <?php echo $row['firstName']; ?>, </h2>
<h3>Often the games that are the most simple are also the most entertaining, and this is certainly the case with this Memory Game.<h3>
    <div style="text-align:center">
        <h2>Instructions:</h2>
        <p>Click on the boxes below to find out how to play:</p>
    </div>

<!-- Three columns -->
                <div class="container card border-primary mb-3">
<div class="row">
  <div class="column" onclick="openTab('b1');" style="background:#BED3F7;">
    Step 1
  </div>
  <div class="column" onclick="openTab('b2');" style="background:#BED3F7;">
    Step 2
  </div>
  <div class="column" onclick="openTab('b3');" style="background:#BED3F7;">
    Step 3
  </div>
</div>

<!-- Full-width columns: (hidden by default) -->
<div id="b1" class="containerTab" style="display:none;background:#BED3F7">
  <span onclick="this.parentElement.style.display='none'" class="closebtn">&times;</span>
  <h2>Setting up the game:</h2>
  <p>Please upload enough photos <a href="upload.php">here </a>to play the game, you would need to upload 6 photos to play the easy level, 8 photos to play the medium level, or 12 photos to play the hard level.
  The more photos you upload, the more interesting the game would be.</p>
</div>

<div id="b2" class="containerTab" style="display:none;background:#BED3F7">
  <span onclick="this.parentElement.style.display='none'" class="closebtn">&times;</span>
  <h2>Playing Memory:</h2>
  <p>This is how you play: you can choose a card from the displayed cards grid to turn it over. Then selects another card and turns it over.
  If the cards are not a match they are turned back over and you can have another go.
  If the two cards are a matching pair then the matching two cards stay face up. Carry on try making another match and the game goes on.
  The game will track how many wrong cards you have flipped but no pressure as the main thing is for you to enjoy playing.</p>
</div>

<div id="b3" class="containerTab" style="display:none;background:#BED3F7">
  <span onclick="this.parentElement.style.display='none'" class="closebtn">&times;</span>
  <h2>Winning the Game:</h2>
  <p>Once all the matching pairs are found, you win the game! You may wish to terminate the game or play again.</p>
</div>
</div>
                <div class="container card border-primary mb-3">
                    <div class="form-group mx-sm-3 mb-2">
                        <button onClick="location.href='preplaying.php'" type="button" class="btn btn-outline-primary btn-lg">Start Playing</button>
                    </div>
                    
                    <div class="form-group mx-sm-3 mb-2">
                        <button onClick="location.href='data.php'" type="button" class="btn btn-outline-primary btn-lg">View Uploaded Images</button>
                    </div>
                    <div class="form-group mx-sm-3 mb-2">
                        <button onClick="location.href='upload.php'" type="button" class="btn btn-outline-primary btn-lg">Please upload your photos here</button>
                    </div>
                    <div class="form-group mx-sm-3 mb-2">
                        <a href="logout.php"> Logout </a>
                    </div>
                </div>
 <script>
      function openTab(tabName) {
  var i, x;
  x = document.getElementsByClassName("containerTab");
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";
  }
  document.getElementById(tabName).style.display = "block";
}
 </script>            


      

</body>
</html