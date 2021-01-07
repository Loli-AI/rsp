<?php
use yii\helpers\Html;

$this->title = 'Rekam Medis Pasien';
?>
<input type="hidden" id='pasienId' value='<?= $data['id'] ?>'>
<h4>RUMAH SAKIT PRIMA HUSADA CIPTA MEDAN</h4>
<P>JL.Stasiun No.92</P>
<p>Telepon : (061) 6941927 - 6940120</p>
<p>Medan</p>
    <center><table class='borderless table-hover' style="width:800px,align:left">
        <tr><th colspan=3 ><center>RIWAYAT PASIEN</th></tr>
        <tr>
            <td width="50%">No RM Pasien</td>
            <td>:</td>
            <td><?= $data['no_rm']; ?></td>
        </tr>
        <tr>
            <td>Nama Pasien</td>
            <td>:</td>
            <td><?= $data['nama']; ?></td>
        </tr>
        <tr>
            <td>Alamat</td>
            <td>:</td>
            <td>RT.<?= $data['rt']; ?> RW.<?= $data['rw']; ?> Desa/Kel.<?= $data['kelurahan']; ?> Kec.<?= $data['kecamatan'] ?> Kab.<?= $data['kabupaten'] ?></td>
        </tr>
    </table>
    <br><br>
    <div style='height:30%' class="overflow top">
<table border='1px solid black' class='table table-striped table-hover'>
<tr>
    <td colspan='10'><strong><center>DATA DIAGNOSA PASIEN</td>
</tr>
    <tr>
                            <td ><strong><center>No.</strong></td>
                            <td  ><strong><center>Tanggal</strong></td>
                            <td  ><strong><center>Diagnosa</strong></td>
                             <td  ><strong><center>Diagnosa Banding</strong></td>
                             <td  ><strong><center>Unit Layanan</strong></td>
                             <td  ><strong><center>Penyebab Kematian</strong></td>
                             <td  ><strong><center>Dokter</strong></td>
                             <td  ><strong><center>Prioritas</strong></td>
                             <td  ><strong><center>Diagnosa Akhir</strong></td>
                             <td  ><strong><center>Klinis</strong></td>



    </tr>
    <tbody id='dataR'></tbody>
</table>
</div><br>

  <div style='height:30%' class="overflow top">
<table border='1px solid black' class='table table-striped table-hover'>
<tr>
    <td colspan='10'><strong><center>DATA TINDAKAN PASIEN</td>
</tr>
    <tr>
                            <td ><strong><center>No.</strong></td>
                            <td  ><strong><center>Tanggal</strong></td>
                            <td  ><strong><center>Tindakan</strong></td>
                             <td  ><strong><center>Biaya</strong></td>
                             <td  ><strong><center>Jumlah</strong></td>
                             <td  ><strong><center>Total Biaya</strong></td>
                             <td  ><strong><center>Dokter</strong></td>
                             <td  ><strong><center>Unit Layanan</strong></td>
                             <td  ><strong><center>Kelas</strong></td>
                             <td  ><strong><center>Petugas</strong></td>

    </tr>
    <tbody id='dataT'></tbody>
</table>
</div>

<?php
$script = <<< JS

DataDiagnosisR();
DataTindakanR();


JS;
$this->registerJs($script);
?>