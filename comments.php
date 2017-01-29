<?php
/**
 * Template for displaying Comments
 *
 * The area of the page that contains both current comments
 * and the comment form. The actual display of comments is
 * handled by a callback to twentyten_comment which is
 * located in the functions.php file.
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 */
?>

			<div id="comments">
<?php if ( post_password_required() ) : ?>
				<p class="nopassword"><?php echo( 'Dieser Post ist passwortgeschützt.'); ?></p>
			</div><!-- #comments -->
<?php
		/*
		 * Stop the rest of comments.php from being processed,
		 * but don't kill the script entirely -- we still have
		 * to fully load the template.
		 */
		return;
	endif;
?>

<?php
	// You can start editing here -- including this comment!
comment_form();
?>
<div class="clear"></div>

<?php if ( have_comments() ) : ?>

			<h3 id="comments-title"><?php
			/*printf( n( 'One Response to %2$s', '%1$s Responses to %2$s', get_comments_number()),
			number_format_i18n( get_comments_number() ), '<em>' . get_the_title() . '</em>' );
			*/?></h3>

<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
			<div class="navigation">
				<div class="nav-previous"><?php previous_comments_link( '<span class="meta-nav">&larr;</span> Older Comments' ); ?></div>
				<div class="nav-next"><?php next_comments_link( 'Newer Comments <span class="meta-nav">&rarr;</span>' ); ?></div>
			</div> <!-- .navigation -->
<?php endif; // check for comment navigation ?>

			<ol class="commentlist">
				<?php
					wp_list_comments(array('avatar_size' => '70'));;
				?>
			</ol>

<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
			<div class="navigation">
				<div class="nav-previous"><?php previous_comments_link( '<span class="meta-nav">&larr;</span> Older Comments' ); ?></div>
				<div class="nav-next"><?php next_comments_link( 'Newer Comments <span class="meta-nav">&rarr;</span>' ); ?></div>
			</div> <!-- .navigation -->
<?php endif; // check for comment navigation ?>

<?php endif; // end have_comments() ?>
	<?php
	/*
	 * If there are no comments and comments are closed, let's leave a little note, shall we?
	 */
	if ( ! comments_open() ) : ?>
		<p class="nocomments"><?php echo( 'Die Kommentare sind geschlossen.' ); ?></p>
	<?php endif;  ?>

</div><!-- #comments -->
