
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
        breakpoints: {
            // when window width is >= 320px (mobile)
            320: {
                slidesPerView: 1,
                spaceBetween: 10,
            },
            // when window width is >= 480px (small tablets)
            480: {
                slidesPerView: 2,
                spaceBetween: 12,
            },
            // when window width is >= 768px (tablets)
            992: {
                slidesPerView: 3,
                spaceBetween: 14,
            },
            1800: {
                slidesPerView: 4,
                spaceBetween: 14,
            }
        }
    });

    const scroller = document.querySelector('.about-page-wrap');
    console.log('divsss', scroller);
    
    

    // let scrollLoco;
    // function initLocomotiveScroll() {
    //     scrollLoco = new LocomotiveScroll({
    //         el: scroller,
    //         smooth: true,
    //         smoothMobile: true,
    //         getDirection: true,
    //         multiplier: 1,
    //         direction: 'vertical',
    //         mobile: {
    //             breakpoint: 0,
    //             smooth: true,
    //             getDirection: true,
    //         },
    //         tablet: {
    //             breakpoint: 0,
    //             smooth: true,
    //             getDirection: true,
    //         }
    //     });

    //     scrollLoco.on('scroll', function() {
    //         ScrollTrigger.update();
    //         // initShowHideHeader();
    //         handleScroll();
    //     });

    //     ScrollTrigger.scrollerProxy(scroller, {
    //         scrollTop(value) {
    //             return arguments.length ? scrollLoco.scrollTo(value, 0, 0) : scrollLoco.scroll.instance.scroll.y;
    //         },
    //         getBoundingClientRect() {
    //             return { top: 0, left: 0, width: window.innerWidth, height: window.innerHeight };
    //         },
    //         pinType: scroller.style.transform ? "transform" : "fixed"
    //     });

    //     ScrollTrigger.defaults({
    //         scroller: scroller
    //     });

    //     const horizontalSections = gsap.utils.toArray('.horizontal-scroll');
    //     horizontalSections.forEach(function (sec, i) {	
    //         var thisPinWrap = sec.querySelector('.pin-wrap');
    //         var thisAnimWrap = thisPinWrap.querySelector('.animation-wrap');
    //         var getToValue = () => -(thisAnimWrap.scrollWidth - window.innerWidth); 

    //         gsap.fromTo(thisAnimWrap, { 
    //             x: () => thisAnimWrap.classList.contains('to-right') ? 0 : getToValue() 
    //         }, { 
    //             x: () => thisAnimWrap.classList.contains('to-right') ? getToValue() : 0, 
    //             ease: "none",
    //             scrollTrigger: {
    //                 trigger: sec,		
    //                 scroller: scroller,
    //                 start: "top top",
    //                 end: () => "+=" + (thisAnimWrap.scrollWidth - window.innerWidth),
    //                 pin: thisPinWrap,
    //                 invalidateOnRefresh: true,
    //                 anticipatePin: 1,
    //                 scrub: true,
    //             }
    //         });
    //     });

    //     ScrollTrigger.addEventListener("refresh", () => scrollLoco.update());
    //     ScrollTrigger.refresh();
    // }

    let scrollLoco;
let isMobileView = window.innerWidth < 769; // Initial check for screen size

