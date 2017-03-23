<?php
use yii\helpers\Html;
use yii\helpers\Url;
use dektrium\user\models\User;
use dektrium\user\models\Profile;
//use common\models\Profile;
/* @var $this \yii\web\View */
/* @var $content string */
?>

<header class="main-header">

    <?= Html::a('<span class="logo-mini"><img src="./img/cdcswl.png" style="height: 40px;"></span><span class="logo-lg">' . Yii::$app->name . '</span>', Yii::$app->homeUrl, ['class' => 'logo']) ?>

    <nav class="navbar navbar-static-top" role="navigation">

        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>

        <div class="navbar-custom-menu">

            <ul class="nav navbar-nav">
                
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        
                <?php if(!Yii::$app->user->isGuest){ ?>
                        <span class="hidden-xs">
                            <?php echo Yii::$app->user->identity->username ;?>
                        </span>
                <?php }?>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header">
            <?php if(!Yii::$app->user->isGuest) { ?>
        
        <div class="user-panel">
            
            <div class="pull-left image">
                <?= Html::img('avatars/' . Yii::$app->user->identity->userprofile->avatar,
                        ['class' => 'img-circle', 'width' => '40px;'])
                ?>                

            </div>
            <!--        //แสดงชื่อผู้ใช้งาน-->
            <div class="pull-left info">
                <p>
                <?php echo Yii::$app->user->identity->userprofile->name; ?>
                </p>
            </div><br><hr/>
        </div>            
<!--                            <p>
                                Alexander Pierce - Web Developer
                                <small>Member since Nov. 2012</small>
                            </p>-->
                        </li>
        <?php  } ?>                
                        <!-- Menu Body -->                        
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-left">
                                <a href="<?php echo Url::to(['/profile/index']); ?>" class="btn btn-default btn-flat">ข้อมูลส่วนตัว</a>
                            </div>
                            <div class="pull-right">
                                <?= Html::a(
                                    'ออกจากระบบ',
                                    ['/site/logout'],
                                    ['data-method' => 'post', 'class' => 'btn btn-default btn-flat']
                                ) ?>
                            </div>
                        </li>
                    </ul>
                </li>

                <!-- User Account: style can be found in dropdown.less -->
<!--                <li>
                    <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                </li>-->
            </ul>
        </div>
    </nav>
</header>
