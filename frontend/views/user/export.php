<?php
use phpnt\exportFile\ExportFile;
use yii\grid\GridView;
/* @var $searchModel \common\models\GeoCitySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

// максимальные настройки
echo ExportFile::widget([
    'model'             => 'backend\models\KatalogSearch',   // путь к модели
    'title'             => 'Print Out',
    'queryParams'       => Yii::$app->request->queryParams,

    'getAll'            => true,                               // все записи - true, учитывать пагинацию - false
    'csvCharset'        => 'Windows-1251',                      // кодировка csv файла: 'UTF-8' (по умолчанию) или 'Windows-1251'

    'buttonClass'       => 'btn btn-primary',                   // класс кнопки
    'blockClass'        => 'pull-left',                         // класс блока в котором кнопка
    'blockStyle'        => 'padding: 5px;',                     // стиль блока в котором кнопка

    // экспорт в следующие файлы (true - разрешить, false - запретить)
    'xls'               => true,
    'csv'               => true,
    'word'              => true,
    'html'              => true,
    'pdf'               => true,

    // шаблоны кнопок
    'xlsButtonName'     => Yii::t('app', 'MS Excel'),
    'csvButtonName'     => Yii::t('app', 'CSV'),
    'wordButtonName'    => Yii::t('app', 'MS Word'),
    'htmlButtonName'    => Yii::t('app', 'HTML'),
    'pdfButtonName'     => Yii::t('app', 'PDF')
]) ?>

<?= GridView::widget([
    'dataProvider'  => $dataProvider,
    'filterModel'   => $searchModel,
    'columns' => [
            'KATALOG_JUDUL',
            'KATALOG_BARANG',
            'KATALOG_HARGA',
            'KATALOG_TGL_POST',
            'TOKO_ID',
            'KATEGORI_ID',
    ]
]);
?>