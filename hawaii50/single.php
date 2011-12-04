<?php get_header(); ?>
    <div id="bd">
        <div id="yui-main"> 
            <div class="yui-b">
                <div class="left">
                    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                        <div class="navigation navigation-top">
                            <div class="clearfix">
                                <div class="left"><?php previous_post_link('&laquo; %link') ?></div>
                                <div class="right"><?php next_post_link('%link &raquo;') ?></div>
                            </div>
                        </div>
                        <div class="posts">
                            <div class="post" id="post-<?php the_ID(); ?>">
                                <h2 class="title">
                                    <a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a>
                                </h2>
                                <div class="post-meta">
                                    <div class="clearfix">
                                        <div class="post-date"><?php the_time('F jS, Y') ?><?php edit_post_link('Edit', ' | ', ''); ?></div>
                                        <div class="post-comments">
                                            <?php if (function_exists('sociable_html')) { ?>
                                            <div class="share">
                                                <?php print sociable_html(); ?> 
                                            </div>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="entry">
                                    <?php the_content('Read the rest of this entry &raquo;'); ?>
                                </div>
                                <?php if (function_exists('similar_posts')) { ?>
                                <div class="related">
                                    <h3>Related posts that might interest you &raquo;</h3>
                                    <?php similar_posts(); ?>
                                </div>
                                <?php } ?>
                                <div class="page-metadata">
                                    This entry was posted on <?php the_time('l, F jS, Y') ?> at <?php the_time() ?>
                                    and is filed under <?php the_category(', ') ?>.<?php if (function_exists('the_tags')) { ?>  This entry has been tagged with <?php the_tags('',', ',''); ?>.<?php } ?>                               
                                </div>    
                            </div>
                        </div>
                        <?php comments_template(); ?>
                    <?php endwhile; else: ?>
                        <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>
