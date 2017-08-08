<?php
/**
 * The loop that displays posts on the front page.
 *
 */
?>


<?php /* If there are no posts to display, such as an empty archive page */ ?>
<?php if ( ! have_posts() ) : ?>
	<article id="post-0" class="post error404 not-found">
		<h2 class="entry-title"><?php _e( 'Not Found', 'compass' ); ?></h2>
		<section class="entry-content">
			<p><?php _e( 'Sorry, but no results were found for the requested archive. Maybe a search will help you find what you&lsaquo;re looking for?', 'compass' ); ?></p>
			<?php get_search_form(); ?>
		</section><!-- .entry-content -->
	</article><!-- #post-0 -->
<?php endif; ?>

<?php
	/* Start the Loop */ 
	 ?>
<?php while ( have_posts() ) : the_post(); ?>

	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		

		<section class="thumbnail left half">
			
			<a href="<?php the_permalink(); ?>">
				<?php the_post_thumbnail( 'medium', array(
						'class' => 'alignleft'
						) ); ?>
			</a>		
		</section><!-- .entry-meta -->

		<section class="entry-content right half">

			<h3 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'compass' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h3>

			<?php do_action ( 'compass_postmeta_before' ); /* in functions.php, the compass_posted_on function is attached to this hook, which displays the post date */ ?>
				
			<?php the_excerpt( __( 'Read more <span class="meta-nav">&rarr;</span>', 'compass' ) ); ?>
			<a class="read-more button" href="<?php the_permalink(); ?>">Read More</a>
			<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'compass' ), 'after' => '</div>' ) ); ?>
		
			<?php do_action ( 'compass_postmeta_after' ); /* in functions.php, the compass_posted_in function is attached to this hook, which displays list of tags, categories etc. */ ?>
		</section><!-- .entry-content -->

		<section class="entry-utility">
			<span class="comments-link"><?php comments_popup_link( __( 'Leave a comment', 'compass' ), __( '1 Comment', 'compass' ), __( '% Comments', 'compass' ) ); ?></span>
			<?php edit_post_link( __( 'Edit', 'compass' ), '<span class="meta-sep">|</span> <span class="edit-link">', '</span>' ); ?>
		</section><!-- .entry-utility -->

	<?php do_action( 'compass_comments' ); /* action hook for comments - pluggable so you can override it if you don't want comments displayed */?>
	
	</article>


<?php endwhile; // End the loop. Whew. 

