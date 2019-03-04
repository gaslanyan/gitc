<?php

$this->title = $content['name'];

//$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'News & Events'), 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;

$this->registerMetaTag(['name' => 'keywords', 'content' => $content['keywords']]);
$this->registerMetaTag(['name' => 'description', 'content' => $content['description']]);

$getRequest = Yii::$app->request->get();

if (!empty($thread)): ?>


    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                <h2 class="text-center text-uppercase">
                    <?= Yii::t('app', 'Other news') ?></h2>
                <ul class="list-group news-sidebar">
                    <?php foreach ($news as $value) { ?>
                        <li class="list-group-item">
                            <a href="<?= $value['slug']; ?>"><?= $value['content']['name'] ?></a></li>
                    <?php } ?>
                </ul>
            </div>
            <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 news-content">

                <h2 class="text-center text-uppercase">
                    <?= $content['name']; ?>
                </h2>

                <p><?= $content['content']; ?></p>

            </div>


        </div>
    </div>

<?php endif; ?>
<script>
    $('.arrow_staff, .arrow_lecture').on('click', function () {
        $id = $(this).prev().attr('id');
        if ($id === 'show')
            $(this).prev().removeAttr('id');
        else
            $(this).prev().attr('id', 'show');
    });
</script>
