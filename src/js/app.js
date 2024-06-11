jQuery(document).ready(function($) {
    console.log('osht tu bo');
    // Locomotive Scroll initialization code
    var scroll = new LocomotiveScroll({
        el: document.querySelector('[data-scroll-container]'),
        smooth: true,
        // Other options...
    });

    // Stop scrolling after 5 seconds
    setTimeout(function() {
        scroll.stop(); // Stop the scrolling
    }, 5000);

    // Log a success message to the console
    console.log('Locomotive Scroll initialized successfully.');
});
