pressedKeys = {};

document.addEventListener('keydown', function(event) {
    let keyName = event.keyCode;
    pressedKeys[keyName] = true;
    
});


document.addEventListener('keyup', function(event) {
    let keyName = event.keyCode;
    pressedKeys[keyName] = undefined;
    
});