function initLocomotiveScroll() {
    scrollLoco = new LocomotiveScroll({
        el: scroller,
        smooth: true,
        smoothMobile: true,
        getDirection: true,
        multiplier: 1,
        direction: 'vertical', // Set default scroll direction to vertical
        mobile: {
            breakpoint: 0,
            smooth: true,
            getDirection: true,
        },
        tablet: {
            breakpoint: 0,
            smooth: true,
            getDirection: true,
        }
    });

    scrollLoco.on('scroll', function() {
        ScrollTrigger.update();
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

    setupHorizontalSections(); // Function to set up scroll direction for sections

    ScrollTrigger.addEventListener("refresh", () => scrollLoco.update());
    ScrollTrigger.refresh();
}

// Function to apply scroll direction based on screen size
function setupHorizontalSections() {
    const horizontalSections = gsap.utils.toArray('.horizontal-scroll');
    const isMobileView = window.innerWidth < 769; // Check if screen width is less than 769px

    horizontalSections.forEach(function (sec, i) {	
        const thisPinWrap = sec.querySelector('.pin-wrap');
        const thisAnimWrap = thisPinWrap.querySelector('.animation-wrap');

        // Remove any existing ScrollTriggers to avoid conflicts
        ScrollTrigger.getById(`scrollTrigger-${sec.id}`)?.kill();

        if (isMobileView) {
            // For screens below 769px, change to vertical scroll
            const getToValue = () => -(thisAnimWrap.scrollHeight - window.innerHeight); // Change to scrollHeight for vertical scroll

            gsap.fromTo(thisAnimWrap, { 
                y: 0 // Starting vertical position
            }, { 
                y: getToValue(), // Vertical scrolling
                ease: "none",
                scrollTrigger: {
                    id: `scrollTrigger-${sec.id}`,
                    trigger: sec,		
                    scroller: scroller,
                    start: "top top",
                    end: () => "+=" + (thisAnimWrap.scrollHeight - window.innerHeight),
                    pin: thisPinWrap,
                    invalidateOnRefresh: true,
                    anticipatePin: 1,
                    scrub: true,
                }
            });

        } else {
            // For screens larger than 769px, keep horizontal scroll
            const getToValue = () => -(thisAnimWrap.scrollWidth - window.innerWidth); // Horizontal scroll

            gsap.fromTo(thisAnimWrap, { 
                x: 0 // Starting horizontal position
            }, { 
                x: getToValue(), // Horizontal scrolling
                ease: "none",
                scrollTrigger: {
                    id: `scrollTrigger-${sec.id}`,
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
        }
    });
}

// Function to handle window resize
function handleResize() {
    ScrollTrigger.getAll().forEach(trigger => trigger.kill()); // Kill all existing ScrollTriggers
    setupHorizontalSections(); // Reapply the scroll direction
    scrollLoco.update(); // Update LocomotiveScroll
}

// Attach resize listener
window.addEventListener('resize', handleResize);

window.addEventListener('DOMContentLoaded', function() {
    initLocomotiveScroll(); // Initialize on page load
});







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



gsap.set(".artists .hover-iframe", { xPercent: -50, yPercent: -50 });

let targets = gsap.utils.toArray(".artists .socials-wraper .hover-iframe"); 

function postMessageToVimeo(iframe, command, value) {
    let message = { method: command };
    if (value !== undefined) {
      message.value = value;
    }
    iframe.contentWindow.postMessage(JSON.stringify(message), '*');
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
    postMessageToVimeo(iframe, 'seekTo', 0); 
    // postMessageToVimeo(iframe, 'setCurrentTime', 0); 
  });
});

$('.mob-menu button').click(function() {
    $('.header-mobile').addClass('active');
    $('body').addClass('menu-active'); 
});
$('.close-btn').click(function() {
    $('.header-mobile').removeClass('active');
    $('body').removeClass('menu-active');
});

});





// jQuery(document).ready(function($) {
//     let lastScrollY = 0;
//     const header = document.querySelector('.header');
//     const triggerPoint = 100;
//     const scroller = document.querySelector('.about-page-wrap');
//     let scrollLoco;
//     let isMobileView = window.innerWidth < 768; // Detect mobile view

//     function handleScroll() {
//         const currentScrollY = scrollLoco.scroll.instance.scroll.y;

//         if (currentScrollY > lastScrollY) {
//             header.classList.add('hidden');
//             header.classList.remove('scrolled-up');
//         } else {
//             header.classList.remove('hidden');
//             if (currentScrollY > triggerPoint) {
//                 header.classList.add('scrolled-up');
//             } else {
//                 header.classList.remove('scrolled-up');
//             }
//         }
//         lastScrollY = currentScrollY;
//     }

//     function initLocomotiveScroll() {
//         scrollLoco = new LocomotiveScroll({
//             el: scroller,
//             smooth: true,
//             smoothMobile: true,
//             getDirection: true,
//             multiplier: 1,
//             direction: isMobileView ? 'vertical' : 'horizontal',
//             mobile: {
//                 breakpoint: 0,
//                 smooth: true,
//                 getDirection: true,
//             },
//             tablet: {
//                 breakpoint: 0,
//                 smooth: true,
//                 getDirection: true,
//             }
//         });

//         scrollLoco.on('scroll', function() {
//             ScrollTrigger.update();
//             handleScroll();
//         });

