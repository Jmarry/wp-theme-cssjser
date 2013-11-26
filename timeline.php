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
    $json=Array('posts'=>array());
    while($the_query->have_posts()):
        $the_query->the_post();
        $post_year_month  =  get_the_date('F Y');
        $arr=array(
            'title'=>get_the_title(),
            'link'=>get_permalink(),
            'content'=>get_the_content(),
            'date'=>get_the_date('M j, Y'),
            'author'=>get_the_author(),
            'category'=>J_post_categories(),
            'commentNum'=>get_comments_number(),
            'class'=>join( ' ', get_post_class())
        );
        if(is_null($json['posts'][$post_year_month])):
            $json['posts'][$post_year_month]=array();
        endif;
        array_push($json['posts'][$post_year_month],$arr);
    endwhile;
    echo json_encode($json);
    die();
}