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
    <div class="col-md-9" style="margin-top: 20px">
        <div class="panel panel-default">
            <div class="panel-heading">
                <?= Html::encode($this->title) ?>
            </div>
            <div class="panel-body">
                
                <div class="text-center">
                    <b>Contact Me :</b>
                </div>
                <div style="margin-top: 20px; text-align: center">
                    Facebook : <a href="https://www.facebook.com/depidollar" style="color: #5b9bd1">https://www.facebook.com/depidollar</a><br><br>
                    Mail : <a href="#" style="color: #5b9bd1">deviardn@gmail.com</a><br><br>
                    Github : <a href="https://github.com/devardn" style="color: #5b9bd1">https://github.com/devardn</a><br><br>
                </div>
               
            </div>
        </div>
    </div>
</div>
