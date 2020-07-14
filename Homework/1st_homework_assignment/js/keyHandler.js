pressedKeys = {};

document.addEventListener("keydown", function(event) {
  let keyName = event.keyCode;
  pressedKeys[keyName] = true;
  if (themeSound.currentTime === 0) {
    themeSound.play();
  }
});

document.addEventListener("keyup", function(event) {
  let keyName = event.keyCode;
  pressedKeys[keyName] = undefined;
});
