const loginForm = document.querySelector('form');
const checked = document.querySelector('#checked');

loginForm.addEventListener('submit', async function (e) {
    e.preventDefault();
    showMessage('');
    const data = new FormData(e.target);
    const email = data.get('email').trim();
    const password = data.get('password').trim();

    if (!validateEmail(email)) {
        showMessage("Invalid email format. Please enter a valid email.");
        return;
    }
    if (!validatePassword(password)) {
        showMessage("Password must be at least 4 characters long.");
        return;
    }
    loginForm.classList.add('hidden');
    checked.classList.remove('hidden')
    loginForm.submit();
});


function validateEmail(email) {
    const regex = /^[^\s@]+@[^\s@]+\.[a-zA-Z]{2,}$/;
    return regex.test(email);
}


function validatePassword(password) {
    return password.length > 3;
}


function showMessage(message) {
    document.querySelector('.message')?.classList.add('hidden');
    const messageElement = document.getElementById("message");
    messageElement.classList.remove('hidden');
    if(message==='') messageElement.classList.add('hidden'); 
    messageElement.innerText = message;
}

