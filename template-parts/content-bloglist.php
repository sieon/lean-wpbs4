<?php
/**
 * The template part for displaying results in search pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package start
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('entry mb-4 row'); ?>>

	<?php if(has_post_thumbnail()) : ?>
	<div class="col-lg-3">
		<a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true">
			<?php
				// Post thumbnail.
				lean_post_thumbnail();
			?>
		</a>
	</div>
	<div class="col-lg-9">
	<?php else : ?>
	<div class="col-lg-12">
	<?php endif; ?>

		<header class="entry-header">
			<?php the_title( sprintf( '<h3 class="mt-0 mb-2"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h3>' ); ?>

			<?php if ( 'post' == get_post_type() ) : ?>
			<div class="mb-2">
				<small><?php echo the_time(); ?></small>
			</div><!-- .entry-meta -->
			<?php endif; ?>
		</header>

		<div class="entry-content">
			<?php the_excerpt(); ?>
		</div>

		<footer class="entry-footer pb-2">
			<small class="text-muted"><?php echo get_the_author(); ?>&nbsp;<?php lean_entry_footer(); ?></small>
		</footer><!-- .entry-footer -->
	</div>
</article><!-- #post-## -->