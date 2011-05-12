<?php
function lblg_register_headers(){
	$lblg_opts = get_option($shortname. '_lblg_options');
	$use_custom_header = $lblg_opts['use_custom_header'];
	if( true === $use_custom_header ){
		// Set up custom header code
		if( !defined('HEADER_IMAGE') ){
			define( 'HEADER_IMAGE', '%s/images/headers/snowy_day.jpg' );
		}
		if( !defined('HEADER_TEXTCOLOR') ){	
			define( 'HEADER_TEXTCOLOR', 'ffffff' );
		}
		if( !defined('HEADER_IMAGE_WIDTH') ) {
			define( 'HEADER_IMAGE_WIDTH', '960' );
		}
		if( !defined('HEADER_IMAGE_HEIGHT') ){
			define( 'HEADER_IMAGE_HEIGHT', '200' );
		}

		add_custom_image_header( 'lblg_header_style', 'lblg_admin_header_style' );
	
		register_default_headers( array(
			'fireworks' => array(
				'url' => '%s/images/headers/fireworks.jpg',
				'thumbnail_url' => '%s/images/headers/fireworks-thumbnail.jpg',
				'description' => 'Fireworks'
			),
			'ivy_in_winter' => array(
				'url' => '%s/images/headers/ivy_in_winter.jpg',
				'thumbnail_url' => '%s/images/headers/ivy_in_winter-thumbnail.jpg',
				'description' => 'Ivy in Winter'
			),
			'lakeshore' => array(
				'url' => '%s/images/headers/lakeshore.jpg',
				'thumbnail_url' => '%s/images/headers/lakeshore-thumbnail.jpg',
				'description' => 'Lakeshore'
			),
			'philly_sunset' => array(
				'url' => '%s/images/headers/philly_sunset.jpg',
				'thumbnail_url' => '%s/images/headers/philly_sunset-thumbnail.jpg',
				'description' => 'Philly Sunset'
			),
			'snowy_day' => array(
				'url' => '%s/images/headers/snowy_day.jpg',
				'thumbnail_url' => '%s/images/headers/snowy_day-thumbnail.jpg',
				'description' => 'Snowy Day'
			),
			'summer_dock' => array(
				'url' => '%s/images/headers/summer_dock.jpg',
				'thumbnail_url' => '%s/images/headers/summer_dock-thumbnail.jpg',
				'description' => 'Summer Dock'
			),
			'sunlight_streaming' => array(
				'url' => '%s/images/headers/sunlight_streaming.jpg',
				'thumbnail_url' => '%s/images/headers/sunlight_streaming-thumbnail.jpg',
				'description' => 'Sunlight Streaming'
			),
		) );
	}
}

function lblg_header_style() {
?>
<style type="text/css">
#header{
	background: url(<?php header_image() ?>) bottom left no-repeat;
}
<?php if ( 'blank' == get_header_textcolor() ) { ?>
#header h1, #header #description {
	display: none;
}
<?php } else { ?>
#header h1 a, p.description {
	color:#<?php header_textcolor(); ?>;
}
<?php } ?>
</style>
<?php
}


function lblg_admin_header_style() {
?>
<style type="text/css">
#headimg{
	background: url(<?php header_image(); ?>) bottom left no-repeat;
	height: <?php echo HEADER_IMAGE_HEIGHT; ?>px;
	width:<?php echo HEADER_IMAGE_WIDTH; ?>px;
}

#headimg h1{
	font-size: 3.5em;
	font-weight: bold;
	font-family: "Helvetica Neue",Helvetica,Arial,sans-serif;
	padding-top: 0.5em;
}
#headimg h1 a{
	color:#<?php header_textcolor(); ?>;
	text-decoration: none;
	vertical-align: baseline;
	text-shadow: #000 2px 2px 1px;
}
#headimg #desc{
	color:#<?php header_textcolor(); ?>;
	font-style: italic;
	font-size: 1.2em;
	margin-left: 1.5em;
}

<?php if ( 'blank' == get_header_textcolor() ) { ?>
#headimg h1, #headimg #desc {
	display: none;
}

<?php } ?>

</style>
<?php
}