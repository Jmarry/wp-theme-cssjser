<?php
/**
 * Created by JetBrains PhpStorm.
 * User: wb-wangyuefei
 * Date: 13-11-25
 * Time: 下午6:52
 * To change this template use File | Settings | File Templates.
 */
require_once('timeline.php');
function cssjser_post_categories(){
    $categories=get_the_category();
    $cates=array();
    foreach($categories as $category){
        array_push($cates,array($category->name=>get_category_link($category->term_id)));
    }
    return $cates;
}
add_action('wp_enqueue_scripts','cssjser_scripts_and_styles');
function cssjser_scripts_and_styles(){

}
?>