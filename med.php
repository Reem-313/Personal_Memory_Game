<?php
// sourceses 
//https://www.w3schools.com/howto/howto_css_overlay.asp
//https://www.youtube.com/watch?v=kffivnAYUAY
//https://w3schools.invisionzone.com/topic/57154-problem-with-user-registrtion-system/

// Initialize the session
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
$rows =mysqli_query($conn, "SELECT * FROM image WHERE userIdFK= $id");
foreach($rows as $row) {
    $array[] = [$row['imagePath'], $row['Description']];
    
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=fit">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Lexend:wght@300&display=swap" rel="stylesheet">
        <title>Memory Game</title>
    </head>
    <body>
        <style>
            
            *{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body{
    height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
    background: rgb(92, 167, 213);
    font-family: lexend;
    margin: 20px;
    padding: 20px;
}
section{
    display: grid;
    grid-template-columns: repeat(4, 8rem);
    grid-template-rows:repeat(4,8rem) ;
    grid-gap: 2rem;
    perspective: 800px;
}
.card{
    position: relative;
    transform-style: preserve-3d;
    transition: all 1s ease ;
}
.face, 
.back{
    width: 100%;
    height: 100%;
    position: absolute;
    pointer-events:none ;
}

.back{
    background-color: white;
    backface-visibility: hidden;
}
.toggleCard{
    transform: rotateY(180deg);
    transition: ease 0.5;
}

#overlay {
  position: fixed;
  display: none;
  width: 100%;
  height: 100%;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: rgba(0,0,0,0.5);
  z-index: 2;
  cursor: pointer;
}

#text{
  position: absolute;
  top: 50%;
  left: 50%;
  font-size: 50px;
  color: white;
  transform: translate(-50%,-50%);
  -ms-transform: translate(-50%,-50%);
}
        </style>
         <h1> Match the Photos! or  <a href="logout.php"> Logout </a></h1>
        <button id="restartbtn" type="button" onclick="restart()" >Play Again</button>
<h1>Clicks: <span> class="playerClicksCount</span></h1>
        <section></section>
        <div id="overlay" onclick="off()">
            <div id="text">congrats You Won!!</div>
        </div>
    <!.. https://stackoverflow.com/questions/5366620/storing-database-records-into-array>
    <script>
    function on() {
  document.getElementById("overlay").style.display = "block";
}

function off() {
  document.getElementById("overlay").style.display = "none";
                document.getElementById("restartbtn").style.visibility = "visible"; 
}
document.getElementById("restartbtn").style.visibility = "hidden"; 
const section = document.querySelector("section");
const playerClicksCount = document.querySelector("span");
let clicksCount=0;
let matched =0;
//linking the clicks count to the page
playerClicksCount.textContent = clicksCount;
 let matchSound= new Audio('mixkit-casino-bling-achievement-2067.mp3');
    matchSound.volume= 0.1;
    let WrongSound = new Audio ('mixkit-game-ball-tap-2073.mp3');

    let getData0= <?= json_encode($array); ?> 
    getData0.sort(()=> Math.random() -0.5);
     getData0 = getData0.slice(0,8);

    let getData = getData0.concat(getData0)//adding the two arrays together
   // console.log(getData);
    // randomize the array
    const randomData= () =>{
        let cardData = getData;
        cardData.sort(()=> Math.random() -0.5);
        //console.log(cardData);
        return cardData;
};
//randomData();

const cardGenerator = () => {
    const cardData =randomData();
    //console.log(cardData);
    
    // html
     
    cardData.forEach((item) =>{
        console.log(item);
           const card = document.createElement("div");
           const face = document.createElement("img");
           const back = document.createElement("div");
           card.classList ="card";
           face.classList ="face";
           back.classList ="back";
           //attach the image to the card face
           face.src ="img/"+ item[0];
           card.setAttribute("Description", item[1]);
           //attach the cards to the section
           section.appendChild(card);
           card.appendChild(face);
           card.appendChild(back);
           
           card.addEventListener('click', (e) =>{
               card.classList.toggle("toggleCard");
               checkCards(e);
           });
    });
};

//check cards
const checkCards =(e) =>{
  const clickedCard =e.target;
  clickedCard.classList.add("flipped");
  const flippedCards= document.querySelectorAll(".flipped");
  const toggleCard = document.querySelectorAll(".toggleCard");
  console.log(flippedCards);
  //logic
  if(flippedCards.length ===2)
  {
      if(flippedCards[0].getAttribute('Description') ===
      flippedCards[1].getAttribute('Description'))
      {
          matchSound.play();
          console.log("match");
           flippedCards.forEach(card =>{
          card.classList.remove('flipped');
          card.style.pointerEvents= "none";
          });
         matched++;
          if(matched===8)
          {
              document.getElementById("restartbtn").style.visibility = "visible"; 
              on();
             }
      }
      else{
          WrongSound.play();
          console.log("wronge");
          flippedCards.forEach(card =>{
          card.classList.remove('flipped');
          setTimeout(() => card.classList.remove("toggleCard"), 1000);
          });
          clicksCount ++;
          playerClicksCount.textContent = clicksCount;
      }
  }
};

//restart the game
const restart = () =>{
    let cardData =randomData();
    let faces= document.querySelectorAll(".face");
    let cards = document.querySelectorAll(".card");
    section.style.pointerEvents = "none";
    cardData.forEach((item,index) =>{
        cards[index].classList.remove('toggleCard');
        //randomize again
       setTimeout(()=> {
            cards[index].style.pointerEvents ="all";
        faces[index].src= "img/"+ item[0];
        cards[index].setAttribute("Description", item[1]);
            section.style.pointerEvents = "all";
       },1000);
    });
    //rest the count and append it again to the page
    clicksCount =0;
    matched=0;
    playerClicksCount.textContent = clicksCount;
        document.getElementById("restartbtn").style.visibility = "hidden"; 

};

cardGenerator();
</script>
    </body>
</html>