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

            // Function to render a project
            function render_project($class, $project) {
                ?>
                <div class="project" data-category="<?php echo esc_attr($project['category']); ?>">
                    <div class="<?php echo esc_attr($class); ?>">
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
                </div>
                <?php
            }

            // Function to get project details by ID
            function get_project_details($post_id) {
                return [
                    'title' => get_the_title($post_id),
                    'permalink' => get_permalink($post_id),
                    'image_url' => get_the_post_thumbnail_url($post_id, 'full'),
                    'category' => wp_get_post_terms($post_id, 'category', ['fields' => 'slugs'])[0] ?? ''
                ];
            }

            // Fetch cases from ACF
            $cases = get_field('cases');

            if (!$cases) {
                echo '<p>No cases found.</p>';
            } else {
                foreach ($cases['section'] as $section) {
                    $select_grid = $section['select_grid'];

                    // Handle single case
                    if ($select_grid === 'one' && isset($section['case']) && $section['case'] instanceof WP_Post) {
                        $post_details = get_project_details($section['case']->ID);
                        echo '<div class="wraper-single-case">';
                        render_project('img-1', $post_details); // For single case, use the 'img-1' class
                        echo '</div>'; // End wraper-single-case
                    }

                    // Handle 3_cases group
                    if ($select_grid === 'three') {
                        echo '<div class="wraper-grid-1">';
                        
                        if (isset($section['3_cases']) && is_array($section['3_cases']) && count($section['3_cases']) === 3) {
                            $case_counter = 0; // Counter for the case index
                            foreach ($section['3_cases'] as $case_post) {
                                if (is_numeric($case_post)) {
                                    $case_post_obj = get_post((int) $case_post);
                                } elseif ($case_post instanceof WP_Post) {
                                    $case_post_obj = $case_post;
                                } else {
                                    echo '<p>Error: Invalid data format in 3 cases group.</p>';
                                    continue;
                                }

                                if ($case_post_obj instanceof WP_Post) {
                                    $post_details = get_project_details($case_post_obj->ID);
                                    $class = $classes_grid_1[$case_counter]; // Directly using the counter for the class
                                    render_project($class, $post_details);
                                    $case_counter++; // Increment the counter
                                } else {
                                    echo '<p>Error: Invalid post object in 3 cases group.</p>';
                                }
                            }
                        } else {
                            echo '<p>No cases found or incorrect format in 3 cases group.</p>';
                        }
                        echo '</div>'; // End wraper-grid-1
                    }

                    // Handle 4_cases group
                    if ($select_grid === 'four') {
                        echo '<div class="wraper-grid-2">';
                        
                        if (isset($section['4_cases']) && is_array($section['4_cases']) && count($section['4_cases']) === 4) {
                            $case_counter = 0; // Counter for the case index
                            foreach ($section['4_cases'] as $case_post) {
                                if (is_numeric($case_post)) {
                                    $case_post_obj = get_post((int) $case_post);
                                } elseif ($case_post instanceof WP_Post) {
                                    $case_post_obj = $case_post;
                                } else {
                                    echo '<p>Error: Invalid data format in 4 cases group.</p>';
                                    continue;
                                }

                                if ($case_post_obj instanceof WP_Post) {
                                    $post_details = get_project_details($case_post_obj->ID);
                                    $class = $classes_grid_2[$case_counter]; // Directly using the counter for the class
                                    render_project($class, $post_details);
                                    $case_counter++; // Increment the counter
                                } else {
                                    echo '<p>Error: Invalid post object in 4 cases group.</p>';
                                }
                            }
                        } else {
                            echo '<p>No cases found or incorrect format in 4 cases group.</p>';
                        }
                        echo '</div>'; // End wraper-grid-2
                    }
                }
            }
            ?>
        </div>
    </div>
</section>
