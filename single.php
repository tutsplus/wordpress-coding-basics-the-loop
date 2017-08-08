<?php
/**
 * The Template for displaying all single posts.
 *
 */

get_header(); ?>

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<h2 class="entry-title"><?php the_title(); ?></h2>
		<section class="entry-meta">
			<?php do_action ( 'compass_postmeta_before' ); /* in functions.php, the compass_posted_on function is attached to this hook, which displays the post date */ ?>
		</section><!-- .entry-meta -->

		<section class="entry-content">
			<?php the_content(); ?>
			<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'compass' ), 'after' => '</div>' ) ); ?>
		</section><!-- .entry-content -->

		<section class="entry-utility">
			<?php do_action ( 'compass_postmeta_after' ); /* in functions.php, the compass_posted_in function is attached to this hook, which displays list of tags, categories etc. */ ?>
		</section><!-- .entry-utility -->
	</article><!-- #post-## -->

	<?php compass_page_links(); ?>

	<?php do_action( 'compass_comments' ); /* action hook for comments - pluggable so you can override it if you don't want comments displayed */?>

<?php endwhile; // end of the loop. ?>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
