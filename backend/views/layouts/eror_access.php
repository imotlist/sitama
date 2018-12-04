<?php
use yii\helpers\Html;

?>
<!DOCTYPE html>
<html>
<head>
	<title>Eror</title>
</head>
<body>
	<h1 style="color: #ffffff">You Are Forbidden Access This Content</h1>
	<?= Html::a('Back',
                ['/site/logout'],
                ['data-method' => 'post', 'class' => 'btn btn-default btn-flat']
               ) ?>
</body>
</html>