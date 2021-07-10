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

    if(ReadyTime >= 1){
        setTimeout(() => {
            ReadyTime --;
            document.getElementById("Ready").innerHTML = ReadyTime;
        }, 1000);
    }else{
        document.querySelector(".Controller .Btn-Left").classList.remove("Disable");
        document
        .querySelector(".Controller .Btn-Right")
        .classList.remove("Disable");

        document.querySelector("#Ready").classList.add("Disable");
        document.querySelector("#Record").classList.remove("Disable");
        document.querySelector("#Start").classList.add("Disable");

        document.onkeydown = checkKey;

        document.querySelector("#Damage").style.width = `${Time / 100}%`;
        document.querySelector("#Label").innerHTML = `${Time / 1000} Seconds`;
        
        TimeOut();
    }
}

function TimeOut() {
    if(Time <= 0){
    document.querySelector(".Controller .Btn-Left").classList.add("Disable");
    document.querySelector(".Controller .Btn-Right").classList.add("Disable");

    document.querySelector("#End").classList.remove("Disable");

    document.onkeydown = null;
    } else {
        LowDamage();
    }
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

    HighDamage();

}

function CheckCharacter(Float) {
    document.querySelector("#Left").classList.add("Disable");
    document.querySelector("#Right").classList.add("Disable");
    document.querySelector("#" + Float).classList.remove("Disable");
}

function LowDamage() {
    Time = Number(Time - 1000);
    console.log(Time);
}

function HighDamage() {
    if(Time < 10000){
        Time = Number(Time + 250);
    } else {}
}