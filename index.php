<?php
/**
 * Created by JetBrains PhpStorm.
 * User: wb-wangyuefei
 * Date: 13-11-21
 * Time: 下午5:04
 * To change this template use File | Settings | File Templates.
 */
get_header();
?>
<div class="timeline-wrapper">
    <?php get_template_part( 'include/timeline-nav'); ?>
    <div id="timeline">
        <div class="timeline-wrap">
            <!--        时间线-->
            <div class="timeline-bar"></div>
            <!--        开始的原点-->
            <div class="timeline-start-dot"></div>
            <!--        内容-->
            <div class="timeline-inner">
                <!--            月份列表-->
                <div class="timeline-column-month">
                    <h3 class="timeline-month">
                        <a class="timeline-jump" href="#"></a>
                        <span>十一月 2013</span>
                    </h3>
                    <div class="timeline-month-inner">
                        <article class="timeline-post">
                            <div class="post-inner">
                                <span class="post-icon"></span>
                                <time class="post-date">
                                    <span>十一 21, 2013</span>
                                </time>
                                <h1 class="post-title">
                                    <a href="#">世界，你好！</a>
                                </h1>
                                <div class="post-content">
                                    <p>欢迎使用WordPress。这是系统自动生成的演示文章。编辑或者删除它，然后开始您的博客！</p>
                                    <p class="post-meta">
                                    <span class="post-author">
                                        <a href="#" title="由Jmarry发布" rel="author">Jmarry</a>
                                        <em>·</em>
                                    </span>
                                    <span class="post-category">
                                        <a href="#" title="查看未分类中的全部文章" rel="category">未分类</a>
                                        <em>·</em>
                                    </span>
                                    <span class="post-comment">
                                        <a href="#" title="《世界，你好！》上的评论" rel="comment"> 1 Comment</a>
                                    </span>
                                    </p>
                                </div>
                                <div class="post-dot"></div>
                                <div class="post-arrow"></div>
                            </div>
                        </article>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
get_footer();
?>