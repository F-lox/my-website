// window.alert(hi);

let hamburgerContainer = document.querySelector('#hamburger');
let dropdownBox = document.querySelector('#dropdownBox');
let exitIcon = document.querySelector('#exiticon');
let allAnchorTags = document.querySelectorAll('#navcon-mobile li a')

if(hamburger){
    hamburger.addEventListener('click', function(){
        // alert('hi');
        dropdownBox.style.display = 'flex';
    })
}


if(exitIcon){
    exitIcon.addEventListener('click', function(){
        dropdownBox.style.display = 'none'
    })
}

if(allAnchorTags){
    allAnchorTags.forEach(allAnchorTag => {
        allAnchorTag.addEventListener('click', function(){
            dropdownBox.style.display = 'none'
        })
    });
}

let switchBtnCon = document.querySelector('#switchBtnCon');
let switchBtn = document.querySelector('.switchBtn');
let header = document.querySelector('header')
let sec1 = document.querySelector('#sec1');
let sec2 = document.querySelector('#sec2');
let sec3 = document.querySelector('#sec3');
let sec4 = document.querySelector('#sec4');
let horizontal_scroll = document.querySelector('#horizontal_scroll');
let sec5 = document.querySelector('#sec5');

if(switchBtn){
    switchBtn.addEventListener('click', function(){
        switchBtnCon.classList.toggle('moveBtn');
        sec1.classList.toggle('lightDarkBg');
        sec2.classList.toggle('DarkerBg');
        sec3.classList.toggle('lightDarkBg');
        sec4.classList.toggle('DarkerBg');
        sec4.classList.toggle('lightDarkBg');
        horizontal_scroll.classList.toggle('DarkerBg');
        sec5.classList.toggle('lightDarkerBg');
    })
}


