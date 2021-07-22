let Time = Number(10000);
let ReadyTime = Number(3);
let Day = "https://s19.picofile.com/file/8437587650/Day.png";
let Night = "https://s18.picofile.com/file/8437587668/Night.png";
var d = new Date();
var h = d.getHours();
var baseUrl = 'http://localhost:8080/game';

let Branch = Number(0);
let ClickKey = Number(0);

function addElement() {
    for (let i = 0; i < 3; i++) {
        Branch++;

        let min = Math.ceil(1);
        let max = Math.floor(5);
        const BranchNumber = Math.floor(Math.random() * (max - min) + min);

        const newDiv = document.createElement("div");

        newDiv.style.order = `-${Branch}`;

        const newContent = document.createElement("img");

        if (BranchNumber == 1) {
            newDiv.classList.add("Branch", "BranchOne", `Remove${Branch}`);
            newContent.src = "https://s18.picofile.com/file/8438039568/Big_Left.png";
        } else if (BranchNumber == 2) {
            newDiv.classList.add("Branch", "BranchTwo", `Remove${Branch}`);
            newContent.src = "https://s19.picofile.com/file/8438039576/Big_Right.png";
        } else if (BranchNumber == 3) {
            newDiv.classList.add("Branch", "BranchThree", `Remove${Branch}`);
            newContent.src =
                "https://s19.picofile.com/file/8438039584/Little_Left.png";
        } else if (BranchNumber == 4) {
            newDiv.classList.add("Branch", "BranchFour", `Remove${Branch}`);
            newContent.src =
                "https://s18.picofile.com/file/8438039592/Little_Right.png";
        }

        newDiv.appendChild(newContent);

        const currentDiv = document.getElementById("div1");
        document.querySelector("#AllBranch").insertBefore(newDiv, currentDiv);
    }
}

function CreateElement() {
    Branch++;

    let min = Math.ceil(1);
    let max = Math.floor(5);
    const BranchNumber = Math.floor(Math.random() * (max - min) + min);

    const newDiv = document.createElement("div");

    newDiv.style.order = `-${Branch}`;

    const newContent = document.createElement("img");

    if (BranchNumber == 1) {
        newDiv.classList.add("Branch", "BranchOne", `Remove${Branch}`);
        newContent.src = "https://s18.picofile.com/file/8438039568/Big_Left.png";
    } else if (BranchNumber == 2) {
        newDiv.classList.add("Branch", "BranchTwo", `Remove${Branch}`);
        newContent.src = "https://s19.picofile.com/file/8438039576/Big_Right.png";
    } else if (BranchNumber == 3) {
        newDiv.classList.add("Branch", "BranchThree", `Remove${Branch}`);
        newContent.src = "https://s19.picofile.com/file/8438039584/Little_Left.png";
    } else if (BranchNumber == 4) {
        newDiv.classList.add("Branch", "BranchFour", `Remove${Branch}`);
        newContent.src =
            "https://s18.picofile.com/file/8438039592/Little_Right.png";
    }

    newDiv.appendChild(newContent);

    const currentDiv = document.getElementById("div1");
    document.querySelector("#AllBranch").insertBefore(newDiv, currentDiv);
}

function ChangeBackground(Hour) {
    if (Hour < 19 && Hour > 7) {
        document.getElementById(
            "Main"
        ).style.background = `url("${Day}") center center / cover no-repeat`;
    } else {
        document.getElementById(
            "Main"
        ).style.background = `url("${Night}") center center / cover no-repeat`;
    }
}

setInterval(() => {
    saveToken()
    Start();
    ChangeBackground(h);
}, 1000);

function Start() {
    if (ReadyTime >= 1) {
        addElement();
        setTimeout(() => {
            ReadyTime--;
            document.getElementById("Ready").innerHTML = ReadyTime;
        }, 1000);
    } else {
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
    if (Time <= 0) {
        Lost();
        Time = 0;
    } else {
        LowDamage();
    }
}

function checkKey(e) {
    e = e || window.event;

    if (e.keyCode == "37") {
        Strick("Left");
    } else if (e.keyCode == "39") {
        Strick("Right");
    }
}

function Strick(Float) {
    var Record = Number(document.getElementById("Record").innerHTML);

    document.getElementById("Record").innerHTML = Record + 10;

    document.querySelector(".TreeDecreasing").classList.toggle("Talk");

    CheckCharacter(Float);

    HighDamage();

    CreateElement();

    RemoveElement();
}

function CheckCharacter(Float) {
    document.querySelector("#Left").classList.add("Disable");
    document.querySelector("#Right").classList.add("Disable");
    document.querySelector("#" + Float).classList.remove("Disable");
}

function LowDamage() {
    Time = Number(Time - 1000);
}

function HighDamage() {
    if (Time < 10000) {
        Time = Number(Time + 250);
    } else {
    }
}

function RemoveElement() {
    const e = document.querySelector(`.Branch:first-child`);
    ClickKey++;

    if (
        e.classList.contains("BranchOne") &&
        document.querySelector("#Character #Right").classList.contains("Disable")
    ) {
        Lost();
    } else if (
        e.classList.contains("BranchTwo") &&
        document.querySelector("#Character #Left").classList.contains("Disable")
    ) {
        Lost();
    } else if (
        e.classList.contains("BranchThree") &&
        document.querySelector("#Character #Right").classList.contains("Disable")
    ) {
        Lost();
    } else if (
        e.classList.contains("BranchFour") &&
        document.querySelector("#Character #Left").classList.contains("Disable")
    ) {
        Lost();
    }

    e.parentElement.removeChild(e);
}

async function Lost() {




    document.querySelector(".Character #Right").classList.add("Disable");
    document.querySelector(".Character #Left").classList.add("Disable");


    document.querySelector(".Controller .Btn-Left").classList.add("Disable");
    document.querySelector(".Controller .Btn-Right").classList.add("Disable");

    document.querySelector(".Character #Dead").classList.remove("Disable");

    document.querySelector("#End").classList.remove("Disable");

    document.onkeydown = null;

    ReadyTime = Number(
        9999999999999999999999999999999 + 9999999999999999999999999999999
    );

    /// Erfan changed
    /// send api to php server
    /// send token user and point To serer
    sendApiAfterEndGame()


}

async function sendApiAfterEndGame (){
    const Record = Number(document.getElementById("Record").innerHTML);
    const tokenUser = localStorage.getItem('token');
    const rawResponse = await fetch(baseUrl + `/action/api/changePoint.php?token=${tokenUser}&point=${Record}`);
    const res = await rawResponse.json();

    setTimeout(()=>{
        window.location.replace(baseUrl + `/auth/remacth.php`)

    },1500)
}

function saveToken() {
    const divToken = document.querySelector("#token");
    const token = divToken.dataset.id
    localStorage.setItem('token', token)
}