<?php
use yii\helpers\Html;
use yii\web\Session;
/* @var $this \yii\web\View */
/* @var $content string */
$session = Yii::$app->session;

$uname=Yii::$app->user->identity->username;
$email=Yii::$app->user->identity->email;
$img=Yii::$app->user->identity->USER_FOTO;
$foto = "/sitama/frontend/web/foto/".$img;

$nama = $session['uname'];
?>

<header class="main-header">

    <?= Html::a('<span class="logo-mini">SiTM</span><span class="logo-lg"> Panel SITaMa </span>', Yii::$app->homeUrl, ['class' => 'logo']) ?>

    <nav class="navbar navbar-static-top" role="navigation">

        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>

        <div class="navbar-custom-menu">

            <ul class="nav navbar-nav">

                <!-- User Account: style can be found in dropdown.less -->

                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <?php if ($img != NULL) { ?>
                                <img src="<?php echo $foto; ?>" class="user-image" alt="User Image"/>
                            <?php } else{ ?>
                                <img src="../web/image/default.jpg" class="user-image" alt="User Image"/>
                            <?php } ?>
                        <span class="hidden-xs"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header">

                            <?php if ($img != NULL) { ?>
                                <img src="<?php echo $foto; ?>" class="img-circle" alt="User Image"/>
                            <?php } else{ ?>
                                <img src="../web/image/default.jpg" class="img-circle" alt="User Image"/>
                            <?php } ?>

                            <p>
                                <?php echo $uname; ?> 
                                <small>Member since Nov. 2012</small>
                            </p>
                        </li>
                        <!-- Menu Body -->
                        <li class="user-body">
                            <div class="col-xs-4 text-center">
                                <a href="#">Followers</a>
                            </div>
                            <div class="col-xs-4 text-center">
                                <a href="#">Sales</a>
                            </div>
                            <div class="col-xs-4 text-center">
                                <a href="#">Friends</a>
                            </div>
                        </li>
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-left">
                                <a href="#" class="btn btn-default btn-flat"><i class="fa fa-user"></i> Profile</a>
                            </div>
                            <div class="pull-right">
                                <?= Html::a(
                                    'Sign out',
                                    ['/site/logout'],
                                    ['data-method' => 'post', 'class' => 'btn btn-default btn-flat']
                                ) ?>
                            </div>
                        </li>
                    </ul>
                </li>

                <!-- User Account: style can be found in dropdown.less -->
                <li>
                    <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                </li>
            </ul>
        </div>
    </nav>
</header>
