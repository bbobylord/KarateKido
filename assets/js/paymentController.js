
////
////
///// Cheack payement in payment.php
const checkPayment = () => {
    const divShow = document.getElementById('showPay')


    const num_health = document.querySelector("#num_health").value
    const pay = num_health * 1000

    divShow.innerHTML = `
         <div class="alert alert-info" role="alert">
                        <p>میزان پرداخت نهایی ${pay} هزار تومان</p>

                    </div>
        `
    if (pay <= 0){
        divShow.innerHTML=``


    }


}

////
////
///// add payement in payment.php
const addPayment  =async ()=>{
    var baseUrl = 'http://localhost:8080/game';
    const tokenUser = localStorage.getItem('token');
    const num_health = document.querySelector("#num_health").value

    if (num_health=='' || num_health== undefined  || num_health== null || num_health ==0 ){
        return alert('ابتدا تعداد را مشخص کنید')
    }

    const rawResponse = await fetch(baseUrl + `/action/api/addhealth.php?token=${tokenUser}&health=${num_health}`);
    const res = await rawResponse.json();
    console.log(res.result == true)
    if (res.result == true){
        window.location.replace(baseUrl + `/game.php`)
    }

}