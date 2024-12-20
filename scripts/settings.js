const btnChangePassword = document.querySelector('.btn-changepassword');
const btnCloseAccount = document.querySelector('.btn-closeaccount');
const btnsCancel = document.querySelectorAll('.btn-cancel');
const formChangePassword = document.querySelector('.form-changepassword');
const formCloseAccount = document.querySelector('.form-closeaccount');

const messages = document.querySelectorAll('.message');

setTimeout(()=>{
    messages.forEach(message=>message?.classList.add('hidden'));
},4000);



btnChangePassword.addEventListener('click',e=>{
    hideAll();
    formChangePassword.classList.remove('hidden');
})
btnCloseAccount.addEventListener('click',e=>{
    hideAll();
    formCloseAccount.classList.remove('hidden');
})
btnsCancel.forEach(btn=>btn.addEventListener('click',(e)=>{
    e.preventDefault();
    hideAll();
}))








function hideAll(){
    formChangePassword.classList.add('hidden');
    formCloseAccount.classList.add('hidden');
}