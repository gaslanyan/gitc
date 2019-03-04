<?php

/*
 * This file is part of the Dektrium project.
 *
 * (c) Dektrium project <http://github.com/dektrium>
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

use yii\helpers\Html;

/*
 * @var yii\web\View $this
 * @var yii\widgets\ActiveForm $form
 * @var dektrium\user\models\Profile $profile
 */

$this->title = Yii::t('user', 'Help');
?>



<div class="row">
    <div class="col-md-3">
        <?= $this->render('_menu') ?>
    </div>
    <div class="col-md-9">
        <div class="box box-primary">
            <div class="box-header">
                <?= Html::encode($this->title) ?>
            </div>
            <div class="box-body">
                
                <div class="text-center">
                    <b>Contact Me :</b>
                </div>
                <div style="margin-top: 20px; text-align: center">
                    Facebook : <a href="https://www.facebook.com" style="color: #5b9bd1">https://www.facebook.com/</a><br><br>
                    Mail : <a href="#" style="color: #5b9bd1">nikoghosyankaren@gmail.com</a><br><br>
                    Github : <a href="https://github.com/" style="color: #5b9bd1">https://github.com/</a><br><br>
                </div>
               
            </div>
        </div>
    </div>
</div>
