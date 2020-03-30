function Bullet(type) {
    //0 = player
    //1 = enemy
    this.width = width / 40;
    this.height = height / 30;
    this.x;
    this.y;
    this.speed = height / 100;
    this.status = false;
    this.type = type;
    this.damage = 1;


    this.draw = function() {
        if (this.status) {
            ctx.drawImage(bulletImage, this.x, this.y, this.width, this.height);
        }
    }
    this.collision = function() {
        if (this.status) {
            if (this.y <= 0 || this.y + this.height >= height) {
                this.status = false;
                if (this.type == 0) {
                    player.bulletsActive++;
                    
                }
            } else if (this.type == 1) { //enemybullet colliison 
                //player collsion
                if (this.x + this.width > player.x && this.x + this.width < player.x + player.width && this.y + this.height > player.y + player.height / 2 ||
                    this.x < player.x + player.width && this.x > player.x && this.y + this.height > player.y + player.height / 2) {
                    this.status = false;
                    player.lives -= this.damage;
                    console.log("player hit")
                }
                //walls colliison
                if (wallsAlive > 0) {
                    for (var i = 0; i < walls.length; i++) {
                        if (walls[i].status) {
                            if (this.x + this.width > walls[i].x && this.x + this.width < walls[i].x + walls[i].width && this.y + this.height > walls[i].y ||
                                this.x < walls[i].x + walls[i].width && this.x > walls[i].x && this.y + this.height > walls[i].y) {
                                this.status = false;
                                walls[i].lives -= this.damage;
                               
                                
                            }
                        }
                    }
                }

            } else if (this.type == 0) { //playerbullet collision 
                if (boss.status) { //boss collision
                    if (this.y < boss.y + boss.height && this.x + this.width > boss.x &&
                        this.x + this.width < boss.x + boss.width && this.y > boss.y ||
                        this.y < boss.y + boss.height && this.x < boss.x + boss.width &&
                        this.x > boss.x && this.y > boss.y) {
                        boss.lives -= this.damage;
                        if (boss.lives < 1) {
                            boss.status = false;
                            score++;
                            explosion(boss);
                            enemiesAlive--;
                        }
                        this.status = false;
                        player.bulletsActive++;
                    }
                }
                //other enemies collison
                for (var i = 0; i < enemies.length; i++) {
                    for (var j = 0; j < enemies[i].length; j++) {
                        if (enemies[i][j].status) {
                            if (this.y < enemies[i][j].y + enemies[i][j].height && this.x + this.width > enemies[i][j].x &&
                                this.x + this.width < enemies[i][j].x + enemies[i][j].width && this.y > enemies[i][j].y ||
                                this.y < enemies[i][j].y + enemies[i][j].height && this.x < enemies[i][j].x + enemies[i][j].width &&
                                this.x > enemies[i][j].x && this.y > enemies[i][j].y) {
                                enemies[i][j].lives--;
                                if (enemies[i][j].lives < 1) {
                                    enemies[i][j].status = false;
                                    score++;
                                    explosion(enemies[i][j]);
                                    enemiesAlive--;
                                }
                                this.status = false;
                                player.bulletsActive++;
                            }
                        }
                    }
                }
                //walls collsison
                if (wallsAlive > 0) {
                    for (var i = 0; i < walls.length; i++) {
                        if (walls[i].status) {
                            if (this.y < walls[i].y + walls[i].height && this.x + this.width > walls[i].x && this.x + this.width < this.x + this.width || //POPRAVI!!!!!
                                this.y < walls[i].y + walls[i].height && this.x < walls[i].x + walls[i].width && this.x > walls[i].x) {
                                walls[i].lives -= this.damage;
                                this.status = false;
                                player.bulletsActive++;
                            }
                        }
                    }
                }
            }
        }

    }
    this.update = function() {
        if (this.status) {
            //enemybullet
            if (this.type == 1) {
                this.y += this.speed;
                this.collision();
            } else { //player bullet
                this.y -= this.speed;
                this.collision();
            }
        }
    }
}