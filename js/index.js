// hamburger

const hamburger_btn = document.querySelector('.navbar-toggler');

const hamburgerLine1 = document.querySelector('.line1');
const hamburgerLine2 = document.querySelector('.line2');
const hamburgerLine3 = document.querySelector('.line3');

hamburger_btn.addEventListener("click", () => {
    if (hamburger_btn.classList.contains("isopened")) {
        hamburgerLine2.classList.remove("hideline2");
        hamburgerLine1.classList.remove("deg-line1");
        hamburgerLine3.classList.remove("deg-line3");
        setTimeout(() => {
            hamburger_btn.classList.remove("isopened");
         }, 300);
    } else{
        hamburgerLine2.classList.add("hideline2");
        hamburgerLine1.classList.add("deg-line1");
        hamburgerLine3.classList.add("deg-line3");
        setTimeout(() => {
           hamburger_btn.classList.add("isopened");
        }, 300);
    }
})

//about_animations

const observer = new IntersectionObserver((entries) => {
    entries.forEach((entry) => {
          if(entry.isIntersecting){
              entry.target.classList.add('about_ani_show' );
          }else{
              entry.target.classList.remove('about_ani_show');
          }
    })
})


let animations_about = document.querySelectorAll('.animations_about');
animations_about.forEach((el) => observer.observe(el));