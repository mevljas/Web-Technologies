

function navodila(){
  clearInterval(flyDownInterval);
  clearInterval(MakeEnemiesVisible);
  stop();
  window.location.href = "instructions.html";
}

function tocke(){
  clearInterval(flyDownInterval);
  clearInterval(MakeEnemiesVisible);
  stop();
  window.location.href = "scoreBoard.html";
}

function gameOver(){
  clearInterval(flyDownInterval);
  clearInterval(MakeEnemiesVisible);
  stop();
  alert(playerName+", you're dead!")
  window.location.href = "index.html";
}

