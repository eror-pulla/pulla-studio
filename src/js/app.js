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

            // Display filtered projects with reset classes
            let currentWrapper = 1;
            let projectsInWrapper = 0;

            filteredProjects.forEach((projectData, index) => {
                const projectHtml = $(projectData.html);

                const currentClasses = (currentWrapper === 1) ? classesGrid1 : classesGrid2;
                const classesCount = currentClasses.length;

                if (projectsInWrapper % classesCount === 0) {
                    if (projectsInWrapper !== 0) {
                        $('.inside-cases').append('</div>');
                    }
                    $('.inside-cases').append('<div class="wraper-grid-' + currentWrapper + '">');
                }

                const newClass = currentClasses[projectsInWrapper % classesCount] + ' project';
                projectHtml.attr('class', newClass);

                $('.inside-cases .wraper-grid-' + currentWrapper).append(projectHtml);

                projectsInWrapper++;
                if (projectsInWrapper % classesCount === 0) {
                    $('.inside-cases').append('</div>');
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



});
