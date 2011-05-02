<?php
$parent_theme_array[ 'parent_themename' ] = "Elbee Elgee";
$parent_theme_array[ 'parent_shortname' ] = "lblg";
$parent_theme_array[ 'parent_version' ] = '1.0';

// Look for layout CSS files to auto-load
$layout_path = TEMPLATEPATH . '/layouts/'; 
$layouts = array();

// Look for color/design CSS files to auto-load
$alt_stylesheet_path = TEMPLATEPATH . '/styles/';
$alt_stylesheets = array();

if ( is_dir($layout_path) ) {
	if ($layout_dir = opendir($layout_path) ) { 
		while ( ($layout_file = readdir($layout_dir)) !== false ) {
			if(stristr($layout_file, ".css") !== false) {
				$layouts[] = $layout_file;
			}
		}	
	}
}	

if ( is_dir($alt_stylesheet_path) ) {
	if ($alt_stylesheet_dir = opendir($alt_stylesheet_path) ) { 
		while ( ($alt_stylesheet_file = readdir($alt_stylesheet_dir)) !== false ) {
			if(stristr($alt_stylesheet_file, ".css") !== false) {
				$alt_stylesheets[] = $alt_stylesheet_file;
			}
		}	
	}
}	

$layouts_tmp = asort($layouts);
$layouts_tmp = array_unshift($layouts, "Select a layout:", "*none*");

$alt_stylesheets_tmp = asort($alt_stylesheets);
$alt_stylesheets_tmp = array_unshift($alt_stylesheets, "Select a stylesheet:", "*none*");

$parent_options_array = array (
		
				"style_options" => array(	"name" => "Style Options",
						"type" => "subhead"),

				"layout_stylesheet" => array(	"name" => "Layout Stylesheet",
						"desc" => "Place additional layout stylesheets in <code>" . TEMPLATEPATH . "/layouts/</code> to add them as layout options",
			    		"std" => "Select a layout:",
			    		"type" => "select",
			    		"options" => $layouts),

				"alt_stylesheet" => array(	"name" => "Theme Stylesheet",
						"desc" => "Place additional theme stylesheets and assets in <code>" . TEMPLATEPATH . "/styles/</code> to add them as styling options",
					    "std" => "Select a stylesheet:",
					    "type" => "select",
					    "options" => $alt_stylesheets),

				"use_custom_header" => array(	"name" => "Use Custom Headers",
						"desc" => "Check this box if you wish to use WordPress's <a href=\"http://boren.nu/archives/2007/01/07/custom-image-header-api/\">Custom Header Image API</a> to define a custom image for your theme",
						"std" => "false",
						"type" => "checkbox"),

				"blog_meta_info" => array(	"name" => "Blog Meta Info",
						"type" => "subhead"),

				"display_footer_copyright" => array(	"name" => "Display Copyright",
						"desc" => "Check this box to display your copyright information in the footer.", 
						"std" => "true",
						"type" => "checkbox"),	

				"footer_copyright" => array(	"name" => "Copyright Statement",
						"desc" => "The following text will be displayed by default: <b><p>" . get_bloginfo('name') . " " . lblg_copyright() . "</p></b>",
						"std" => "",
						"type" => "textarea",
						"options" => array("rows" => "5",
										   "cols" => "40") ),

				"footer_credit_text" => array(	"name" => "Footer Credits",
						"desc" => "Footer credit text defaults to: <b><p>Powered by <a href=\"http://wordpress.org\">WordPress</a> " . get_bloginfo('version') . " and <a href=\"http://literalbarrage.org/blog/code/elbee-elgee\">Elbee Elgee</a></p></b> Change it to fit your site. (I'd appreciate the link love, though, if you'd leave it in...)  HTML should work just fine, raw PHP not so much. ",
						"std" => "",
						"type" => "textarea",
						"options" => array("rows" => "5",
										   "cols" => "40") ),
		  );

$parent_theme_array[ 'options' ] = $parent_options_array;

return $parent_theme_array;
?>