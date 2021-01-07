<?php
use kartik\select2\Select2;
use yii\helpers\Html;
$this->title = 'Riwayat Kunjungan';
?>
<!DOCTYPE html>
<html lang="en">
<head>
</head>
<body>
<input type="hidden" id='pasienId'>
    <div class="container top">   
        <div class="col-sm-6 ">
            <table>
            <td><b>Instansi </b></td><td><b>:&nbsp;</b></td><td><select style="width:250px;" id="inst"> 
            <option>SEMUA</option>
            <option>RUMAH SAKIT PRIMA HUSADA CIPTA MEDAN</option>
            <option>KLINIK KRAKATAU</option>
            <option>KLINIK BICT</option></select><br></td>
            <tr>
                <td><label for="RM">Nomor RM</label></td>
                <td><b>:&nbsp;</b></td>
                <td> <input id='rmR' type="text"><br>  </td>
            </tr>
            <tr>
                <td> <label for="Nama">Nama</label></td>
                <td><b>:&nbsp;</b></td>
                <td> <div id="diagnosaTable" style='width:200px;display:inline-block;'><?= Select2::widget([                                               'name' => '',
                                            'data' => $search,
                                            'options' => [
                                            'placeholder' => 'Cari Pasien',
                                            'allowClear' => true,
                                            'id' => 'namaR'
                                            ],
                                            ]); ?></div><br></td>
            </tr>
            <tr>
                <td> <label for="jenkel">Jenis Kelamin &emsp;</label></td>
                <td><b>:&nbsp;</b></td>
                <td><input disabled type="text" id='jenkel'></td>
            </tr>
            </table>
            </div>

        <div class="col-sm-6 ">
            <table>
                <tr>
                    <td><label for="nmortu">Nama Orang Tua &emsp;</label></td>
                    <td><b>:&nbsp;</b></td>
                    <td>  <input type="text" disabled id="nmortu" style="width:250px;"><br></td>
                </tr>
                <tr>
                    <td> <label for="alamat">Alamat</label></td
                    ><td><b>:&nbsp;</b></td>
                    <td> <textarea rows='2' disabled id="alamat"></textarea></td>
                </tr>
            </table>     
            </div>
    </div>
<br>
        <div class="col-sm-6"> 
            <div class="overflow">          
                <table class="table table-hover">
                    <tr class="info">
                        <td colspan="5" style='text-align: center;'>RIWAYAT KUNJUNGAN</td>
                    </tr>
                    <tr class="success">
                        <td class="tablehead">NO.</td>
                        <td class="tablehead">TGL. MASUK</td>
                        <td class="tablehead">TGL. KELUAR</td>
                        <td class="tablehead">TEMPAT LAYANAN</td>
                        <td class="tablehead">PENJAMIN</td>
                    </tr>
                    <tbody id="dataKunjungan"></tbody>
                </table>
                </div>
            </div>
            <div class="col-sm-6"> 
            <div class="overflow">          
                <table class="table table-hover table-striped">
                    <tr class="info" >
                        <td colspan="5" style='text-align:center;'>KUNJUNGAN KE TEMPAT LAYANAN</td>
                    </tr>
                    <tr class="success">
                        <td class="tablehead" width="3%">NO.</td>
                        <td class="tablehead" width="8%">TGL. LAYANAN</td>
                        <td class="tablehead">TEMPAT LAYANAN</td>
                        <td class="tablehead">DOKTER</td>
                        <td class="tablehead">KELAS</td>

                    </tr><tbody id='dataDiagnosa'></tbody>

                </table>
            </div>
        </div>
    
    <br>
    <div class="col-sm-11" style='margin-top:30px;width:100%'> 
            <div class="overflow">          
                <table class="table table-hover">
                    <tr class="info">
                        <td colspan="9" style='text-align: center;'>DETAIL KUNJUNGAN</td>
                    </tr>
                    <tr class="success">
                        <td class="tablehead">NO.</td>
                        <td class="tablehead">TANGGAL</td>
                        <td class="tablehead">TINDAKAN</td>
                        <td class="tablehead">KELAS</td>
                        <td class="tablehead">DOKTER</td>
                        <td class="tablehead">JLH. TINDAKAN</td>
                        <td class="tablehead">BIAYA</td>
                        <td class="tablehead">BAYAR</td>
                        <td class="tablehead">KETERANGAN</td>

                    </tr>
                    <tbody id="dataTindakan"></tbody>
                </table>
                
                </div></div>
            </div>
    </div>

</div>
</body>
</html>

<?php
$script = <<< JS


JS;
$this->registerJs($script);
?>