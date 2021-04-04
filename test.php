<?php
    echo '<p id="value" value="3">1</p>';
?>

<script>
    var num = document.getElementById("value");
    console.log(num.value);
    console.log(parseInt(num.innerText));
    console.log(isNaN(parseInt(num.innerText)));
</script>