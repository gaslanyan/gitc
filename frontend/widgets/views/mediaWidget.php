<?php

/**
 * Created by PhpStorm.
 * User: user
 * Date: 5/5/2016
 * Time: 9:29 PM
 */
use backend\assets\AppAsset;

AppAsset::register($this);

?>
<!--  Banner start-->
<section id="gitc_banner" data-video="image/banner">
    <div class="gitc_inner-enroll">
<!---->
<!--        --><?php //if (Yii::$app->request->get('slug') !== "about") :?>
<!--        -->
<!--        --><?php //endif; ?>
    </div>
    <div id="gitcCarousel" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <?php if (!empty($media)): ?>

        <ol class="carousel-indicators">
            <?php foreach ($media as $key => $v): ?>
            <li data-target="#gitcCarousel"
                data-slide-to="<?= $key; ?>" <?php if ($key == 0) echo 'class="active"' ?>></li>
            <?php endforeach; ?>
        </ol>

    <!-- Wrapper for slides -->
        <div class="carousel-inner">
            <?php foreach ($media as $key => $v): ?>
            <div class="item <?php if ($key == 0) echo 'active'; ?>">
                <img src="<?= Yii::$app->params['uploads'] . Yii::$app->params['media'] . $v; ?>" alt="">
            </div>
            <?php endforeach; ?>

        </div>
        <?php endif; ?>
        <!--    <iframe src="https://www.facebook.com/plugins/video.php?href=https%3A%2F%2Fwww.facebook.com%2Fgyumri.gtech%2Fvideos%2F1914355722114552%2F&show_text=0&width=560&autoplay=1"-->
        <!--            width="100%" height="545" style="border:none;overflow:hidden"-->
        <!--            scrolling="no" frameborder="0" allowTransparency="true"-->
        <!--            allowFullScreen="true"></iframe>-->
</section>

<!--  Banner end-->
