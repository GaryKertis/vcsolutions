<!doctype html>
<html lang="en">

<head>
    <title>Vachina</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <link href="./css/bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css">
    <link href="./css/bootstrap/css/bootstrap-theme.min.css" rel="stylesheet" type="text/css">
    <link href="./css/vc.css" rel="stylesheet">
    <script src="./scripts/vc.js"></script>
   	<?php
    echo "<script>vcApp.backgroundImages = [];\n";
	$query_images_args = array(
		    'post_type' => 'attachment', 'post_mime_type' =>'image', 'post_status' => 'inherit', 'posts_per_page' => -1,
		    'tax_query' => array(array('taxonomy' => 'media_category', 'field' => 'slug', 'terms' => 'background'))
		);
		$query_images = new WP_Query( $query_images_args );
		$images = array();
		foreach ( $query_images->posts as $image) {
			echo 'vcApp.backgroundImages.push("'.wp_get_attachment_url( $image->ID ) . '");';
			echo "\n";
		}
    echo '</script>';
	wp_head(); ?>
</head>

<body>
    <div id="vc-bg"></div>
    <div class="container">
        <div id="vc-contact">
            <span class="glyphicon glyphicon-th-list"></span>
        </div>
        <div class="row">
            <div class="hidden-xs col-sm-1">
            </div>
            <div class="hidden-xs col-sm-2">
            </div>
            <div class="col-xs-8 col-sm-4 vc-header-container">
                <span onmouseover="vcApp.showBg()" onmouseout="vcApp.hideBg()" class="h2 vc-header">
          			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>

                </span>
            </div>
            <div class="hidden-xs col-sm-1">
             <span class="h3 vc-header"><?php wp_list_pages( array('title_li' => null) ); ?></span>
            </div>
        </div>
