//table
const table = document.querySelector("#table_main");


function loadData(user_id,state){
    document.getElementById("order-header").innerText = state+" order";
    let xttp = new XMLHttpRequest();
    url = "../include/order.inc.php";
    param ="user_id="+user_id+"&state="+state;
    xttp.open("POST", url, true);
    xttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
    xttp.onreadystatechange = function(){
        if(this.readyState == 4 && this.status ==200){
            //receive the data and add to table
            table.innerHTML = this.responseText;
        }
    };
    xttp.send(param);
}

function progressOrder(order_id, user_id,state,transfer){
    let xttp = new XMLHttpRequest();
    url = "../include/progressUpdate.inc.php";
    param = "user_id=" + user_id + "&state="+transfer+"&order_id=" + order_id;
    xttp.open("POST", url, true);
    xttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            //receive the data and add to table
            loadData(user_id,state);
        }
    };
    xttp.send(param);
}
