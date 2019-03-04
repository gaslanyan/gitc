<?php
$this->title = Yii::t('app', 'Regions');
$this->params['breadcrumbs'][] = $this->title;

$this->registerMetaTag(['name' => 'keywords', 'content' => Yii::t('app', 'IT courses in')]);
$this->registerMetaTag(['name' => 'description', 'content' => Yii::t('app', 'IT courses in')]);
?>
<section class="gitc_wrapper">
    <?php if (!empty($regions)): ?>
        <div class="region_content">
        <?php foreach ($regions as $index => $item): ?>
            <figur class="gitc_region">
                <img src="<?= $item['img_name'];?>" alt="">
                <figcaption>
                <a href="<?= Yii::$app->homeUrl ?>regions/<?= $item['region']; ?>">
                    <?= $item['content']['title'];?>
                </a>
                </figcaption>
            </figur>

        <?php endforeach; ?>
        </div>
    <?php endif; ?>
</section>