const signupForm = document.querySelector('form');
const checked = document.querySelector('#checked');

const messages = document.querySelectorAll('.message');

setTimeout(()=>{
    messages.forEach(message=>message?.classList.add('hidden'));
},4000);



signupForm.addEventListener('submit',e=>{
    e.preventDefault();
    const data = new FormData(signupForm);
    const userName = data.get('username');
    const email = data.get('email');
    const password = data.get('password');
    const confirmPassword = data.get('confirm_password');
    if (!validateUserName(userName)) {
        showMessage("UserName must be at least 4 characters long.");
        return;
    }
    if (!validateEmail(email)) {
        showMessage("Invalid email format. Please enter a valid email.");
        return;
    }
    if (!validatePassword(password)) {
        showMessage("Password must be at least 4 characters long.");
        return;
    }
    if (password !== confirmPassword) {
        showMessage("password confirmation doesn't match password");
        return;
    }
    

    signupForm.submit();
})





function validateEmail(email) {
    const regex = /^[^\s@]+@[^\s@]+\.[a-zA-Z]{2,}$/;
    return regex.test(email);
}


function validatePassword(password) {
    return password.length > 3;
}
function validateUserName(userName) {
    return userName.length > 3;
}


function showMessage(message) {
    document.querySelector('.message')?.classList.add('hidden');
    const messageElement = document.getElementById("message");
    messageElement.classList.remove('hidden');
    if(message==='') messageElement.classList.add('hidden'); 
    messageElement.innerText = message;
}