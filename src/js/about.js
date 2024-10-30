

jQuery(document).ready(function($) {

    let lastScrollY = 0;
    const header = document.querySelector('.header');
    const triggerPoint = 100;

    function handleScroll() {
        const currentScrollY = scrollLoco?.scroll?.instance?.scroll?.y || 0;
        
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
            320: { slidesPerView: 1, spaceBetween: 10 },
            480: { slidesPerView: 2, spaceBetween: 12 },
            992: { slidesPerView: 3, spaceBetween: 14 },
            1800: { slidesPerView: 4, spaceBetween: 14 }
        }
    });

    const scroller = document.querySelector('.about-page-wrap');

    let scrollLoco;
    let isMobileView = window.innerWidth < 769; 

    function initLocomotiveScroll() {
        if (scrollLoco) return;  // Prevent multiple initializations

        scrollLoco = new LocomotiveScroll({
            el: scroller,
            inertia: 0.4,
            smooth: true,
            // smoothMobile: false,
            getDirection: true,
            // multiplier: 1,
            direction: 'vertical',
            mobile: {
                breakpoint: 0,
                smooth: false,
                getDirection: true,
            },
            tablet: {
                breakpoint: 0,
                smooth: false,
                getDirection: true,
            }
        });
        // scrollLoco = new LocomotiveScroll({
        //     el: document.querySelector('[data-scroll-container]'),
        //     inertia: 0.4,
        //     smooth: true,
        //     getDirection: true,
        //     mobile: {
        //         inertia: 1,
        //         breakpoint: 0,
        //         smooth: false,
        //         getDirection: true,
        //         direction: 'vertical'
        //     },
        //     tablet: {
        //         inertia: 1,
        //         breakpoint: 0,
        //         smooth: false,
        //         getDirection: true,
        //         direction: 'vertical'
        //     },
        // });

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

        setupHorizontalSections();

        ScrollTrigger.addEventListener("refresh", () => scrollLoco.update());
        ScrollTrigger.refresh();
    }

    function setupHorizontalSections() {
        const horizontalSections = gsap.utils.toArray('.horizontal-scroll');
        const isMobileView = window.innerWidth < 769; 

        horizontalSections.forEach(function (sec, i) {	
            const thisPinWrap = sec.querySelector('.pin-wrap');
            const thisAnimWrap = thisPinWrap.querySelector('.animation-wrap');

            ScrollTrigger.getById(`scrollTrigger-${sec.id}`)?.kill();

            if (isMobileView) {
                const getToValue = () => -(thisAnimWrap.scrollHeight - window.innerHeight);

                gsap.fromTo(thisAnimWrap, { y: 0 }, { 
                    y: getToValue(),
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
                const getToValue = () => -(thisAnimWrap.scrollWidth - window.innerWidth);

                gsap.fromTo(thisAnimWrap, { x: 0 }, { 
                    x: getToValue(),
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

    function handleResize() {
        ScrollTrigger.getAll().forEach(trigger => trigger.kill()); 
        setupHorizontalSections(); 
        scrollLoco.update(); 
    }

    window.addEventListener('resize', handleResize);

    window.addEventListener('DOMContentLoaded', function() {
        initLocomotiveScroll(); 
    });

    window.addEventListener('load', function() {
        setTimeout(() => {
            if (!scrollLoco) {
                initLocomotiveScroll();
            } else {
                scrollLoco.scrollTo(0, { duration: 0, disableLerp: true }); 
                scrollLoco.update(); 
                ScrollTrigger.refresh(); 
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
        });
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


