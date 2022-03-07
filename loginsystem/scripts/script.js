const openPassword = document.getElementById('openPasswordReq');
const passwordReq = document.getElementById('passwordReq');

openPassword.onmouseover = () =>{
    passwordReq.classList.add("visible");
}

openPassword.onmouseout = () =>{
    passwordReq.classList.remove("visible");
}