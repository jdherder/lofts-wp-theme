<?php
/**
 * Adds lofts-as-list shortcode
 *
 * @package Lofts
 */

function display_lofts_as_list( $atts = [], $content = "", $tag = "" ) {
	$markup = "<div class=\"lofts-plugin-list\">";
	$loft_pages = get_loft_pages();

	foreach ($loft_pages as $loft_page) {
		$title = $loft_page['title'];
		$permalink = $loft_page['permalink'];
		$excerpt = $loft_page['excerpt'];
		$img_src = $loft_page['img'];

		$loft_markup = "
		<a href=\"$permalink\" class=\"lofts-plugin-list__tile\">
			<div class=\"lofts-plugin-list__img\" style=\"background-image: url('$img_src');\"></div>
			<h2 class=\"lofts-plugin-list__title\">$title</h2>
		</a>";

		$markup .= $loft_markup;
	}

	$markup .= "</div>";

	return $markup;
}
add_shortcode( 'lofts_as_list', 'display_lofts_as_list' );

function get_loft_pages() {
	$pages = array();
	$args = array(
		'post_type' => 'page',
		'posts_per_page' => -1,
		'meta_query' => array(
				array(
						'key' => '_wp_page_template',
						'value' => 'page_loft.php'
				)
		)
	);

	$the_pages = new WP_Query( $args );
	
	if( $the_pages->have_posts() ){
			while( $the_pages->have_posts() ){
					$the_pages->the_post();
					$pages[] = array(
						'id' => get_the_ID(),
						'permalink' => get_permalink(),
						'title' => get_the_title(),
						'excerpt' => get_the_excerpt(),
						'img' => get_the_post_thumbnail_url()
					);
			}
	}

	wp_reset_postdata();

	return $pages;
}