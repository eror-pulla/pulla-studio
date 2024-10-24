
// jQuery(document).ready(function($) {

//     console.log("gjithkah tjeter");
    
//     if ($('section').hasClass('about-page-wrap')) {
//         console.log('jena n about');
//         return; 
//     }

   
//     window.scrollTo(0, 0);

//     let lastScrollY = 0;
//     const header = document.querySelector('.header');
//     const triggerPoint = 100;

//     let scroll = null;  

//     function initLocomotiveScroll() {
//         const scroller = document.querySelector('[data-scroll-container]');
//         scroll = new initLocomotiveScroll({
//             el: scroller,
//             smooth: true,
//             smoothMobile: true,
//             getDirection: true,
//             multiplier: 1,
//             direction: 'vertical',
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

//         scroll.on('scroll', function (event) {
//             document.querySelectorAll('.fade-in-img').forEach(function (element, index) {
//                 if (element.classList.contains('is-inview')) return;

//                 if (element.getBoundingClientRect().top < window.innerHeight && element.getBoundingClientRect().bottom > 0) {
//                     setTimeout(function () {
//                         element.classList.add('is-inview');
//                     }, index * 200);
//                 }
//             });
//         });

//         scroll.on('call', function(args) {
//             const sectionId = parseInt(args[1].dataset.sectionId);
//             changeScrollDirection(sectionId);
//         });

//         scroll.on('scroll', (obj) => {
//             const currentScrollY = obj.scroll.y;

//             if (currentScrollY > lastScrollY) {
//                 header.classList.add('hidden');
//                 header.classList.remove('scrolled-up');
//             } else {
//                 header.classList.remove('hidden');
//                 if (currentScrollY > triggerPoint) {
//                     header.classList.add('scrolled-up');
//                 } else {
//                     header.classList.remove('scrolled-up');
//                 }
//             }

//             lastScrollY = currentScrollY;
//         });
//     }

//     window.addEventListener('load', function() {
//         setTimeout(() => {
//             if (scroll) {
//                 scroll.scrollTo(0, 0); 
//                 scroll.update(); 
//             } else {
//                 initLocomotiveScroll();
//             }
//         }, 10);
//     });

//     // var $img = $('.img-1-home');
//     // var $loader = $('.overlay-loader');
//     // $loader.fadeOut(500);
      
//     // if ($img.length > 0 && $img[0].complete) {
//     //     $img.trigger('load');
//     // }
      
//     // $img.on('load', function() {
//     //     $loader.fadeOut(500);
//     // }).each(function() {
//     //     if (this.complete) $(this).trigger('load');
//     // });




//     // var $firstLoader = $('.overlay-loader');
//     // var $secondLoader = $('.loader-next-page');

//     // // Show the first loader on initial load
//     // $firstLoader.show();

//     // // Simulate image loading
//     // var $img = $('.img-1-home'); // Change this selector based on your actual image class
//     // if ($img.length > 0 && $img[0].complete) {
//     //     $img.trigger('load');
//     // }

//     // $img.on('load', function() {
//     //     // Fade out first loader when the image loads
//     //     $firstLoader.fadeOut(500);
//     // }).each(function() {
//     //     if (this.complete) {
//     //         $(this).trigger('load');
//     //     }
//     // });

//     if (performance.navigation.type === performance.navigation.TYPE_RELOAD) {
//         // Page was reloaded
//         $('.overlay-loader').addClass('show');
//         setTimeout(function() {
//             $('.overlay-loader').removeClass('show');
//         }, 600);
//     } else {
//         // First time loading the page or navigating to it
//         $('.loader-next-page').addClass('show');
//         $('.overlay-loader').removeClass('show');
        
//         setTimeout(function() {
//             $('.loader-next-page').removeClass('show');
//         }, 600); 
//     }



//     const players = new Plyr('#player', {
//         controls: ['play', 'progress', 'current-time', 'mute', 'volume', 'fullscreen'],
//     });

//     $('.plyr__video-embed').each(function() {
//         const player = new Plyr($(this)[0], {
//             controls: ['play', 'progress', 'current-time', 'mute', 'volume', 'fullscreen'],
//         });
//     });

