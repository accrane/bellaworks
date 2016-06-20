<?php
/*---------------------------------------------

		Image Sizes 
		
------------------------------------------------*/ 
add_image_size( 'thumbfeed', 480, 9999 );
add_image_size( 'homethumb', 480, 480, array('center','center', true) );
 

/*---------------------------------------------

		Pagination
		
------------------------------------------------*/ 

function pagi_posts_nav() {

	if( is_singular() )
		return;

	global $wp_query;

	/** Stop execution if there's only 1 page */
	if( $wp_query->max_num_pages <= 1 )
		return;

	$paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
	$max   = intval( $wp_query->max_num_pages );

	/**	Add current page to the array */
	if ( $paged >= 1 )
		$links[] = $paged;

	/**	Add the pages around the current page to the array */
	if ( $paged >= 3 ) {
		$links[] = $paged - 1;
		$links[] = $paged - 2;
	}

	if ( ( $paged + 2 ) <= $max ) {
		$links[] = $paged + 2;
		$links[] = $paged + 1;
	}

	echo '<div class="navigation"><ul>' . "\n";

	/**	Previous Post Link */
	if ( get_previous_posts_link() )
		printf( '<li>%s</li>' . "\n", get_previous_posts_link() );

	/**	Link to first page, plus ellipses if necessary */
	if ( ! in_array( 1, $links ) ) {
		$class = 1 == $paged ? ' class="active"' : '';

		printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( 1 ) ), '1' );

		if ( ! in_array( 2, $links ) )
			echo '<li>…</li>';
	}

	/**	Link to current page, plus 2 pages in either direction if necessary */
	sort( $links );
	foreach ( (array) $links as $link ) {
		$class = $paged == $link ? ' class="active"' : '';
		printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $link ) ), $link );
	}

	/**	Link to last page, plus ellipses if necessary */
	if ( ! in_array( $max, $links ) ) {
		if ( ! in_array( $max - 1, $links ) )
			echo '<li>…</li>' . "\n";

		$class = $paged == $max ? ' class="active"' : '';
		printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $max ) ), $max );
	}

	/**	Next Post Link */
	if ( get_next_posts_link() )
		printf( '<li>%s</li>' . "\n", get_next_posts_link() );

	echo '</ul></div>' . "\n";

}
/*		Walker for no links on wp_list_categoires
_________________________________________________*/
class Post_Category_Walker extends Walker_Category {

	private $term_ids = array();

	function __construct( $post_id, $taxonomy )  {
		// fetch the list of term ids for the given post
		$this->term_ids = wp_get_post_terms( $post_id, $taxonomy, 'fields=ids' );
	}

	function display_element( $element, &$children_elements, $max_depth, $depth=0, $args, &$output ) {
		$display = false;

		$id = $element->term_id;

		if ( in_array( $id, $this->term_ids ) ) {
			// the current term is in the list
			$display = true;
		}
		elseif ( isset( $children_elements[ $id ] ) ) {
			// the current term has children
			foreach ( $children_elements[ $id ] as $child ) {
				if ( in_array( $child->term_id, $this->term_ids ) ) {
					// one of the term's children is in the list
					$display = true;
					// can stop searching now
					break;
				}
			}
		}

		if ( $display )
			//parent::display_element( $element, &$children_elements, $max_depth, $depth, $args, &$output );
			parent::display_element( $element, $children_elements, $max_depth, $depth, $args, $output );
	}
}

function walk_post_categories( $post_id, $args = array() ) {
	$args = wp_parse_args( $args, array(
		'taxonomy' => 'cat'
	) );

	$args['walker'] = new Post_Category_Walker( $post_id, $args['taxonomy'] );

	$output = wp_list_categories( $args );
	if ( $output )
		return $output;
}

// add a favicon from your theme folder
function mytheme_favicon() { 
 echo '<link rel="shortcut icon" href="' . get_bloginfo('stylesheet_directory') . '/images/favicon.ico" >'; 
} 
add_action('wp_head', 'mytheme_favicon');


/*		Is Tree Function
		Finds children pages beyond immediate.
_________________________________________________*/
function is_tree($pid)
{
  global $post;

  $ancestors = get_post_ancestors($post->$pid);
  $root = count($ancestors) - 1;
  $parent = $ancestors[$root];

  if(is_page() && (is_page($pid) || $post->post_parent == $pid || in_array($pid, $ancestors)))
  {
    return true;
  }
  else
  {
    return false;
  }
};

// Custom Excerpt function for Advanced Custom Fields
/*function custom_field_excerpt() {
	global $post;
	$text = get_sub_field('description'); //Replace 'your_field_name'
	if ( '' != $text ) {
		$permalink = get_permalink($post->ID);
		$text = strip_shortcodes( $text );
		$text = apply_filters('the_content', $text);
		$text = str_replace(']]&gt;', ']]&gt;', $text);
		$excerpt_length = 5; // 20 words
		$excerpt_more = apply_filters('excerpt_more', ' ' . '<a href="'.$permalink.'">[...]</a>');
		$text = wp_trim_words( $text, $excerpt_length, $excerpt_more );
	}
	return apply_filters('the_excerpt', $text);
}*/
function acf_css_hack() {
   echo '<style type="text/css">
            .acf-image-uploader img[src=""] {
                min-height:100px;
                min-width:100px;
                width:100%;
            }
         </style>';
}
add_action('admin_head', 'acf_css_hack');

// ACF Options page
if( function_exists('acf_add_options_page') ) {acf_add_options_page();}