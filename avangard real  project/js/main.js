const hamburger = document.querySelector('.navbarSection nav .hamburger');
const navlinks = document.querySelector('.mobile-ul');
const links = document.querySelector('.mobile-ul li');
const hamburgerLine = document.querySelector('.line');


hamburger.addEventListener("click", () => {
  hamburgerLine.classList.toggle("lineActive");  
  navlinks.classList.toggle("open");
});


// Service dropdown
const serviceButton = document.querySelector('.navbarSection nav .serviceTopMenu');
const serviceMenuList = document.querySelector('.serviceMenu');
const serviceArrow = document.querySelector(".serviceArrowDown");

serviceButton.addEventListener("click", function(){
    serviceMenuList.classList.toggle("openServiceMenu");
    serviceArrow.classList.toggle("serviceArrowUp");

  

});


const mobileServiceBtn = document.querySelector(".mobile-ul .serviceTopMenu");
const serviceUl = document.querySelector(".mobileServiceUl");

const serviceArrowMobile = document.querySelector(".mobile-ul .serviceTopMenu .serviceArrowDown");


mobileServiceBtn.addEventListener("click", function(){
  serviceUl.classList.toggle("mobileServiceUlActivated");
  serviceArrowMobile.classList.toggle("serviceArrowUp");
  
});



// //MODAL
// var desktopBtn = document.querySelector("#searchIcon");
// var mobileButton =  document.querySelector("#searchIconMobile");
// var modal = document.querySelector(".modal-bg");
// var closeBtn = document.querySelector(".modal-close");

// desktopBtn.addEventListener('click', function(){
//     modal.classList.add('modal-active');
//     document.body.style['overflow'] = 'hidden';
    
// });

// mobileButton.addEventListener('click', function(){
//   modal.classList.add('modal-active');
//   document.body.style['overflow'] = 'hidden';
  
// });

// closeBtn.addEventListener('click', function(){
//     modal.classList.remove('modal-active');
//     document.body.style['overflow'] = 'auto';
// });

//FIXED NAV


const nav = document.getElementsByClassName("navbarSection")[0];
const x = window.matchMedia("(max-width: 768px)")
const headerContainer = document.querySelector("#headerContainer")
const headerHeight = headerContainer.offsetHeight;
const navHeight = nav.offsetHeight;
const mobileMenu = document.querySelector(".mobile-ul")

if(x.matches){
  if(window.scrollY > 0){
    nav.classList.add('mobileHeavyBackground');
    mobileMenu.classList.add('openMobileUlWhileNavFixed')
  } else{
    nav.classList.remove('mobileHeavyBackground');
    mobileMenu.classList.remove('openMobileUlWhileNavFixed')
  }
} else{
  if (window.scrollY >= headerHeight/2) {
    nav.classList.add('heavyBackground');
    serviceMenuList.classList.add("openServiceMenuWhileNavFixed");
  } else{
    nav.classList.remove('heavyBackground');
    serviceMenuList.classList.remove("openServiceMenuWhileNavFixed");
  }
}

window.addEventListener("scroll", function(){
  if(x.matches){
    if (window.scrollY > 0) {
      // add mobile heavy background
      nav.classList.add('mobileHeavyBackground');
      mobileMenu.classList.add('openMobileUlWhileNavFixed')
    } else {
        //remove mobile background
      nav.classList.remove('mobileHeavyBackground');
      mobileMenu.classList.remove('openMobileUlWhileNavFixed')
    }
  } else {
    if (window.scrollY >= headerHeight/2) {
      // add normal background
      nav.classList.add('heavyBackground');
      serviceMenuList.classList.add("openServiceMenuWhileNavFixed");
    } else {
      // remove normal background
      nav.classList.remove('heavyBackground');
      serviceMenuList.classList.remove("openServiceMenuWhileNavFixed");
    }
  }
})



/*==================== SHOW SCROLL TOP ====================*/ 
function scrollTop(){
  const scrollTop = document.getElementsByClassName('upIcon')[0];
  // When the scroll is higher than 560 viewport height, add the show-scroll class to the a tag with the scroll-top class
  if(this.scrollY >= 1500) scrollTop.classList.add('upIcon-scroll'); else scrollTop.classList.remove('upIcon-scroll')
}
window.addEventListener('scroll', scrollTop)