//     const classesGrid1 = ['img-M right', 'img-S left', 'img-L middle'];
//     const classesGrid2 = ['img-M left2', 'img-S right2', 'img-L middle2', 'img-S left3'];

//     const initialHTML = $('.inside-cases').html();
//     const allProjects = [];

//     $('.project').each(function() {
//         const projectData = {
//             html: $(this).prop('outerHTML'),
//             category: $(this).data('category')
//         };
//         allProjects.push(projectData);
//     });

//     $('.filter-button').click(function() {
//         const category = $(this).data('category');

//         if (category === 'all') {
//             $('.inside-cases').html(initialHTML);
//         } else {
//             const filteredProjects = allProjects.filter(project => project.category === category);
//             $('.inside-cases').empty();

//             let currentWrapper = 1;
//             let projectsInWrapper = 0;
//             const wrapperClasses = [classesGrid1, classesGrid2];

//             filteredProjects.forEach((projectData) => {
//                 const currentClasses = wrapperClasses[currentWrapper - 1];
//                 const classesCount = currentClasses.length;

//                 if (projectsInWrapper % classesCount === 0) {
//                     if (projectsInWrapper !== 0) {
//                         $('.inside-cases').append('</div>');
//                     }
//                     $('.inside-cases').append('<div class="wraper-grid-' + currentWrapper + '"></div>');
//                 }

//                 const newClass = currentClasses[projectsInWrapper % classesCount] + ' project';
              
//                 const projectHtml = $(projectData.html);
//                 projectHtml.removeClass().addClass(newClass);
//                 setTimeout(() => {
//                     projectHtml.addClass('is-inview');
//                 }, 100);
//                 projectHtml.find('div').first().removeClass().addClass('img');

//                 const wrapperSelector = '.wraper-grid-' + currentWrapper;
//                 $(wrapperSelector).last().append(projectHtml);

//                 projectsInWrapper++;

//                 if (projectsInWrapper % classesCount === 0) {
//                     currentWrapper = (currentWrapper === 1) ? 2 : 1;
//                     projectsInWrapper = 0;
//                 }
//             });

//             if (projectsInWrapper !== 0) {
//                 $('.inside-cases').append('</div>');
//             }
//         }

//         $('.filter-button').removeClass('active');
//         $(this).addClass('active');

//         setTimeout(() => {
//             if (scroll) {
//                 scroll.update();
//             }
//         }, 100);
//     });

//     $('.go-top').on('click', function(e) {
//         console.log("u kliku butoni");
        
//         e.preventDefault(); 
//         scroll.scrollTo(0, { duration: 1000, easing: [0.25, 0.00, 0.35, 1.00] });
//     });

//     $('#menu-main-menu a:contains("Contacts")').on('click', function(e) {
//         e.preventDefault();
//         scroll.scrollTo('.footer', {
//             duration: 1000,
//             easing: [0.25, 0.00, 0.35, 1.00]
//         });
//     });

//     $('.scroll').on('click', function(e) {
//         e.preventDefault();

       
//         scroll.scrollTo('#filter-section', {
//             offset: 0, 
//             duration: 1000, 
//             easing: [0.25, 0.00, 0.35, 1.00] 
//         });
//     });

//     var $customCursor = $('.custom-cursor');
//     $(document).on('mousemove', function(e) {
      
//         if ($('.copy-text:hover').length > 0) {
//             $customCursor.show();
//             $customCursor.css({
//                 top: e.pageY - 35 + 'px', 
//                 left: e.pageX - 75 + 'px'
//             });
//         } else {
//             $customCursor.hide();
//         }
//     });

    
//     $('.copy-text').on('click', function(e) {
//         e.preventDefault();

//         var textToCopy = $(this).text();

//         var tempElement = $('<textarea>');
//         $('body').append(tempElement);
//         tempElement.val(textToCopy).select();
//         document.execCommand('copy');
//         tempElement.remove();

//         $customCursor.text('Copied').addClass('copied');
//         setTimeout(function() {
//             $customCursor.text('Copy to clipboard').removeClass('copied');
//         }, 2000);
//     });

//     $('.mob-menu button').click(function() {
//         $('.header-mobile').addClass('active');
//         $('body').addClass('menu-active'); 
//     });
//     $('.close-btn').click(function() {
//         $('.header-mobile').removeClass('active');
//         $('body').removeClass('menu-active');
//     });

