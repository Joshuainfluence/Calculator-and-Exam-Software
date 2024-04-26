// const primaryNav = document.querySelector('.primary-navigation');
// const navToggle = document.querySelector('.mobile-nav-toggle');

// navToggle.addEventListener('click', () => {
//     const visibility = primaryNav.getAttribute("data-visible");

//     // console.log(visibility);
//     if (visibility === "false") {
//         primaryNav.setAttribute("data-visible", true);
//         navToggle.setAttribute("aria-expanded", true);
//     }else if(visibility === "true") {
//         primaryNav.setAttribute("data-visible", false)
//         navToggle.setAttribute("aria-expanded", false);
//     }
    
// })


const primaryNav = document.querySelector('.content1');
const navToggle = document.querySelector('.mobile-nav-toggle');
const hamburgerMiddle = document.getElementById('middle')
const hamburgerBottom = document.getElementById('bottom')
navToggle.addEventListener('click', () =>{
    const visibility = primaryNav.getAttribute("data-visible");
    // const visibility2 = hamburgerMiddle.getAttribute("data-visible");
    // const visibility3 = hamburgerBottom.getAttribute("data-visible");

    if (visibility === "false") {
        primaryNav.setAttribute("data-visible", true);
        navToggle.setAttribute("aria-expanded", true);
        hamburgerMiddle.setAttribute("aria-expanded", true);
        hamburgerBottom.setAttribute("aria-expanded", true)
    } else if (visibility === "true"){
        primaryNav.setAttribute("data-visible", false);
        navToggle.setAttribute("aria-expanded", false);
        hamburgerMiddle.setAttribute("aria-expanded", false);
        hamburgerBottom.setAttribute("aria-expanded", false)
    }
})