const openCloseDiv = document.querySelectorAll('.changeLabel');
const openedDiv = document.querySelectorAll('.changeDiv');

for(let i=0; i<openCloseDiv.length; i++){
    openCloseDiv[i].onclick = function(){
        if(openedDiv[i].classList.contains('visible'))
            openedDiv[i].classList.remove('visible');
        else
            openedDiv[i].classList.add('visible');

    }
}