<div class="wtpsw-post-items">
    <ul>
        <?php while ($wtpsw_posts->have_posts()) : $wtpsw_posts->the_post();

            global $post;

            $wtpsw_stats    = array(); // Need to flush
            $comment_text   = wtpsw_get_comments_number( $post->ID, $hide_empty_comment_count );
        ?>

            <li class="wtpsw-post-li">
                <?php if( $show_thumb == 'true' ) { ?>
                <div class="wtpsw-post-thumb-left">
                    <a href="<?php the_permalink(); ?>">
                    <?php
                    if ( function_exists('has_post_thumbnail') && has_post_thumbnail() ) {
                        the_post_thumbnail( array(100, 100) );
                    }
                    ?>
                    </a>
                </div>
                <?php } ?>

                <div class="wtpsw-post-thumb-right">
                    <h6> <a class="wtpsw-post-title" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h6>
                    
                    <?php if( $show_date == "true" ) { ?>
                    <div class="wtpsw-date-post">
                        <?php echo ($show_date == "true") ? get_the_date() : '' ; ?>
                    </div>
                    <?php } ?>

                    <div class="wtpsw-post-stats">
                        <?php if( $show_author == 'true' ) {
                        $wtpsw_stats[] = "<span class='wtpsw-post-author'>".__('By ', 'wtpsw')."<a href='".get_author_posts_url( $post->author )."'>".get_the_author()."</a></span>";
                        } ?>

                        <?php if( $show_comment_count == 'true' && $comment_text ) {
                        $wtpsw_stats[] = "<span class='wtpsw-post-comment'>".$comment_text."</span>";
                        } ?>

                        <?php echo join( ' | ', $wtpsw_stats ); ?>
                    </div>

                    <?php if($show_content == 'true') { ?>
                    <div class="wtpsw-post-cnt">
                        <?php echo wtpsw_get_post_excerpt( $post->ID, null, $content_length );  ?>
                    </div>
                    <?php } ?>
                </div>
            </li>

        <?php
        endwhile;

        wp_reset_postdata(); // Reset WP Query
    ?>
    </ul>
</div>