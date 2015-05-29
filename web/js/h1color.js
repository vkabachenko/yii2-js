var interval = 1000; // 1 sec

var minColor = 0; // min value in rgb definition
var maxColor = 255; // max value in rgb definition


function getRandomColor() {

    return Math.floor(Math.random() * (maxColor - minColor + 1)) + minColor;

}


setInterval(function(){

    var red = getRandomColor();
    var green = getRandomColor();
    var blue = getRandomColor();

    $('h1').css('color','rgb('+red+','+green+','+blue+')');

},interval);
