
<div>
    <p id="messo">Check box</p>
<script>
        xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("messo").innerHTML = this.responseText;
        }
        };
    let timer = setInterval(() => {
        xhttp.open("GET", "include/update.inc.php", true);
        xhttp.send();
        console.log(1);
    }, 1000);
</script>
</div>