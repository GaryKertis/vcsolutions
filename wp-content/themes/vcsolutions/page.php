<?php get_header(); ?>

<?php 
echo "<script>\n";
echo "vcApp.aboutImages = [];\n";

        $query_images_args = array(
            'orderby' => 'title', 'order' => 'DESC', 'post_type' => 'attachment', 'post_mime_type' =>'image', 'post_status' => 'inherit', 'posts_per_page' => -1,
            'tax_query' => array(array('taxonomy' => 'media_category', 'field' => 'slug', 'terms' => 'about'))
        );
        $query_images = new WP_Query( $query_images_args );
        $images = array();
        foreach ( $query_images->posts as $image) {
            echo 'vcApp.aboutImages.push("'.wp_get_attachment_url( $image->ID ) . '");';
            echo "\n";
        }
echo "</script>";
?>
<script>
window.onload = function() {
    document.getElementById("vc-about-img").src = vcApp.aboutImages[Math.floor(Math.random() * vcApp.aboutImages.length)];
}
</script>
<style>
body,html {
    cursor: default;
}
</style>
        <div class="row" style="min-height: 1000px">
            <div class="col-sm-4 hidden-xs"></div>
            <div class="col-sm-8 col-xs-12">
                <div>
					<?php
						// Start the loop.
						while ( have_posts() ) : the_post();

							// Include the page content template.
							get_template_part( 'template-parts/content', 'page' );

							// End of the loop.
						endwhile;
						?>
                    <div>
                        <img id="vc-about-img" style="max-width: 800px"/>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php get_footer(); ?>