//         ScrollTrigger.scrollerProxy(scroller, {
//             scrollTop(value) {
//                 return arguments.length ? scrollLoco.scrollTo(value, 0, 0) : scrollLoco.scroll.instance.scroll.y;
//             },
//             getBoundingClientRect() {
//                 return { top: 0, left: 0, width: window.innerWidth, height: window.innerHeight };
//             },
//             pinType: scroller.style.transform ? "transform" : "fixed"
//         });

//         ScrollTrigger.defaults({ scroller: scroller });
//         setupHorizontalSections();
//         ScrollTrigger.addEventListener("refresh", () => scrollLoco.update());
//         ScrollTrigger.refresh();
//     }

//     function setupHorizontalSections() {
//         const horizontalSections = gsap.utils.toArray('.horizontal-scroll');
//         horizontalSections.forEach(function(sec, i) {
//             const thisPinWrap = sec.querySelector('.pin-wrap');
//             const thisAnimWrap = thisPinWrap.querySelector('.animation-wrap');
//             const getToValue = () => -(thisAnimWrap.scrollWidth - window.innerWidth);

//             if (!isMobileView) {
//                 gsap.fromTo(thisAnimWrap, {
//                     x: () => thisAnimWrap.classList.contains('to-right') ? 0 : getToValue()
//                 }, {
//                     x: () => thisAnimWrap.classList.contains('to-right') ? getToValue() : 0,
//                     ease: "none",
//                     scrollTrigger: {
//                         trigger: sec,
//                         scroller: scroller,
//                         start: "top top",
//                         end: () => "+=" + (thisAnimWrap.scrollWidth - window.innerWidth),
//                         pin: thisPinWrap,
//                         invalidateOnRefresh: true,
//                         anticipatePin: 1,
//                         scrub: true,
//                     }
//                 });
//             }
//         });
//     }

//     function handleResize() {
//         const newIsMobileView = window.innerWidth < 768;
//         if (newIsMobileView !== isMobileView) {
//             isMobileView = newIsMobileView;
//             scrollLoco.destroy();
//             ScrollTrigger.getAll().forEach(t => t.kill());
//             initLocomotiveScroll();
//         }
//     }

//     // Swiper initialization
//     var swiper = new Swiper(".mySwiper", {
//         slidesPerView: 4,
//         spaceBetween: 16,
//         pagination: false,
//         breakpoints: {
//             320: { slidesPerView: 1, spaceBetween: 10 },
//             480: { slidesPerView: 2, spaceBetween: 12 },
//             992: { slidesPerView: 3, spaceBetween: 14 },
//             1800: { slidesPerView: 4, spaceBetween: 14 }
//         }
//     });

//     // Event listeners
//     window.addEventListener('resize', handleResize);
//     window.addEventListener('load', function() {
//         setTimeout(() => {
//             if (scrollLoco) {
//                 scrollLoco.scrollTo(0, { duration: 0, disableLerp: true });
//                 scrollLoco.update();
//                 ScrollTrigger.refresh();
//             } else {
//                 initLocomotiveScroll();
//             }
//         }, 10);
//     });

//     $('.go-top').on('click', function(e) {
//         e.preventDefault();
//         scrollLoco.scrollTo(0, { duration: 1000, easing: [0.25, 0.00, 0.35, 1.00] });
//     });

//     $('#menu-main-menu a:contains("Contacts")').on('click', function(e) {
//         e.preventDefault();
//         scrollLoco.scrollTo('.footer', {
//             duration: 1000,
//             easing: [0.25, 0.00, 0.35, 1.00]
//         });
//     });

//     // Custom cursor code remains unchanged
//     $(document).on('mousemove', function(e) {
//         const $customCursor = $('.custom-cursor');
//         if ($('.copy-text:hover').length > 0) {
//             $customCursor.show().css({ top: e.pageY - 35 + 'px', left: e.pageX - 75 + 'px' });
//         } else {
//             $customCursor.hide();
//         }
//     });

//     $('.copy-text').on('click', function(e) {
//         e.preventDefault();
//         const textToCopy = $(this).text();
//         const tempElement = $('<textarea>');
//         $('body').append(tempElement);
//         tempElement.val(textToCopy).select();
//         document.execCommand('copy');
//         tempElement.remove();

//         const $customCursor = $('.custom-cursor');
//         $customCursor.text('Copied').addClass('copied');
//         setTimeout(function() {
//             $customCursor.text('Copy to clipboard').removeClass('copied');
//         }, 1500);
//     });
// });
