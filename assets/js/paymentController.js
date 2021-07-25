
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
const addPayment  =async (plan)=>{
    // const pay = document.querySelector("#pay").value
    // if (num_health=='' || num_health== undefined  || num_health== null || num_health ==0 ){
    //     return alert('ابتدا تعداد را مشخص کنید')
    // }

    var baseUrl = `${window.location.origin}`;
    const tokenUser = localStorage.getItem('token');

    let pay
    if  (plan==1)
        pay=10
    else if(plan==2)
        pay=20
    else if(plan==3)
        pay=40
    else if(plan==4)
        pay=100

    const rawResponse = await fetch(baseUrl + `/action/api/addHealth.php?token=${tokenUser}&health=${pay}`);
    const res = await rawResponse.json();
    console.log(res.result == true)
    if (res.result == true){
        window.location.replace(baseUrl + `/index.php`)
    }

}