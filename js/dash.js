function validatePassword(password){
    var pass = password.value;
    let length = pass.length;
    if(length >= 6){
        alert("Your new password has been updated.");
        return true;
    }else if(length == 0){
        
        return true;
    }
    else{
        alert("Password must be at least 6 characters.");
        return false;
    }
}

function changeColor(){
    let p = document.getElementById("picture").value;
    
    if(p != "" || p != NULL){
        document.getElementById("custom-file-upload").style.color = "white";
        document.getElementById("selected").innerHTML = "Selected";
        document.getElementById("custom-file-upload").style.backgroundColor = "#002447";
    }
}