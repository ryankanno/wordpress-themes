    <div class="grid_2">
        <div id="sidebar">
            <ul>
            <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar() ) : ?>       
                <li>
                    <form action="http://www.google.com/cse" id="cse-search-box" target="_blank">
                        <input type="hidden" name="cx" value="partner-pub-1122441464427354:v4ls38714q2" />
                        <input type="text" name="q" size="12"/>
                        <input type="submit" name="sa" value="Search" /> 
                    </form>
                    <script type="text/javascript" src="http://www.google.com/coop/cse/brand?form=cse-search-box&amp;lang=en"></script>
                </li>
                <?php if (function_exists('get_recent_posts')) { ?>
                <li>
                    <h2><?php _e('Recent Posts'); ?></h2>
                    <ul>
                        <?php get_recent_posts(10); ?>
                    </ul>
                </li>
                <?php } ?>

                <?php /* If this is a 404 page */ if (is_404()) { ?>
                <?php /* If this is a category archive */ } elseif (is_category()) { ?>
                    <?php if (function_exists('akpc_most_popular_in_cat')) { ?>
                    <li>
                        <h2>Most Popular in '<?php single_cat_title(''); ?>'</h2>
                        <ul>
                            <?php akpc_most_popular_in_cat(5); ?>
                        </ul>
                    </li>
                    <?php } ?>

                    <?php /* If this is a yearly archive */ } elseif (is_day()) { ?>
                    <p>You are currently browsing the <a href="<?php echo get_settings('siteurl'); ?>"><?php echo bloginfo('name'); ?></a> weblog archives
                    for the day <?php the_time('l, F jS, Y'); ?>.</p>

                    <?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
                    <p>You are currently browsing the <a href="<?php echo get_settings('siteurl'); ?>"><?php echo bloginfo('name'); ?></a> weblog archives
                    for <?php the_time('F, Y'); ?>.</p>

                    <?php if (function_exists('akpc_most_popular_in_month')) { ?>
                    <li>
                        <h2>Most Popular in <?php the_time('F, Y'); ?></h2>
                        <ul>
                            <?php akpc_most_popular_in_month(5); ?>
                        </ul>
                    </li>
                    <?php } ?>
                <?php } ?>

                <?php if (!is_archive() && !is_category()) { ?>

                    <?php if (function_exists('get_recent_comments')) { ?>
                    <li>
                        <h2><?php _e('Recent Comments'); ?></h2>
                        <ul id="recent_comments">
                            <?php get_recent_comments(); ?>
                        </ul>
                    </li>
                    <?php } ?>  
                <?php } ?>
            <?php endif; ?>
            </ul>
        </div>
    </div>
    <div class="clear"></div>
</div>
