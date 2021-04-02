//for the lottie animation loading
const lottie = document.querySelector('#lottie');
//for the select tags and option drop downs
const selectType = document.querySelector("#select_type");
const type_writing = document.querySelector('#type_writing');
const university = document.querySelector('#university');
const duration = document.querySelector('#duration');
const pages_words = document.querySelector("#pages_words");
const price = document.querySelector('#price');
//for the radio checked buttons
const single = document.querySelector('#single');
const double = document.querySelector('#double');
//hidden input value
const input = document.querySelector("#h-price");
//for the form input buttons
let radioNum = 2;
if(double!=null){
    double.checked=true;
    checker();
    selectType.addEventListener('change', () => {
        checker();
    });

    type_writing.addEventListener('change', () => {
        checker();
    });

    university.addEventListener('change', () => {
        checker();
    });

    duration.addEventListener('change', () => {
        checker();
    });

    pages_words.addEventListener('change', () => {
        checker();
    });

    single.addEventListener('click', () => {
        double.checked = false;
        radioNum = 1;
        checker();
    });

    double.addEventListener('click', () => {
        single.checked = false;
        radioNum = 2;
        checker();
    });
}

function checker(){
    //type of writing
    value=0;
    if(selectType.value==0){
        value+=8;
    } else if (selectType.value == 1){
        value+=6;
    }else if(selectType.value == 2){
        value+=5;
    }
    if (type_writing.value > 18 && type_writing.value < 27){
        value+=4;
    } else if (type_writing.value < 19 || type_writing.value > 26){
        value+=2;
    }
    value+=(parseInt(university.value)+1);
    if(duration.value==0){
        value+=5;
    } else if (duration.value==1){
        value+=4;
    } else if (duration.value==2){
        value+=3;
    }else{
        value+=2;
    }
    var num = parseInt(pages_words.value);
    value*=(num+1);
    if(radioNum==1){
        value+=value*.5;
    }else if(radioNum==2){
        value+=value*.002;
    }
    delay(value.toFixed(2));
}

function delay(value){
    lottie.classList.add('show');
    setTimeout(() => {
        price.innerHTML = "$"+value;
        input.value = "$" + value;
        lottie.classList.remove('show');
        lottie.classList.add('hide');
    }, 1000);
}