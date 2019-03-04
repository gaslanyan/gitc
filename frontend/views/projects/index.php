<?php
$this->title = Yii::t('app', 'Projects');
$this->params['breadcrumbs'][] = $this->title;

$this->registerMetaTag(['name' => 'keywords', 'content' => Yii::t('app', 'News & Events')]);
$this->registerMetaTag(['name' => 'description', 'content' => Yii::t('app', 'News & Events')]);
?>
<section class="gitc_wrapper">
    <?php if (!empty($projects)): ?>
        <div class="project_content">
        <?php foreach ($projects as $index => $item): ?>
            <figur class="gitc_project">
                <img src="<?= $item['img_name'];?>" alt="">
                <figcaption>
                <a href="<?= Yii::$app->homeUrl ?>projects/<?= $item['slug']; ?>">
                    <?= $item['content']['name'];?>
                </a>
                </figcaption>
            </figur>

        <?php endforeach; ?>
        </div>
    <?php endif; ?>
</section>