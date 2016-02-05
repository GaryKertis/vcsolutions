<!doctype html>
<html lang="en">

<head>
    <title>VACHINA</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name='keywords' content='vachina, solutions, pottery, new york'><meta name='description' content='Vachina is a collection of handmade pottery created in New York.'>
    <link href="./css/bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css">
    <link href="./css/bootstrap/css/bootstrap-theme.min.css" rel="stylesheet" type="text/css">
    <link href="./css/vc.css" rel="stylesheet">
    <script src="./scripts/vc.js"></script>
   	<?php
    echo "<script>vcApp.backgroundImages = [];\n";
    echo "function preLoad() {\n";
	$query_images_args = array(
		    'orderby' => 'title', 'order' => 'DESC', 'post_type' => 'attachment', 'post_mime_type' =>'image', 'post_status' => 'inherit', 'posts_per_page' => -1,
		    'tax_query' => array(array('taxonomy' => 'media_category', 'field' => 'slug', 'terms' => 'background'))
		);
		$query_images = new WP_Query( $query_images_args );
		$images = array();
		foreach ( $query_images->posts as $image) {
            echo "var div = document.createElement('div');\n";
            echo "div.className = 'vc-preload';\n";
            echo 'div.style.backgroundImage = "url(' . wp_get_attachment_url( $image -> ID) . ')"';
            echo "\n";
            echo "document.body.appendChild(div);\n";
			echo 'vcApp.backgroundImages.push("'.wp_get_attachment_url( $image->ID ) . '");';
			echo "\n";
		}
    echo "}\n";
    echo '</script>';
	wp_head(); ?>
</head>

<body>
    <div id="vc-bg"></div>
    <div id="scrollcolor"></div>
    <div class="container">
        <div id="vc-contact">
            <a href="?page_id=2"><span class="glyphicon glyphicon-th-list"></span></a>
        </div>
        <div class="row">
            <div class="hidden-xs col-sm-4">
            </div>
            <div onclick="" class="col-xs-12 col-sm-7 vc-header-container">
                <span onmouseover="vcApp.showBg()" onmouseout="vcApp.hideBg()" class="h2 vc-header">
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><span>V</span>
          			<span style="margin-left: -10px">ACHINA</span></a>
                </span>
            </div>
            <div class="hidden-xs col-sm-1">
             <span class="h3 vc-header"><?php wp_list_pages( array('title_li' => null) ); ?></span>
            </div>
        </div>
