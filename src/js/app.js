jQuery(document).ready(function($) {

    var swiper = new Swiper(".mySwiper", {
        slidesPerView: 4,
        spaceBetween: 16,
        pagination: false,

      });

    console.log("u kliku111");





// Store the initial state of the entire project section
const initialHTML = $('.inside-cases').html();
const allProjects = [];

// Store individual project data
$('.project').each(function() {
    const projectData = {
        html: $(this).prop('outerHTML'),
        category: $(this).data('category')
    };
    allProjects.push(projectData);
});

// Define the class patterns
const classesGrid1 = ['img-M right', 'img-S left', 'img-L middle'];
const classesGrid2 = ['img-M left2', 'img-S right2', 'img-L middle2', 'img-S left3'];

// Handle filter button click
$('.filter-button').click(function() {
    const category = $(this).data('category');

    if (category === 'all') {
        // Reset to the initial state
        $('.inside-cases').html(initialHTML);
    } else {
        // Filter projects by category
        const filteredProjects = allProjects.filter(project => project.category === category);

        // Clear the project display area
        $('.inside-cases').empty();

        // Display filtered projects with alternating wrappers
        let currentWrapper = 1;
        let projectsInWrapper = 0;
        const wrapperClasses = [classesGrid1, classesGrid2];

        filteredProjects.forEach((projectData) => {
            const currentClasses = wrapperClasses[currentWrapper - 1];
            const classesCount = currentClasses.length;

            // Check if we need to start a new wrapper
            if (projectsInWrapper % classesCount === 0) {
                // Close the previous wrapper if it's open
                if (projectsInWrapper !== 0) {
                    $('.inside-cases').append('</div>');
                }
                // Start a new wrapper
                $('.inside-cases').append('<div class="wraper-grid-' + currentWrapper + '"></div>');
            }

            // Create a new project element and add the class
            const newClass = currentClasses[projectsInWrapper % classesCount] + ' project';
            const projectHtml = $(projectData.html);
            projectHtml.removeClass().addClass(newClass);

            // Ensure the inner div only has the class 'img'
            projectHtml.find('div').first().removeClass().addClass('img');

            // Append the project to the current wrapper
            const wrapperSelector = '.wraper-grid-' + currentWrapper;
            $(wrapperSelector).last().append(projectHtml);

            projectsInWrapper++;
            // Check if we need to switch to the next wrapper
            if (projectsInWrapper % classesCount === 0) {
                currentWrapper = (currentWrapper === 1) ? 2 : 1;
                projectsInWrapper = 0;
            }
        });

        // Handle the last unclosed wrapper
        if (projectsInWrapper % classesCount !== 0) {
            $('.inside-cases').append('</div>');
        }
    }

    // Manage active button class
    $('.filter-button').removeClass('active');
    $(this).addClass('active');
});


const players = new Plyr('#player', {
    controls: ['play', 'progress', 'current-time', 'mute', 'volume', 'fullscreen'],

});
    


});


 
