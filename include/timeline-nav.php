<?php
$prev_post_ts    		= null;
$prev_post_year  		= null;
$prev_post_month		= null;
?>
<div class="timeline-nav">
    <ul class="timeline-nav-inner">
        <?php
        while(have_posts()):the_post();
            $post_ts    =  strtotime( $post->post_date );
            $post_year  =  date( 'Y', $post_ts );
            $post_month =  date( 'm', $post_ts );
            if ( is_null( $prev_post_year ) ):
                ?>
                <li>
                <a class="timeline-nav-year" href="#"><?= $post_year;?></a>
                <ul class="timeline-nav-months">
            <?php
            elseif($prev_post_year != $post_year):
                ?>
                </ul>
                </li>
                <?php
                $working_year  =  $prev_post_year;

                /* Print year headings until we reach the post year */
                while ( $working_year > $post_year ) {
                    $working_year--;
                    if($working_year == $post_year){
                        ?>
                        <li>
                        <a class="timeline-nav-year" href="#"><?= $working_year; ?></a>
                    <?php
                    }
                }
                ?>
                <ul class="timeline-nav-months">
            <?php
            endif;
            if($post_month!=$prev_post_month):
                ?>
                <li>
                    <a href="<?= get_month_link($post_year, $post_month); ?>" class="jump-to-month"><?= get_the_date('F'); ?></a>
                </li>
                <?php
                $prev_post_month=$post_month;
            endif;
            $prev_post_ts    =  $post_ts;
            $prev_post_year  =  $post_year;
            endwhile;
            if(!is_null($prev_post_ts)):
            ?>
            </ul>
            </li>
            <?php
            endif;
        ?>
    </ul>
</div>