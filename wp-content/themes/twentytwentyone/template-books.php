<?php 
/*
Template Name: Books Template*/
get_header('book');

//$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
$args = array(
	'post_type' => 'books',
	'posts_per_page' => -1,
	'order' => 'desc',
//	'paged' => $paged
);
$result = new WP_Query( $args ); 
$count = 1;
?>

<div class="wrap">
<div id="primary" class="content-area">
<main id="main" class="site-main" role="main">

<?php echo do_shortcode('[get_books]'); ?>

<?php if ( $result-> have_posts() ) : ?>
<div id="pre_search">
	<table id="books">
	<th>No.</th>
	<th>Book Name</th>
	<th>Price</th>
	<th>Author</th>
	<th>Publisher</th>
	<th>Rating</th>	
<?php while ( $result->have_posts() ) : $result->the_post(); 

 	$author = get_the_terms(get_the_ID(), 'author');
 	$author[0]->name;
 	$publisher = get_the_terms(get_the_ID(), 'publisher');
 	$publisher[0]->name;
 	$price = get_post_meta(get_the_ID(),'Price',true);
 	$rating = get_post_meta(get_the_ID(),'Book Rating',true);
 	$unrate = ($rating) ? 5 - $rating : 5;
 	$title = get_the_title(); ?>
   <tr>
   		<td><?php echo $count; ?></td>
		<td><?php echo '<a href="'.get_the_permalink().'" target="_blank">'.get_the_title() .'</a>'; ?></td>
		<td><?php echo ($price) ? '$'.$price : '-'; ?></td>
   		<td><?php echo ($author[0]->name) ? $author[0]->name : '-'; ?></td>
   		<td><?php echo ($publisher[0]->name) ? $publisher[0]->name : '-'; ?></td>
   		<td>
   			<?php 
   				for($i=0;$i<$rating;$i++){ ?>
   					<span class="fa fa-star checked"></span>		
   			 <?php  } 
   				for($j=0;$j<$unrate;$j++){ ?>
						<span class="fa fa-star"></span>
			<?php	}
   			  ?>
   			</td>
   </tr>
     <?php 
     $count++;
	endwhile; 
	else:
		echo '<h2> No Data Found </h2>';
    endif; wp_reset_postdata();

?>
</table>
</div>
<div id="respond_search">

</div>
</main><!-- #main -->
</div><!-- #primary -->
</div><!-- .wrap -->
</body>
</html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript">
$(document).on('click',"#search_submit",function (){
	
	var book = $("#book_name").val();
	var author = $("#author_name").val();
	var publisher = $("#publisher").val();
	var rating = $("#rating").val();
	var myRange = $("#myRange").val();

	$.ajax({

		url : '<?php echo esc_url(admin_url('admin-ajax.php')) ?>',
		data : {
			book:book,
			author:author,
			publisher:publisher,
			rating:rating,
			myRange:myRange,
			action:'get_books'
		},
		type:"GET",
		dataType:"JSON",
		success:function (response){
			console.log(response);
			$("#pre_search").css('display','none');
			$('#respond_search').html(response);
		}
	});
})	
</script>