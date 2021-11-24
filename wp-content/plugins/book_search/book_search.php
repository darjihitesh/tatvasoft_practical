<?php 
/*
Plugin Name: Book Search
Author: Hitesh darji
Version: 1.0.1
Description: This plugin will search the book according provided filter data.
*/



/* Register the Books custom post type and its two taxonomies called Author and Publisher*/
?>
<style type="text/css">
	
	.slider {
  -webkit-appearance: none;
  width: 50% !important;
  height: 25px;
  background: #d3d3d3;
  outline: none;
  opacity: 0.7;
  -webkit-transition: .2s;
  transition: opacity .2s;
}

.slider:hover {
  opacity: 1;
}

.slider::-webkit-slider-thumb {
  -webkit-appearance: none;
  appearance: none;
  width: 25px;
  height: 25px;
  background: #04AA6D;
  cursor: pointer;
}

.slider::-moz-range-thumb {
  width: 25px;
  height: 25px;
  background: #04AA6D;
  cursor: pointer;
}

</style>
<?php
function Books(){
		register_post_type('Books',
		array(
			'labels' => array(
				'name' => 'Books',
				'singular_name' => 'Book',
				'menu_name' => 'Books',
			),
		'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields' ),	
		'taxonomies' => array('author','publisher'),
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'menu_position'       => 5,
        'can_export'          => true,
        'has_archive'         => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'post',
        'show_in_rest' => true,
		),
	);

	register_taxonomy('author',array('books'),
			array(
				'hierarchical' => true,
				'labels' => array(
						'name' => ' Author',
						'singular_name' => 'Author',
						'menu_name' => 'Author',
				),
			'query_var' => true,
			'rewrite' => array('slug' => 'Author'),
			'show_admin_column' => true,
			'show_ui' => true,
			'show_in_rest' => true,
			),
	);		

	register_taxonomy('publisher',array('books'),
			array(
				'hierarchical' => true,
				'labels' => array(
						'name' => 'Publisher',
						'singular_name' => 'Publisher',
						'menu_name' => 'Publisher',
				),
			'query_var' => true,
			'rewrite' => array('slug' => 'publisher'),
			'show_admin_column' => true,
			'show_ui' => true,
			'show_in_rest' => true,
			),
	);		
}
add_action('init','Books'); 

/* Shortcode for search form */

function search_form(){
$terms = get_terms( array(
    'taxonomy' => 'publisher',
    'hide_empty' => false,
) );

	$html = '<h2> Book Search </h2>
	<form action="#" id="search_book">
	<div class="form-container">
		
			<label>Book Name </label> 
			<input type="text" name="book_name" id="book_name"></p>
				
			<label>Author Name </label> 
			<input type="text" name="author_name" id="author_name"></p>
			<div class="innner-input">
			<label>Publisher</label> 
			<select name="publisher" id="publisher">';
			foreach($terms as $term){ 
				$test = $term->name;
				
			$html .= '<option value="'.$test.'">'.$test.'</option>';
			}	
			$html .= '</select>
			<div class="innner-input">
			<label>Rating </label> 
			<select name="rating" id="rating">
				<option value="1"> 1 </option>
				<option value="2"> 2 </option>
				<option value="3"> 3 </option>
				<option value="3"> 4 </option>	
				<option value="5"> 5 </option>	
			</select>
			<div class="innner-input">
			<label>Price </label> 
			<span>$1</span>
		  <input type="range" min="1" max="3000" value="1500" class="slider" id="myRange">
			<span>$3000</span>

			<input type="button" name="search_book" id="search_submit" value="Search">
		</div>			
	</form>';

	return $html;
}

add_shortcode('get_books','search_form');

?>
