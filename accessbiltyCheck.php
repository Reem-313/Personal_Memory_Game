<?php
require 'dbconnection.php';
// Initialize the session
//https://www.youtube.com/watch?v=kffivnAYUAY

$rows =mysqli_query($conn, "SELECT * FROM image");
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
        </style>
         <h1> Match the Photos! or  <a href="logout.php"> Logout </a>
</h1><br>
        <section></section>
    <!.. https://stackoverflow.com/questions/5366620/storing-database-records-into-array>
    <script>
const section = document.querySelector("section");
    let getData0= <?= json_encode($array); ?> 
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
  console.log(flippedCards);
  //logic
  if(flippedCards.length ===2)
  {
      if(flippedCards[0].getAttribute('Description') ===
      flippedCards[1].getAttribute('Description'))
      {
          console.log("match");
           flippedCards.forEach(card =>{
          card.classList.remove('flipped');
          card.style.pointerEvents= "none";
          });
      }
      else{
          console.log("wronge");
          flippedCards.forEach(card =>{
          card.classList.remove('flipped');
          setTimeout(() => card.classList.remove("toggleCard"), 1000);
          });
      }
  }
};
cardGenerator();
</script>
    </body>
</html>