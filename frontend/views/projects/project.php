<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 10/18/2017
 * Time: 2:09 AM
 */
$this->title = $content['name'];


$this->params['breadcrumbs'][] = $this->title;


$this->registerMetaTag(['name' => 'keywords', 'content' => $content['keywords']]);

$this->registerMetaTag(['name' => 'description', 'content' => $content['description']]);

?>

<section class="gitc_wrapper project">
<!--    --><?php //var_dump(Content);?>
    <?php if(!empty($content['name'])):?>
        <h2 class="gitc_our">
            <?= $content['name']?>
        </h2>
        <article>
            <?= $content['content'];?>
        </article>
    <?php endif?>
</section>