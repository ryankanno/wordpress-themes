<?php // Do not delete these lines
    if ('comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
        die ('Please do not load this page directly. Thanks!');

    if (!empty($post->post_password)) { // if there's a password
        if ($_COOKIE['wp-postpass_' . COOKIEHASH] != $post->post_password) {  // and it doesn't match the cookie
?>

			<p class="nocomments">This post is password protected. Enter the password to view comments.</p>

			<?php
			return;
		}
	}

	/* This variable is for alternating comment background */
	$oddcomment = 'class="alt clearfix" ';
?>

<!-- You can start editing here. -->
<div id="comments">
    <?php if ($comments) : ?>
        <?php $i = 0; ?>
        <div class="num-comments"><?php comments_number('No responses', 'One response', '% responses' );?> to &#8220;<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>&#8221;</div>

    <ol class="comment-list">

    <?php foreach ($comments as $comment) : ?>
        <?php $i++; ?>
        <li <?php if($comment->comment_author == "ryankanno" && $comment->comment_author_email == 'ryankanno@localkinegrinds.com') echo ' class="clearfix admin" '; else echo $oddcomment; ?>id="comment-<?php comment_ID() ?>" class="clearfix">
                <table cellspacing=0 cellpadding=0 border=0>
                <tr valign="top">
                    <td>
                        <div class="gravatar">
                        <?php 
                        $size = 64;
                        if (function_exists('get_avatar')) {
                            echo get_avatar($comment, $size);
                        } else {
                            //alternate gravatar code for < 2.5
                            $grav_url = "http://www.gravatar.com/avatar.php?gravatar_id=" . md5($email) . "&default=" . urlencode($default) . "&size=" . $size;
                            echo "<img src='$grav_url'/>";
                        } ?>
                        </div>
                    </td>
                    <td>
                        <div class="comment">
                            <div class="comment-metadata">
                                <?php if ($comment->comment_approved == '0') : ?>
                                    <div class="moderated">Your comment is awaiting moderation.</div>
                                <?php endif; ?>
                                <span class="comment-author"><?php comment_author_link() ?> says</span>:<br/>
                                <a href="#comment-<?php comment_ID() ?>" title=""><?php comment_date('F jS, Y') ?> at <?php comment_time() ?></a> <?php edit_comment_link('edit','|&nbsp;',''); ?>
                            </div>
                            <?php comment_text() ?>
                        </div>
                    </td>
                </tr>
                </table>
    </li>

    <?php
    /* Changes every other comment to a different class */
    $oddcomment = ( empty( $oddcomment ) ) ? 'class="alt clearfix" ' : '';
    ?>

    <?php endforeach; /* end for each comment */ ?>

    </ol>
    
    <?php else : // this is displayed if there are no comments so far ?>

    <?php if ('open' == $post->comment_status) : ?>
    <!-- If comments are open, but there are no comments. -->
        
        <div id="no-comments">
            Aww.. no comments.  Would you like to be the first?
        </div>
        
    <?php else : // comments are closed ?>
    <!-- If comments are closed. -->

        <div id="closed-comments">
            At this time, comments are closed!
        </div>
        
    <?php endif; ?>
    <?php endif; ?>

    <?php if ('open' == $post->comment_status) : ?>
        <h3>Please leave a reply <span style="color:#000;">&#187;</span></h3>
        <?php if ( get_option('comment_registration') && !$user_ID ) : ?>
            <p>You must be <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php the_permalink(); ?>">logged in</a> to post a comment.</p>
        <?php else : ?>
            <form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="comment-form">
                <?php if ( $user_ID ) : ?>
                    <p style="font:bold .875em verdana; color:#333;">Logged in as <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?action=logout" title="Log out of this account">Logout &raquo;</a></p>
                <?php else : ?>
                    <p><input type="text" name="author" id="author" value="<?php echo $comment_author; ?>" size="22" tabindex="1" />
                    <label for="author" class="required">Name <?php if ($req) echo "(required)"; ?></label></p>

                    <p><input type="text" name="email" id="email" value="<?php echo $comment_author_email; ?>" size="22" tabindex="2" />
                    <label for="email" class="required">Mail (will not be published) <?php if ($req) echo "(required)"; ?></label></p>

                    <p><input type="text" name="url" id="url" value="<?php echo $comment_author_url; ?>" size="22" tabindex="3" />
                    <label for="url">Website</label></p>
                <?php endif; ?>
                    
                    <p><textarea name="comment" id="comment" rows="10" tabindex="4"></textarea></p>
                    <?php show_subscription_checkbox(); ?>
                    <input name="submit" type="submit" id="submit" tabindex="5" value="Submit Comment" />
                    <input type="hidden" name="comment_post_ID" value="<?php echo $id; ?>" />
                    <?php do_action('comment_form', $post->ID); ?>
            </form>
        <?php endif; ?>
    <?php endif; // if you delete this the sky will fall on your head ?>
</div>
