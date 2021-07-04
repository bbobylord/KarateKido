let Time = Number(10000);
let ReadyTime = Number(3);


setInterval(() => {
    
    if(ReadyTime !== 0){
        ReadyTime --;
        document.getElementById("Ready").innerHTML = ReadyTime;
    }else{
        document.querySelector(".Controller .Btn-Left").classList.remove("Disable");
        document
        .querySelector(".Controller .Btn-Right")
        .classList.remove("Disable");

        TimeOut();
    }

}, 1000);

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
        document.querySelector("#Ready").classList.remove("Disable");
        document.querySelector("#Ready").innerHTML = "Ended"

      }, Time);

}
