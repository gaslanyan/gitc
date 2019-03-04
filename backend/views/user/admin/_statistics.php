<div class="row">
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-aqua">
            <div class="inner">
                <h3><?= $queryTotalUser = \backend\models\User::find()->count(); ?></h3>
                <p>Total Users</p>
            </div>
            <div class="icon">
                <i class="fa fa-users"></i>
            </div>
            <a href="<?= \yii\helpers\Url::to(['/statistic-user/']); ?>" class="small-box-footer">
                More info <i class="fa fa-arrow-circle-right"></i>
            </a>
        </div>
    </div><!-- ./col -->
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-green">
            <div class="inner">
                <h3><?= $queryConfirmed = \backend\models\User::find()->where(['not', ['confirmed_at' => null]])->count(); ?></h3>
                <p>User Confirmed</p>
            </div>
            <div class="icon">
                <i class="fa fa-child"></i>
            </div>
            <a href="<?= \yii\helpers\Url::to(['/statistic-user/']); ?>" class="small-box-footer">
                More info <i class="fa fa-arrow-circle-right"></i>
            </a>
        </div>
    </div><!-- ./col -->
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-yellow">
            <div class="inner">
                <h3><?= $queryRegistration = \backend\models\User::find()->where(['confirmed_at' => null])->count(); ?></h3>
                <p>User Registrations</p>
            </div>
            <div class="icon">
                <i class="fa fa-user-plus"></i>
            </div>
            <a href="<?= \yii\helpers\Url::to(['/statistic-user/']); ?>" class="small-box-footer">
                More info <i class="fa fa-arrow-circle-right"></i>
            </a>
        </div>
    </div><!-- ./col -->
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-red">
            <div class="inner">
                <h3><?= $queryBlock = \backend\models\User::find()->where(['not', ['blocked_at' => null]])->count(); ?></h3>
                <p>Users Block</p>
            </div>
            <div class="icon">
                <i class="fa fa-user-times"></i>
            </div>
            <a href="<?= \yii\helpers\Url::to(['/statistic-user/']); ?>" class="small-box-footer">
                More info <i class="fa fa-arrow-circle-right"></i>
            </a>
        </div>
    </div><!-- ./col -->
</div>