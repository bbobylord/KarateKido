let Time = Number(10000);
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

        document.querySelector("#Ready").classList.add("Disable");
        document.querySelector("#Record").classList.remove("Disable");
        document.querySelector("#Start").classList.add("Disable");

        TimeOut();
    }
}

function Strick(Float) {

    var Record = Number(document.getElementById("Record").innerHTML);
  
    document.getElementById("Record").innerHTML = Record + 10;
  
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
