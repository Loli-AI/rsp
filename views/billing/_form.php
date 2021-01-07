<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use app\models\KunjunganPasien;
use app\models\TempatLayananAmbulan;
use app\models\TbLoket;
use app\models\JenisLayananRi;
use app\models\TempatLayananRi;
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
use app\models\JenisLayananIgd;
use app\models\TempatLayananRj;
use app\models\Kelas;
use app\models\TempatLayananGawatDarurat;
use app\models\StatusPenjaminPasien;
use app\models\HakKelasPenjaminPasien;
use kartik\date\DatePicker;
use app\models\Dokter;
use yii\grid\GridView;
use yii\data\ActiveDataProvider;
use app\models\DataLayananPasien;
use kartik\select2\Select2;
use app\models\Wilayah;
use app\models\BMsWilayah;

$db = Yii::$app->db;
$propinsi = BMsWilayah::find()->where(['level' => 1])->all();
$propinsi = ArrayHelper::map($propinsi, 'nama', 'nama');
$kabupaten = BMsWilayah::find()->where(['level' => 2])->all();
$kabupaten = ArrayHelper::map($kabupaten, 'nama', 'nama');
$kecamatan = BMsWilayah::find()->where(['level' => 3])->all();
$kecamatan = ArrayHelper::map($kecamatan, 'nama', 'nama');
$kelurahan = BMsWilayah::find()->where(['level' => 4])->all();
$kelurahan = ArrayHelper::map($kelurahan, 'nama', 'nama');

$dataProvider = new ActiveDataProvider(['query' => KunjunganPasien::find()]);

/* @var $this yii\web\View */
/* @var $model app\models\KunjunganPasien */
/* @var $form yii\widgets\ActiveForm */
?>
    <?php $form = ActiveForm::begin(); ?>
    <div class="col-sm-4" style='display:inline-block;border-left:2px solid black'>
    <div class="plastic">
    <label for="user"><i class='fas fa-user'></i> User</label>
    <?= $form->field($model, 'user')->dropDownList(
        ArrayHelper::map(UserReg::find()->all(), 'user', 'user'),
        ['maxlength' => true,
        'class' => 'input-group text',
        'id' => 'user', 'value' => 'ADMINISTRATOR'])->label(false); ?>
    </div>
    <div class="end">
    <label for="loket"><i class="fas fa-archway"></i> Loket</label>
    <?= $form->field($model, 'loket')->dropDownList(
        ArrayHelper::map(TbLoket::find()->all(), 'nama_loket', 'nama_loket'),
        ['maxlength' => true,
        'class' => 'input-group text',
        'id' => 'loket', 'value' => 'LOKET RAWAT JALAN'])->label(false) ?>
    </div><div class="row"></div>
    <!-- <div class="alert alert-info">DATA PASIEN</div> -->

