import './bootstrap';
const boxFilter = document.getElementById('searchFilter')
const btnHideFilter = document.getElementById('btnHideFilter')

btnHideFilter.addEventListener('click',function handleClick()
{
    if(boxFilter.style.display == 'none')
    {
        boxFilter.style.display ='block'
       
    } else {
        boxFilter.style.display = 'none';
        btnHideFilter.textContent = 'Mostrar Filtros';
    }

     
});