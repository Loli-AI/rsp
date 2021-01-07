<?php
use app\models\KunjunganPasien;
use app\models\TempatLayananRj;
use app\models\JenisLayanan;
use app\models\StatusLayanan;
use app\models\Dokter;
use kartik\date\DatePicker;

$this->title = 'Pelayanan Kunjungan';
?>

<!DOCTYPE html>
<html lang="en">
<head>
</head>
<body>
<form>
<div class="col-sm-6" style='border-right:2px solid black'>
    <div class="plastic" style='width:30%'>
    <label for='date'>Tanggal Kunjungan</label>
    <?= DatePicker::widget([
    'name' => '',
    'removeButton' => false,
    'options' => ['id' => 'datePel', 'value' => ''],
    'pluginOptions' => [
        'autoclose'=>true,
        'format' => 'yyyy/mm/dd'
    ]
]); ?>
    </div>

    <div class="plastic" style='width:30%'>
            <label for="layanan">Jenis Layanan</label> <div class="row"></div>
            <select id='layananPel'>
                    <option value="">Pilih Layanan</option>
                <?php foreach ($layanan as $value) { ?>
                    <option  value="<?= $value['nama_layanan']; ?>"><?= $value['nama_layanan']; ?></option>
                <?php } ?>
            </select>
    </div>

<div class="end" style='width:30%'>
        <label for="tampat">Tempat Layanan</label> <div class="row"></div>
    <select id='tempatPel'>
    <option value="">Pilih  Tempat</option>
        <?php foreach ($tempat as $key) { ?>
            <option value="<?= $key['nama_tempat_layanan']; ?>"><?= $key['nama_tempat_layanan']; ?></option>
        <?php } ?>
    </select>
 </div><div class="row"></div><br>
<div class="plastic" style='width:30%'>
        <label for="status">Status Dilayanin</label> <div class="row"></div>
        <select id='statusPel'>
        <option value="">Pilih  Status</option>
            <?php foreach ($status as $data) { ?>
                <option value="<?= $data['layanan']; ?>"><?= $data['layanan']; ?></option>
            <?php } ?>
        </select>
</div>

<div class="plastic" style='width:30%'>
        <label for="dokter">Nama Dokter</label> <div class="row"></div>
        <select id='dokterPel'>
        <option value="">Pilih  Dokter</option>
            <?php foreach ($dokter as $data) { ?>
                <option value="<?= $data['nama']; ?>"><?= $data['nama']; ?></option>
            <?php } ?>
        </select>

</div>

<div class="end" style='width:30%'>
        <label for="no_rm">Nomor RM</label> 
        <input type="text" id='rmPel' value=''>
</div><div class="row"></div><br>
<center>
           <div class="row"></div>
</form>

</div>

<div class="col-sm-6">
        <div class="plastic">
        <a id='detailPasien' class='btn btn-danger '>&raquo; Cari Data Pasien Terlebih Dahulu</a>
        </div>
        <div class="end">
        <button class='btn btn-primary text' disabled> &raquo; Update Status Pasien</button>
        </div>
</div> <div class="row"></div>
        
<hr><center>
<div class="overflow" style='height:320px'>
      <table class="table" style='width:100%'>
                <thead>
                <tr class='btn-primary'>
                    <th colspan="11"><center>DATA KUNJUNGAN PASIEN</th>
                </tr>
                <tr class='btn-info'>
                    <th><center>No.</th>
                    <th><center>Tgl. Masuk</th>
                    <th><center>Keterangan</th>
                    <th><center>No. RM</th>
                    <th><center>Nama</th>
                    <th><center>L / P</th>
                    <th><center>Penjamin</th>
                    <th><center>Asal Kunjungan</th>
                    <th><center>Alamat</th>
                    <th><center>Tgl. lahir</th>
                    <th><center>Nama Ortu</th>
                </tr>
                </thead>
                <tbody id='tbody'></tbody>
        </table>
        </div>

</body>
</html>