<?php
// Function to render a project
function render_project($class, $project) {
    ?>
    <div class="<?php echo esc_attr($class); ?> fade-in-img-home" data-scroll data-scroll-class="is-inview">
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
// Function to get project details by ID
function get_project_details($post_id) {
    return [
        'title' => get_the_title($post_id),
        'permalink' => get_permalink($post_id),
        'image_url' => get_the_post_thumbnail_url($post_id, 'full'),
        'category' => wp_get_post_terms($post_id, 'category', ['fields' => 'names'])[0] ?? ''
    ];
}

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

$cases = get_field('cases');

if (!$cases) {
    echo '<p>No cases found.</p>';
} else {
    ?>
    <section class="cases" data-scroll-section>
        <div class="wraper-cases" >
            <div class="inside-cases">
                <?php
                foreach ($cases['section'] as $section) {
                    $select_grid = $section['select_grid'];

                    // Handle single case
                    if ($select_grid === 'one' && isset($section['case']) && $section['case'] instanceof WP_Post) {
                        $post_details = get_project_details($section['case']->ID);
                        echo '<div class="">';
                        render_project('img-1-big', $post_details); 
                        echo '</div>'; 
                    }

                    // Handle 3_cases group
                    if ($select_grid === 'three') {
                        echo '<div class="wraper-grid-1">';
                        
                        if (isset($section['3_cases']) && is_array($section['3_cases']) && count($section['3_cases']) === 3) {
                            $case_counter = 0; 
                            foreach ($section['3_cases'] as $case_post) {
                               
                                if (is_numeric($case_post)) {
                                    $case_post_obj = get_post((int) $case_post);
                                } elseif ($case_post instanceof WP_Post) {
                                    $case_post_obj = $case_post;
                                } else {
                                    // echo '<p>Error: Invalid data format in 3 cases group.</p>';
                                    continue;
                                }

                                if ($case_post_obj instanceof WP_Post) {
                                    $post_details = get_project_details($case_post_obj->ID);
                                    $class = $classes_grid_1[$case_counter]; 
                                    render_project($class, $post_details);
                                    $case_counter++; // Increment the counter
                                } 
                            }
                        }

                        echo '</div>'; // End wraper-grid-1
                    }

                    // Handle 4_cases group
                    if ($select_grid === 'four') {
                        echo '<div class="wraper-grid-2">';
                        
                        if (isset($section['4_cases']) && is_array($section['4_cases']) && count($section['4_cases']) === 4) {
                            $case_counter = 0; // Counter for the case index
                            foreach ($section['4_cases'] as $case_post) {
                                // Check if $case_post is an ID or an object
                                if (is_numeric($case_post)) {
                                    $case_post_obj = get_post((int) $case_post);
                                } elseif ($case_post instanceof WP_Post) {
                                    $case_post_obj = $case_post;
                                }


                                if ($case_post_obj instanceof WP_Post) {
                                    $post_details = get_project_details($case_post_obj->ID);
                                    $class = $classes_grid_2[$case_counter]; // Directly using the counter for the class
                                    render_project($class, $post_details);
                                    $case_counter++; // Increment the counter
                                } 
                            }
                        }

                        echo '</div>'; // End wraper-grid-2
                    }
                }
                ?>
            </div>
        </div>
    </section>
    <?php
}
?>
