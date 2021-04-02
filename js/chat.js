//setting this value to allow send of message
//only when a receipient has beeen selected
let user_num = -1;
let user_log = -1
let write = 0;
const textBox = document.querySelector(".hide-area");
const content = document.getElementById("chat-content");
const assign = document.getElementById("top-id");
//get the shared files class
const shared = document.querySelector(".share-files");
let assistFiles = null;
var select = document.createElement("select");
var a = document.createElement("a");
function Messages(receiver,user_id,name,link,state,call){
    user_num = receiver;
    user_log = user_id;
    //display the text area
    textBox.classList.remove("hide-area");
    textBox.classList.add("type-area");
    document.getElementById("top-name").innerHTML=name;
    document.getElementById("set-image").src = link;
    var stateID = document.getElementById(user_num+"state");
    if(call==true)requestFiles(receiver);
    //check is the assign is not null
    if(assign != null){
        if (state == "allocated") assign.innerText = "unset";
        else assign.innerText = "set";
        assign.onclick = function () {
            //assign the user 
            if (write == 0) {
                writer("eject");
                assign.innerText = "unset";
                stateID.innerText = "allocated"
                write = 1;
            } else {
                writer("reject");
                assign.innerText = "set";
                stateID.innerText = "discharged";
                write = 0;
            }
        };
    }
    url = "../include/message.inc.php";
    param = "receiver=" + receiver + "&user_id=" + user_id;
    //set interval listener
    //we use an AJAX to fetch messages
    let xttps = new XMLHttpRequest();
    xttps.open("POST", url, true);
    xttps.setRequestHeader('Content-type','application/x-www-form-urlencoded');
    xttps.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            content.innerHTML = this.responseText;
            //scroll to the latest text
            content.scrollTop = content.scrollHeight; 
        }
    };
    xttps.send(param);
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
        url = "../include/send.inc.php";
        param = "receiver=" + user_num + "&user_id=" + user_id + "&message=" + message;
        //use the message to send information
        let xttps = new XMLHttpRequest();
        xttps.open("POST", url, true);
        xttps.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        xttps.onreadystatechange = function(){
            if(this.readyState==4 && this.status==200){
                textArea.value="";
            }
        };
        xttps.send(param);
    } 
}

function cause(){
    url = "../include/message.inc.php";
    param = "receiver=" + user_num + "&user_id=" + user_log;
    let xttps = new XMLHttpRequest();
    xttps.open("POST", url, true);
    xttps.setRequestHeader('Content-type','application/x-www-form-urlencoded');
    xttps.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            //determine which side to create the div
            //whether the sender or receiver
            content.innerHTML = this.responseText;
        }
    };
    xttps.send(param);
}

//this timer constantly adjusts after every 2 seconds
let timer = setInterval(() => {
    if(user_num!=-1 && user_log!=-1){
        cause();
    }
}, 800);
//update the users status after every 5 min


//function for assigning the user a writer
function writer(state) {
    url = "../include/assign.inc.php";
    param = "user_id="+user_num+"&state="+state;
    let xttps = new XMLHttpRequest();
    xttps.open("POST", url, true);
    xttps.setRequestHeader('Content-type', 'application/x-www-form-urlencoded')
    xttps.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            //no return value of interest
        }
    }
    xttps.send(param);
}

function requestFiles(user_id) {
    if(shared != null){
        //get the values to insert into the options 
        url = "include/share.inc.php";
        param = "state=ok&user_id=" + user_id;
        let xttp = new XMLHttpRequest();
        xttp.open("POST", url, true);
        xttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                //get the Json information
                assistFiles = JSON.parse(this.responseText);
                if (assistFiles.length > 0) {
                    //call function
                    displayFiles();
                }
            }
        };
        xttp.send(param);
    }
}

function displayFiles() {
    select.innerHTML=null;
    assistFiles.forEach(element => {
        var option = document.createElement("option");
        option.value = element[1];
        option.innerText = element[0] + " " + element[1];
        select.appendChild(option);
    });
    select.addEventListener('change', () => {
        a.innerText = select[select.selectedIndex].innerText;
        a.href = select.value;
    });
}
shared.appendChild(select);
shared.appendChild(a);