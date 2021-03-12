function Messages(receiver,user_id){
    //we use an AJAX to fetch messages
    let xttps = new XMLHttpRequest();
    xttps.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            var content = document.getElementById("chat-content");
            content.innerHTML = this.responseText;
            //scroll to the latest text
            content.scrollTop = content.scrollHeight; 
        }
    };
    xttps.open("GET", "../include/message.inc.php?receiver=" + receiver + "&user_id=" + user_id, true);
    xttps.send();
}