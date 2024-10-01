
jQuery(document).ready(function($) {

    // gsap.registerPlugin(ScrollTrigger);
    let lastScrollY = 0;
    const header = document.querySelector('.header');
    const triggerPoint = 100;
    // const scroller1 = document.querySelector('[data-scroll-container]');
    
    function handleScroll() {
        const currentScrollY = scrollLoco.scroll.instance.scroll.y;
        // console.log('Current Scroll Y:', currentScrollY); // Debugging
        // console.log('Last Scroll Y:', lastScrollY); // Debugging
        
        if (currentScrollY > lastScrollY) {
            header.classList.add('hidden');
            header.classList.remove('scrolled-up');
        } else {
            header.classList.remove('hidden');
            if (currentScrollY > triggerPoint) {
                header.classList.add('scrolled-up');
            } else {
                header.classList.remove('scrolled-up');
            }
        }
    
        lastScrollY = currentScrollY;
    }


    // var $img = $('.img-wraper img');  
    // var $loader = $('.overlay-loader'); 
    // $loader.fadeOut(500);  
    // if ($img.length > 0 && $img[0].complete) {
    //     $img.trigger('load');
    // }
    // $img.on('load', function() {
    //     $loader.fadeOut(500);  
    // }).each(function() {
    //     if (this.complete) {
    //         $(this).trigger('load');
    //     }
    // });

    if (performance.navigation.type === performance.navigation.TYPE_RELOAD) { 
        $('.overlay-loader').addClass('show');
        setTimeout(function() {
            $('.overlay-loader').removeClass('show');
        }, 600);

    } else {
        $('.loader-next-page').addClass('show');
        $('.overlay-loader').removeClass('show'); 
        
        setTimeout(function() {
            $('.loader-next-page').removeClass('show');
        }, 600); 
    }

    
    var swiper = new Swiper(".mySwiper", {
        slidesPerView: 4,
        spaceBetween: 16,
        pagination: false,
    });

    const scroller = document.querySelector('.about-page-wrap');
    console.log('divsss', scroller);
    
    

    let scrollLoco;
    function initLocomotiveScroll() {
        scrollLoco = new LocomotiveScroll({
            el: scroller,
            smooth: true,
            getDirection: true,
            direction: 'vertical'
        });

        scrollLoco.on('scroll', function() {
            ScrollTrigger.update();
            // initShowHideHeader();
            handleScroll();
        });

        ScrollTrigger.scrollerProxy(scroller, {
            scrollTop(value) {
                return arguments.length ? scrollLoco.scrollTo(value, 0, 0) : scrollLoco.scroll.instance.scroll.y;
            },
            getBoundingClientRect() {
                return { top: 0, left: 0, width: window.innerWidth, height: window.innerHeight };
            },
            pinType: scroller.style.transform ? "transform" : "fixed"
        });

        ScrollTrigger.defaults({
            scroller: scroller
        });

        const horizontalSections = gsap.utils.toArray('.horizontal-scroll');
        horizontalSections.forEach(function (sec, i) {	
            var thisPinWrap = sec.querySelector('.pin-wrap');
            var thisAnimWrap = thisPinWrap.querySelector('.animation-wrap');
            var getToValue = () => -(thisAnimWrap.scrollWidth - window.innerWidth); 

            gsap.fromTo(thisAnimWrap, { 
                x: () => thisAnimWrap.classList.contains('to-right') ? 0 : getToValue() 
            }, { 
                x: () => thisAnimWrap.classList.contains('to-right') ? getToValue() : 0, 
                ease: "none",
                scrollTrigger: {
                    trigger: sec,		
                    scroller: scroller,
                    start: "top top",
                    end: () => "+=" + (thisAnimWrap.scrollWidth - window.innerWidth),
                    pin: thisPinWrap,
                    invalidateOnRefresh: true,
                    anticipatePin: 1,
                    scrub: true,
                }
            });
        });

        ScrollTrigger.addEventListener("refresh", () => scrollLoco.update());
        ScrollTrigger.refresh();
    }

    window.scrollTo(0, 0);
    window.addEventListener('load', function() {
        setTimeout(() => {
            if (scrollLoco) {
                scrollLoco.scrollTo(0, { duration: 0, disableLerp: true }); 
                scrollLoco.update(); 
                ScrollTrigger.refresh(); 
            } else {
                initLocomotiveScroll();
            }
        }, 10);  
    });


    $('.go-top').on('click', function(e) {
        e.preventDefault(); 
        scrollLoco.scrollTo(0, { duration: 1000, easing: [0.25, 0.00, 0.35, 1.00] });
    });

    $('#menu-main-menu a:contains("Contacts")').on('click', function(e) {
        e.preventDefault();
        scrollLoco.scrollTo('.footer', {
            duration: 1000,
            easing: [0.25, 0.00, 0.35, 1.00]
        });
    });


    var $customCursor = $('.custom-cursor');
    $(document).on('mousemove', function(e) {
      
        if ($('.copy-text:hover').length > 0) {
            $customCursor.show();
            $customCursor.css({
                top: e.pageY - 35 + 'px', 
                left: e.pageX - 75 + 'px'
            });
        } else {
            $customCursor.hide();
        }
    });

    
    $('.copy-text').on('click', function(e) {
        e.preventDefault();

        var textToCopy = $(this).text();

        var tempElement = $('<textarea>');
        $('body').append(tempElement);
        tempElement.val(textToCopy).select();
        document.execCommand('copy');
        tempElement.remove();

        $customCursor.text('Copied').addClass('copied');
        setTimeout(function() {
            $customCursor.text('Copy to clipboard').removeClass('copied');
        }, 1500);
    });

 
// hover video
// gsap.set(".artists .hover-iframe", { xPercent: -50, yPercent: -50 }); // Center the image by default

// let targets = gsap.utils.toArray(".artists .socials-wraper .hover-iframe");  // Select all the images

// window.addEventListener("mousemove", (e) => {
//   targets.forEach((image) => {
//     const el = image.closest(".socials-wraper");
//     const top = el.getBoundingClientRect().top - 40;
//     const left = el.getBoundingClientRect().left + 180;
    
//     gsap.to(image, {
//       x: e.clientX - left,
//       y: e.clientY - top,
//       duration: 1,
//       ease: "power3.out",
//       overwrite: "auto",
//       stagger: 0.02
//     });
//   });
// });

// // Handle mouseenter/mouseleave for fade animation on the entire array of images
// gsap.utils.toArray(".artists .socials-wraper").forEach((el) => {
//   const image = el.querySelector(".hover-iframe");

//   const fadeIn = gsap.to(image, {
//     autoAlpha: 1,
//     scale: 1,
//     duration: 1,
//     ease: "power3.out",
//     overwrite: "auto",
//     paused: true,
//   });

//   el.addEventListener("mouseenter", (e) => {
//     fadeIn.play();  // Play fade-in on hover
//   });

//   el.addEventListener("mouseleave", () => {
//     fadeIn.reverse();  // Reverse fade on mouse leave
//   });
// });

gsap.set(".artists .hover-iframe", { xPercent: -50, yPercent: -50 });

let targets = gsap.utils.toArray(".artists .socials-wraper .hover-iframe"); 

function postMessageToVimeo(player, command) {
  player.contentWindow.postMessage(JSON.stringify({ method: command }), '*');
}

window.addEventListener("mousemove", (e) => {
  targets.forEach((iframe) => {
    const el = iframe.closest(".socials-wraper");
    const top = el.getBoundingClientRect().top - 40;
    const left = el.getBoundingClientRect().left + 180;
    
    gsap.to(iframe, {
      x: e.clientX - left,
      y: e.clientY - top,
      duration: 1,
      ease: "power3.out",
      overwrite: "auto",
      stagger: 0.02
    });
  });
});

gsap.utils.toArray(".artists .socials-wraper").forEach((el) => {
  const iframe = el.querySelector(".hover-iframe");

  const fadeIn = gsap.to(iframe, {
    autoAlpha: 1,
    scale: 1,
    duration: 1,
    ease: "power3.out",
    overwrite: "auto",
    paused: true,
  });

  el.addEventListener("mouseenter", () => {
    fadeIn.play();  
    postMessageToVimeo(iframe, 'play'); 
  });

  el.addEventListener("mouseleave", () => {
    fadeIn.reverse();  
    postMessageToVimeo(iframe, 'pause'); 
    postMessageToVimeo(iframe, 'setCurrentTime', 0); 
  });
});

});
