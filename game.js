var clicks = 0;
var clicks2 = 0;
var gewinner;

function onClick() {
    clicks += 1;
    document.getElementById("clicks").innerHTML = clicks;
};

function onClick2() {
    clicks2 += 1;
    document.getElementById("clicks2").innerHTML = clicks2;
};
        
function takeClicks(){
    if (clicks > 0){
        clicks -= 1;
        document.getElementById("clicks").innerHTML = clicks;
    }
};

function takeClicks2(){
    if (clicks2 > 0){
        clicks2 -= 1;
        document.getElementById("clicks2").innerHTML = clicks2;
    }
};

function winner(){
    if(clicks == 25){
        alert(clicks);
    } else if(clicks2 == 25){
        alert(clicks2);
    }
};