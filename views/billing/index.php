<?php
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use app\models\KunjunganPasien;
use app\models\TbLoket;
use app\models\Pendidikan;
use app\models\Negara;
use app\models\Agama;
use app\models\GolDarah;
use app\models\JenisKelamin;
use app\models\Pekerjaan;
use app\models\Status;
use app\models\UserReg;
use app\models\Retribusi;
use app\models\BMsAsalRujukan;
use app\models\JenisLayanan;
use app\models\TempatLayananRj;
use app\models\Kelas;
use app\models\StatusPenjaminPasien;
use app\models\HakKelasPenjaminPasien;
use kartik\date\DatePicker;
use app\models\Dokter;
use yii\grid\GridView;
use yii\data\ActiveDataProvider;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */
?> 
<div class="" style='background-color:whitesmoke;padding:8px'>
<div style='width:100%'>
        <div style='padding:5px;display:inline-block;font-size:10px;margin-left:8px'>
        <?= Html::a('<i class="fas fa-backward"></i> <br> Prev', ['create'], ['class' => 'text-success']) ?>
        </div>
        <div style='padding:5px;display:inline-block;font-size:10px'>
        <?= Html::a('<i class="fas fa-forward"></i> <br> Next', ['create'], ['class' => 'text-success']) ?>
        </div>
        <div style='padding:5px;display:inline-block;font-size:10px;cursor:pointer' id='regisB'>
        <i class="fas fa-user-plus text-info"></i><br>Baru
        </div> 
   </div>
    <div class='table' style=';padding:10px'>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            // ['class' => 'yii\grid\SerialColumn'],
            'no_rm',
            'nama',
            'penjamin_pasien',
            'temp_layanan',
            'retribusi',
            'dokter',
            // 'nik',
            // 'id',
            // 'suami_istri',
            // 'ortu',
            //'pendidikan',
            //'kewarganegaraan',
            //'pekerjaan',
            //'no_telepon',
            //'jenis_kelamin',
            //'agama',
            //'gol_darah',
            //'tgl_lahir',
            //'umur',
            //'alamat',
            //'propinsi',
            //'kabupaten',
            //'kecamatan',
            //'kelurahan',
            //'rw',
            //'rt',
            //'loket',
            //'tgl_kunjungan',
            //'alasan_msk',
            //'status_pasien',
            //'tgl_sjp',
            //'no_sjp',
            //'jenis_layanan',
            //'kelas',
            //'ket_pasien',
            //'no_anggota',
            //'hak_kelas',
            //'status',
            //'user',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    </div>

</div>

<div id='regis' style='position:absolute;background-color:whitesmoke;width:1000px;height:450px;border:1px solid black;margin-top:-200px;padding:10px;margin-left:160px'>
<i class="fas fa-user-plus"></i> Antrian Baru <div style='display:inline-block;margin-left:870px;position:absolute;cursor:pointer' id='closeR'><i class="fas fa-times text-danger  "></i></div>
<div style='background-color:white;width:100%;height:85%;padding:5px;margin-top:5px'>

<div style='display:inline-block'>
<div style='display:inline-block;float:left' class='col-sm-4'>
<i class="fas fa-file-signature" style='font-size:170px;margin-left:80px;margin-right:50px;margin-top:90px'></i> 
</div>

   <div class="col-sm-8">
  <?php $form = ActiveForm::begin() ?>
    <div class="plastic" style='width:170px'>
      <label for="">RM</label>
      <?= $form->field($model, 'no_rm')->textInput(['class' => 'form-input', 'id' => 'nmrrm'])->label(false); ?>
    </div>

    <div  class='plastic' style='width:170px'>
    <label for="">Tanggal</label>
        <?= $form->field($model, 'tgl_kunjungan')->widget(DatePicker::classname(), [
        'options' => ['placeholder' => 'Masukkan Tanggal ...', 'id' => 'tgl_kunj'],'pluginOptions' => ['autoclose'=>true, 'format' => 'yyyy/mm/dd']])->label(false); ?>
    </div>

    <div class="end" style='width:170px'>  
        <label for="">Jenis Kelamin</label>
        <?= $form->field($model, 'jenis_kelamin')->dropDownList(
        ArrayHelper::map(JenisKelamin::find()->all(), 'jenis_kelamin', 'jenis_kelamin'),
        ['maxlength' => true, 'class' => 'input-group', 'id' => 'jenkel'])->label(false) ?>
        </div><div class="row"></div>

    <div class="plastic" style='width:200px'>  <label for="">Pasien</label>
      <?= $form->field($model, 'nama')->textInput(['maxlength' => true,
        'class' => 'form-group text', 'id' => 'nama'])->label(false) ?></div>
        
       <div class="plastic" style='width:150px'>  <label for="">Tanggal Lahir</label>
    <?= $form->field($model, 'tgl_lahir')->widget(DatePicker::classname(), [
    'options' => ['placeholder' => 'Masukkan Tanggal ...', 'id' => 'fgh'],
    'pluginOptions' => [
        'autoclose'=>true,
        'format' => 'yyyy/mm/dd'
    ]])->label(false); ?></div>

 <div class="end" style='width:50px;'><label for="">Umur</label>
    <?= $form->field($model, 'umur')->textInput(['class' => 'input-group drop','id' => 'umur'])->label(false); ?>
</div><div class="row"></div>

            <?php $form = ActiveForm::end() ?>   
   </div>
        </div>
   </div>
   </div>
</div>
   

</div>

<?php 
$script = <<< JS

// $('#regis').hide();

$('#closeR').click( () => {
$('#regis').hide();
});

$('#regisB').click( () => {
$('#regis').show(); 
});

JS;
$this->registerJs($script);
?>