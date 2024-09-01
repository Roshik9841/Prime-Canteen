let search = document.querySelector('.js-search');
let inputBox = document.querySelector('.js-input');
inputBox.style.display = 'none';
search.addEventListener('click', function () {
    if(inputBox.style.display==='none'|| inputBox.style.display===''){
        inputBox.style.display = 'flex';
    }else{
        inputBox.style.display='none';
    }
  

});
