
document.getElementById("check1").disabled = true;

   
//Cookie banner
const cookieBanner = document.querySelector(".cookie-banner-container");
const cookieButton = document.querySelector(".cookie-banner-container button");

setTimeout(() => {
    if(!localStorage.getItem("bannerDisplayed"))
    cookieBanner.classList.add("active");
}, 3000);

cookieButton.addEventListener("click", () => {
    cookieBanner.classList.remove("active");
    localStorage.setItem("bannerDisplayed", "true")
});

if (localStorage.getItem('bannerDisplayed') === null) {
  // display banner
}
  

// GET DROPDOWN MENU ELEMENT
var checkbox_2 = document.getElementById("test");

// GET THE BUTTON
var submit = document.querySelector('.submit');


//ADD EVENT TO BUTTON
submit.addEventListener('click', function(){

    //  GET THE VALUE OF THE SELECTION
    var test = checkbox_2.options[checkbox_2.selectedIndex].value;

    //SET THE COOCKIE TO THE VALUE OF THZE SELECTION
    document.cookie = 'valuePreference = ' + test;
   
    // GET THE COOCKIE TO A VARIABLE
    var temp_cookie = getCookie('valuePreference'); 

    //cookie expire
    var now = new Date();
    now.setMonth(now.getMonth() + 12);
    document.cookie = 'cookie expires = ' + now.toUTCString() + ";";

    // START RUNNING THE CODE IF (COOCKIE = TO '')
    if(temp_cookie == '°C'){
      //Change table to °C
    }else if(temp_cookie == '°F'){
      //Change table to °F
    }
   
})

if(document.cookie !=""){
  cookieBanner.style = "none";
}

  
// FUNCTION TO GET THE COOCKIE -- PARAM = TO THE COOCKIE NAME SET BY THE DEVELEPOR
function getCookie(cname) {
    var name = cname + "=";
    var decodedCookie = decodeURIComponent(document.cookie);
    var ca = decodedCookie.split(';');
    for(var i = 0; i <ca.length; i++) {
      var c = ca[i];
      while (c.charAt(0) == ' ') {
        c = c.substring(1);
      }
      if (c.indexOf(name) == 0) {
        return c.substring(name.length, c.length);
      }
    }
    return "";
  }

 
// Index homepage
$(document).ready(function(){
    $(window).scroll(function(){
        // sticky navbar on scroll script
        if(this.scrollY > 20){
            $('.navbar').addClass("sticky");
        }else{
            $('.navbar').removeClass("sticky");
        }
        
        // scroll-up button show/hide script
        if(this.scrollY > 500){
            $('.scroll-up-btn').addClass("show");
        }else{
            $('.scroll-up-btn').removeClass("show");
        }
    });

    // slide-up script
    $('.scroll-up-btn').click(function(){
        $('html').animate({scrollTop: 0});
        // removing smooth scroll on slide-up button click
        $('html').css("scrollBehavior", "auto");
    });

    $('.navbar .menu li a').click(function(){
        // applying again smooth scroll on menu items click
        $('html').css("scrollBehavior", "smooth");
    });

    // toggle menu/navbar script
    $('.menu-btn').click(function(){
        $('.navbar .menu').toggleClass("active");
        $('.menu-btn i').toggleClass("active");
    });

    // typing text animation script
    var typed = new Typed(".typing", {
        strings: ["Tibo", "Giovanni", "Mike", "Maarten", "Mathias", "Jonas", "Rick", "Zinédine", "Lucas", "Bowen", "Dylan", "Stan"],
        typeSpeed: 100,
        backSpeed: 60,
        loop: true
    });

    var typed = new Typed(".typing-2", {
        strings: ["Tibo", "Giovanni", "Mike", "Maarten", "Mathias", "Jonas", "Rick", "Zinédine", "Lucas", "Bowen", "Dylan", "Stan"],
        typeSpeed: 100,
        backSpeed: 60,
        loop: true
    });

    // owl carousel script
    $('.carousel').owlCarousel({
        margin: 20,
        loop: true,
        autoplayTimeOut: 2000,
        autoplayHoverPause: true,
        responsive: {
            0:{
                items: 1,
                nav: false
            },
            600:{
                items: 2,
                nav: false
            },
            1000:{
                items: 3,
                nav: false
            }
        }
    });
});
