<?php
/**
 * The template for displaying comments.
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package cosmica
 */
?>
<?php if ( post_password_required() ) : ?>
	<p><?php _e( 'This post is password protected. Enter the password to view any comments.', 'cosmica' ); ?></p>
<?php return;
endif; ?>
<?php if ( have_comments() ) : ?>
<div id="comments" class="col-md-12">	
	<h2><?php echo comments_number(__('No Comments','cosmica'), __('1 Comment','cosmica'), '% Comments'); ?></h2>
	<?php wp_list_comments( array( 'callback' => 'cosmica_comments' ) ); ?>		
	<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
	<nav id="comment-nav-below" class="row pagination bp_blog_pagination">
		<h1 class="screen-reader-text"><?php _e( 'Comment navigation', 'cosmica' ); ?></h1>
		<ul class="pager">
			<li class="nav-previous previous"><?php previous_comments_link( __( 'Previous Comments', 'cosmica' ) ); ?>
			</li>
			<li class="nav-next next"><?php next_comments_link( __( 'Next Comments', 'cosmica' ) ); ?>
			</li>
		</ul>
	</nav>
<?php endif;  ?>
</div>		
<?php endif; ?>
<?php if ( comments_open() ) : ?>
	<div class="cosmica_comment_form col-md-12">
		<?php  comment_form(); ?>		
	</div>
<?php endif; // If registration required and not logged in ?>