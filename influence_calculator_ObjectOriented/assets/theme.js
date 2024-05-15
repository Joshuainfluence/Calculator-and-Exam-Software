var font = document.getElementById('theme');
font.addEventListener('click', () =>  {
    document.body.classList.toggle('darktheme');

    if (document.body.classList.contains('darktheme')) {
        font.innerHTML = "<i class='fa fa-moon-o' id='font'></i>";
    } else {
        font.innerHTML = "<i class='fa fa-sun-o' id='font'></i>";
    }
})