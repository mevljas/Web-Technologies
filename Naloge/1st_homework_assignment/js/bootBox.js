function enterName(){
  bootbox.prompt("Please enter your name.", function(result){ 
    playerName = result;
    if( result == null ||  result == "" || result.length < 2  || result == " " || result == "  "){
      enterName();
    }
    else{
      navodila();
    }
    
  });
}



function navodila(){
  // stop();
  clearInterval(flyDownInterval);
  clearInterval(MakeEnemiesVisible);
  bootbox.alert({ 
    size: "medium",
    title: "Instructions",
    message: "Goal of the game is to defeat as many enemies as possible."+ 
    " You can move by using arrow keys and shoot with a spacebar.<br>"+
    "Good luck!", 
    callback: function(){ start(); 
    if (level == 1) {
        if (wallsAlive == -1) { //ce v 1. levelu unicimo vse defense walle
            flyDownInterval = setInterval(doFlyDown, 5000); //start fly down
        }
    }
    else if (level == 2) {
        flyDownInterval = setInterval(doFlyDown, 5000); //start fly down

    }
    else if (level == 3){
      setInterval(MakeEnemiesVisible, 500);
    }
    }
  })
}

function tocke(){
  clearInterval(flyDownInterval);
  clearInterval(MakeEnemiesVisible);
  stop();
  getLocalStorage();
  var msg = "";
  for (var i = 0; i < scoreBoard.length; i++) {
    msg += scoreBoard[i] + " <br>";
  }
  bootbox.alert({ 
    size: "medium",
    title: "ScoreBoard",
    message: "<b>name     /    Score</b> <br>"+msg, 
    callback: function(){ loop(); 
    if (wallsAlive == -1) { //ce v 1. levelu unicimo vse defense walle
        flyDownInterval = setInterval(doFlyDown, 5000); //start fly down
    }
    else if (level == 2) {
        flyDownInterval = setInterval(doFlyDown, 5000); //start fly down

    }
    else if (level == 3){
      setInterval(MakeEnemiesVisible, 500);
    }
  }
  })
}

function gameOver(){
  stop();
  bootbox.alert({ 
    size: "small",
    title: "Game over",
    message: playerName+", you're dead!",
    callback: function(){ restartgame();}
  })
}

