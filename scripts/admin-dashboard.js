const usersCnt = document.querySelector('.users-cnt');
const formMessage = document.querySelector('.form-message');
const cancelMessage = document.querySelector('.cancel-message');

usersCnt.addEventListener('click',e=>{
    e.preventDefault();
    if(!e.target.matches('.btn-message')) return;
    const id = e.target.dataset.id;
    const name = e.target.dataset.name;
    formMessage.classList.remove('hidden');
    formMessage.querySelector('.message-label').textContent = `Message ${name}`;
    formMessage.querySelector('#id').value = id;
})
cancelMessage.addEventListener('click',e=>{
    e.preventDefault();
    formMessage.classList.add('hidden');
})
