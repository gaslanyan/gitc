<?php

/**
 * Created by PhpStorm.
 * User: user
 * Date: 5/5/2016
 * Time: 9:29 PM
 */
use backend\assets\AppAsset;
use yii\bootstrap\Html;

AppAsset::register($this);

?>
<div class="modal fade" id="my-modal" tabindex="-1" role="dialog"
     aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-body">
                <?php

                if (!empty($media)) {
                    foreach ($media as $k=>$src) {
                        echo "<div class='file-previews'>";
                        echo Html::img(Yii::$app->params['imagesPath'] . Yii::$app->params['frontend_upload_path'] .
                            Yii::$app->params['media'] . $src['name'], [
                            'alt' => 'media',
                            'title' => 'media',
                            'class' => 'file-preview-image'
                        ]);
                        if (Yii::$app->controller->id === "slider") {
                            echo Html::checkbox('add_img', false, ['id' => $src['id'],
                                'value'=>$k]);
                            echo "</div>";
                        } else {
                            echo Html::radio('add_img', false, ['id' => $src['id']]);
                            echo "</div>";
                        }
                    }
                }
                ?>
            </div>
            <?= "<br><div class='insert'>" . Html::button(Yii::t('app',
                'Insert media'), ['class' => 'btn btn-success', 'id' => 'insert',
                'name' => 'insert']) . "</div>" ?>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<?php
$this->registerJsFile(
    'http://gitc.am/backend/web/js/modal.js',
    ['depends' => 'backend\assets\AppAsset']
);
?>
