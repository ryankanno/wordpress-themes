<?php
/*
Template Name: Archives
*/
?>

<?php get_header(); ?>
    <div id="bd">
        <div id="yui-main"> 
            <div class="yui-b">
                <div class="left">
                    <div id="archives">
                        <table cellspacing=0 cellpadding=0 border=0 style="margin:auto;">
                            <tr valign="top">
                                <td style="text-align:left;">
                                    <h2>Archives by Month:</h2>
                                    <ul>
                                        <?php 
                                            // Declare some helper vars
                                            $previous_year = $year = 0;
                                            $previous_month = $month = 0;
                                            $ul_open = false;
 
                                            // Get the posts
                                            $posts = get_posts('numberposts=-1&orderby=date&order=DESC');
                                        ?>
 
                                        <?php foreach($posts as $post) : ?>	
 
                                        	<?php
                                        	// Setup the post variables
                                        	setup_postdata($post);
                                         
                                        	$year = mysql2date('Y', $post->post_date);
                                        	$month = mysql2date('n', $post->post_date);
                                        	$day = mysql2date('j', $post->post_date);         
                                        	?>
                                         
                                        	<?php if($year != $previous_year || $month != $previous_month) : ?>
                                        		<?php if($ul_open == true) : ?>
                                        		</ul>
                                        		<?php endif; ?> 
                                        		<h3 style="font:bold 1.4em verdana;"><?php the_time('F Y'); ?></h3>
                                         
                                        		<ul style="margin-top:1em; margin-bottom:1em;">
                                        		<?php $ul_open = true; ?>
                                        	<?php endif; ?>
                                        	<?php $previous_year = $year; $previous_month = $month; ?>
                                        	<li><span class="the_day" style="font-weight:bold;"><?php the_time('j'); ?></span> - <span class="the_article"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></span></li>
                                        <?php endforeach; ?>
                                    </ul>
                                </td>
                                <td style="width:5em;"></td>
                                <td style="text-align:left;">
                                    <h2>Archives by Subject:</h2>
                                    <ul>
                                         <?php wp_list_categories(); ?>
                                    </ul>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>
