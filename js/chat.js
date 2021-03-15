//setting this value to allow send of message
//only when a receipient has beeen selected
let user_num = -1;
let user_log = -1
const textBox = document.querySelector(".hide-area");
const content = document.getElementById("chat-content");

function Messages(receiver,user_id,name,link){
    user_num = receiver;
    user_log = user_id;
    //display the text area
    textBox.classList.remove("hide-area");
    textBox.classList.add("type-area");
    document.getElementById("top-name").innerHTML=name;
    document.getElementById("set-image").src = link;
    //set interval listener
    //we use an AJAX to fetch messages
    let xttps = new XMLHttpRequest();
    xttps.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            content.innerHTML = this.responseText;
            //scroll to the latest text
            content.scrollTop = content.scrollHeight; 
        }
    };
    xttps.open("GET", "../include/message.inc.php?receiver=" + receiver + "&user_id=" + user_id, true);
    xttps.send();
}

function sendMessage(user_id){
    //get the message from the text
    var textArea = document.getElementById("make-message");
    var message = textArea.value;
    if(message===""){
        //if the text is empty
        textArea.style.border="1px solid red";
        alert('type message');
    }else{
        textArea.style.border = "none";
        //use the message to send information
        let xttps = new XMLHttpRequest();
        xttps.onreadystatechange = function(){
            if(this.readyState==4 && this.status==200){
                textArea.value="";
            }
        };
        xttps.open("GET", "../include/send.inc.php?receiver=" + user_num + "&user_id=" + user_id+"&message="+message, true);
        xttps.send();
    } 
}

function cause(){
    let xttps = new XMLHttpRequest();
    xttps.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            //determine which side to create the div
            //whether the sender or receiver
            content.innerHTML = this.responseText;
        }
    };
    xttps.open("GET", "../include/message.inc.php?receiver=" + user_num + "&user_id=" + user_log, true);
    xttps.send();
}

//this timer constantly adjusts after every 2 seconds
let timer = setInterval(() => {
    if(user_num!=-1 && user_log!=-1){
        cause();
    }
}, 800);

//update the users status after every 5 min
