<?php
use yii\helpers\Html;
use yii\web\Session;

/* @var $this \yii\web\View */
/* @var $content string */
$session = Yii::$app->session;

if (Yii::$app->controller->action->id === 'login') { 
/**
 * Do not use this code in your template. Remove it. 
 * Instead, use the code  $this->layout = '//main-login'; in your controller.
 */
    echo $this->render(
        'main-login',
        ['content' => $content]
    );
} else {

    if (class_exists('backend\assets\AppAsset')) {
        backend\assets\AppAsset::register($this);
    } else {
        app\assets\AppAsset::register($this);
    }

    dmstr\web\AdminLteAsset::register($this);

    $directoryAsset = Yii::$app->assetManager->getPublishedUrl('@vendor/almasaeed2010/adminlte/dist');
    $role=Yii::$app->user->identity->getRoleName();
    ?>
    <?php $this->beginPage() ?>

        <!DOCTYPE html>
        <html lang="<?= Yii::$app->language ?>">
        <head>
            <meta charset="<?= Yii::$app->charset ?>"/>
            <meta name="viewport" content="width=device-width, initial-scale=1">
             <link rel="stylesheet" href="../../vendor/almasaeed2010/adminlte/bower_components/Ionicons/css/ionicons.min.css">
            <?= Html::csrfMetaTags() ?>
            <!--<title> = Html::encode($this->title) ?> SiTaMa (Sistem Informasi Tani Bersama) </title>-->
            <title>SiTaMa (Sistem Informasi Tani Bersama) </title>
            <?php $this->head() ?>
        </head>
        <body class="hold-transition skin-blue sidebar-mini">
        <?php $this->beginBody() ?>
        <div class="wrapper">
        <?php if ($role != 'UserRole') { ?>
            <?= $this->render(
                'header.php',
                ['directoryAsset' => $directoryAsset]
            ) ?>

            <?= $this->render(
                'left.php',
                ['directoryAsset' => $directoryAsset]
            )
            ?>
            
            <?= $this->render(
                'content.php',
                ['content' => $content, 'directoryAsset' => $directoryAsset]
            ) ?>
        <?php }else{ ?>
            <?= $this->render(
                'eror_access.php',
                ['directoryAsset' => $directoryAsset]
            ) ?>
        <?php } ?>

        </div>

    <?php $this->endBody() ?>
    </body>
    </html>
    <?php $this->endPage() ?>

<?php } ?>
