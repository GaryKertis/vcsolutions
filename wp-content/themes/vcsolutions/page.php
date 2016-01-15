<?php get_header(); ?>

        <div class="main row">
            <div class="col-sm-1 hidden-xs">
            </div>
            <div class="vc-1 col-sm-2 col-xs-2">
			    <div class="main">
			    </div>
			</div>
            <div class="col-sm-4 col-xs-6">
                <div class="main">
					<?php
						// Start the loop.
						while ( have_posts() ) : the_post();

							// Include the page content template.
							get_template_part( 'template-parts/content', 'page' );

							// End of the loop.
						endwhile;
						?>
                </div>
            </div>
            <div class="col-sm-1 hidden-xs">
            </div>
        </div>
    </div>
<?php get_footer(); ?>
