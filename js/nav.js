const mobileNav = document.querySelector("#vertical_nav");
const burger = document.querySelector(".burger");
const line_1 = document.querySelector("#line-1");
const line_2 = document.querySelector("#line-2");
const line_3 = document.querySelector("#line-3");

//create the links
let ul = document.createElement("ul");
let li_1 = document.createElement("li");
let a_1 = document.createElement("a");
a_1.href = "#";
a_1.text = "How it works";
let li_2 = document.createElement("li");
let a_2 = document.createElement("a");
a_2.href = "#";
a_2.text = "Get started";
let li_3 = document.createElement("li");
let a_3 = document.createElement("a");
a_3.href = "#";
a_3.text = "About";
let li_4 = document.createElement("li");
let a_4 = document.createElement("a");
a_4.href = "#";
a_4.text = "FAQ";
let li_5 = document.createElement("li");
let a_5 = document.createElement("a");
a_5.href = "#";
a_5.text = "Contact";
li_1.appendChild(a_1);
li_2.appendChild(a_2);
li_3.appendChild(a_3);
li_4.appendChild(a_4);
li_5.appendChild(a_5);
ul.appendChild(li_1);
ul.appendChild(li_2);
ul.appendChild(li_3);
ul.appendChild(li_4);
ul.appendChild(li_5);

let num = 0;
function show(){
    mobileNav.appendChild(ul);
    mobileNav.classList.remove("move-hide");
    mobileNav.style.animation=`animate 0.5s linear`;
    mobileNav.classList.add("right-move");
    line_2.style.opacity="0";
    line_1.style.transform ="rotate(45deg) translate(-0px, 6px)";
    line_3.style.transform = "rotate(-45deg) translate(-0px, -6px)";
}

function hide() {
    mobileNav.classList.remove("right-move");
    mobileNav.style.animation = `back 0.5s linear`;
    mobileNav.classList.add("move-hide");
    line_2.style.opacity = "1";
    line_1.style.transform = "rotate(0deg) translate(-0px, 0px)";
    line_3.style.transform = "rotate(0deg) translate(-0px, 0px)";
    mobileNav.removeChild(ul);
}
burger.addEventListener('click',()=>{
    if(num==0){
        show();
        num=1;
    }else{
        hide();
        num=0;
    }
});