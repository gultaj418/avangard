// FAQ SECTION ACCORDION
var acc = document.getElementsByClassName("questions");
var i;

for (i = 0; i < acc.length; i++) {
  acc[i].addEventListener("click", function() {
    this.classList.toggle("activeQuestions");
  });
}




TweenMax.from("#mainContentPart", 2, {
  delay: 0.1,
  y: 20,
  opacity: 0,
  ease: Expo.easeInOut
})

TweenMax.from(".btn", 2, {
  delay: 0.2,
  x: -200,
  opacity: 0,
  ease: Expo.easeInOut
})



