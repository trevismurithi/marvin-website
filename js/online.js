//updates the user after every 5 min 
//whether the others are online or not

let setter = 0;
let first = null;
let last = null;
function test() {
    let xttp = new XMLHttpRequest();
    xttp.open("POST", "include/update.inc.php", true);
    param="current=all";
    xttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xttp.onreadystatechange = function () {
        if (this.status == 200 && this.readyState == 4) {
            if (setter==0) first = JSON.parse(this.responseText);
            else last = JSON.parse(this.responseText);
        }
    };
    xttp.send(param);
}

function setState(){
    let xttp = new XMLHttpRequest();
    var url = "include/update.inc.php";
    xttp.open("POST",url,true);
    param = "current=one";
    xttp.setRequestHeader('Content-type','application/x-www-form-urlencoded');
    xttp.onreadystatechange = function(){
        if(this.status==200 && this.readyState == 4){
            //undetermined
        }
    };
    xttp.send(param);
}

setInterval(() => {
    //function that constantly updates the users date and state
    setState();
}, 1000);

setInterval(() => {
    if (setter == 0) {
        test();
        // console.log(setter);
        // console.log(first);
        setter = 1;
    } else {
        test();
        // console.log(setter);
        // console.log(last);
        setter = 0;
        //check if the both last and first are not null to proceed
        if(last!=null && first!=null){
            //identify users who are offline
            for (let i = 0; i < first.length; i++) {
                //if the user was left online then check
                var stats = document.getElementById(first[i][0]);
                if (first[i][1] == "online"){
                    if(first[i][2] === last[i][2]){
                        //if the timer is the same the user is offline
                        //after 5 min then the user is offline
                        if(stats != null){
                            stats.classList.remove("online");
                            stats.classList.add("offline");
                        }
                    }else{
                        if (stats != null) {
                            stats.classList.remove("offline");
                            stats.classList.add("online");
                        }
                    }
                }else{
                    if (stats != null) {
                        stats.classList.remove("online");
                        stats.classList.add("offline");
                    }
                }
                
            }
        }
    }
}, 2000);//remember to ajust time here to 5 min