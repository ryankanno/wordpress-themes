<?php get_header(); ?>
<div role="main" class="container_12">
    <?php if (have_posts()) : ?>
    <div class="grid_10">
        <div class="posts">
        <?php while (have_posts()) : the_post(); ?>
            <div class="post" id="post-<?php the_ID(); ?>">
                <h2 class="title">
                    <a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a>
                    <?php if (function_exists('sociable_html')) { ?>
                    <div class="share">
                        <?php print sociable_html(); ?> 
                    </div>
                    <?php } ?>
                </h2>
                <div class="info clearfix">
                    <div class="date"><?php the_time('F jS, Y') ?></div>
                    <div class="comments">
                        &nbsp;&bull;&nbsp;<img src="<?php bloginfo('stylesheet_directory'); ?>/images/comment.png" align="absmiddle" style="margin-right:2px;"/><?php comments_popup_link('0 comments &#187;', '1 comment &#187;', '% comments &#187;'); ?>
                    </div>
                </div>
                <div class="entry">
                    <?php the_content('Read the rest of this entry &raquo;'); ?>
                </div>
                <p class="meta">
                    Posted in <?php the_category(', ') ?> | <?php edit_post_link('Edit', '', ' | '); ?>  <?php comments_popup_link('No comments &#187;', '1 comment &#187;', '% comments &#187;'); ?>
                </p>
                <?php if (function_exists('the_tags')) { ?>
                <p class="tags">
                    Tagged with <?php the_tags('',', ',''); ?>
                </p>
                <?php } ?>
            </div>
            <hr/>
        <?php endwhile; ?>
            <div class="nav clearfix">
                <span class="prev"><?php next_posts_link('&laquo; Previous Entries') ?></span>
                <span class="next"><?php previous_posts_link('Next Entries &raquo;') ?></span>
            </div>
        </div>
    </div>
    <?php else : ?> 
    <?php endif; ?>
<?php get_sidebar(); ?>
<?php get_footer(); ?>