// });







// erornew

jQuery(document).ready(function($) {
    console.log("gjithkah tjeter");

    if ($('section').hasClass('about-page-wrap')) {
        console.log('jena n about');
        return;
    }

    window.scrollTo(0, 0);

    let lastScrollY = 0;
    const header = document.querySelector('.header');
    const triggerPoint = 100;
    let scroll = null;  

    function initLocomotiveScroll() {
        const scroller = document.querySelector('[data-scroll-container]');

        if (scroll) {
            // Prevent multiple initialization
            console.log("Scroll already initialized");
            return;
        }

        scroll = new LocomotiveScroll({
            el: scroller,
            smooth: true,
            smoothMobile: true,
            getDirection: true,
            multiplier: 1,
            direction: 'vertical',
            mobile: {
                breakpoint: 0,
                smooth: false,
                getDirection: false,
            },
            tablet: {
                breakpoint: 0,
                smooth: true,
                getDirection: true,
            }
        });



        scroll.on('call', function(args) {
            const sectionId = parseInt(args[1].dataset.sectionId);
            changeScrollDirection(sectionId);
        });

        scroll.on('scroll', (obj) => {
            const currentScrollY = obj.scroll.y;

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
        });
    }

    window.addEventListener('load', function() {
        setTimeout(() => {
            if (scroll) {
                scroll.scrollTo(0, 0); 
                scroll.update(); 
            } else {
                initLocomotiveScroll();
            }
        }, 10);
    });

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

    const players = new Plyr('#player', {
        controls: ['play', 'progress', 'current-time', 'mute', 'volume', 'fullscreen'],
    });

    $('.plyr__video-embed').each(function() {
        const player = new Plyr($(this)[0], {
            controls: ['play', 'progress', 'current-time', 'mute', 'volume', 'fullscreen'],
        });
    });

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
            if (scroll) {
                scroll.update();
            }
        }, 100);
    });

    $('.go-top').on('click', function(e) {
        e.preventDefault(); 
        scroll.scrollTo(0, { duration: 1000, easing: [0.25, 0.00, 0.35, 1.00] });
    });

    $('#menu-main-menu a:contains("Contacts")').on('click', function(e) {
        e.preventDefault();
        scroll.scrollTo('.footer', {
            duration: 1000,
            easing: [0.25, 0.00, 0.35, 1.00]
        });
    });

    $('.scroll').on('click', function(e) {
        e.preventDefault();
        scroll.scrollTo('#filter-section', {
            offset: 0, 
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
        }, 2000);
    });

    $('.mob-menu button').click(function() {
        $('.header-mobile').addClass('active');
        $('.header-mobile .wrap-mobile-header .inside-mobile-header .inside-header .nav-mob .menu-main-menu-container .menu li').addClass('is-inview');
        $('.home .header-mobile .wrap-mobile-header .inside-mobile-header .inside-header').addClass('is-inview');
        $('.home .header-mobile .wrap-mobile-header .inside-mobile-header .columns-2').addClass('is-inview');
        $('body').addClass('menu-active'); 
    });

    $('.close-btn').click(function() {
        $('.header-mobile').removeClass('active');
        // $('.header-mobile .wrap-mobile-header .inside-mobile-header .inside-header .nav-mob .menu-main-menu-container .menu li').removeClass('is-inview');
        // $('.home .header-mobile .wrap-mobile-header .inside-mobile-header .inside-header').removeClass('is-inview');
        // $('.home .header-mobile .wrap-mobile-header .inside-mobile-header .columns-2').removeClass('is-inview');
        $('body').removeClass('menu-active');
    });

    $('.header-mobile .wrap-mobile-header .inside-mobile-header .inside-header .nav-mob .menu-main-menu-container .menu li a').click(function (e) {
        e.preventDefault();
            $('.header-mobile').removeClass('active');
    
        if ($(this).text().trim() === "Contacts") {
            $('.header-mobile').removeClass('active');
            setTimeout(() => {                
                scroll.scrollTo('.footer-mobile', {
                    duration: 1000,
                    easing: [0.25, 0.00, 0.35, 1.00]
                });
            }, 300);
    
        } else {
            window.location.href = $(this).attr('href');
        }
    });


});
