<?php
/**
 * The default template for displaying content.
 *
 * Used for both single and index/archive/author/catagory/search/tag.
 *
 * @package Odin
 * @since 2.2.0
 */
?>

<?php if ( is_single() ): ?>
	
	<?php $gallery = get_post_meta( get_the_ID(), 'photos_plupload', true ); ?>

	<?php if ( !empty( $gallery ) ): ?>
		<?php foreach ( explode( ',', $gallery ) as $image_id ) {
			$image = wp_get_attachment_image_src( $image_id, 'photos-thumb' );
			echo '<a class="fancybox" rel="group" href='. wp_get_attachment_url( $image_id ) .'>';
			echo '<img src='. $image[0] .' alt="'. get_the_title() .'" class="each photos col-sm-3 nopadding">';
			echo '</a>';
		} ?>
	<?php endif; ?>

<?php else: ?>

	<?php if ( has_post_thumbnail() ): ?>
		<article id="post-<?php the_ID(); ?>" <?php post_class( 'each photos col-sm-3 nopadding' ); ?>>
			<a href="<?php the_permalink(); ?>">
				<?php the_post_thumbnail( 'photos-thumb' ); ?>
			</a>
		</article><!-- #post-## -->
	<?php endif; ?>

<?php endif; ?>
