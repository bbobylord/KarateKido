let Time = Number(10000);
let ReadyTime = Number(3);
let Day = "https://s19.picofile.com/file/8437587650/Day.png"
let Night = "https://s18.picofile.com/file/8437587668/Night.png"
var d = new Date();
var h = d.getHours();  

function ChangeBackground(Hour) {
    if(Hour < 19 && Hour > 7){
        document.getElementById("Main").style.background = `url("${Day}") center center / cover no-repeat`;
    } else {
        document.getElementById("Main").style.background = `url("${Night}") center center / cover no-repeat`;
    }
}

setInterval(() => {
    
    Start();
    ChangeBackground(h);

}, 1000);

function Start() {

    if(ReadyTime !== 1){
        ReadyTime --;
        document.getElementById("Ready").innerHTML = ReadyTime;
    }else{
        document.querySelector(".Controller .Btn-Left").classList.remove("Disable");
        document
        .querySelector(".Controller .Btn-Right")
        .classList.remove("Disable");

        document.querySelector("#Ready").classList.add("Disable");
        document.querySelector("#Record").classList.remove("Disable");
        document.querySelector("#Start").classList.add("Disable");

        document.onkeydown = checkKey;

        TimeOut();
    }
}

function TimeOut() {

    setInterval(() => {

        document.querySelector(".Controller .Btn-Left").classList.add("Disable");
        document.querySelector(".Controller .Btn-Right").classList.add("Disable");

        document.querySelector("#End").classList.remove("Disable");

        document.onkeydown = null;

      }, Time);

}

function checkKey(e) {

    e = e || window.event;

     if (e.keyCode == '37') {
        Strick("Left")
    }
    else if (e.keyCode == '39') {
        Strick("Right")
    }

}

function Strick(Float) {

    var Record = Number(document.getElementById("Record").innerHTML);

    document.getElementById("Record").innerHTML = Record + 10;

    CheckCharacter(Float);

    console.log(Float);

}

function CheckCharacter(Float) {
    document.querySelector("#Left").classList.add("Disable");
    document.querySelector("#Right").classList.add("Disable");
    document.querySelector("#" + Float).classList.remove("Disable");
}

function name(params) {
    
}