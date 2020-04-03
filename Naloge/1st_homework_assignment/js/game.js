var level = 1;
var flyDownInterval;
var scoreBoard = [];
let d = performance.now();
let delta = 0;
timestamp = 0;
lastFrameTimeMs = 0;
fps = 120;
// We want to simulate 1000 ms / 120 FPS
var timestep = 1000 / fps;
let running = true;

function setup() {
  loadUsers();
  themeSound = document.getElementById("themeSound");
  document.getElementById("themeSound").volume = 0.2;
  document.getElementById("explosionSound").volume = 0.2;
  document.getElementById("shootSound").volume = 0.2;
  themeSound.loop = true;
  canvas = document.getElementById("canvas");
  ctx = canvas.getContext("2d");
  wrapper = document.getElementById("canvasWrapper");
  canvas.width = wrapper.clientWidth * 0.96;
  canvas.height = wrapper.clientHeight * 2;
  if (wrapper.clientWidth > 700) {
    canvas.width = wrapper.clientWidth * 0.99;
    canvas.height = wrapper.clientHeight * 2.5;
  }
  width = canvas.width;
  height = canvas.height;
  score = 0;
  lives = 3;
  player = new Player();
  player.makeBullets();
  setInterval(enemyShoot, 1000);
  makeEnemies();
  makeWalls();
  playerimg1 = document.getElementById("player1");
  playerimg2 = document.getElementById("player2");
  playerimg3 = document.getElementById("player3");
  scorelabel = document.getElementById("score");
  levelLabel = document.getElementById("level");
  requestId = requestAnimationFrame(gameLoop);
  $("#shoot").click(function() {
    pressedKeys[32] = true;
    $("#shoot").css({ opacity: 0.5 });
    if (typeof playerShootInterval !== "undefined") {
      clearInterval(playerShootInterval);
    }
    playerShootInterval = setTimeout(function() {
      pressedKeys[32] = false;
      $("#shoot").css({ opacity: 1 });
    }, 100);
  });

  $("#left").click(function() {
    pressedKeys[37] = true;
    if (typeof playerLeftInterval !== "undefined") {
      clearInterval(playerLeftInterval);
      $("#left").css({ opacity: 0.5 });
    }
    playerLeftInterval = setTimeout(function() {
      pressedKeys[37] = false;
      $("#left").css({ opacity: 1 });
    }, 100);
  });

  $("#right").click(function() {
    pressedKeys[39] = true;
    if (typeof playerRightInterval !== "undefined") {
      clearInterval(playerRightInterval);
      $("#right").css({ opacity: 0.5 });
    }
    playerRightInterval = setTimeout(function() {
      pressedKeys[39] = false;
      $("#right").css({ opacity: 1 });
    }, 100);
  });
}

function gameLoop(timestamp) {
  // Track the accumulated time that hasn't been simulated yet
  delta += timestamp - lastFrameTimeMs;
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
  if (player.lives <= 0) {
    gameOver(score);
  }
  updatePlayer(delta);
  updateEnemies(delta);
  if (level === 1) {
    updateWalls();
    if (enemiesAlive === 0) {
      setTimeout(function() {
        level = 2;
        destroyWalls();
        makeEnemies();
        if (flyDownInterval == undefined) console.log("test");
        flyDownInterval = setInterval(doFlyDown, 5000);
      }, 2000);
      enemiesAlive = -1;
    } else if (wallsAlive === 0) {
      //if all wals are destroyed
      wallsAlive = -1;
      flyDownInterval = setInterval(doFlyDown, 5000); //start fly down
    }
  } else if (level === 2) {
    if (enemiesAlive === 0) {
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
  clear();
  player.draw();
  player.drawBullets();
  drawEnemies();
  if (level == 1) drawWalls();
  scorelabel.innerHTML = "Score: " + score;
  levelLabel.innerHTML = "level: " + level;
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

function clear() {
  ctx.clearRect(0, 0, canvas.width, canvas.height);
}

function gameOver() {
  if (running) {
    running = false;
    clearInterval(flyDownInterval);
    clearInterval(MakeEnemiesVisible);
    cancelAnimationFrame(requestId);
    requestId = undefined;
    alert(tempUser.fName + ", you're dead!" + "\nScore: " + score);
    saveUser(score);
    // window.location.href = "game.html";
  }
}


setup();

