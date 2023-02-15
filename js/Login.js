var pass = document.getElementById("pwd");
var text = document.getElementById("alert");
var username = document.getElementById("user");
var check = true;

pass.addEventListener("keyup", function(event) {
document.getElementById("alert-text").innerHTML = "CAPS LOCK IS ON";
if (event.getModifierState("CapsLock")) {
    text.style.display = "block";
    } else {
    text.style.display = "none"
    }
});


function loginTest(){
    let p = document.getElementById("pwd").value;
    let u = document.getElementById("user").value;
    const xhttp = new XMLHttpRequest();
    xhttp.onload = function() {
        if (this.readyState == 4 && this.status == 200){
            if(this.responseText == 0){
                check = false;
                document.getElementById("alert-text").innerHTML = "Incorrect Username/Password";
                text.style.display = "block";
            }
            else
                check = true;
        }
        
    }
    xhttp.open("GET", "check_user.php?username="+u+"&password="+p, false);
    xhttp.send();
    
    return check;
}