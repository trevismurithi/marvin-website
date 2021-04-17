const next = document.getElementById("next");
const back = document.getElementById("back");
const slide1 = document.getElementById("slide1");
const slide2 = document.getElementById("slide2");
const slide3 = document.getElementById("slide3");
let slideNum=1;
next.addEventListener('click',()=>{
    if(slideNum == 1){
        slide2.scrollIntoView();
        slideNum=2;
    }else if(slideNum == 2){
        slide3.scrollIntoView();
        slideNum = 3;
    } else if (slideNum == 3){
        slide1.scrollIntoView();
        slideNum = 1;
    }
});

back.addEventListener('click',()=>{
    if(slideNum == 1){
        slide3.scrollIntoView();
        slideNum = 3;
    }else if(slideNum == 2){
        slide1.scrollIntoView();
        slideNum = 1;
    } else if (slideNum == 3){
        slide2.scrollIntoView();
        slideNum = 2;
    }
});