<div class="plastic">
        <label for="nama"><i class="fas fa-file-signature"></i> Nama Lengkap</label>
    <?= $form->field($model, 'nama')->textInput(['maxlength' => true,
        'class' => 'input-group text', 'id' => 'nama'])->label(false) ?>
    </div>
    <div class="end">
    <label for="nik"><i class="fas fa-address-card"></i> Nomor Induk Keluarga</label>
    <?= $form->field($model, 'nik')->textInput(['class' => 'input-group text', 'id' => 'nik'])->label(false) ?> 
    </div><div class="row"></div>

    <div class="plastic">
    <label for="sutri"><i class="fas fa-male"></i><i class="fas fa-female"></i> Nama Suami / Istri</label>
    <?= $form->field($model, 'suami_istri')->textInput(['maxlength' => true, 'class' => 'input-group text', 'id' => 'sutri'])->label(false) ?>
    </div>
    <div class="end">
    <label for="ortu"><i class="fas fa-user-friends"></i> Nama Orangtua</label>
    <?= $form->field($model, 'ortu')->textInput(['maxlength' => true, 'class' => 'input-group text', 'id' => 'ortu'])->label(false) ?>  
    </div><div class="row"></div>

    <div class="plastic">
    <label for="pend"><i class="fas fa-graduation-cap"></i> Pendidikan</label>
    <?= $form->field($model, 'pendidikan')->dropDownList(
        ArrayHelper::map(Pendidikan::find()->all(), 'pendidikan', 'pendidikan'),
        ['maxlength' => true, 'class' => 'input-group text', 'id' => 'pend'])->label(false) ?>
    </div>
    <div class="end">
    <label for="nation"><i class="fab fa-font-awesome-flag"></i> Kewrganegaraan</label>
    <?= $form->field($model, 'kewarganegaraan')->dropDownList(
        ArrayHelper::map(Negara::find()->all(), 'nama', 'nama'),
        ['maxlength' => true, 'class' => 'input-group text', 'id' => 'nation'])->label(false) ?>
    </div><div class="row"></div>

    <div class="plastic">
    <label for="pekerjaan"><i class="fas fa-briefcase"></i> Pekerjaan</label>
   <?= $form->field($model, 'pekerjaan')->dropDownList(
        ArrayHelper::map(Pekerjaan::find()->all(), 'nama', 'nama'),
        ['maxlength' => true, 'class' => 'input-group text', 'id' => 'pekerjaan'])->label(false) ?>
    </div>
    <div class="end">
    <label for="phone"><i class="fas fa-phone"></i> Nomor Telepon</label>
    <?= $form->field($model, 'no_telepon')->textInput(['maxlength' => true, 'class' => 'input-group text', 'id' => 'phone'])->label(false) ?>
    </div><div class="row"></div>

    <div class="plastic" style='width:115px;'>
    <label for="jenkel"><i class="fas fa-venus-mars"></i> Jenis Kelamin</label>
   <?= $form->field($model, 'jenis_kelamin')->dropDownList(
        ArrayHelper::map(JenisKelamin::find()->all(), 'jenis_kelamin', 'jenis_kelamin'),
        ['maxlength' => true, 'class' => 'input-group smalltext', 'id' => 'jenkel'])->label(false) ?>
    </div>
    <div class="plastic" style='width:115px;margin-left:-15px'>
    <label for="agama"><i class="fas fa-praying-hands"></i> Agama</label>
    <?= $form->field($model, 'agama')->dropDownList(
        ArrayHelper::map(Agama::find()->all(), 'agama', 'agama'),
        ['maxlength' => true, 'class' => 'input-group smalltext', 'id' => 'agama'])->label(false) ?>
    </div>
    <div class="end" style='width:115px;margin-left:-15px'>
    <label for="darah"><i class="fas fa-tint"></i> Golongan Darah</label>
   <?= $form->field($model, 'gol_darah')->dropDownList(
        ArrayHelper::map(GolDarah::find()->all(), 'darah', 'darah'),
        ['maxlength' => true, 'class' => 'input-group smalltext', 'id' => 'darah'])->label(false) ?>
    </div><div class="row"></div>

    <div class="plastic" >
    <label for="fgh"><i class="fas fa-calendar-alt"></i> Tanggal Lahir </label>
    <?= $form->field($model, 'tgl_lahir')->widget(DatePicker::classname(), [
    'options' => ['placeholder' => 'Tanggal ...', 'id' => 'fgh',],
    'pluginOptions' => [
        'autoclose'=>true,
        'format' => 'yyyy/mm/dd'
    ]
])->label(false); ?>
    </div>
    <div class="end">
    <label for="umur"><i class="fas fa-sort-numeric-up-alt"></i> Umur</label>
   <?= $form->field($model, 'umur')->textInput(['maxlength' => true, 'class' => 'input-group text', 'id' => 'umur', 'readonly' => true])->label(false) ?>
    </div><div class="row"></div>
    
    </div>

    <div class="col-sm-4" style='display:inline-block;border-left:2px solid black'>
    <div class="plastic">
    <label for="nmrrm"><i class="fas fa-barcode"></i> Nomor RM</label>&emsp;&emsp;
    <div style='display:inline-block'> 
    <div class="btn-success" id='newRM' style='padding:3px;width:65px;font-size:12px;cursor:pointer;border-radius:3px;text-align:center;margin-left:-5px'>RM Baru</div>
    </div>
    <?= $form->field($model, 'no_rm')->textInput(['class' => 'input-group text', 'id' => 'nmrrm', 'readonly' => true,])->label(false); ?>
    </div>
    <div class="end">
    <label for="sttus"><i class="fas fa-user-injured"></i> Status Pasien</label>
    <?= $form->field($model, 'status_pasien')->dropDownList(
        ArrayHelper::map(Status::find()->all(), 'status', 'status'),
        ['maxlength' => true, 'class' => 'input-group text','id' => 'sttus', 'value' => 'UMUM'])->label(false) ?>
    </div><div class="row"></div>
    <!-- <div class="alert alert-info" style='margin-top:-5px'>ALAMAT</div> -->
    <div class="plastic" style='width:98%;'>
    <label for="alamat"><i class="fas fa-sign"></i> Alamat</label>
    <?= $form->field($model, 'alamat')->textInput(['maxlength' => true,'class' => 'input-group fulltext', 'id' => 'alamat'])->label(false) ?>
    </div>
        <div class="plastic">
    <div class="plastic" style='width:180px'>
    <label for="pro"><i class="fas fa-map"></i> Propinsi</label>
    <?= $form->field($model, 'propinsi')->widget(Select2::classname(), [
    'data' => $propinsi,
    'options' => ['placeholder' => 'Select a state ...'],
    'pluginOptions' => [
        'allowClear' => true
    ],
])->label(false); ?>
    </div></div>
    <div class="end">
    <div style='width:180px'>
    <label for="kab"><i class="fas fa-road"></i> Kabupaten</label>
    <?= $form->field($model, 'kabupaten')->widget(Select2::classname(), [
    'data' => $kabupaten,
    'options' => ['placeholder' => 'Select a state ...', 'class' => 'text'],
    'pluginOptions' => [
        'allowClear' => true
    ],
])->label(false); ?></div>
    </div><div class="row"></div>

    <div class="plastic">
    <div style='width:180px'>
    <label for="kec"><i class="fas fa-map-marked"></i> Kecamatan</label>
    <?= $form->field($model, 'kecamatan')->widget(Select2::classname(), [
    'data' => $kecamatan,
    'options' => ['placeholder' => 'Select a state ...', 'class' => 'text'],
    'pluginOptions' => [
        'allowClear' => true
    ],
])->label(false); ?>
    </div></div>
    <div class="end">
    <div style='width:180px'>
    <label for="kelu"><i class="fas fa-map-signs"></i> Kelurahan</label>
    <?= $form->field($model, 'kelurahan')->widget(Select2::classname(), [
    'data' => $kelurahan,
    'options' => ['placeholder' => 'Select a state ...', 'class' => 'text'],
    'pluginOptions' => [
        'allowClear' => true
    ],
])->label(false); ?></div>
    </div><div class="row"></div>

    <div class="plastic">

    <div style='width:50%;display:inline-block;float:left'>
    <label for="rw"><i class="fas fa-home"></i> RW</label>
    <?= $form->field($model, 'rw')->textInput(['maxlength' => true,'class' => 'input-group droptext', 'id' => 'rw'])->label(false) ?>
    </div>
    <div style='width:50%;display:inline-block;float:left'>
    <label for="rt"><i class="fas fa-home"></i> RT</label>
     <?= $form->field($model, 'rt')->textInput(['maxlength' => true,'class' => 'input-group droptext', 'id' => 'rt'])->label(false) ?>
    </div>
    
    </div>


    <div class="end">
    <label for="alasan"><i class="fas fa-question"></i> Alasan Masuk</label>
    <?= $form->field($model, 'alasan_msk')->dropDownList(
        ArrayHelper::map(BMsAsalRujukan::find()->all(), 'nama', 'nama'),
        ['maxlength' => true,'class' => 'input-group text', 'id' => 'alasan'])->label(false) ?>
        </div>
    
    <div class="plastic">
    <input disabled type="checkbox" name="" id="check"> Penjamin Pasien
    </div><div class="row"></div>

    <div class="plastic">
    <label for="penjamin"><i class="fas fa-handshake"></i> Penjamin Pasien</label>
    <?= $form->field($model, 'penjamin_pasien')->textInput(['maxlength' => true,'class' => 'input-group text', 'id' => 'penjamin', 'value' => 'UMUM', 'readonly' => true])->label(false) ?>
    </div>

    <div class="end">
    <label for="nmanggota"><i class="fas fa-list-ol"></i> No. Anggota</label>
    <?= $form->field($model, 'no_anggota')->textInput(['maxlength' => true,'class' => 'input-group text', 'id' => 'nmanggota', 'disabled' => true])->label(false) ?>
    </div>

    <div class="plastic">
    <label for="hak_kelas"><i class="fas fa-door-closed"></i> Hak Kelas</label>
    <?= $form->field($model, 'hak_kelas')->dropDownList(
        ArrayHelper::map(HakKelasPenjaminPasien::find()->all(), 'hak_kelas', 'hak_kelas'),
        ['maxlength' => true,'class' => 'input-group text', 'id' => 'hak_kelas', 'disabled' => true])->label(false) ?>
    </div>

    <div class="end">
    <label for="status_penjamin"><i class="far fa-question-circle"></i> Status</label>
    <?= $form->field($model, 'status')->dropDownList(
        ArrayHelper::map(StatusPenjaminPasien::find()->all(), 'status_penjamin_pasien', 'status_penjamin_pasien'),
        ['maxlength' => true, 'class' => 'input-group text', 'id' => 'status_penjamin', 'disabled' => true])->label(false) ?>
    </div>
    
    </div>

    <div class="col-sm-4" style='display:inline-block;border-left:2px solid black;border-right:2px solid black'>
    <!-- <div class="alert alert-info">KUNJUNGAN PASIEN</div> -->
    <div class="plastic" >
    <label for="tgl_kunj"><i class="fas fa-calendar-week"></i> Tanggal Kunjungan</label>
    <?= $form->field($model, 'tgl_kunjungan')->widget(DatePicker::classname(), [
    'options' => ['placeholder' => 'Tanggal ...', 'id' => 'tgl_kunj'],
    'pluginOptions' => [
        'autoclose'=>true,
        'format' => 'yyyy/mm/dd'
    ]
])->label(false); ?>
    </div>
    
    <div class="end">
    <label for='jnis'><i class="fab fa-accessible-icon"></i> Jenis Layanan</label>
    <div id="rjinc">
    <?= $form->field($model, 'jenis_layanan')->dropDownList(
        ArrayHelper::map(JenisLayanan::find()->all(), 'nama_layanan', 'nama_layanan'),
        ['maxlength' => true,'class' => 'input-group text', 'id' => 'rjin'])->label(false); ?></div>
    </div>
    <div class="row"></div>

    <div class="plastic">
    <label for="tempat"><i class="fas fa-location-arrow"></i> Tempat Layanan</label>
    <div id="rjcont">
    <?= $form->field($model, 'temp_layanan')->dropDownList(
        ArrayHelper::map(TempatLayananRj::find()->all(), 'nama_tempat_layanan', 'nama_tempat_layanan'),
        ['maxlength' => true,'class' => 'input-group text', 'id' => 'rj'])->label(false) ?></div>
    </div>

    
    <div class="end">
    <label for="kelas"><i class="fas fa-user-tie"></i> Kelas</label>
    <?= $form->field($model, 'kelas')->dropDownList(
        ArrayHelper::map(Kelas::find()->all(), 'kelas', 'kelas'),
        ['maxlength' => true,'class' => 'input-group text', 'id' => 'kelas'])->label(false) ?>
    </div><div class="row"></div>

    <div class="plastic">
    <label for="ret"><i class="fas fa-hand-holding-usd"></i> Retribusi</label>
    <?= $form->field($model, 'retribusi')->dropDownList(
        ArrayHelper::map(Retribusi::find()->all(), 'retribusi', 'retribusi'),
        ['maxlength' => true,'class' => 'input-group text', 'id' => 'ret'])->label(false) ?>
    </div>
    <div class="end">
    <label for="dokter"><i class="fas fa-user-md"></i> Dokter</label>
    <?= $form->field($model, 'dokter')->dropDownList(
        ArrayHelper::map(Dokter::find()->all(), 'nama', 'nama'),
        ['maxlength' => true,'class' => 'input-group text', 'id' => 'dokter'])->label(false) ?>
    </div><div class="row"></div>

    <div class="plastic" >
    <label for="tgl_sjp"><i class="fas fa-calendar-week"></i> Tanggal SJP</label>
    <?= $form->field($model, 'tgl_sjp')->widget(DatePicker::classname(), [
    'options' => ['placeholder' => 'Tanggal ...', 'id' => 'tgl_sjp'],
    'pluginOptions' => [
        'autoclose'=>true,
        'format' => 'yyyy/mm/dd'
    ]
])->label(false); ?>
    </div>
    <div class="end">
    <label for="sjp"><i class="fas fa-bars"></i> No. SJP</label>
    <?= $form->field($model, 'no_sjp')->textInput(['class' => 'input-group text', 'id' => 'sjp'])->label(false) ?>
    </div>

        <div class="plastic">
        <label for="ket"><i class="fas fa-exclamation"></i> Keterangan Pasien</label>
        <?= $form->field($model, 'ket_pasien')->textArea(['maxlength' => true, 'class' => 'input-group fulltext', 'id' => 'ket'])->label(false) ?>
        </div>

        <div class="end">
        <center>
        <?= Html::submitButton('<i class="fas fa-plus"></i> Tambah Pasien', ['class' => 'btn-primary button input-group radius']) ?><br>
        <?= Html::resetButton('<i class="fas fa-backspace"></i> Reset', ['class' => 'btn-danger button input-group radius']) ?>
        </center>
        </div>

    </div>


    <div class="col-sm-4" style='display:inline-block;border-left:2px solid black;'>
    <div class="row"></div>
         <a class="print">
            <a class="btn-warning input-group printB" target='_blank' href=''><i class="fas fa-print"></i>&nbsp; CETAK BARCODE</a>
           <a class="btn-warning input-group printB" target='_blank' href=''><i class="fas fa-print"></i>&nbsp; CETAK KARTU</a>
           <a class="btn-warning input-group printB" target='_blank' href=''><i class="fas fa-print"></i>&nbsp; CETAK KWITANSI</a>
           <a class="btn-warning input-group printB" target='_blank' href=''><i class="fas fa-print"></i>&nbsp; FORM VERIFIKASI</a>

            <a class="btn-warning input-group printB" target='_blank' href=''><i class="fas fa-print"></i>&nbsp; BUKTI DAFTAR</a>
           <a class="btn-warning input-group printB" target='_blank' href=''><i class="fas fa-print"></i>&nbsp; SJP JAMPERSAL</a>
           <a class="btn-warning input-group printB" target='_blank' href=''><i class="fas fa-print"></i>&nbsp; SEP BPJS FULL</a>
           <a class="btn-warning input-group printB" target='_blank' href=''><i class="fas fa-print"></i>&nbsp; SEP BPJS ISI</a>
           
            <a class="btn-warning input-group printB" target='_blank' href=''><i class="fas fa-print"></i>&nbsp; CETAK LABEL</a>
           <a class="btn-warning input-group printB" target='_blank' href='index.php?r=billing%2Fcetak-antrian&'><i class="fas fa-print"></i>&nbsp; CETAK ANTRIAN</a><div class="row"></div>

            
            </div>
    </div><div class="row"></div>

    <!-- Status Layanan Untuk Pelayanan (NILAI DEFAULT) -->
    <?= $form->field($model, 'stat_lay')->hiddenInput(['maxlength' => true,'class' => 'input-group text', 'value' => 'Belum'])->label(false) ?>
    <!-- Status Layanan Untuk Pelayanan (NILAI DEFAULT) -->
    
    <?php ActiveForm::end(); ?>


 <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            'no_rm',
            'nama',
            'penjamin_pasien',
            'temp_layanan',
            'retribusi',
            'dokter',
            ['class' => 'yii\grid\ActionColumn'],
            
        ],
    ]); ?>          