//for the lottie animation loading
const lottie = document.querySelector('#lottie');
//for the select tags and option drop downs
const selectType = document.querySelector("#select-type");
const price = document.querySelector('#price');
const university = document.querySelector('#university');
const week = document.querySelector('#week');
const article = document.querySelector('#article');
//for the radio checked buttons
const single = document.querySelector('#single');
const double = document.querySelector('#double');
//for the form input buttons
const write = document.querySelector('#write');
const reWrite = document.querySelector('#rewrite');
const edit = document.querySelector('#edit');
//by default setting the write style to blue color
write.style.color="#367FD3";
let buttonNum = 1;
//set default radio value;
let radioNum = 0;
write.addEventListener('click',()=>{
    write.style.color = "#367FD3";
    reWrite.style.color = "#636A77";
    edit.style.color = "#636A77";
    buttonNum = 1;
    checker();
});

reWrite.addEventListener('click', () => {
    write.style.color = "#636A77";
    reWrite.style.color = "#367FD3";
    edit.style.color = "#636A77";
    buttonNum=2;
    checker();
});

edit.addEventListener('click', () => {
    write.style.color = "#636A77";
    reWrite.style.color = "#636A77";
    edit.style.color = "#367FD3";
    buttonNum = 3;
    checker();
});


single.addEventListener('click',()=>{
    double.checked = false;
    radioNum=1;
    checker();
});

double.addEventListener('click', () => {
    single.checked = false;
    radioNum=2;
    checker();
});

selectType.addEventListener('change',()=>{
    checker();
});

university.addEventListener('change',()=>{
    checker();
});

week.addEventListener('change',()=>{
    checker();
});

article.addEventListener('change',()=>{
    checker();
});

function checker(){
    var value = 0;
    var type = selectType.value;
    var uni = university.value;
    var day = week.value;
    var art = article.value;
    if(buttonNum==1) value+=1.5;
    else if(buttonNum ==2) value+=3.5;
    else value+=4.3;
    if(parseInt(type)== 1) value+=1.3;
    else value+=7.3;  
    if (parseInt(uni) == 1) value += 2.3;
    else value += 5.4;
    if (parseInt(day) == 1) value += 1.7;
    else value += 8.6;
    if (parseInt(art) == 1) value += 2.9;
    else value += 9.8;
    if(radioNum ==1) value+=6.7;
    else if(radioNum == 2) value+=4.3;

    delay(value.toFixed(2));
}

function delay(value){
    lottie.classList.add('show');
    setTimeout(() => {
        price.innerHTML = "$"+value;
        lottie.classList.remove('show');
        lottie.classList.add('hide');
    }, 1000);
}