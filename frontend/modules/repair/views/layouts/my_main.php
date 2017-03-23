<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\MyAsset;
use common\widgets\Alert;

\frontend\assets\MyAsset::register($this);
?>


<!DOCTYPE html>
<div >    
    <img class="img-responsive" src="img/bg6.jpg" alt="..." style="width: 100%; height: 210px;">  
</div>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => Yii::$app->name,
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar',
        ],
    ]);
    $menuItems = [
        ['label' => 'สมาชิก', 'url' => ['/customers/index']],
        ['label' => 'แจ้งซ่อม', 'url' => ['/repair/repairs/index']],
        ['label' => 'Home', 'url' => ['/site/index']],
        ['label' => 'About', 'url' => ['/site/about']],
        ['label' => 'Contact', 'url' => ['/site/contact']],
    ];
    if (Yii::$app->user->isGuest) {
        $menuItems[] = ['label' => 'Signup', 'url' => ['/site/signup']];
        $menuItems[] = ['label' => 'Login', 'url' => ['/site/login']];
    } else {
        $menuItems[] = '<li>'
            . Html::beginForm(['/site/logout'], 'post')
            . Html::submitButton(
                'Logout (' . Yii::$app->user->identity->username . ')',
                ['class' => 'btn btn-link logout']
            )
            . Html::endForm()
            . '</li>';
    }
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => $menuItems,
    ]);
    NavBar::end();
    ?>
    
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">

<div class="container-fluid">
         <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <div class="row">
            <div class="col-xs-2 col-sm-2 col-md-2">                
                <div class="list-group">
                    <div class="list-group-item active">
                        <left><i class="glyphicon glyphicon-list-alt"></i> เมนู</left>
                    </div>                     
                    <a href="<?php echo yii\helpers\Url::to(['/repair/repairs/index'])?>" class="list-group-item">
                        <i class="glyphicon glyphicon-pencil"></i> แจ้งซ่อม
                    </a>
                    <a href="<?php echo yii\helpers\Url::to(['/repair/repairs/indexapprove'])?>" class="list-group-item">
                        <i class="glyphicon glyphicon-search"></i> หน.รับงาน
                    </a>
                    <a href="<?php echo yii\helpers\Url::to(['/repair/repairs/indexengineer'])?>" class="list-group-item">
                        <i class="glyphicon glyphicon-search"></i> ช่างซ่อม
                    </a>
                    <a href="<?php echo yii\helpers\Url::to(['/repair/repairs/report1'])?>" class="list-group-item">
                        <i class="glyphicon glyphicon-search"></i> รายงาน1
                    </a>
                    <a href="<?php echo yii\helpers\Url::to(['/repair/repairs/report2'])?>" class="list-group-item">
                        <i class="glyphicon glyphicon-search"></i> รายงาน2
                    </a>
                  </div>
                
                <div class="list-group">
                    <div class="list-group-item active">
                        <left><i class="glyphicon glyphicon-list-alt"></i> TEST</left>
                    </div>                     
                    <a href="<?php echo yii\helpers\Url::to(['/main/index'])?>" class="list-group-item">
                        <i class="glyphicon glyphicon-bookmark"></i> Sub-form
                    </a>
                    
                  </div>
                
            </div>
            <div class="col-xs-10 col-sm-10 col-md-10">                
                <?= $content ?>
            </div>
        </div>
        
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; My Company <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
