<?php get_header(); ?>

        <div class="main row">
            <div class="col-sm-1 hidden-xs">
            </div>
            <?php get_sidebar(); ?>
            <div class="vc-2 col-sm-4 col-xs-6">
                <div class="main">
					<?php
					$query_images_args = array(
					    'post_type' => 'attachment', 'post_mime_type' =>'image', 'post_status' => 'inherit', 'posts_per_page' => -1,
					    'tax_query' => array(array('taxonomy' => 'media_category', 'field' => 'slug', 'terms' => 'column2'))
					);
					$query_images = new WP_Query( $query_images_args );
					$images = array();
					foreach ( $query_images->posts as $image) {
						echo "<div>";
						if ($image->post_content) echo "<p>" . $image->post_content . "</p>";
						if ($image->post_excerpt) echo "<p>" . $image->post_excerpt . "</p>";
					    echo "<img onclick='vcApp.imgClick(this)' src='".wp_get_attachment_url( $image->ID )."' alt='". get_post_meta($image->ID, '_wp_attachment_image_alt', true)."' /></div>";
					}
					?>
                </div>
            </div>
            <div class="col-sm-1 hidden-xs">
            </div>
        </div>
    </div>
<?php get_footer(); ?>
