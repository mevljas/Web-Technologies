var level = 1;
var flyDownInterval;
var scoreBoard = [];
var HighScore = 0;
var playerName;
let d = performance.now();
let delta = 0;
timestamp = 0;
lastFrameTimeMs = 0;
fps = 30;
// We want to simulate 1000 ms / 60 FPS = 16.667 ms per frame every time we run update()
var timestep = 1000 / fps;

function setup() {
  var themeSound = document.getElementById("themeSound");
  document.getElementById("themeSound").volume = 0.2;
  document.getElementById("explosionSound").volume = 0.2;
  document.getElementById("shootSound").volume = 0.2;
  themeSound.loop = true;
  themeSound.play();
  let canvas = document.getElementById("canvas");
  ctx = canvas.getContext("2d");
  width = canvas.width;
  height = canvas.height;
  // frameRate(30);
  score = 0;
  lives = 3;
  player = new Player();
  player.makeBullets();
  setInterval(enemyShoot, 500); //enemy strelja
  makeEnemies();
  //   fill("white");
  // textSize(20);
  makeWalls();
  playerimg1 = document.getElementById("player1");
  playerimg2 = document.getElementById("player2");
  playerimg3 = document.getElementById("player3");
  getLocalStorage();
  document.getElementById("highscore").innerHTML = "High Score: " + HighScore;
  //   enterName();
  playerName = "test";
  start();
}

function gameLoop(timestamp) {
  // Track the accumulated time that hasn't been simulated yet
  delta += timestamp - lastFrameTimeMs; // note += here
  lastFrameTimeMs = timestamp;

  // Simulate the total elapsed time in fixed-size chunks
  while (delta >= timestep) {
    update(timestep);
    delta -= timestep;
  }
  draw();

  if (requestId) {
    requestId = requestAnimationFrame(gameLoop);
  }
}

function update(delta) {
  // Update the state of the world for the elapsed time since last render
  if (player.lives <= 0) {
    gameOver();
  }
  updatePlayer(delta);
  updateEnemies(delta);
  if (level == 1) {
    updateWalls();
    if (enemiesAlive == 0) {
      setTimeout(function() {
        level = 2;
        makeEnemies();
        if (flyDownInterval == undefined)
          //prverimo ce ni se intervala
          flyDownInterval = setInterval(doFlyDown, 5000);
      }, 2000);
      enemiesAlive = -1;
    } else if (wallsAlive == 0) {
      //ce v 1. levelu unicimo vse defense walle
      wallsAlive = -1;
      flyDownInterval = setInterval(doFlyDown, 5000); //start fly down
    }
  }
  if (level == 2) {
    if (enemiesAlive == 0) {
      setTimeout(function() {
        clearInterval(flyDownInterval);
        level = 3;
        makeEnemies();
        setInterval(MakeEnemiesVisible, 500);
      }, 2000);
      enemiesAlive = -1;
    }
  }
}

function draw() {
  // Draw the state of the world
  clear();
  player.draw();
  player.drawBullets();
  drawEnemies();
  if (level == 1) drawWalls();
  document.getElementById("name").innerHTML = "Name: " + playerName;
  document.getElementById("score").innerHTML = "Score: " + score;
  document.getElementById("level").innerHTML = "level: " + level;
  switch (player.lives) {
    case 3:
      playerimg1.style.visibility = "visible";
      playerimg2.style.visibility = "visible";
      playerimg3.style.visibility = "visible";
      break;
    case 2:
      playerimg1.style.visibility = "visible";
      playerimg2.style.visibility = "visible";
      playerimg3.style.visibility = "hidden";
      break;
    case 1:
      playerimg1.style.visibility = "visible";
      playerimg2.style.visibility = "hidden";
      playerimg3.style.visibility = "hidden";
      break;
    default:
      playerimg1.style.visibility = "hidden";
      playerimg2.style.visibility = "hidden";
      playerimg3.style.visibility = "hidden";
      break;
  }

  switch (player.bulletsActive) {
    case 3:
      bullet1.style.visibility = "visible";
      bullet2.style.visibility = "visible";
      bullet3.style.visibility = "visible";
      break;
    case 2:
      bullet1.style.visibility = "visible";
      bullet2.style.visibility = "visible";
      bullet3.style.visibility = "hidden";
      break;
    case 1:
      bullet1.style.visibility = "visible";
      bullet2.style.visibility = "hidden";
      bullet3.style.visibility = "hidden";
      break;
    default:
      bullet1.style.visibility = "hidden";
      bullet2.style.visibility = "hidden";
      bullet3.style.visibility = "hidden";
      break;
  }
}

function restartgame() {
  setLocalStorage();
  location.reload();
}

function getLocalStorage() {
  // Check browser support
  if (typeof Storage !== "undefined") {
    // Retrieve
    var retrievedData = localStorage.getItem("SpaceInvadersCode");
    if (retrievedData != null) {
      scoreBoard = JSON.parse(retrievedData); //convert to array
    }
  }
  for (var i = 0; i < scoreBoard.length; i++) {
    var arrayOfStrings = scoreBoard[i].split(" ");

    if (parseInt(arrayOfStrings[1]) > HighScore) {
      HighScore = parseInt(arrayOfStrings[1]);
    }
  }
}

function setLocalStorage() {
  // Check browser support
  if (typeof Storage !== "undefined") {
    scoreBoard.push(playerName + " " + score); //save
    // Store
    // converts to string and save
    localStorage.setItem("SpaceInvadersCode", JSON.stringify(scoreBoard));
  }
}

function start() {
  requestId = requestAnimationFrame(gameLoop);
}

function stop() {
  cancelAnimationFrame(requestId);
  requestId = undefined;
}

function clear() {
  ctx.clearRect(0, 0, canvas.width, canvas.height);
}

setup();
