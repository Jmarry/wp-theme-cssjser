<?php
/**
 * Created by JetBrains PhpStorm.
 * User: wb-wangyuefei
 * Date: 13-11-25
 * Time: 下午3:36
 * To change this template use File | Settings | File Templates.
 */
add_action('wp_ajax_timeline','timeline');
add_action('wp_ajax_nopriv_timeline','timeline');
function timeline(){
    $paged = @ (int) $_GET['paged'];
    $paged=$paged>0?$paged:1;
    $args = array(
        'posts_per_page' => 10,
        'paged'=>$paged
    );
    $the_query=new WP_Query($args);
    $json=Array('postCount'=>$the_query->post_count,'posts'=>array());
    while($the_query->have_posts()):
        $the_query->the_post();
        array_push($json['posts'],array(
            'title'=>get_the_title(),
            'link'=>get_permalink(),
            'content'=>get_the_content(),
            'date'=>get_the_date('M j, Y'),
            'author'=>get_the_author(),
            'category'=>cssjser_post_categories(),
            'commentNum'=>get_comments_number(),
            'class'=>join( ' ', get_post_class())
        ));
    endwhile;
    echo json_encode($json);
    die();
}