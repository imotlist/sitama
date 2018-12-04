<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\models\User;

use dosamigos\leaflet\plugins\geosearch\GeoSearch;
use dosamigos\leaflet\types\LatLng;
use dosamigos\leaflet\layers\Marker;
use dosamigos\leaflet\LeafLet;
use dosamigos\leaflet\layers\TileLayer;
use dosamigos\leaflet\plugins\geocoder\GeoCoder;
use dosamigos\leaflet\plugins\geocoder\ServiceNominatim;
/* @var $this yii\web\View */
/* @var $model backend\models\Toko */
/* @var $form yii\widgets\ActiveForm */
use yii\helpers\Url;
Yii::setAlias('@toko', '../../toko/'.$model->TOKO_FOTO);
?>
<div class="toko-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
    

    <div class="box box-info">
        <div class="box-header with-border">
              <h3 class="box-title">Edit Profil Toko</h3>
              <div class="pull-right"><b><i>Semua kolom wajib diisi</i></b></div>
        </div>
        <div class="box-body">
            <div class="col-md-12" style="min-height: 600px">
                <div class="col-md-3">
                    <?= $form->field($model, 'NAMA_BANK')->textInput(['maxlength' => true,'required'=>true]) ?>            
                    <?= $form->field($model, 'ATAS_NAMA')->textInput(['maxlength' => true,'required'=>true]) ?>            
                    <?= $form->field($model, 'NO_REK')->textInput(['maxlength' => true,'required'=>true]) ?>
                    <?php if (!$model->isNewRecord): ?>
                        <img src='<?= Url::to('@toko'); ?>' class="img-responsive">
                    
                    <?php endif ?>
                    <?= $form->field($model, 'TOKO_FOTO')->fileInput() ?>

                </div>
                <div class="col-md-9">
                    <div class="row">
                        <div class="col-md-6">
                        <?= $form->field($model, 'TOKO_NAMA')->textInput(['maxlength' => true,'required'=>true]) ?>
                        <?= $form->field($model, 'TOKO_ID')->textInput(['maxlength' => true,'type'=>'hidden','required'=>true])->label(false) ?>
                    </div>
                    <div class="col-md-6">
                        <?= $form->field($model, 'TOKO_TELP')->textInput(['maxlength' => true,'required'=>true]) ?> 
                    </div>  
                    </div>          

                    <?= $form->field($model, 'TOKO_ALAMAT')->textInput(['maxlength' => true,'required'=>true]) ?>

                    <?= $form->field($model, 'TOKO_DISKRIPSI')->textarea(['rows' => 6,'required'=>true]) ?>

<?= $form->field($model, 'location',['options' => [
    'placeholder' => 'Select ...',
   
    'title'=>'Klik pada Peta untuk memilih Lokasi'
    ]])->textInput(['readonly'=> true,'id'=>'complaintreport-location']) ?>

<?php
 function multiexplode ($delimiters,$string) {
    
    $ready = str_replace($delimiters, $delimiters[0], $string);
    $launch = explode($delimiters[0], $ready);
    return  $launch;
}
              
     if(isset($model->location)){
         $exploded=multiexplode(array("LatLng","(",",",")"), $model->location);
        $lat = $exploded[2];
        $lon = $exploded[3];
         $center = new LatLng(['lat' => $lat, 'lng' =>$lon]);
        $marker = new Marker([
    'name' => 'marker',
    'latLng' => $center,
    'clientOptions' => ['draggable' => false], // draggable marker
    'clientEvents' => [   
        
        
    ]
]);
     }
     else{
         $center = new LatLng(['lat' => -8.01997, 'lng' =>112.64351]);
}

$nominatim = new ServiceNominatim();

// create geocoder plugin and attach the service
$geoCoderPlugin = new GeoCoder([
    'service' => $nominatim,
    'clientOptions' => [
        // we could leave it to allocate a marker automatically
        // but I want to have some fun
        'showMarker' => false
    ]
]);
           
$geoSearchPlugin = new GeoSearch([
    'service' => GeoSearch::SERVICE_OPENSTREETMAP,
    // uncomment following block to define custom labels
   
    'clientOptions' => [
        'showMarker' => false,
        'searchLabel' => 'enter address here',
        'notFoundMessage' => 'no address found',
    ],
    
]);

        // kita tambahkan tile layer agar kita bisa terlihat
        $tileLayer = new TileLayer([            
            'urlTemplate' => 'http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png',
        'clientOptions' => [
            'attribution' => '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>',
           
            ],
        ]);
        
        // sekarang kita buat dan konfigurasi peta nya
        $leaflet = new LeafLet([
            'name'=>'map',

            'center' => $center, // set center pada peta
            'zoom'=> 10, //set zoom pada peta
                'clientEvents' => [
        // setting up one of the geo search events for fun
        "geocoder_showresult" => "function(e){
            // set markers position
            marker.setLatLng(e.Result.center);}",
                    
        "click" => "function(e){
            console.log(e.latlng);
            center=e.latlng;
            if (typeof marker !== 'undefined') {
            map.removeLayer(marker);
        }           
            marker= new L.marker(center).addTo(map);
            $('#complaintreport-location').val(center);
        }",
        "geosearch_showlocation" => "function(e){
            console.log(e.target); 
            }"
    ]
        ]);
if (isset($marker)) {
    $leaflet
               ->addLayer($marker);
}

        // kita tambahkan layer poin dan tile pada peta kita
        $leaflet->addLayer($tileLayer);  
        // tampilkan peta
        // install the plugin
//                $leaflet->appendJS('globalMap = map;marker=marker;');
//$leaflet->installPlugin($geoSearchPlugin);
        $leaflet->installPlugin($geoCoderPlugin);
        echo $leaflet->widget(['height'=>'400px','id'=>'map']);    
//        echo markerasal;
?>

                    
                    <div class="form-group">
                        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Simpan', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

    <?php ActiveForm::end(); ?>

</div>
<!-- <script src="../../vendor/almasaeed2010/adminlte/bower_components/ckeditor/ckeditor.js"></script>
<script src="../../vendor/almasaeed2010/adminlte/bower_components/jquery/dist/jquery.min.js"></script>
<script>
  $(function () {
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace('editor1')
    //bootstrap WYSIHTML5 - text editor
    
  })
</script> -->