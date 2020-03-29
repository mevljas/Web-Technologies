var playerName = "";
function Player() {
    this.width = width / 11
    this.height = height / 20;
    this.x = (width / 2) - this.width;
    this.y = height - this.height;
    this.speed = height / 70;
    this.bullets = new Array();
    this.lives = 3;
    this.explosion = false;
    this.sX = 150; //lokacija v slikie spritesheet
    this.sY = 638;
    this.sWidth = 73;
    this.sHeight = 51;
    this.bulletsActive;
    this.moveLeft = false;
    this.moveRight = false;

    this.draw = function() {
        //sliko izreze iz spritesheet iamge invadersimage
        ctx.drawImage(invadersImage, this.sX, this.sY, this.sWidth, this.sHeight, this.x, this.y, this.width, this.height);
    }
    this.collision = function() {
        //preverimo ce gremo cez rob canvasa
        return this.x + this.width < width && this.x > 0;
    }
    this.update = function() {
        if (keyIsDown(RIGHT_ARROW)) {
            player.x += player.speed;
            if (!player.collision()) {
                player.x -= player.speed;
            }
        }
        if (keyIsDown(LEFT_ARROW)) {
            player.x -= player.speed;
            if (!player.collision()) {
                player.x += player.speed;
            }
        }

    }
    this.makeBullets = function() {
        for (var i = 0; i < 3; i++) {
            this.bullets[i] = new Bullet(0); //0 - player bullet
        }
        this.bulletsActive = this.bullets.length; //shrani kolko bulletov je active
    }
    this.updateBullets = function() {
        for (var i = 0; i < this.bullets.length; i++) {
            this.bullets[i].update();
        }
    }
    this.drawBullets = function() {
        for (var i = 0; i < this.bullets.length; i++) {
            this.bullets[i].draw();
        }
    }
}

function updatePlayer() {
    player.update();
    player.updateBullets();
}


function keyPressed() {
    if (keyCode === 32) { //space button
        for (var i = 0; i < player.bullets.length; i++) {
            if (!player.bullets[i].status) { //ce je bulet status == false
                player.bullets[i].x = player.x + player.width / 2 - player.bullets[i].width / 2;
                player.bullets[i].y = player.y;
                player.bullets[i].status = true;
                player.bulletsActive--;
                shootSound.play();
                break; //da naredi samo en bullet
            }
        }
    }
}