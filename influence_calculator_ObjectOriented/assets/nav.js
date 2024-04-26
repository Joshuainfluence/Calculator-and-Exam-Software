const primaryNav = document.querySelector('.content1');
const navToggle = document.getElementById('mobile-toggle');
// const hamburgerMiddle = document.querySelector('span')
// const hamburgerBottom = document.querySelector('span .hamburger-bottom')
navToggle.addEventListener('click', () => {
    navToggle.classList.toggle('open')
    const visibility = primaryNav.getAttribute("data-visible");
    // const visibility2 = hamburgerMiddle.getAttribute("data-visible");
    // const visibility3 = hamburgerBottom.getAttribute("data-visible");
   
    if (visibility === "false") {
        
        primaryNav.setAttribute("data-visible", true);
        navToggle.setAttribute("aria-expanded", true);
        // hamburgerMiddle.setAttribute("aria-expanded", true);
        // hamburgerBottom.setAttribute("aria-expanded", true)
    } else if (visibility === "true") {
        primaryNav.setAttribute("data-visible", false);
        navToggle.setAttribute("aria-expanded", false);
        // hamburgerMiddle.setAttribute("aria-expanded", false);
        // hamburgerBottom.setAttribute("aria-expanded", false)
    }
})