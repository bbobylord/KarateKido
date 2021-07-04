let Time = Number(3000);
let ReadyTime = Number(3);


setInterval(() => {
    
    Start();

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

        if(document.getElementById("Score").innerHTML == "Start"){
            document.getElementById("Score").innerHTML = 0;
        } else {}

        document.querySelector("#Ready").classList.add("Disable");

        TimeOut();
    }
}

function Strick(Float) {

  var Score = Number(document.getElementById("Score").innerHTML);

  document.getElementById("Score").innerHTML = Score + 10;

}

function TimeOut() {

    document.getElementById(
        "Damage"
      ).style.animation = `Low ${Time}ms forwards normal`;

    setInterval(() => {

        document.querySelector(".Controller .Btn-Left").classList.add("Disable");
        document.querySelector(".Controller .Btn-Right").classList.add("Disable");

        document.querySelector("#End").classList.remove("Disable");

      }, Time);

}
