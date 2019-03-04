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
<!--  Result start-->
<div class="gitc_circle-block">
    <!-- Trained Students Chart -->
    <?php if (!empty($result)): ?>
        <?php foreach ($result as $index => $item) : ?>
            <div class="gitc_chart">
                <div class="chart">
                    <div><span class="chart_orange"><?= $item['count'];?></span></div>

                    <svg width="200" height="200">
                        <circle class="outer" cx="82" cy="82" r="82" transform="rotate(-90, 97, 82)"></circle>
                    </svg>
                </div>
                <input type="hidden" value="<?= $item['persent'];?>">
                <p><?= Yii::t('app',$item['name']);?></p>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>

</div>

<!--  Result end-->
