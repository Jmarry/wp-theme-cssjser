<?php
/**
 * Created by JetBrains PhpStorm.
 * User: wb-wangyuefei
 * Date: 13-11-25
 * Time: 下午6:52
 * To change this template use File | Settings | File Templates.
 */
require_once('timeline.php');
function J_post_categories(){
    $categories=get_the_category();
    $cates=array();
    foreach($categories as $category){
        array_push($cates,array($category->name=>get_category_link($category->term_id)));
    }
    return $cates;
}
add_action('wp_enqueue_scripts','J_scripts_and_styles');
function J_scripts_and_styles(){
    $version='1.0.0';
    wp_enqueue_style('style',get_template_directory_uri().'/style.css',Array(),$version,false);
    wp_enqueue_script('zepto',get_template_directory_uri().'/js/zepto.js',Array(),$version,true);
    wp_localize_script('zepto','globle_config',Array(
        'ajaxUrl'=>admin_url().'admin-ajax.php'
    ));
    wp_enqueue_script('timeline',get_template_directory_uri().'/js/timeline.js',Array(),$version,true);
}
?>