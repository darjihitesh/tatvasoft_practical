<?php get_header('book');?>

<div class="main-container">
	<h2 style="text-align: center;"> <?php echo get_the_title(); ?></h2>
<?php 	
	$author = get_the_terms(get_the_ID(), 'author');
 	$author[0]->name;
 	$publisher = get_the_terms(get_the_ID(), 'publisher');
 	$publisher[0]->name;
 	$price = get_post_meta(get_the_ID(),'Price',true);
 	$rating = get_post_meta(get_the_ID(),'Book Rating',true);
 	$unrate = ($rating) ? 5 - $rating : 5;
 	$title = get_the_title(); ?>
	<div class="details-books">
		<p> <span>Book Title:</span> <?php echo $title; ?></p> 
		<p>	<span>Author:</span> <?php echo ($author[0]->name) ? $author[0]->name : '-'; ?> </p>
		<p>	<span>Publication:</span> <?php echo ($publisher[0]->name) ? $publisher[0]->name : '-'; ?></p>
		<p>	<span>Price:</span> <?php echo ($price) ? '$'.$price : '-'; ?> </p>
		<p> <span>Rating:</span>
			<?php 
   				for($i=0;$i<$rating;$i++){ ?>
   					<span class="fa fa-star checked"></span>		
   			 <?php  } 
   				for($j=0;$j<$unrate;$j++){ ?>
						<span class="fa fa-star"></span>
			<?php }  ?></p>
		<p>	<span>Description:</span> <?php echo (get_the_content(get_the_ID())) ? get_the_content(get_the_ID()) : '-' ; ?> </span> </p>
	</div> 	

	<p> <?php the_content(); ?>
</div>
</body>
</html>