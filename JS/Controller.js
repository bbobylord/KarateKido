let Time = Number(3000);

function Strick(Float) {

    var Score = Number(document.getElementById("Score").innerHTML)

    document.getElementById("Score").innerHTML = Score + 10;

    document.getElementById("Damage").style.animation = `Low ${Time}ms forwards normal`;

    setInterval(() => {

        document.querySelector(".Controller .Btn-Left").classList.add("Disable");

        document.querySelector(".Controller .Btn-Right").classList.add("Disable");

    }, Time);
}


