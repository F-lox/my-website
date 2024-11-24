// window.alert('hi');


let successBox = document.querySelector('#success_box');
let errorBox = document.querySelector('#error_box');

setTimeout(() => {
    successBox.style.display = 'none';
}, 8000);


setTimeout(() => {
    errorBox.style.display = 'none';
}, 8000);



let deletebox = document.querySelector('#deletebox');

if(deletebox){
    setTimeout(() => {
        deletebox.style.display = 'none';
    }, 3000);
}