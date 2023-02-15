function getRoom(){
    let b = document.getElementById("selectblock").value;
    let p = document.getElementById("page").value;
    
    const xhttp = new XMLHttpRequest();
    xhttp.onload = function() {
        if (this.readyState == 4 && this.status == 200){
            document.getElementById("fetchroom").innerHTML = this.responseText;
        }
        
    }
    xhttp.open("GET", "get_room.php?block="+b+"&page="+p, false);
    xhttp.send();
}

