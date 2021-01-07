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
use app\models\JenisLayananRj;
use app\models\TempatLayanan;
use app\models\Kelas;
use app\models\StatusPenjaminPasien;
use app\models\HakKelasPenjaminPasien;
use kartik\date\DatePicker;
use app\models\Dokter;


/* @var $this yii\web\View */
/* @var $model app\models\KunjunganPasien */
/* @var $form ActiveForm */
$no = 1;
?>
<div class="regis">

    <?php $form = ActiveForm::begin(); ?>

        <div class="bag">
        <div class="plastic" style='width:230px'>
        <?= $form->field($model, 'user')->dropDownList(
            ArrayHelper::map(UserReg::find()->all(), 'id', 'user'),
            ['class' => 'input-group droptext']); ?>
        </div>

        <div class="end" style='width:230px'>
        <?= $form->field($model, 'loket')->dropDownList(
            ArrayHelper::map(TbLoket::find()->all(), 'id_loket', 'nama_loket'),
            ['class' => 'input-group droptext']); ?>
        </div><div class="row"></div>
        <div class="alert alert-info" style='text-align:center'>DATA PASIEN</div>
        <div class="plastic">
        <?= $form->field($model, 'nama')->textInput(['class' => 'input-group text']); ?>
        </div>

        <div class="end">
        <?= $form->field($model, 'nik')->textInput(['class' => 'input-group text']); ?>
        </div><div class="row"></div>

        <div class="plastic">
        <?= $form->field($model, 'suami_istri')->textInput(['class' => 'input-group text']); ?>
        </div>
        
        <div class="end">
        <?= $form->field($model, 'ortu')->textInput(['class' => 'input-group text']); ?>        
        </div><div class="row"></div>

        <div class="plastic" style='width:230px'>
        <?= $form->field($model, 'pendidikan')->dropDownList(
            ArrayHelper::map(Pendidikan::find()->all(), 'id', 'pendidikan'),
            ['class' => 'input-group droptext']); ?>
        </div>
        
        <div class="end" style='width:230px'>
        <?= $form->field($model, 'kewarganegaraan')->dropDownList(
            ArrayHelper::map(Negara::find()->all(), 'id', 'nama'),
            ['class' => 'input-group droptext']); ?>
        </div><div class="row"></div>

        <div class="plastic" style='width:230px'>
        <?= $form->field($model, 'pekerjaan')->dropDownList(
            ArrayHelper::map(Pekerjaan::find()->all(), 'id', 'nama'),
            ['class' => 'input-group droptext']); ?>
        </div>
        
        <div class="end">
        <?= $form->field($model, 'no_telepon')->textInput(['class' => 'input-group text']); ?>
        </div><div class="row"></div>

        <div class="plastic drop">
        <?= $form->field($model, 'jenis_kelamin')->dropDownList(
            ArrayHelper::map(JenisKelamin::find()->all(), 'id', 'jenis_kelamin'),
            ['class' => 'input-group drop']); ?>
        </div>

        <div class="plastic drop">
        <?= $form->field($model, 'agama')->dropDownList(
            ArrayHelper::map(Agama::find()->all(), 'id', 'agama'),
            ['class' => 'input-group drop']); ?>
        </div>
        
        <div class="end drop">
        <?= $form->field($model, 'gol_darah')->dropDownList(
            ArrayHelper::map(GolDarah::find()->all(), 'id', 'darah'),
            ['class' => 'input-group droptext']); ?>
        </div><div class="row"></div>

         <div class="plastic" style='width:230px'>
        <?=$form->field($model, 'tgl_kunjungan')->widget(DatePicker::classname(), [
        'options' => ['placeholder' => 'Tahun-Bulan-Hari'],
        'pluginOptions' => [
        'format'=> 'yyyy-mm-dd',
        'autoclose'=>true
        ]
        ]); ?>
        </div>

        <div class="end">
        <?= $form->field($model, 'umur')->textInput(['class' => 'input-group text umur']); ?>
        </div>

        </div>

        <div class="bag2">
        <div class="plastic" style='width:230px'>
        <?= $form->field($model, 'no_rm')->textInput(['class' => 'input-group text norm']); ?>    
        </div>

        <div class="end" style='width:230px'>
        <?= $form->field($model, 'status_pasien')->dropDownList(
            ArrayHelper::map(Status::find()->all(), 'id', 'status'),
            ['class' => 'input-group droptext']); ?>    
        </div><div class="row"></div>
        
        <div class="alert alert-info" style='text-align:center'>ALAMAT</div>

        <div class="plastic" style='width:100%;'>
        <?= $form->field($model, 'alamat')->textInput(['class' => 'input-group fulltext']); ?>
        </div><div class="row"></div>

        <div class="plastic">
            <?= $form->field($model, 'propinsi')->textInput(['class' => 'input-group text']); ?>
        </div>

        <div class="end">
        <?= $form->field($model, 'kabupaten')->textInput(['class' => 'input-group text']); ?>
        </div>

        <div class="plastic">
            <?= $form->field($model, 'kecamatan')->textInput(['class' => 'input-group text']); ?>
        </div>

        <div class="end">
            <?= $form->field($model, 'kelurahan')->textInput(['class' => 'input-group text']); ?>
        </div><div class="row"></div>

        <div class="plastic" style='width:85px'>
            <?= $form->field($model, 'rt')->textInput(['class' => 'input-group smalltext']); ?>
        </div>

        <div class="plastic" style='width:85px'>
            <?= $form->field($model, 'rw')->textInput(['class' => 'input-group smalltext']); ?>
        </div>

        <div class="end" style='width:230px'>
            <?= $form->field($model, 'alasan_msk')->dropDownList(
                ArrayHelper::map(BMsAsalRujukan::find()->all(), 'id', 'nama'),
                ['class' => 'input-group droptext']); ?>
        </div>

        </div><div class="row"></div>
        
        <div class="bag" >
        <div class="alert alert-info" style='text-align:center'>KUNJUNGAN PASIEN</div>

            <div class="plastic" style='width:230px'>
        <?= $form->field($model, 'tgl_kunjungan')->widget(DatePicker::classname(), [
        'options' => ['placeholder' => 'Masukkan Tanggal'],
        'pluginOptions' => [
        'format'=> 'yyyy-mm-dd',
        'autoclose'=>true
        ]
        ]); ?>
            </div>

            <div class="end" style='width:230px'>
                <?= $form->field($model, 'kelas')->dropDownList(
                    ArrayHelper::map(Kelas::find()->all(), 'id', 'kelas'),
                    ['class' => 'input-group droptext']); ?>
            </div>

            <div class="plastic" style='width:230px'>
        <?= $form->field($model, 'jenis_layanan')->dropDownList(
            ArrayHelper::map(JenisLayananRj::find()->all(), 'id', 'jenis_layanan'),
            ['class' => 'input-group text']); ?>
            </div>

            <div class="end" style='width:230px'>
        <?= $form->field($model, 'temp_layanan')->dropDownList(
            ArrayHelper::map(TempatLayanan::find()->all(), 'id', 'tempat'),
            ['class' => 'input-group text']); ?>
            </div>

            <div class="plastic" style='width:230px'>
        <?= $form->field($model, 'tgl_sjp')->widget(DatePicker::classname(), [
        'options' => ['placeholder' => 'Masukkan Tanggal'],
        'pluginOptions' => [
        'format'=> 'yyyy-mm-dd',
        'autoclose'=>true
        ]
        ]); ?>
            </div>

            <div class="end" style='width:230px'>
        <?= $form->field($model, 'no_sjp')->textInput(['class' => 'input-group text']); ?>
            </div>

             <div class="plastic" style='width:230px'>
        <?= $form->field($model, 'retribusi')->dropDownList(
            ArrayHelper::map(Retribusi::find()->all(), 'id', 'retribusi'),
            ['class' => 'input-group droptext retribusi']); ?>
        <input type="text" disabled style='background-color:none;border:none' id="info">
            </div>

            <div class="end" style='width:230px'>
        <?= $form->field($model, 'dokter')->dropDownList(
            ArrayHelper::map(Dokter::find()->all(), 'id', 'nama'),
            ['class' => 'input-group text']); ?>
        <input type="checkbox" name="" id="doklain"><strong> Dokter Lainnya</strong> 
            </div>

             <div class="plastic" style='width:520px'>
        <?= $form->field($model, 'ket_pasien')->textInput(['class' => 'input-group fulltext']); ?>        
            </div>

        </div>
        
        <div class="bag2">
        <div class="alert alert-info" style='text-align:center;'>PENJAMIN PASIEN</div>
        <div class="plastic"><input type="checkbox" name="" id="box"><label for='box'>&nbsp;Penjamin Pasien</label>
        </div><div class="row"></div>
          
            <div class="plastic">
        <?= $form->field($model, 'penjamin_pasien')->textInput( ['class' => 'input-group text']); ?>
            </div>

            <div class="end">
        <?= $form->field($model, 'no_anggota')->textInput(['class' => 'input-group text']); ?>
            </div><div class="row"></div>

            <div class="plastic" style='width:230px;'>
        <?= $form->field($model, 'hak_kelas')->dropDownList(
            ArrayHelper::map(HakKelasPenjaminPasien::find()->all(), 'id', 'hak_kelas'),
            ['class' => 'input-group',
            'prompt' => '']); ?>        
            </div>

            <div class="end" style='width:230px;'>
            <?= $form->field($model, 'status')->dropDownList(
            ArrayHelper::map(StatusPenjaminPasien::find()->all(), 'id', 'status_penjamin_pasien'),
            ['class' => 'input-group',
            'prompt' => '']); ?>        
            </div><div class="row"></div><br>
            <div class="print">
             <button class="btn btn-warning input-group" style='float:left;margin:5px;width:122px;font-size:10px;height:40px'>CETAK BARCODE</button>
            <button class="btn btn-warning input-group" style='float:left;margin:5px;width:122px;font-size:10px;height:40px'>CETAK KARTU</button>
            <button class="btn btn-warning input-group" style='float:left;margin:5px;width:122px;font-size:10px;height:40px'>CETAK KWITANSI</button>
            <button class="btn btn-warning input-group" style='float:left;margin:5px;width:122px;font-size:10px;height:40px'>FORM VERIFIKASI</button>

             <button class="btn btn-warning input-group" style='float:left;margin:5px;width:122px;font-size:10px;height:40px'>BUKTI DAFTAR</button>
            <button class="btn btn-warning input-group" style='float:left;margin:5px;width:122px;font-size:10px;height:40px'>SJP JAMPERSAL</button>
            <button class="btn btn-warning input-group" style='float:left;margin:5px;width:122px;font-size:10px;height:40px'>SEP BPJS FULL</button>
            <button class="btn btn-warning input-group" style='float:left;margin:5px;width:122px;font-size:10px;height:40px'>SEP BPJS ISI</button>

            <center>
            <button class="btn btn-warning input-group" style='display:inline;margin:5px;margin-left:-10px;width:122px;font-size:10px;height:40px'>CETAK LABEL</button>
            <button class="btn btn-warning input-group" style='display:inline;margin-left:3px;width:122px;font-size:10px;height:40px'>CETAK ANTRIAN</button><div class="row"></div>

            <?= Html::submitButton('Tambah Pasien', ['class' => 'btn btn-primary input-group button']) ?>
            <?= Html::resetButton('Reset', ['class' => 'btn btn-info input-group button1']) ?>
            <button class="btn btn-danger input-group" style='display:inline;margin-left:10px;width:165px;font-size:14px;height:40px'>HAPUS</button>
            </center>
            </div>

        </div>
        <center>
</div>
    <?php ActiveForm::end(); ?>
<center><div class="row"></div>
<table style='width:1300px;margin-top:-200px;transform:translateY(-150px);' cellspacing='5px' class='table'>
    <tr >
        <td class='btn-info' colspan='7' style='margin:auto'><strong><center>DATA KUNJUNGAN PASIEN</strong></td>

    </tr>
    <tr class='btn-success'>
        <td><center>NO</td>
        <td><center>NOMOR RM</td>
        <td><center>NAMA</td>
        <td><center>PENJAMIN</td>
        <td><center>TEMPAT lAYANAN</td>
        <td><center>RETRIBUSI</td>
        <td><center>DOKTER</td>
    </tr>
        <?php foreach($data as $val) {  ?>
                 
        <tr class='btn-success'>
        <td><center><?= $no; $no++; ?> </td>
        <td><center><?= $val['nik']; ?> </td>
        <td><center><?= $val['nama']; ?> </td>
        <td><center><?= $val['penjamin_pasien']; ?> </td>
        <td><center><?= $val['temp_layanan']; ?> </td>
        <td><center><?= $val['retribusi']; ?> </td>
        <td><center><?= $val['dokter']; ?> </td>
    </tr>
           <?php } ?>
</table>

</div><!-- regis -->