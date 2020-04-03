function Player() {
  this.width = width / 11;
  this.height = height / 13;
  this.x = width / 2 - this.width;
  this.y = height - this.height;
  this.speed = width * 0.0005;
  this.bullets = new Array();
  this.lives = 3;
  this.explosion = false;
  this.sX = 150; //location of the image in spritesheet
  this.sY = 638;
  this.sWidth = 73;
  this.sHeight = 51;
  this.bulletsActive;
  this.moveLeft = false;
  this.moveRight = false;

  this.draw = function() {
    //cut picture from spritesheet image invadersimage
    ctx.drawImage(
      invadersImage,
      this.sX,
      this.sY,
      this.sWidth,
      this.sHeight,
      this.x,
      this.y,
      this.width,
      this.height
    );
  };
  this.collision = function() {
    //check canvas border
    return this.x + this.width < width && this.x > 0;
  };
  this.update = function(delta) {
    if (pressedKeys[39]) {
      player.x += player.speed * delta;
      if (!player.collision()) {
        player.x -= player.speed * delta;
      }
    }
    if (pressedKeys[37]) {
      player.x -= player.speed * delta;
      if (!player.collision()) {
        //if player collides...
        player.x += player.speed * delta;
      }
    }
    if (pressedKeys[32]) {
      //space button
      for (var i = 0; i < player.bullets.length; i++) {
        if (!player.bullets[i].status) {
          //ce je bulet status == false
          player.bullets[i].x =
            player.x + player.width / 2 - player.bullets[i].width / 2;
          player.bullets[i].y = player.y;
          player.bullets[i].status = true;
          player.bulletsActive--;
          shootSound.play();
          break; //make just one bullet
        }
      }
      pressedKeys[32] = undefined;
    }
    if (this.lives > 3) {
      this.lives = 3;
    }
    if (this.bulletsActive > 3) {
      this.bulletsActive = 3;
    }
  };
  this.makeBullets = function() {
    for (var i = 0; i < 3; i++) {
      this.bullets[i] = new Bullet(bulletType.PLAYER);
    }
    this.bulletsActive = this.bullets.length; //save number of active bullets
  };
  this.updateBullets = function(delta) {
    for (var i = 0; i < this.bullets.length; i++) {
      this.bullets[i].update(delta);
    }
  };
  this.drawBullets = function() {
    for (var i = 0; i < this.bullets.length; i++) {
      this.bullets[i].draw();
    }
  };
}

function updatePlayer(delta) {
  player.update(delta);
  player.updateBullets(delta);
}
