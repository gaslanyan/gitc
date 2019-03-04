<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 10/18/2017
 * Time: 2:09 AM
 */
$this->title = $content['title'];
$this->params['breadcrumbs'][] = $this->title;

$this->registerMetaTag(['name' => 'keywords', 'content' => $content['title']]);
//
$this->registerMetaTag(['name' => 'description', 'content' => $content['title']]);

?>

<section class="gitc_wrapper region">
<!--    --><?php //var_dump(Content);?>
    <?php if(!empty($content['title'])):?>
        <h2 class="gitc_our">
            <?= $content['title']?>
        </h2>
        <article>
            <?= $content['description'];?>
            <div class="addthis_native_toolbox"></div>
        </article>
        <?= \frontend\widgets\EnrollWidget::widget(['title' => $content['title']]); ?>
    <?php endif?>

</section>