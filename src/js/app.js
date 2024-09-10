jQuery(document).ready(function($) {

    // gsap.registerPlugin(ScrollTrigger);

    let lastScrollY = 0;
    const header = document.querySelector('.header');
    const triggerPoint = 100; 

    const scroller = document.querySelector('[data-scroll-container]');
    var scroll = new LocomotiveScroll({
        el: scroller,
        smooth: true,
        getDirection:true,
        direction: 'vertical'
    });


    // //    

    // scroll.on('scroll', ScrollTrigger.update);

    // ScrollTrigger.scrollerProxy(scroller, {
    //   scrollTop(value) {
    //     return arguments.length ? scroll.scrollTo(value, 0, 0) : scroll.scroll.instance.scroll.y;
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
    


    scroll.on('scroll', function (event) {
        document.querySelectorAll('.fade-in-img').forEach(function (element, index) {
            if (element.classList.contains('is-inview')) return;
    
            if (element.getBoundingClientRect().top < window.innerHeight && element.getBoundingClientRect().bottom > 0) {
                setTimeout(function () {
                    element.classList.add('is-inview');
                }, index * 200); 
            }
        });
    });


    scroll.on('call', function(args) {
        const sectionId = parseInt(args[1].dataset.sectionId);
        changeScrollDirection(sectionId);
    });
    

    scroll.on('scroll', (obj) => {
        const currentScrollY = obj.scroll.y;

        if (currentScrollY > lastScrollY) {
            // Scrolling down
            header.classList.add('hidden');
            header.classList.remove('scrolled-up');
        } else {
            // Scrolling up
            header.classList.remove('hidden');
            if (currentScrollY > triggerPoint) {
                header.classList.add('scrolled-up');
            } else {
                header.classList.remove('scrolled-up');
            }
        }

        lastScrollY = currentScrollY;
    });

    var swiper = new Swiper(".mySwiper", {
        slidesPerView: 4,
        spaceBetween: 16,
        pagination: false,

      });


      var $img = $('.img-1-home');
      var $loader = $('.overlay-loader');
      $loader.fadeOut(500);
      
      if ($img.length > 0 && $img[0].complete) {
          $img.trigger('load');
      }
      
      $img.on('load', function() {
          $loader.fadeOut(500);
      }).each(function() {
          if (this.complete) $(this).trigger('load');
      });


    const players = new Plyr('#player', {
        controls: ['play', 'progress', 'current-time', 'mute', 'volume', 'fullscreen'],

    });

    $('.plyr__video-embed').each(function() {
        const player = new Plyr($(this)[0], {
            controls: ['play', 'progress', 'current-time', 'mute', 'volume', 'fullscreen'],
        });
    });


// Define the class patterns
    const classesGrid1 = ['img-M right', 'img-S left', 'img-L middle'];
    const classesGrid2 = ['img-M left2', 'img-S right2', 'img-L middle2', 'img-S left3'];

    const initialHTML = $('.inside-cases').html();
    const allProjects = [];

    $('.project').each(function() {
        const projectData = {
            html: $(this).prop('outerHTML'),
            category: $(this).data('category')
        };
        allProjects.push(projectData);
    });

    $('.filter-button').click(function() {
        const category = $(this).data('category');

        if (category === 'all') {
            $('.inside-cases').html(initialHTML);
        } else {
            const filteredProjects = allProjects.filter(project => project.category === category);
            $('.inside-cases').empty();

            let currentWrapper = 1;
            let projectsInWrapper = 0;
            const wrapperClasses = [classesGrid1, classesGrid2];

            filteredProjects.forEach((projectData) => {
                const currentClasses = wrapperClasses[currentWrapper - 1];
                const classesCount = currentClasses.length;

                if (projectsInWrapper % classesCount === 0) {
                    if (projectsInWrapper !== 0) {
                        $('.inside-cases').append('</div>');
                    }
                    $('.inside-cases').append('<div class="wraper-grid-' + currentWrapper + '"></div>');
                }

                const newClass = currentClasses[projectsInWrapper % classesCount] + ' project';
              
                const projectHtml = $(projectData.html);
                projectHtml.removeClass().addClass(newClass);
                setTimeout(() => {
                    projectHtml.addClass('is-inview');
                }, 100);
                projectHtml.find('div').first().removeClass().addClass('img');

                const wrapperSelector = '.wraper-grid-' + currentWrapper;
                $(wrapperSelector).last().append(projectHtml);

                projectsInWrapper++;

                if (projectsInWrapper % classesCount === 0) {
                    currentWrapper = (currentWrapper === 1) ? 2 : 1;
                    projectsInWrapper = 0;
                }
            });

            if (projectsInWrapper !== 0) {
                $('.inside-cases').append('</div>');
            }
        }

        $('.filter-button').removeClass('active');
        $(this).addClass('active');

        setTimeout(() => {
            scroll.update();
        }, 100);
    });


});



