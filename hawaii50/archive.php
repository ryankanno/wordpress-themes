<?php get_header(); ?>
    <div id="bd">
        <div id="yui-main"> 
            <div class="yui-b">
                <div class="left">
                    <?php if (have_posts()) : ?>
                        <?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
                        <?php /* If this is a category archive */ if (is_category()) { ?>
                            <h2 class="pagetitle">Archive for the &#8216;<?php single_cat_title(); ?>&#8217; Category</h2>
                        <?php /* If this is a daily archive */ } elseif (is_day()) { ?>
                            <h2 class="pagetitle">Archive for <?php the_time('F jS, Y'); ?></h2>
                        <?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
                            <h2 class="pagetitle">Archive for <?php the_time('F, Y'); ?></h2>
                        <?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
                            <h2 class="pagetitle"><?php the_time('Y'); ?> Archives</h2>
                        <?php /* If this is an author archive */ } elseif (is_author()) { ?>
                            <h2 class="pagetitle">Author Archive</h2>
                        <?php /* If this is an author archive */ } elseif (is_tag()) { ?>
                            <h2 class="pagetitle">Tag Archive &raquo; &#8216;<?php single_tag_title(); ?>&#8217;</h2>
                        <?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
                            <h2 class="pagetitle">Blog Archives</h2>
                        <?php } ?>
                        
                        <div class="posts">
                            <?php while (have_posts()) : the_post(); ?>
                                <div class="post" id="post-<?php the_ID(); ?>">
                                    <h2 class="title">
                                        <a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a>
                                    </h2>
                                    <div class="post-meta">
                                        <div class="clearfix">
                                            <div class="post-date"><?php the_time('F jS, Y') ?><?php edit_post_link('Edit', ' | ', ''); ?></div>
                                        </div>
                                    </div>
                                    <div class="entry">
                                        <?php 
                                             the_content("Continue reading &raquo;" . the_title('', '', false)); 
                                         ?> 
                                    </div>
                                    <?php if (function_exists('the_tags')) { ?>  
                                    <p class="tags">
                                        Tagged: <?php the_tags('',', ',''); ?>.
                                    </p>
                                    <?php } ?>
                                </div>
                                <hr/>    
                            <?php endwhile; ?>
                                <div class="navigation">
                                    <div class="clearfix">
                                        <div class="left"><?php next_posts_link('&laquo; Older entries ') ?></div>
                                        <div class="right"><?php previous_posts_link('Newer entries &raquo;') ?></div>
                                    </div>
                                </div>
                            <?php else : ?>
                                <h2 class="center">Not Found</h2>
                                <?php include (TEMPLATEPATH . '/searchform.php'); ?>
                        	<?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
<?php get_sidebar(); ?>

<?php get_footer(); ?>
