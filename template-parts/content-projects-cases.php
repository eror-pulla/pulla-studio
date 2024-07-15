<div class="filter-section" id="filter-section">
    <div class="wraper-filter">
        <div class="inside-banner">
            <div class="filter">
                <h2>Filter</h2>
                <div class="wrap-filters">
                    <ul>
                        <?php
                        // Retrieve categories
                        $categories = get_terms('category', ['hide_empty' => true]);
                        // Output category buttons
                        echo '<li><button class="filter-button" data-category="all">All</button></li>'; // Show all button
                        foreach ($categories as $category) {
                            echo '<li><button class="filter-button" data-category="' . esc_attr($category->slug) . '">' . esc_html($category->name) . '</button></li>';
                        }
                        ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<section class="cases">
    <div class="wraper-cases">
        <div class="inside-cases">
            <?php
            // Define CSS class patterns for the middle projects in the two wrappers
            $classes_grid_1 = [
                'img-M right',
                'img-S left',
                'img-L middle'
            ];

            $classes_grid_2 = [
                'img-M left2',
                'img-S right2',
                'img-L middle2',
                'img-S left3'
            ];

            // Fetch the projects
            $args = [
                'post_type' => 'project',
                'posts_per_page' => -1,
                'order' => 'ASC'
            ];

            $projects_query = new WP_Query($args);

            if ($projects_query->have_posts()) :
                // Store projects in an array
                $projects = [];
                while ($projects_query->have_posts()) : $projects_query->the_post();
                    $categories = get_the_terms(get_the_ID(), 'category');
                    $category = (!empty($categories) && !is_wp_error($categories)) ? $categories[0]->slug : '';

                    $projects[] = [
                        'title' => get_the_title(),
                        'permalink' => get_permalink(),
                        'image_url' => get_the_post_thumbnail_url(get_the_ID(), 'full'),
                        'category' => $category
                    ];
                endwhile;
                wp_reset_postdata();

                // Determine the middle and last projects
                $total_projects = count($projects);
                if ($total_projects >= 1) {
                    $middle_projects = array_slice($projects, 0, -1);
                    $last_project = $projects[$total_projects - 1];
                } else {
                    // Handle cases where there are fewer than 1 project
                    $middle_projects = $projects;
                    $last_project = null;
                }

                // Output the section
                ?>
                <?php
                // Render the middle projects in alternating wrappers
                if (!empty($middle_projects)) {
                    $current_wrapper = 1;
                    $projects_in_wrapper = 0;

                    foreach ($middle_projects as $index => $project) {
                        $current_classes = ($current_wrapper == 1) ? $classes_grid_1 : $classes_grid_2;
                        $classes_count = count($current_classes);

                        if ($projects_in_wrapper % $classes_count == 0) {
                            if ($projects_in_wrapper != 0) echo '</div>';
                            echo '<div class="wraper-grid-' . $current_wrapper . '">';
                        }

                        $class = $current_classes[$projects_in_wrapper % $classes_count];
                        render_project($class . ' project', $project);

                        $projects_in_wrapper++;

                        if ($projects_in_wrapper % $classes_count == 0) {
                            echo '</div>';
                            $current_wrapper = ($current_wrapper == 1) ? 2 : 1;
                            $projects_in_wrapper = 0;
                        }
                    }
                    echo '</div>';
                }

                // Render the last project
                if ($last_project) {
                    render_project('img-1 img-last project', $last_project);
                }
                ?>
            <?php endif; ?>
        </div>
    </div>
</section>

<?php
// Function to render a project
function render_project($class, $project) {
    ?>
    <div class="<?php echo esc_attr($class); ?>" data-category="<?php echo esc_attr($project['category']); ?>">
        <a href="<?php echo esc_url($project['permalink']); ?>">
            <div class="wrap-img">
                <img src="<?php echo esc_url($project['image_url']); ?>" alt="">
                <div class="text">
                    <p class="cat bodyS-D"><?php echo esc_html($project['category']); ?></p>
                    <p class="name"><?php echo esc_html($project['title']); ?></p>
                </div>
            </div>
        </a>
    </div>
    <?php
}
?>
