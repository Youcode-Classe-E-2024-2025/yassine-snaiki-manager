
const messages = document.querySelectorAll('.message');

setTimeout(()=>{
    messages.forEach(message=>message?.classList.add('hidden'));
},4000);