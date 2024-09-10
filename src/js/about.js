
jQuery(document).ready(function($) {
    console.log("n about");
    

gsap.registerPlugin(ScrollTrigger);

const scroller = document.querySelector('.about-page-wrap');
let scrollLoco = new LocomotiveScroll({
    el: scroller,
    smooth: true,
    getDirection:true,
    direction: 'vertical'
});


//    

// scrollLoco.on('scroll', ScrollTrigger.update);

// ScrollTrigger.scrollerProxy(scroller, {
//   scrollTop(value) {
//     return arguments.length ? scrollLoco.scrollTo(value, 0, 0) : scrollLoco.scroll.instance.scroll.y;
//   },
//   getBoundingClientRect() {
//     return { top: 0, left: 0, width: window.innerWidth, height: window.innerHeight };
//   },
//   pinType: scroller.style.transform ? "transform" : "fixed"
// });
// ScrollTrigger.defaults({
//     scroller: scroller
//   })

//   const horizontalSections = gsap.utils.toArray('.horizontal-scroll')
//   console.log("test12" , horizontalSections);

//   horizontalSections.forEach(function (sec, i) {	

//     var thisPinWrap = sec.querySelector('.pin-wrap');
//     var thisAnimWrap = thisPinWrap.querySelector('.animation-wrap');
    
//     var getToValue = () => -(thisAnimWrap.scrollWidth - window.innerWidth); 
  
//     gsap.fromTo(thisAnimWrap, { 
//       x: () => thisAnimWrap.classList.contains('to-right') ? 0 : getToValue() 
//     }, { 
//       x: () => thisAnimWrap.classList.contains('to-right') ? getToValue() : 0, 
//       ease: "none",
//       scrollTrigger: {
//         trigger: sec,		
//         scroller: scroller,
//         start: "top top",
//         end: () => "+=" + (thisAnimWrap.scrollWidth - window.innerWidth),
//         pin: thisPinWrap,
//         invalidateOnRefresh: true,
//         anticipatePin: 1,
//         scrub: true,
//         //markers: true
//       }
//     });
  
//   });	

// ScrollTrigger.addEventListener("refresh", () => scroll.update());
// ScrollTrigger.refresh();

// 

});
