<?php
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\db\ActiveRecord; 
use yii\helpers\ArrayHelper;
use app\models\KunjunganPasien;
use app\models\TempatLayananRj;
use app\models\DataRujukUnit;
use app\models\JenisLayanan;
use app\models\DokterPengganti;
use kartik\date\DatePicker;
use app\models\Dokter;
use yii\helpers\Url;
use kartik\select2\Select2;
use app\models\BMsTaripbaru;
use app\models\Obat;
use app\models\BMsBobat;
use app\models\Dosis;

$this->title = 'Detail Pelayanan';
$date = date('Y/m/d');
$url = Url::toRoute(['billing/telepon']);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        .left {
            float: left;
            display: inline-block;
        }
    </style>
</head>

<body>
    <input type="hidden" value='<?= $data['id']; ?>' id='idPasien'>
    <input type="hidden" value='<?= $_GET['idLayanan']; ?>' id='idLayanan'>
    <input type="hidden" value='<?= $date ?>' id='todayDate'>

    <div class="container">
        <div class="container-fluid">
            <div class="row content">
                <div class="col-sm-3 sidenav">
                    <h3>RS.PHCM</h3>
                    <p>Detail pelayanan pasien</p>
                    <ul class="nav nav-pills nav-stacked">
                        <li><a data-toggle="modal" data-target="#mrs" style="cursor:pointer;">MRS</a></li>
                        <li> <a data-toggle="modal" data-target="#konsul" style="cursor:pointer;">KONSUL</a></li>
                        <li><a target='_blank' href="<?= $riwayat; ?>">RIWAYAT PASIEN</a></li>
                        <li><a target='_blank' href="<?= $resum; ?>">RESUME MEDIS</a></li>
                        <li> <a class="dropdown-btn" style="cursor:pointer;">RINCIAN TINDAKAN
                                <i class="fa fa-caret-down"></i>
                            </a>
                            <div class="dropdown-container">
                                <ul>
                                    <li><a href="#">RINCIAN RJ/RD</a> </li>
                                    <li><a href="#">RINCIAN RI</a> </li>
                                    <li><a href="#">RINCIAN RJ/RD+RI</a> </li>
                                    <li><a href="#">REKAP RJ/RD</a> </li>
                                    <li><a href="#">REKAP RI</a> </li>
                                    <li><a href="#">REKAP RJ/RD+RI</a> </li>
                                </ul>
                            </div>
                        </li>
                        <li><a data-toggle="modal" data-target="#suratketerangan" style="cursor:pointer;">SURAT KETERANGAN</a></li>
                        <li><a data-toggle="modal" data-target="#hasillab" style="cursor:pointer;">HASIL LAB</a></li>
                        <li><a data-toggle="modal" data-target="#hasillab">HISTORY HASIL LAB</a></li>
                        <li><a href="#section3">HASIL RADIOLOGI</a></li>
                        <li> <a class="dropdown-btn" style="cursor:pointer;">REPORT RM
                                <i class="fa fa-caret-down"></i>
                            </a>
                            <div class="dropdown-container">
                                <ul>
                                    <li><a data-toggle="modal" data-target="#konsen" style="cursor:pointer;">INFORM KONSEN</a> </li>
                                    <li><a data-toggle="modal" data-target="#persmedik" style="cursor:pointer;">Persetujuan tind.medik</a> </li>
                                    <li><a data-toggle="modal" data-target="#penmedik" style="cursor:pointer;">Penolakan tind.medik</a> </li>
                                </ul>
                            </div>
                        </li>
                        <li><a data-toggle="modal" data-target="#mentel" style="cursor:pointer;">PERLAKUAN KHUSUS</a></li>
                        <li><a href='#selection3' onclick='checkout()' data-toggle="modal" data-target="#exampleModal">CHECK OUT</a></li>
                        <li><a data-toggle="modal" data-target="#krs" style="cursor:pointer;">KRS</a></li>



                    </ul><br>
                </div>


                <div class="col-sm-9">
                    <div class="alert ">
                        <table class="header">
                            <tr>
                                <td class="txt-white"> &nbsp;</td>
                                <td class="txt-white"><i class="fas fa-location-arrow"></i> <b>Tempat Layanan :</b>&nbsp;</td>
                                <td>
                                    <div class="input-group mb-3 input-group-sm"><b>
                                            <input id='unitLayanan' class="form-control" readonly value='<?= $temp_layanan['temp_layanan'] ?>'></div>
                    </div></b>
                    </td>
                    </tr>
                    </table>
                </div>
                <tr>
                    <label for="norm"><i class="fas fa-barcode"></i> No RM :<input type="text" readonly class="form-control" id="norm" value='<?= $data['no_rm'] ?>'></label>
                    <label for="nama"><i class="fas fa-file-signature"></i> Nama : <input type="text" readonly class="form-control" id="nama" value='<?= $data['nama'] ?>'></label>
                    <label for="lhr"><i class="fas fa-calendar-alt"></i> Tanggal Lahir : <input type="text" readonly class="form-control" id="lhr" value='<?= $data['tgl_lahir'] ?>'></label>
                </tr>
                <tr>
                    <label for="umur"><i class="fas fa-sort-numeric-up-alt"></i> Umur &nbsp;: <input type="text" readonly class="form-control" id="umur" value='<?= $data['umur'] ?>'></label>
                    <label for="ortu"><i class="fas fa-user-friends"></i> Ortu &nbsp;&nbsp;:<input type="text" readonly class="form-control" id="ortu" value='<?= $data['ortu'] ?>'></label>
                    <label for="lp"><i class="fas fa-venus-mars"></i> L/P &nbsp;:<input type="text" readonly class="form-control" id="lp" value="<?= $data['jenis_kelamin'] ?>"></label>
                </tr>
                <tr>
                    <label for="agama"><i class="fas fa-praying-hands"></i> Agama :<input type="text" readonly class="form-control" id="agama" value='<?= $data['agama'] ?>'></label>
                    <label for="notelp"><a data-toggle="modal" data-target="#myModal" class="telpon"><i class="fas fa-phone"></i> Telepon :</a>
                        <input type="text" readonly class="form-control" value='<?= $data['no_telepon'] ?>'></label>
                    <label for="alamat"><i class="fas fa-sign"></i> Alamat :<textarea type="text" readonly class="form-control" cols='27' id="alamat"><?= $data['alamat'] . ' ' .   $data['kabupaten'] . ' ' .  $data['kecamatan'] . ' ' .  $data['kelurahan'] ?></textarea></label>
                </tr>

                <tr>
                    <label for="alergi"><a data-toggle="modal" data-target="#alergi"><i class="fas fa-allergies"></i> Riwayat Alergi :</a>
                        <textarea type="text" readonly rows="2" class="form-control" id='AlergiC' cols='27'><?= $alergi['alergi']; ?></textarea></label>
                    <label for="DPJP"><a data-toggle="modal" data-target="#dpjp"><i class="fas fa-stethoscope"></i> DPJP : </a>
                        <br> <textarea type="text" readonly rows="2" class="form-control" id='Alergi' cols='27'><?= $data['dpjp']; ?></textarea> </label>
                </tr>
                <ul class="nav nav-tabs top">
                    <li class="active"><a data-toggle="tab" href="#anamnesis">ANAMNEMSIS</a></li>
                    <li><a data-toggle="tab" href="#diagnosis">DIAGNOSIS</a></li>
                    <li><a data-toggle="tab" href="#tindakan">TINDAKAN</a></li>
                    <li><a data-toggle="tab" href="#gabut">RESEP</a></li>
                    <li><a data-toggle="tab" href="#bhp">PEMAKAIAN BHP</a></li>
                </ul><br>
                <div class="tab-content">
                    <div class="tab-pane fade in active" id="anamnesis">
                        <button type='button' class="btn btn-success top" data-toggle="modal" data-toggle="modal" data-target="#anamnese"><i class='fas fa-plus'></i> Tambah</button>&emsp;
                        <button class="btn btn-warning top" id="tambah"><i class='fas fa-print'></i> CETAK</button>
                        <div class="overflow top">
                            <table class="table">
                                <tr class="text-center">
                                    <td colspan="3">DATA ANAMNESA</td>
                                </tr>
                                <tr class="text-center">
                                    <td class="danger" width="20px">NO</td>
                                    <td class="danger">TANGGAL</td>
                                    <td class="danger">DOKTER</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="diagnosis">
                        <form>
                            <table class="borderless">
                                <tr>
                                    <td>&emsp;</td>
                                    <td>&emsp;&nbsp;<div id='manualDiag'><input type="checkbox" onclick='gantiManualDiag()' id='checkManualDiag'>&nbsp;Diagnosa Manual</div></td>
                                </tr>
                                <tr>
                                    <td width="150px">Diagnosa</td>
                                    <td>:&emsp;<div id="diagnosaTable" style='width:200px;display:inline-block;'><?= Select2::widget([                                               'name' => '',
                                            'data' => $diagnosa,
                                            'options' => [
                                            'placeholder' => 'Cari Diagnosa',
                                            'allowClear' => true,
                                            'id' => 'diagnosaData1',
                                            ],
                                            ]); ?></div><div style='display:inline-block' id="diagnosaOn"><input type="text" id='diagnosaClick'></div>
                                        <div style='display:inline-block' id="diagnosaManual"><input type="text" id='diagnosaData2' class='diagnosaManual'></div>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="150px">Diagnosa Klinis</td>
                                    <td>:&emsp;<input onclick='gantiKlinis()' type="checkbox" id='checkKlinis'> Ya</td>
                                    <input type="hidden" id='klinis' value='Tidak'>
                                </tr>
                                <tr>
                                    <td width="150px">Prioritas</td>
                                    <td>:&emsp;<select id='diagPrioritas' value="Utama">
                                            <option value="Utama">Utama</option>
                                            <option value="Sekunder">Sekunder</option>
                                        </select></td>
                                </tr>
                                <tr>
                                    <td width="150px">Diagnosa Banding</td>
                                    <td>:&emsp;<input id='banding' type="text">&nbsp;
                                        <button id='buttonTambah' onclick='tambahRow()' type="button" class="btn btn-success"><i class='fas fa-plus'></i></button>
                                    </td>
                                </tr>

                                <tbody id='diagBanding'></tbody>

                                <tr>
                                    <td width="150px">Diagnosa Akhir</td>
                                    <td>:&emsp;<input type="checkbox" onclick='gantiAkhir()' id='checkAkhir'> Ya</td>
                                    <input type="hidden" id='akhir' value='Tidak'>
                                </tr>
                                <tr>
                                    <td width="150px">Diagnosa Kematian</td>
                                    <td>:&emsp;<input type="checkbox" id='checkDiagMati' onclick='gantiDiagMati()'> Ya</td>
                                    <input type="hidden" id='diagMati' value='Tidak'>
                                </tr>
                                <tr>
                                    <td width="150px">Dokter</td>
                                    <td>:&emsp;
                                        <div id="dokterDiag" style='display:inline-block'>
                                            <select id="dokterDiagnosa1">
                                                <?php foreach ($dokter as $data) { ?>
                                                    <option value="<?= $data; ?>"><?= $data; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div id="dokterClick" style='display:inline-block'><input id='dokterOn' type="text"></div>
                                        <div id="dokterGanti" style='display:inline-block'>
                                            <select id="dokterDiagnosa2">
                                                <?php foreach ($dokterP as $data) { ?>
                                                    <option value="<?= $data['nama_dokter']; ?>"><?= $data['nama_dokter']; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        &emsp;<div id='dokterdiag'><input onchange='gantiDokterDiag()' id='checkDokterDiag' type="checkbox"> <label for="checkDokterDiag"> Dokter Pengganti</label></div>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan='3'><button onclick='TambahDiagnosa()' id='tambahDiag' type='button' class="btn btn-success top"><i class='fas fa-plus'></i> Tambah</button>&nbsp;
                                        <button type='button' onclick='HapusDiagnosa()' class="btn btn-danger top"><i class='fas fa-trash-alt'></i> Hapus</button>&nbsp;
                                    </td>
                                </tr>
                            </table>
                        </form>
                        <input type="hidden" id='idDiag' value='a'>
                        <div class="overflow top">
                            <table class="table table-hover table-striped">
                                <tr class="text-center">
                                    <td class=" success">NO</td>
                                    <td class=" success">TANGGAL</td>
                                    <td class=" success" width="200px">DIAGNOSA</td>
                                    <td class=" success">BANDING</td>
                                    <td class=" success">DOKTER</td>
                                    <td class=" success">PRIORITAS</td>
                                    <td class=" success">AKHIR</td>
                                </tr>
                                <tbody id='dataDiagnosa'></tbody>
                            </table>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="tindakan">
                        <table class="borderless">
                            <tr>
                                <td>Tanggal</td>
                                <td>:&emsp;<div style='width:200px;display:inline-block;'>
                                        <?= DatePicker::widget([
                                            'name' => '',
                                            'removeButton' => false,
                                            'options' => ['id' => 'tglTind', 'placeholder' => 'Tanggal'],
                                            'pluginOptions' => [
                                                'autoclose' => true,
                                                'format' => 'yyyy/mm/dd'
                                            ]
                                        ]); ?></div>
                                </td>
                            </tr>
                            <tr>
                                <td width="150px">Tindakan</td>
                                <td>:&emsp;<div style='width:200px;display:inline-block;'><?= Select2::widget([
                                                                                                'name' => '',
                                                                                                'data' => $tindakan,
                                                                                                'options' => [
                                                                                                    'placeholder' => 'Cari Tindakan',
                                                                                                    'allowClear' => true,
                                                                                                    'id' => 'inputTind',
                                                                                                ],
                                                                                            ]); ?></div>
                                </td>
                            </tr>
                            <tr>
                                <td width="150px">Kelas</td>
                                <td>:&emsp;<span id='kelasTind'>Non Kelas </span></td>
                            </tr>
                            <tr>
                                <td width="150px">Biaya</td>
                                <td>:&emsp;<input id='biayaTind' disabled value='0'>&emsp;Jumlah : <input id='jumlahTind' type="text">
                                </td>
                            </tr>
                            <tr>
                                <td width="150px">Keterangan</td>
                                <td>:&emsp;<textarea id='ketTind' cols='18' rows='2'></textarea></td>
                            </tr>
                            <tr>
                                <td width="150px">Pelaksana</td>
                                <td>:&emsp;&nbsp;&nbsp;<div id='dokterTind1' style='width:200px;display:inline-block'><?= Select2::widget([
                                                                                                                            'name' => '',
                                                                                                                            'data' => $dokter,
                                                                                                                            'options' => [
                                                                                                                                'placeholder' => 'Pelaksana ...',
                                                                                                                                'multiple' => true,
                                                                                                                                'id' => 'pelTind1',
                                                                                                                            ],
                                                                                                                        ]); ?></div>
                                    <div id="dokterTind2" style='width:200px;display:inline-block'><?= Select2::widget([
                                                                                                        'name' => '',
                                                                                                        'data' => $dokter,
                                                                                                        'options' => [
                                                                                                            'placeholder' => 'Pelaksana ...',
                                                                                                            'multiple' => true,
                                                                                                            'id' => 'pelTind2',
                                                                                                        ],
                                                                                                    ]); ?></div>
                                    &nbsp;&nbsp;<input onclick='checkDokterTind()' id='checkDokterTind' type="checkbox"> <label for="checkDokterTind">Dokter Pengganti</label>
                                </td>
                            </tr>
                            <tr>
                                <td colspan='3'><button onclick='TambahTindakan()' type='button' class="btn btn-success top"><i class="fas fa-plus"></i> Tambah</button>&emsp;
                                    <button onclick='HapusTindakan()' type='button' class="btn btn-danger top"><i class="fas fa-trash-alt"></i> Hapus</button></td>
                            </tr>
                        </table>
                        <div class="overflow top">
                            <table class="table">
                                <tr>
                                    <td class="success" width="20px">NO</td>
                                    <td class="success" width="100px">TANGGAL</td>
                                    <td class="success" width="100px">TINDAKAN</td>
                                    <td class="success" width="100px">KELAS</td>
                                    <td class="success" width="100px">BIAYA</td>
                                    <td class="success" width="100px">JUMLAH</td>
                                    <td class="success" width="100px">SUBTOTAL</td>
                                    <td class="success" width="100px">PELAKSANA</td>
                                    <td class="success" width="100px">KETERANGAN</td>
                                    <td class="success" width="100px">PETUGAS INPUT</td>
                                    </center>
                                </tr>
                                <tbody  id='dataTind'></tbody>
                            </table>
                            <input type="hidden" id='idTind'>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="gabut">
                        <table class="borderless">
                            <tr>
                                <td></td>
                                <td></td>
                                <td>
                                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#tambahresep"><i class="fas fa-plus"></i> Tambah</button>&nbsp;
                                    <button type="button" class="btn btn-primary"><i class="fas fa-pen"></i> Ubah</button>&nbsp;
                                    <button type="button" class="btn btn-warning"><i class="fas fa-print"></i> Cetak Resep</button>
                            </tr>
                        </table>
                        <div class="panel-group top" id="accordion">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">
                                            <center>DATA RESEP</center>
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapse1" class="panel-collapse collapse in">
                                    <div class="panel-body">
                                        <div class="overflow">
                                            <table class="table">
                                                <tr>
                                                    <td class="success" width="20px">NO</td>
                                                    <td class="success">NO RESEP</td>
                                                    <td class="success">ITER RESEP</td>
                                                    <td class="success">TANGGAL</td>
                                                    <td class="success">APOTEK</td>
                                                    <td class="success">STATUS</td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapse2">
                                            <center>DATA OBAT DALAM RESEP</center>
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapse2" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <div class="overflow">
                                            <table class="table">
                                                <tr>
                                                    <td class="success" width="20px">NO</td>
                                                    <td class="success" width="160px">NAMA OBAT</td>
                                                    <td class="success" width="100px">JUMLAH</td>
                                                    <td class="success" width="120px">RACIKAN</td>
                                                    <td class="success" width="100px">DOSIS</td>
                                                    <td class="success" width="160px">DOKTER</td>
                                                    <td class="success" width="30px">STOK</td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="bhp">
                        <form>
                            <table class="borderless">

                                <tr>
                                    <td width="150px">Nama Bahan</td>
                                    <td>:&emsp;<input type="text" id="tambah3"></td>
                                </tr>
                                <tr>
                                    <td width="150px">Jumlah </td>
                                    <td>:&emsp;<input type="text" id="tambah3">
                                    </td>
                                </tr>
                                <tr>
                                    <td width="150px">Keterangan</td>
                                    <td>:&emsp;<input type="text" width="200px" id="tambah3"></td>
                                </tr> 
                                </table>
                                <button class="btn btn-success top"><i class='fas fa-plus'></i> Tambah</button>&emsp;
                                <button class="btn btn-danger top"><i class='fas fa-trash-alt'></i> Hapus</button>
                            
                        </form>
                        <div class="overflow top">
                            <table class="table">
                                <tr>
                                    <td class="success" colspan="6">
                                        <center>DATA PEMAKAIAN BHP
                                    </td>
                                </tr>
                                <tr>
                                    <td class="success" width="20px">NO</td>
                                    <td class="success" width="50px">TANGGAL</td>
                                    <td class="success" width="140px">NAMA BAHAN</td>
                                    <td class="success">KEPEMILIKAN</td>
                                    <td class="success">JUMLAH</td>
                                    <td class="success">KETERANGAN</td>
                                    </center>
                                </tr>
                            </table>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
    <footer style='background-color:whitesmoke'>
    </footer>
    </div>

    <div class="modal fade" id="myModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Masukkan Nomor Telepon</h4>
                    <form>
                        <input type="text" class="form-control" name='no' id='telepon' placeholder='Nomor Telepon'><br>
                        <div class="btn btn-success top" id='tel'><i class="fas fa-pen"></i> &nbsp;Ubah</div>
                        <button type="reset" class="btn btn-danger top"><i class="fas fa-backspace"></i> &nbsp;Hapus
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!--mrs-->

    <div class="modal fade" id="mrs" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Pasien Masuk</h4>
                </div>
                <div class="modal-body">

                    <form>
                        <table class="borderless">
                            <div class="tambah3">
                                <tr>
                                    <td width="150px">Jenis Layanan</td>
                                    <td>:
                                        <select value="Layanan" id="tambah3">
                                            <option value="L-RI">RAWAT INAP</option>
                                            <option value="L-GD">GAWAT DARURAT</option>
                                            <option value="L-LB">LABORATORIUM</option>
                                            <option value="L-RD">RADIOLOGI</option>
                                            <option value="L-OK">OK</option>
                                            <option value="L-HD">HOMODIALISIS</option>
                                            <option value="L-AMBULAN">AMBULAN</option>
                                            <option value="L-KJ">KAMAR JENAJAH</option>
                                            <option value="L-FI">FARMASI</option>
                                            <option value="L-BD">BANK DARAH</option>
                                            <option value="L-CS">CSSD</option>
                                            <option value="L-GZ">GIZI</option>
                                        </select>
                                    </td>
                                </tr>
                            </div>
                            <div class="tambah3">
                                <tr>
                                    <td width="150px">Tempat Layanan</td>
                                    <td>:
                                        <select value="Layanan" id="tambah3">
                                            <option value="TL-VIP">VIP</option>
                                            <option value="TL-K1">KELAS 1</option>
                                            <option value="TL-K2">KELAS 2</option>
                                            <option value="TL-K3">KELAS 3</option>
                                        </select>
                                    </td>
                                </tr>
                            </div>
                            <div class="tambah3">
                                <tr>
                                    <td width="150px">Kelas</td>
                                    <td>:
                                        <select value="Layanan" id="tambah3">
                                            <option value="K-VIP">VIP</option>
                                        </select>
                                    </td>
                                </tr>
                            </div>
                            <div class="tambah3">
                                <tr>
                                    <td width="150px">Kamar</td>
                                    <td>:
                                        <select value="Layanan" id="tambah3">
                                            <option value="TL-K1">JASMINE 5</option>
                                            <option value="TL-K2">JASMINE 6</option>
                                            <option value="TL-K3">JASMINE 7</option>
                                        </select>
                                        1500000
                                    </td>
                                </tr>
                            </div>
                            <tr>
                                <td width="150px">Tanggal Rujuk</td>
                                <td>:
                                    <input type="date" value="20-02-2020" id="tambah3"></input> <button>V</button>
                                </td>
                            </tr>
                            <tr>
                                <td width="150px" id="tambah3">keterangan Rujuk </td>
                                <td>:
                                    <textarea name="keterangan" id="" cols="20" rows="1" id="tambah3"></textarea>
                                </td>
                            </tr>
                            <tr>
                                <td width="150px">Dokter Penunjuk</td>
                                <td>:
                                    <select value="dokter" id="tambah3">
                                        <option value="Administrator">Administrator</option>
                                        <option value="Ahmad-Rudyanto">Ahmad Rudyanto</option>
                                        <option value="Akhdan-Fadhilah">Akhdan Fadhilah</option>
                                        <option value="Krisna-Kumar">Krisna Kumar</option>
                                        <option value="Melvin-Jouvano">Melvin Jouvano</option>
                                        <option value="Novia-Cahaya">Novia Cahaya</option>
                                    </select>
                                    &nbsp;&nbsp;<input type="checkbox"> Dokter Pengganti <div class="row"></div>
                                </td>
                            </tr>
                            <div class="row"></div>
                            <tr>
                                <td width="150px">Dokter Tujuan</td>
                                <td id="tambah3">:
                                    <select value="dokter" id="tambah3">
                                        <option value="Administrator">Administrator</option>
                                        <option value="Ahmad-Rudyanto">Ahmad Rudyanto</option>
                                        <option value="Akhdan-Fadhilah">Akhdan Fadhilah</option>
                                        <option value="Krisna-Kumar">Krisna Kumar</option>
                                        <option value="Melvin-Jouvano">Melvin Jouvano</option>
                                        <option value="Novia-Cahaya">Novia Cahaya</option>
                                    </select>
                                    &nbsp;&nbsp;<input type="checkbox" id="tambah3"> Dokter Pengganti<div class="row"></div>
                                </td>
                                <div class="row"></div>
                            </tr>
                            <tr>
                                <td></td>
                                <td>&nbsp;<button class="btn btn-success top" id="tambah3">➕ Tambah</button>&nbsp;<button class="btn btn-danger top" id="tambah3">❌ Hapus</button>&nbsp;<input type="reset" class="btn btn-primary top" value="↩ Batal" id="tambah3"></input></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>&nbsp;<button class="btn btn-alert top" id="tambah3">SURAT PERINTAH INAP</button></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>&nbsp;<button class="btn btn-alert top">DATA PASIEN MRS</button>&nbsp;<button class="btn btn-alert top">PERMOHONAN KONSUL</button>&nbsp;<button class="btn btn-alert">🖨 CETAK ANTRIAN</button></td>
                            </tr>
                        </table>
                    </form>
                    <div class="overflow">
                        <table class="table">
                            <tr>
                                <td colspan="5">
                                    <center>DATA RUJUK UNIT
                                </td>
                            </tr>
                            <tr>
                                <td class="alert danger" width="20px">NO</td>
                                <td class="alert danger">TANGGAL</td>
                                <td class="alert danger">UNIT</td>
                                <td class="alert danger">DOKTER</td>
                                <td class="alert danger">DOKTER TUJUAN</td>
                            </tr>

                        </table>
                    </div>
                    </fieldset>


                </div>
            </div>
        </div>
    </div>

    <!--konsul-->
    <div class="modal fade " id="konsul" role="dialog">
        <div class="modal-dialog ">
            <div class="modal-content ">
                <div class="modal-header "> <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Konsul</h4>
                </div>
                <div class="modal-body">
                    <center>
                        <table class='table'>
                            <tr>
                                <td>Jenis Layanan</td>
                                <td>:</td>
                                <td><select id="jenisLayananKonsul">
                                        <?php foreach ($jenis_layanan as $value) { ?>
                                            <option value="<?= $value['nama_layanan'] ?>"><?= $value['nama_layanan'] ?></option>
                                        <?php } ?>
                                    </select></td>
                            </tr>
                            <tr>
                                <td>Tempat Layanan</td>
                                <td>:</td>
                                <td><select id='tempatKonsul'>
                                        <?php foreach ($tempat_layanan_rj as $value) { ?>
                                            <option value='<?= $value['nama_tempat_layanan'] ?>'><?= $value['nama_tempat_layanan'] ?></option>
                                        <?php } ?></select>
                </div>
                </td>
                </tr>
                <tr>
                    <td>Tanggal Rujuk</td>
                    <td>:</td>
                    <td>
                        <div class='text'>
                            <?= DatePicker::widget([
                                'name' => '',
                                'removeButton' => false,
                                'options' => ['id' => 'tglKonsul', 'placeholder' => 'Tanggal ...'],
                                'pluginOptions' => [
                                    'autoclose' => true,
                                    'format' => 'yyyy/mm/dd'
                                ]
                            ]); ?></div>
                    </td>
                </tr>
                <tr>
                    <td>Keterangan Rujuk </td>
                    <td>:</td>
                    <td><textarea id="ketKonsul" cols="30" rows="3"></textarea></td>
                </tr>
                <tr>
                    <td width="150px">Dokter Penunjuk</td>
                    <td>:</td>
                    <td><select style='width:230px' id="dokterPenunjukKonsul">
                            <?php foreach ($dokter as $value) { ?>
                                <option value="<?= $value ?>"><?= $value ?></option>.
                            <?php } ?>
                        </select>
                        &emsp;<input type="checkbox"> Dokter Pengganti
                    </td>
                </tr>
                <tr>
                    <td>Dokter Tujuan</td>
                    <td>:</td>
                    <td><select style='width:230px' id="dokterTujuanKonsul">
                            <?php foreach ($dokter as $value) { ?>
                                <option value="<?= $value ?>"><?= $value ?></option>.
                            <?php } ?>
                        </select>
                        &emsp;<input type="checkbox"> Dokter Pengganti<div class="row"></div>
                    </td>
                    <div class="row"></div>
                </tr>
                <input type="hidden" id='idKonsul'>
                <tr>
                    <td colspan='3'>
                        <center>
                            <button class="btn btn-primary top" id='tambahKonsul'><i class='fas fa-plus'></i> Tambah Konsul</button>&emsp;
                            <button onclick='HapusKonsul()' class='btn btn-danger top'><i class='fas fa-trash-alt'></i> Hapus Konsul</button><br><br>
                            <button target='_blank' id='cetakKonsul' class='btn btn-warning'><i class="fas fa-print"></i> Cetak</button>&emsp;
                            <button id='dataMRSKonsul' class='btn btn-warning'><i class="fas fa-print"></i> Data MRS</button>&emsp;
                            <button id='permohonanKonsul' class='btn btn-warning'><i class="fas fa-print"></i> Permohonan Konsul</button></center>
                    </td>
                </tr>

                </table>
                </center>
                <input type="hidden" id='idK'>
                <div class="overflow">
                    <table class="table table-hover">
                        <tr>
                            <td class="danger">NO</td>
                            <td class="danger">TANGGAL</td>
                            <td class="danger">UNIT</td>
                            <td class="danger">DOKTER</td>
                            <td class="danger">DOKTER TUJUAN</td>
                            <td class="danger">KETERANGAN</td>
                            </center>
                        </tr>
                        <tbody id='dataKonsul'>
                        </tbody>
                    </table>
                </div>

            </div>

        </div>
    </div>
    </div>

    <!--surat keterangan-->
    <div class="modal fade" id="suratketerangan" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header"><button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Surat Keterangan</h4>
                </div>
                <div class="modal-body">
                    <table class="borderless top">
                        <tr>
                            <td width="150px">Jenis Keterangan</td>
                            <td>:
                                <select value="Jenis-keterangan">
                                    <option value="Sakit">Sakit</option>
                                    <option value="Sembuh">Sembuh</option>

                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>
                                <div class="row top"></div><button class="btn btn-primary top" id="tambah1">🖨 Cetak Surat Keterangan</button>
                            </td>
                        </tr>
                    </table>
                </div>

            </div>
        </div>
    </div>
    <!--alergi-->
    <div class="modal fade" id="alergi" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header"><button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Riwayat Alergi</h4>
                </div>
                <div class="modal-body">
                    <table class="borderless">
                        <tr>
                            <td>
                                <center>
                                    &emsp;<textarea id="alergiInput" cols="92" placeholder='Masukkan Alergi' rows="3"></textarea> </center>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <center><button class="btn btn-success top" id="tambahAlergi"><i class='fas fa-plus'></i> Tambah Alergi</button>
                            </td>
                        </tr>
                    </table><br>
                    <div class="overflow">
                        <table class="table table-bordered table-striped table-hover">
                            <tr>
                                <td class="danger" width="20px">NO</td>
                                <td class="danger">TANGGAL</td>
                                <td class="danger">RIWAYAT ALERGI</td>
                                <td class="danger">AKSI</td>
                            </tr>
                            <tbody id='dataAlergi'>
                            </tbody>
                            </center>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--krs-->
    <div class="modal fade" id="krs">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header"><button type="button" class="close" data-dismiss="modal">&times;</button><br>
                    <h4 class="modal-title">Pasien Keluar</h4>
                    </h4>
                </div>
                <div class="modal-body">
                    <form>
                        <table class="borderless">
                            <tr>
                                <td width="150px"><a data-toggle="modal" data-target="#carakeluar" style="cursor:pointer;">Cara Keluar</a></td>
                                <td>:
                                    <select value="cara-keluar" id="tambah3">
                                        <option value="RJ">Atas Izin Dokter</option>
                                        <option value="GD">Dirawat/MRS</option>
                                        <option value="LB">Dirujuk</option>
                                        <option value="RD">Melarikan Diri</option>
                                        <option value="OK">Meninggal</option>
                                        <option value="HD">Pulang Paksa</option>
                                        <option value="AMBULAN">APS</option>
                                    </select>x`
                                </td>
                            </tr>
                            <tr>
                                <td width="150px"><a data-toggle="modal" data-target="#keadaankeluar" style="cursor:pointer;">Keadaan Keluar</a></td>
                                <td>:
                                    <select value="keadaan-keluar" id="tambah3">
                                        <option value="pkl">Perlu Kontrol Kembali</option>
                                        <option value="Sembuh">Sembuh</option>
                                        <option value="Baru">Baru</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td width="150px">Kasus</td>
                                <td>:
                                    <select value="kasus" id="tambah3">
                                        <option value="Baru">Baru</option>
                                        <option value="Lama">Lama</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td width="150px">Tanggal Pulang</td>
                                <td>:
                                    <input type="date" name="" id="tambah3"> <button>V</button>
                                </td>
                            </tr>
                            <tr>
                                <td width="150px">Jam Pulang</td>
                                <td>:
                                    <input type="time" value="17:00" disabled id="waktu"></input>
                                    &nbsp;&nbsp;<input type="checkbox" id="tambah3" id="manual"> Set Manual <div class="row"></div>
                                </td>
                            </tr>
                            <tr>
                                <td width="150px">Dokter</td>
                                <td>:
                                    <select value="dokter" id="tambah3" disabled>
                                        <option value="Administrator">Administrator</option>
                                        <option value="Ahmad-Rudyanto">Ahmad Rudyanto</option>
                                        <option value="Akhdan-Fadhilah">Akhdan Fadhilah</option>
                                        <option value="Krisna-Kumar">Krisna Kumar</option>
                                        <option value="Melvin-Jouvano">Melvin Jouvano</option>
                                        <option value="Novia-Cahaya">Novia Cahaya</option>
                                    </select>
                                    &nbsp;&nbsp;<input type="checkbox"> Dokter Pengganti <div class="row"></div>
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>&nbsp;<button class="btn btn-success top" id="tambah3">➕ Tambah</button>&nbsp;<button class="btn btn-danger top" id="tambah3">❌ Hapus</button>&nbsp;<input type="reset" class="btn btn-primary top" value="↩ Batal" id="tambah3"></input>&nbsp;<button class="btn btn-alert" id="tambah3">Check List Pasien Pulang</button></td>
                            </tr>

                            <tr>
                                <td></td>
                                <td>&nbsp; <select value="pernyataan" id="tambah3">
                                        <option value="SPI">SP Inap</option>
                                        <option value="SKM">Surat Keterangan Meninggal</option>
                                        <option value="CLPL">Check List Pasien Pulang</option>
                                        <option value="APS">APS</option>
                                        <option value="Rujukan">Rujukan</option>
                                    </select>&emsp;<button class="" btn btn-alert">🖨 Cetak</button></td>
                            </tr>
                        </table>
                    </form>
                    <div class="overflow">
                        <table class="table table-bordered table-striped table-hover">
                            <tr>
                                <td colspan="5">
                                    <center>DATA KELUAR RUMAH SAKIT
                                </td>
                            </tr>
                            <tr>
                                <td class="alert danger" width="20px">NO</td>
                                <td class="alert danger">TANGGAL</td>
                                <td class="alert danger">CARA KELUAR</td>
                                <td class="alert danger">KEADAAN KELUAR</td>
                                <td class="alert danger">KASUS</td>
                                </center>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--carakeluar-->
    <div class="modal fade" id="carakeluar">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header"><button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">cara keluar</h4>
                </div>
                <div class="modal-body">
                    <form>
                        <table class="borderless">
                            <center>
                                <tr>
                                    <td>Cara Keluar :</td>
                                    <td>&nbsp;
                                        <textarea name="keterangan-alergi" id="tambah3" cols="51" rows="2"></textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Status</td>
                                    <td>:
                                        <input type="checkbox" name="status" id="status"></input>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Flag</td>
                                    <td>:
                                    </td>
                                </tr>
                        </table>
                        <table>
                            <tr>
                                <td width="240px"></td>
                                <td>&nbsp;<button class="btn btn-success" id="tambah3">➕ Tambah</button>&nbsp;<button class="btn btn-danger" id="tambah3">❌ Hapus</button>&nbsp;<input type="reset" class="btn btn-primary" value="↩ Batal" id="tambah3"></input>&nbsp;</td>
                            </tr>
                        </table>
                    </form>
                    <div class="overflow">
                        <table class="table table-bordered table-striped table-hover">
                            <tr>
                                <td colspan="3">DAFTAR CARA KELUAR</td>
                            </tr>
                            <tr>
                                <td class="alert danger" width="20px">NO</td>
                                <td class="alert danger">NAMA </td>
                                <td class="alert danger">STATUS</td>
                            </tr>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--keadaankeluar-->
    <div class="modal fade" id="keadaankeluar">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header"><button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">keadaan keluar</h4>
                </div>
                <div class="modal-body">
                    <table class="borderless">
                        <center>
                            <tr>
                                <td>Cara Keluar</td>
                                <td>:
                                    <select value="cara-keluar" id="tambah3">
                                        <option value="RJ">Atas Izin Dokter</option>
                                        <option value="GD">Dirawat/MRS</option>
                                        <option value="LB">Dirujuk</option>
                                        <option value="RD">Melarikan Diri</option>
                                        <option value="OK">Meninggal</option>
                                        <option value="HD">Pulang Paksa</option>
                                        <option value="AMBULAN">APS</option>
                                </td>
                            </tr>
                            <tr>
                                <td>Keadaan Keluar</td>
                                <td>: <input type="text" name="" id="">
                                </td>
                            </tr>
                            <tr>
                                <td>Status</td>
                                <td>:
                                    <input type="checkbox" name="status" id="status"></input>
                                </td>
                            </tr>
                            <tr>
                                <td width="240px"></td>
                                <td>&nbsp;<button class="btn btn-success top" id="tambah3">➕ Tambah</button>&nbsp;<button class="btn btn-danger top" id="tambah3">❌ Hapus</button>&nbsp;<input type="reset" class="btn btn-primary top" value="↩ Batal" id="tambah3"></input>&nbsp;</td>
                            </tr>
                    </table>
                    </form>
                    <div class="overflow">
                        <table class="table table-bordered table-striped table-hover">
                            <tr>
                                <td colspan="3">DATA RIWAYAT ALERGI</td>
                            </tr>
                            <tr>
                                <td class="alert danger" width="20px">NO</td>
                                <td class="alert danger">TANGGAL</td>
                                <td class="alert danger">RIWAYAT ALERGI</td>
                            </tr>

                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!--perlakuankhusus-->
    <div class="modal fade" id="mentel">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header"><button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Perlakuan Khusus</h4>
                </div>
                <div class="modal-body">
                    <table class="borderless top">
                        <tr>
                            <td width="200px"></td>
                            <td>&nbsp;<input type="checkbox">&nbsp;Pasien Potensi Komplain </input></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>&nbsp;<input type="checkbox">&nbsp;Pasien Adalah Pemilik Rumah Sakit </input></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>&nbsp;<input type="checkbox">&nbsp;Pasien Adalah Pejabat </input></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><button class="btn btn-success top" id="tambah1">➕ Simpan</button></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!--reportRm*konsen-->
    <div class="modal fade" id="konsen">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header"><button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Inform Konsen</h4>
                </div>
                <div class="modal-body">
                    <table class="borderless">
                        <tr>
                            <td></td>
                            <td></td>
                            <td>
                                <button type="submit" class="btn btn-success" id="tambah">➕ Tambah</button>
                                <button class="btn btn-primary" id="tambah">🖨 Cetak </button></td>
                        </tr>
                    </table>
                    <div class="overflow top">
                        <table class="table table-bordered table-striped table-hover">
                            <tr>
                                <td class="alert success" colspan="4">
                                    <center>DATA INFORM KONSEN
                                </td>
                            </tr>
                            <tr>
                                <td class="alert success" width="30px">NO</td>
                                <td class="alert success" width="220px">TINDAKAN</td>
                                <td class="alert success" width="220px">PEMBERI KUASA</td>
                                <td class="alert success">KONSEN</td>
                                </center>
                            </tr>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
    </div>

    <!--reportRm*persmedik-->
    <div class="modal fade" id="persmedik">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header"><button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Persetujuan Tindakan Medis</h4>
                </div>
                <div class="modal-body">
                    <table class="borderless">
                        <tr>
                            <td><button type="submit" class="btn btn-success">➕ Tambah</button>
                                <input type="submit" class="btn btn-primary" value="Edit">
                                <button class="btn btn-danger">❌ Hapus</button>&nbsp;
                            </td>
                            <td>
                                <button class="btn btn-primary" id="tambah">🖨 Cetak </button></td>
                        </tr>
                    </table>
                    <div class="overflow top">
                        <table class="table table-bordered table-striped table-hover">
                            <tr>
                                <td class="alert success" colspan="6">
                                    <center>DATA PERSETUJUAN TINDAK MEDIS
                                </td>
                            </tr>
                            <tr>
                                <td class="alert success" width="20px">NO</td>
                                <td class="alert success" width="80px">TINDAKAN</td>
                                <td class="alert success" width="80px">TIND. ALTERNATIF</td>
                                <td class="alert success" width="50px">RESIKO</td>
                                <td class="alert success" width="50px">ALASAN</td>
                                <td class="alert success" width="30px">SAKSI</td>
                                </center>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--reportRm*penmedik-->
    <div class="modal fade" id="penmedik">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header"><button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Penolakan Tindakan Medis</h4>
                </div>
                <div class="modal-body">
                    <table class="borderless">
                        <tr>
                            <td><button type="submit" class="btn btn-success">➕ Tambah</button>
                                <input type="submit" class="btn btn-primary" value="Edit"></input>
                                <button class="btn btn-danger">❌ Hapus</button>&nbsp;
                            </td>
                            <td>
                                <button class="btn btn-primary" id="tambah">🖨 Cetak </button></td>
                        </tr>
                    </table>
                    <div class="overflow top">
                        <table class="table table-bordered table-striped table-hover">
                            <tr>
                                <td class="alert success" colspan="4">
                                    <center>DATA CHECKLIST ENDOKOPI SALURAN CERNA
                                </td>
                            </tr>
                            <tr>
                                <td class="alert success" width="30px">NO</td>
                                <td class="alert success" width="220px">NAMA PASIEN</td>
                                <td class="alert success" width="220px">TOL INPUT</td>
                                <td class="alert success">PENGGUNA</td>
                                </center>
                            </tr>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <!-- tambahresep -->
    <div class="modal fade" id="tambahresep">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header"><button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Tambah Resep</h4>
                </div>
                <div class="modal-body">
                    <form>
                        <table class="borderless">
                            <center>
                                <tr>
                                    <td width="150px">Tanggal Resep</td>
                                    <td>:&emsp;<div style='width:200px;display:inline-block;'>
                                        <?= DatePicker::widget([
                                            'name' => '',
                                            'removeButton' => false,
                                            'options' => ['placeholder' => 'Tanggal'],
                                            'pluginOptions' => [
                                                'autoclose' => true,
                                                'format' => 'yyyy/mm/dd'
                                            ]
                                        ]); ?></div>
                                    </td>
                                </tr>
                                <tr>
                                <td>Diagnosa</td>
                                <td>:&emsp;<div style='display:inline-block'><?= Select2::widget([
                                                                'name' => '',
                                                                'data' => $diagResep,
                                                                
                                                            ]); ?></div></td>
                                </tr>
                                <tr>
                                    <td>Apotek</td>
                                    <td>:&emsp;<select disabled id="">
                                        <option value="">APOTEK</option>
                                    </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Nama Obat</td>
                                    <td>:&emsp;<div style='display:inline-block' id="namaobat"><?= Select2::widget([
                                                                'name' => '',
                                                                'data' => ArrayHelper::map(Obat::find()->all(), 'OBAT_NAMA', 'OBAT_NAMA'),
                                                            ]); ?></div><div id='obatManual' style='display:inline-block;'>
                                                            <textarea type='text'></textarea></div>
                                    </td>
                                </tr>
                                
                                <tr>
                                    <td>Manual</td>
                                    <td>:&emsp;<input type="checkbox" id="manualOff" onclick="manual()"></td>
                                </tr>
                                <tr>
                                    <td>Racikan</td>
                                    <td>:&emsp;<input type="checkbox" name="" id="check-racikan" value="ya" onclick="racikan()"></td>
                                </tr>
                                <tr>
                                    <td>DTD</td>
                                    <td>:&emsp;<input type="checkbox" value=""></td>
                                </tr>
                                <tr>
                                    <td>Jumlah</td>
                                    <td>:&emsp;<input type="text" name="jumlah_obat" id="tambah3">
                                    </td>
                                </tr>
                        </table>
                        <table id="racikan" style="display:none">
                            <tr>
                                <td width="150px">Racikan Ke</td>
                                <td>:&emsp;<select name="racikan-ke">
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="2">3</option>
                                        <option value="2">4</option>
                                        <option value="2">5</option>
                                    </select>&emsp;Bentuk Racikan:&nbsp;
                                    <select id="bobat">
                                        <?php foreach ($bobat as $value) { ?>
                                            <option value='<?= $value['nama'] ?>'><?= $value['nama'] ?></option>
                                        <?php } ?>
                                    </select></td>
                                </td>
                            <tr>
                                <td>Jumlah Bahan</td>
                                <td>:&emsp;<input type='text' name="jumlahbahan"></td>
                            </tr>
                        </table>
                        <table>
                            <tr>
                                <td>Ket. Dosis</td>
                                <td id="dosis">:&nbsp;&nbsp;&nbsp;
                                    <div style='display:inline-block' id="lainnya"><?= Select2::widget([
                                                            'name' => 'dosis',
                                                            'data' => ArrayHelper::map(Dosis::find()->all(), 'nama', 'nama'),
                                                        ]) ?></div>&emsp;

                                    <input type="checkbox" id="check" onclick="lainnya()"> Lainnya
                                </td>
                            </tr>
                            <tr>
                                <td>Digunakan Selama (Hari)</td>
                                <td>:&emsp;<input type="text" name="" id="tambah3">
                                </td>
                            </tr>
                            <tr>
                                <td width="150px">Dokter</td>
                                <td>:&emsp;<div id="dokterResep1" style='display:inline-block'>
                                            <select  style='width:200px;' id="dokterR1">
                                                <?php foreach ($dokter as $data) { ?>
                                                    <option value="<?= $data; ?>"><?= $data; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>

                                        <div id="dokterResep2" style='display:inline-block'>
                                            <select id="dokterR2">
                                                <?php foreach ($dokterP as $data) { ?>
                                                    <option value="<?= $data['nama_dokter']; ?>"><?= $data['nama_dokter']; ?></option>
                                                <?php } ?>
                                            </select>
                                </div>
                                    &emsp;<input id='checkDokterPResep' onclick='checkDokterResep()' type="checkbox"> Dokter Pengganti <div class="row"></div>
                                </td>
                            </tr>
                        </table><br>
                                <button type="button" class="btn btn-success"><i class='fas fa-plus'></i> Tambah</button>
                                &emsp;<button class="btn btn-danger" id="tambah3"><i class='fas fa-trash-alt'></i> Hapus</button><br><br>

                    <div class="overflow">
                        <table class="table table-bordered table-striped table-hover">
                            <tr>
                                <td class="alert danger" width="20px">NO</td>
                                <td class="alert danger">NAMA OBAT </td>
                                <td class="alert danger">JUMLAH</td>
                                <td class="alert danger">RACIKAN</td>
                                <td class="alert danger">DOSIS </td>
                                <td class="alert danger">DOKTER</td>
                            </tr>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--dpjp-->
    <div class="modal fade" id="dpjp">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header"><button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">DPJP</h4>
                </div>
                <div class="modal-body">
                    <table class="borderless top">
                        <center>
                            <tr>
                                <td width="150px">DPJP</td>
                                <td>:
                                    <select id='dpjpInput' class="form-control-lg">
                                        <option value="">~ Pilih Dokter ~</option>
                                        <?php foreach ($dokter as $value) { ?>
                                            <option value="<?= $value; ?>"><?= $value; ?></option>
                                        <?php } ?>
                                    </select>
                                    &nbsp;&nbsp;
                                </td>
                            </tr>
                    </table>
                    <div class="top">&nbsp;</div>
                </div>
            </div>
        </div>
    </div>
    </div>

    <div class="modal fade" id="hasillab">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header"><button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Hasil Lab</h4>
                </div>
                <div class="modal-body">
                    <table class="bordrless">
                        <tr>
                            <td width="150px">Tindakan</td>
                            <td>:&emsp;<input type="text"></td>
                        </tr>
                        <tr>
                            <td width="150px">Normal</td>
                            <td>:&emsp;<select value="">
                                    <option></option>
                                </select></td>
                        </tr>
                        <tr>
                            <td width="150px"> Hasil</td>
                            <td>&nbsp;&nbsp;<textarea type="text"></textarea></td>
                        </tr>
                        <tr>
                            <td>Keterangan</td>
                            <td>:&emsp;<input type="text"></td>
                        </tr>
                        <tr>
                            <td>Dokter</td>
                            <td>:&emsp;<select>
                                    <option>administrator</option>
                                </select></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>&nbsp;<button type="submit" class="btn btn-success top" id="tambah3">➕ Tambah</button>&nbsp;<button class="btn btn-danger top" id="tambah3">❌ Hapus</button>&nbsp;<input type="reset" class="btn btn-primary top" value="↩ Batal" id="tambah3">&nbsp;</td>
                        </tr>
                    </table>
                    <div class="overflow top">
                        <span class="col-12 success" style="text-align:center;">DATA HASIL LABORATORIUM PASIEN</span>
                        <table class="table">
                            <tr class="success" style="text-align:center;">
                                <td width=20px>NO</td>
                                <td>TANGGAL</td>
                                <td>TINDAKAN</td>
                                <td>HASIL</td>
                                <td>NORMAL</td>
                                <td>KETERANGAN</td>
                                <td>DOKTER</td>
                            </tr>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>



    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <span id='contC'></span> 
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary top" data-dismiss="modal">Tidak</button>
                    <button type="button" onclick='checkoutPasien()' class="btn btn-info top">Check Out</button>
                </div>
            </div>
        </div>
    </div>
</body>

</html>

<?php
$script = <<< JS
DataTindakan();
DataDiagnosa();
DataKonsul();
Alergi();

var dropdown = document.getElementsByClassName("dropdown-btn");
var i;

for (i = 0; i < dropdown.length; i++) {
dropdown[i].addEventListener("click", function() {
this.classList.toggle("active");var dropdownContent = this.nextElementSibling;
if (dropdownContent.style.display === "block") {
dropdownContent.style.display = "none";
} else {
dropdownContent.style.display = "block"; }
});
}

JS;
$this->registerJs($script);
?>

<!-- Modal -->
<div class="modal fade" id="anamnese" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header"><button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Anamnesis</h4>
                <div class="modal-body">
                    <div id="hslAnamnesa" style="display:none"></div>
                    <div id="hsl_RA_terakhir" style="display:none"></div>
                    <div id="hsl_cmb_PF" style="display:none"></div>
                    <fieldset id="fieldset1" style="width:20px;margin-left:-10px">
                        <form id="form_isi_anamnesa" name="form_isi_anamnesa">
                            <table width="300" cellspacing="0" cellpadding="0" border="0" align="center" style="margin-left:-10px">
                                <tbody>
                                    <tr id="trtglAnam" style="display: none;">
                                        <td colspan="4">Tgl &nbsp;:&nbsp; <input type="text" class="txtcenter" readonly="readonly" name="TglAnamB" id="TglAnamB" size="11" value="10-03-2020">
                                            <input type="button" id="btnTglKrs" name="btnTglAnamB" value=" V " class="txtcenter" onclick="gfPop.fPopCalendar(document.getElementById('TglAnamB'),depRange,fungsikosong);">&nbsp;:&nbsp;
                                            Jam&nbsp;:&nbsp; <input id="jamAnamB" name="jamAnamB" size="11" class="txtcenter" type="text" value="">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="4" style="padding-left:10px;">Nama Pasien&nbsp;:&nbsp; <label id="nmPA" class="nmPA">
                                                <div id="namapasien">a</div>
                                            </label>&nbsp;:&nbsp;
                                            No RM&nbsp;:&nbsp; <label id="nmRM" class="nmRM">
                                                <div id="nomorm">00060872</div>
                                            </label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="4" style="padding-left:10px;">Umur&nbsp;:&nbsp; <label id="umrPA" class="umrPA">
                                                <div id="umur">-1 th, 11 bl, 15 hr</div>
                                            </label>&nbsp;&nbsp;
                                            <br>
                                            Alamat&nbsp;:&nbsp; <label id="almt" class="almt">a Desa HELVETIA Kec. MEDAN HELVETIA Kab. KOTA MEDAN</label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="4" style="padding-left:10px;">Pelaksana&nbsp;:&nbsp;
                                            <select id="cmbDokAnamnesa" name="cmbDokAnamnesa" disabled="">
                                                <option value="732" label="Administrator" selected="">
                                                    <div id="pelaksana">Administrator</div>
                                                </option>
                                                <option value="1725" label="Administrator">Administrator</option>
                                                <option value="1697" label="Administrator">Administrator</option>
                                                <option value="1462" label="AGUSTINA, AMKeb">AGUSTINA, AMKeb</option>
                                                <option value="1498" label="DARMAYANI, AMK">DARMAYANI, AMK</option>
                                                <option value="1555" label="Dr. ADE IRHAMNI, SpKK">Dr. ADE IRHAMNI, SpKK</option>
                                                <option value="1543" label="Dr. AHMAD INDRA LUBIS">Dr. AHMAD INDRA LUBIS</option>
                                                <option value="1559" label="Dr. ALWINSYAH, SpPD">Dr. ALWINSYAH, SpPD</option>
                                                <option value="1549" label="Dr. AMIRUDDIN, Sp.P">Dr. AMIRUDDIN, Sp.P</option>
                                                <option value="1552" label="Dr. ANDIKA MUNDA">Dr. ANDIKA MUNDA</option>
                                                <option value="1540" label="Dr. DIKA IYONA. S. Sp.PD">Dr. DIKA IYONA. S. Sp.PD</option>
                                                <option value="1539" label="Dr. ERWIN SOPACUA, Sp.PD">Dr. ERWIN SOPACUA, Sp.PD</option>
                                                <option value="1546" label="Dr. HAZRAWAN MARTANTA TARIGAN, Sp.B">Dr. HAZRAWAN MARTANTA TARIGAN, Sp.B</option>
                                                <option value="1544" label="Dr. LENY WARDAINI, Sp.S">Dr. LENY WARDAINI, Sp.S</option>
                                                <option value="1542" label="Dr. LORINDA HARAHAP, Sp.A">Dr. LORINDA HARAHAP, Sp.A</option>
                                                <option value="1553" label="Dr. MUZAHAR, SpPK">Dr. MUZAHAR, SpPK</option>
                                                <option value="1554" label="Dr. RAHMAWAN SpR">Dr. RAHMAWAN SpR</option>
                                                <option value="1537" label="Dr. SARI SULAIMAN, Sp.THT">Dr. SARI SULAIMAN, Sp.THT</option>
                                                <option value="1538" label="Dr. SRI NOVITA SEMBIRING Sp.THT">Dr. SRI NOVITA SEMBIRING Sp.THT</option>
                                                <option value="1594" label="DR. SYAFRIL ARMANSYAH">DR. SYAFRIL ARMANSYAH</option>
                                                <option value="1565" label="Drg. HESTY SAMUEL SITOMPUL">Drg. HESTY SAMUEL SITOMPUL</option>
                                                <option value="1650" label="ds">ds</option>
                                                <option value="1597" label="FADHLI AHMAD, S.KEP.">FADHLI AHMAD, S.KEP.</option>
                                                <option value="1471" label="IKA WINARTI, AMKeb">IKA WINARTI, AMKeb</option>
                                                <option value="1465" label="LINDAWATI PARINDURI, AMK">LINDAWATI PARINDURI, AMK</option>
                                                <option value="1648" label="M. RAKA SYAHPUTRA">M. RAKA SYAHPUTRA</option>
                                                <option value="1497" label="MIAN MANGATUR NAPITUPULU, AMK">MIAN MANGATUR NAPITUPULU, AMK</option>
                                                <option value="1496" label="NANI">NANI</option>
                                                <option value="1460" label="RATNA SRI DEWI">RATNA SRI DEWI</option>
                                                <option value="1764" label="RISTA OSTARIA E.V.S, S.E.">RISTA OSTARIA E.V.S, S.E.</option>
                                                <option value="1495" label="ROHESTA SIMARMATA, BSC">ROHESTA SIMARMATA, BSC</option>
                                                <option value="1521" label="SRI SOEGIHARTI">SRI SOEGIHARTI</option>
                                                <option value="1778" label="YUDO WINARNO">YUDO WINARNO</option>
                                                <option value="1630" label="YUDO WINARNO">YUDO WINARNO</option>
                                            </select>
                                            <label>
                                                <input type="checkbox" id="chkDokterPenggantiAnamnesa" value="1" onchange="gantiDokter('cmbDokAnamnesa',this.checked);" disabled="">Dokter Pengganti
                                            </label>
                                        </td>

                                    </tr>
                                    <input type="hidden" disabled="" class="txtinputreg" name="flag" id="flag" size="10" tabindex="3" value="1">
                                    <tr>
                                        <td colspan="4" style="padding-top:5px; text-decoration:underline;padding-left:10px;">I. ANAMNESA</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="form-group row" style="padding-left:10px;">
                                                <div class="col-sm-3">
                                                    <label for="comment">Keluhan Utama</label>
                                                    <textarea class="form-control" rows="1"></textarea>
                                                </div>
                                                <div class="col-sm-3">
                                                    <label for="comment">Riwayat Penyakit Sekarang</label>
                                                    <textarea class="form-control" rows="1"></textarea>
                                                </div>
                                                <div class="col-sm-3">
                                                    <label for="comment">Riwayat Penyakit Dahulu</label>
                                                    <textarea class="form-control" rows="1"></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group row" style="padding-left:10px;">
                                                <div class="col-sm-3">
                                                    <label for="comment">Riwayat Penyakit Keluarga</label>
                                                    <textarea class="form-control" rows="1"></textarea>
                                                </div>
                                                <div class="col-sm-3">
                                                    <label for="comment">Anamnese Sosial</label>
                                                    <textarea class="form-control" rows="1"></textarea>
                                                </div>
                                                <div class="col-sm-3" style="display:none;">
                                                    <label for="comment"> </label>
                                                    <textarea class="form-control" rows="1"></textarea>
                                                </div>
                                            </div>
                                    <tr>
                                        <td colspan="4" style="border-top:1px solid black; padding-top:5px; text-decoration:underline;padding-left:10px;">II. PEMERIKSAAN FISIK</td>
                                    </tr>
                                    <tr>
                                        <td colspan="4">
                                            <table width="100%">
                                                <tbody>
                                                    <tr>
                                                        <td width="35%">
                                                            <table width="100%">
                                                                <tbody>
                                                                    <tr>
                                                                        <div class="form-group row" style="margin-left:3px;">
                                                                            <div class="col-sm-5">
                                                                                <label for="comment">Keadaan Umum</label>
                                                                                <input type="text" class="form-control">
                                                                            </div>
                                                                            <div class="col-sm-5">
                                                                                <label for="comment">GCS</label>
                                                                                <input type="text" class="form-control">
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group row" style="margin-left:3px;">
                                                                            <div class="col-sm-5">
                                                                                <label for="comment">Kesadaran </label>
                                                                                <input type="text" class="form-control">
                                                                            </div>
                                                                        </div>
                                                                    </tr>
                                                                    <tr>
                                                                        <td colspan="4">

                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </td>
                                                        <td width="65%" style="">
                                                            <table width="100%">
                                                                <tbody>
                                                                    <tr>
                                                                        <form class="form-inline">
                                                                            <div class="form-group" style="margin-top:3px;">
                                                                                &nbsp;
                                                                                <label class="text-inline">RR
                                                                                    <input type="text" class="form-input">/Mnt
                                                                                </label>
                                                                                &nbsp; &nbsp;&emsp;&emsp; &emsp;
                                                                                <label class="text-inline">Suhu
                                                                                    <input type="text" class="form-input">°C
                                                                                </label>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                &nbsp;&nbsp;
                                                                                <label class="text-inline">TB
                                                                                    <input type="text" class="form-input">cm
                                                                                </label>
                                                                                &emsp;&nbsp;&nbsp;&emsp;&emsp;&emsp;&nbsp;&nbsp;&nbsp;

                                                                                <label class="text-inline">NPS
                                                                                    <input type="text" class="form-input">
                                                                                </label>
                                                                            </div>
                                                                            <form class="form-inline">
                                                                                <div class="form-group">
                                                                                    <label class="text-inline">Nadi
                                                                                        <input type="text" class="form-input">/Mnt
                                                                                    </label>
                                                                                    &nbsp;
                                                                                    <label class="text-inline">Tensi diastolik
                                                                                        <input type="text" class="form-input">mmHg
                                                                                    </label>

                                                                                </div>
                                                                                <div class="form-group" style="margin-left:2px;">
                                                                                    &nbsp;
                                                                                    <label class="text-inline">BB
                                                                                        <input type="text" class="form-input">Kg
                                                                                    </label>
                                                                                    &emsp;&nbsp;&nbsp;&nbsp;
                                                                                    <label class="text-inline">Tensi sistolik
                                                                                        <input type="text" class="form-input">mmHg
                                                                                    </label>
                                                                                </div>
                                                                            </form>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="2">
                                                            <table width="100%">
                                                                <tbody>
                                                                    <tr id="KL">
                                                                        <div class="form-group row" style="margin-left:30px;">
                                                                            <div class="col-sm-2" style="margin-left:30px;">
                                                                                <label for="comment">Kepala</label>
                                                                                <textarea class="form-control" rows="1" style="width:160px;"></textarea>
                                                                            </div>
                                                                            <div class="col-sm-2" style="margin-left:30px;">
                                                                                <label for="comment">Leher</label>
                                                                                <textarea class="form-control" rows="1" style="width:160px;"></textarea>
                                                                            </div>
                                                                            <div class="col-sm-2" style="margin-left:30px;">
                                                                                <label for="comment">Thorax</label>
                                                                                <textarea class="form-control" rows="1" style="width:160px;"></textarea>
                                                                            </div>
                                                                            <div class="col-sm-2" style="margin-left:30px;">
                                                                                <label for="comment">Cor</label>
                                                                                <textarea class="form-control" rows="1" style="width:160px;"></textarea>
                                                                            </div>
                                                                        </div>

                                                                        <div class="form-group row" style="margin-left:30px;">
                                                                            <div class="col-sm-2" style="margin-left:30px;">
                                                                                <label for="comment">Abdomen</label>
                                                                                <textarea class="form-control" rows="1" style="width:160px;"></textarea>
                                                                            </div>
                                                                            <div class="col-sm-2" style="margin-left:30px;">
                                                                                <label for="comment">Genitalia</label>
                                                                                <textarea class="form-control" rows="1" style="width:160px;"></textarea>
                                                                            </div>
                                                                            <div class="col-sm-2" style="margin-left:30px;">
                                                                                <label for="comment">Ekstremitas</label>
                                                                                <textarea class="form-control" rows="1" style="width:160px;"></textarea>
                                                                            </div>
                                                                            <div class="col-sm-3" style="margin-left:30px;">
                                                                                <label for="comment">Pemeriksaan Penunjang</label>
                                                                                <textarea class="form-control" rows="1" style="width:160px;"></textarea>
                                                                            </div>
                                                                        </div>

                                                                        <div class="form-group row" style="margin-left:30px;">
                                                                            <div class="col-sm-2" style="margin-left:30px;">
                                                                                <label for="comment">Prognosis</label>
                                                                                <textarea class="form-control" rows="1" style="width:160px;"></textarea>
                                                                            </div>
                                                                            <div class="col-sm-2" style="margin-left:30px;">
                                                                                <label for="comment">Status Mentalis</label>
                                                                                <textarea class="form-control" rows="1" style="width:160px;"></textarea>
                                                                            </div>
                                                                            <div class="col-sm-2" style="margin-left:30px;">
                                                                                <label for="comment">Lingkar Kepala *</label>
                                                                                <textarea class="form-control" rows="1" style="width:160px;"></textarea>
                                                                            </div>
                                                                            <div class="col-sm-2" style="margin-left:30px;">
                                                                                <label for="comment">Status Gizi *</label>
                                                                                <label for="sGiziI"></label>
                                                                                <select id="sGiziI" class="form-control">
                                                                                    <option value="buruk">Buruk</option>
                                                                                    <option value="kurang">Kurang</option>
                                                                                    <option value="cukup">Cukup</option>
                                                                                    <option value="lebih">Lebih</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>

                                                                        <div class="form-group row" style="margin-left:30px;">
                                                                            <div class="col-sm-2" style="margin-left:30px;">
                                                                                <label for="comment">Telinga *</label>
                                                                                <textarea class="form-control" rows="1" style="width:160px;"></textarea>
                                                                            </div>
                                                                            <div class="col-sm-2" style="margin-left:30px;">
                                                                                <label for="comment">Hidung * </label>
                                                                                <textarea class="form-control" rows="1" style="width:160px;"></textarea>
                                                                            </div>
                                                                            <div class="col-sm-2" style="margin-left:30px;">
                                                                                <label for="comment">Tenggorokan *</label>
                                                                                <textarea class="form-control" rows="1" style="width:160px;"></textarea>
                                                                            </div>
                                                                            <div class="col-sm-2" style="margin-left:30px;">
                                                                                <label for="comment">Mata *</label>
                                                                                <textarea class="form-control" rows="1" style="width:160px;"></textarea>
                                                                            </div>
                                                                        </div>

                                                                        <div class="form-group row" style="margin-left:30px;">
                                                                            <div class="col-sm-2" style="margin-left:30px;">
                                                                                <label for="comment">Kulit Kelamin *</label>
                                                                                <textarea class="form-control" rows="1" style="width:160px;"></textarea>
                                                                            </div>
                                                                            <div class="col-sm-2" style="margin-left:30px;">
                                                                                <label for="comment">Perkusi</label>
                                                                                <textarea class="form-control" rows="1" style="width:160px;"></textarea>
                                                                            </div>
                                                                            <div class="col-sm-2" style="margin-left:30px;">
                                                                                <label for="comment">Inspeksi</label>
                                                                                <textarea class="form-control" rows="1" style="width:160px;"></textarea>
                                                                            </div>
                                                                            <div class="col-sm-3" style="margin-left:30px;width:250px;">
                                                                                <label for="comment">Usul Tindak Lanjut / Anjuran *</label>
                                                                                <textarea class="form-control" rows="1" style="width:160px;"></textarea>
                                                                            </div>
                                                                        </div>
                                                                    </tr>

                                                                </tbody>
                                                            </table>
                                                            <table width="100%">
                                                                <tbody>
                                                                    <tr>
                                                                        <td>
                                                                            <fieldset style="width:869px;">
                                                                                <legend id="lgnIsiDataRM">III. Pemeriksaan Neurologi
                                                                                    <input type="button" size="3" id="btnShowKunjDown" value="∨" style="display: inline; cursor: pointer;" onclick="document.getElementById('pNeurologi').style.height='400px';this.style.display='none';document.getElementById('btnShowKunjUp').style.display='inline';">
                                                                                    <input type="button" size="3" id="btnShowKunjUp" value="∧" style="display: none; cursor: pointer;" onclick="document.getElementById('pNeurologi').style.height='0px';this.style.display='none';document.getElementById('btnShowKunjDown').style.display='inline';">
                                                                                </legend>
                                                                                <div id="pNeurologi" style="overflow: auto; height: 0px;" align="center">
                                                                                    <table width="100%">
                                                                                        <tbody>
                                                                                            <tr>
                                                                                                <td>Pupil</td>
                                                                                                <td>&nbsp;<input type="radio" id="pup1" class="pup1" name="pupil1" onclick="cekR(pup2)"> Dbn<br>
                                                                                                    &nbsp;<input type="radio" id="pup2" class="pup2" name="pupil1" onclick="cekR(pup2)"> Bentuk
                                                                                                    <input type="text" id="bentukP" class="bentukP" value="" disabled="disabled" style="margin-left:-1px;margin:bottom:2px;"> <br>
                                                                                                    &nbsp;&nbsp;&nbsp;&nbsp;Ukuran
                                                                                                    <input type="text" id="ukuranP" class="ukuranP" value="" disabled="disabled" style="margin-top:2px;"> <br>
                                                                                                    <div class="row" style="margin-left:-27px;margin-top:2px;">
                                                                                                        Reflek Cahaya
                                                                                                        <input type="text" id="cahayaP" class="cahayaP" value="" disabled="disabled">
                                                                                                    </div>
                                                                                                </td>
                                                                                                <td id="ab">&nbsp;Tanda Rangsang Meninggal</td>
                                                                                                <td id="ab">&nbsp;<input type="radio" id="pup3" class="pup3" name="pupil2" onclick="cekR(pup3)"> Dbn <br>
                                                                                                    &nbsp;<input type="radio" id="pup4" class="pup4" name="pupil2" onclick="cekR(pup4)"> Kaku Kuduk <input type="text" id="kakuP" class="kakuP" value="" disabled="disabled"><br>
                                                                                                    &nbsp;<input type="radio" id="pup5" class="pup5" name="pupil2" onclick="cekR(pup5)"> Laseque <input type="text" id="lasequeP" class="lasequeP" value="" disabled="disabled" style="margin-left:26px;margin-top:2px;"> <br>
                                                                                                    &nbsp;<input type="radio" id="pup6" class="pup6" name="pupil2" onclick="cekR(pup6)"> Kerning <input type="text" id="karningP" class="karningP" value="" disabled="disabled" style="margin-left:27px;margin-top:2px;margin-bottom:2px;"> <br>
                                                                                                </td>
                                                                                            </tr>
                                                                                            <tr>
                                                                                                <td>&nbsp;Nervi Cranialis</td>
                                                                                                <td>&nbsp;<input type="radio" id="pup7" class="pup7" name="pupil3" onclick="cekR(pup8)"> Dbn<br>
                                                                                                    &nbsp;<input type="radio" id="pup8" class="pup8" name="pupil3" onclick="cekR(pup8)"> Paresis <input type="text" id="persisP" class="persisP" value="" disabled="disabled">
                                                                                                </td>
                                                                                                <td id="ab">&nbsp;Motorik</td>
                                                                                                <td id="ab">
                                                                                                    <table width="100%">
                                                                                                        <tbody>
                                                                                                            <tr>
                                                                                                                <td style="border-bottom:1px solid #000; border-right:1px solid #000;"><input type="text" id="mkiriatasP" class="mkiriatasP" value=""></td>
                                                                                                                <td style="border-bottom:1px solid #000;"><input type="text" id="mkananatasP" class="mkananatasP" value=""></td>
                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                <td style="border-right:1px solid #000;"><input type="text" id="mkiribawahP" class="mkiribawahP" value=""></td>
                                                                                                                <td style=""><input type="text" id="mkananbawahP" class="mkananbawahP" value=""></td>
                                                                                                            </tr>
                                                                                                        </tbody>
                                                                                                    </table>
                                                                                                </td>
                                                                                            </tr>
                                                                                            <tr>
                                                                                                <td>Reflek Fisiologis</td>
                                                                                                <td>
                                                                                                    <table width="100%">
                                                                                                        <tbody>
                                                                                                            <tr>
                                                                                                                <td style="border-bottom:1px solid #000; border-right:1px solid #000;"><input type="text" id="rkiriatasP" class="rkiriatasP" value=""></td>
                                                                                                                <td style="border-bottom:1px solid #000;"><input type="text" id="rkananatasP" class="rkananatasP" value=""></td>
                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                <td style="border-right:1px solid #000;"><input type="text" id="rkiribawahP" class="rkiribawahP" value=""></td>
                                                                                                                <td style=""><input type="text" id="rkananbawahP" class="rkananbawahP" value=""></td>
                                                                                                            </tr>
                                                                                                        </tbody>
                                                                                                    </table>
                                                                                                </td>
                                                                                                <td id="ab">&nbsp;Reflek Patologis</td>
                                                                                                <td id="ab">&nbsp;<textarea id="cmbPatologis" name="cmbPatologis" cols="35" style="margin-top:2px; width:69px;"></textarea>
                                                                                                </td>
                                                                                            </tr>
                                                                                            <tr>
                                                                                                <td>Sensorik</td>
                                                                                                <td>
                                                                                                    &nbsp;<input type="radio" id="pup9" class="pup9" name="pupil4" onclick="cekR(pup10)"> Dbn<br>
                                                                                                    &nbsp;<input type="radio" id="pup10" class="pup10" name="pupil4" onclick="cekR(pup10)"> <input type="text" id="sensorikP" class="sensorikP" value="" disabled="disabled">
                                                                                                </td>
                                                                                                <td id="ab">&nbsp;Otonom</td>
                                                                                                <td id="ab">
                                                                                                    &nbsp;<textarea id="cmbOtonom" name="cmbOtonom" cols="35" style="margin-top:2px; width:69px;"></textarea>
                                                                                                </td>
                                                                                            </tr>
                                                                                            <tr>
                                                                                                <td>Pemeriksaan Khusus</td>
                                                                                                <td>
                                                                                                    &nbsp;<textarea id="cmbPKhusus" name="cmbPKhusus" cols="35" class="form-control"></textarea>
                                                                                                </td>
                                                                                                <td id="ab"></td>
                                                                                                <td id="ab"></td>
                                                                                            </tr>
                                                                                        </tbody>
                                                                                    </table>
                                                                                </div>
                                                                            </fieldset>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                            <table width="100%">
                                                                <tbody>
                                                                    <tr>
                                                                        <td>
                                                                            <fieldset style="width:869px;">
                                                                                <legend id="lgnIsiDataRM">IV. Pemeriksaan Anak *
                                                                                    <input type="button" size="3" id="btnShowKunjDown1" value="∨" style="display: inline; cursor: pointer;" onclick="document.getElementById('pAnak').style.height='150px';this.style.display='none';document.getElementById('btnShowKunjUp1').style.display='inline';">
                                                                                    <input type="button" size="3" id="btnShowKunjUp1" value="∧" style="display: none; cursor: pointer;" onclick="document.getElementById('pAnak').style.height='0px';this.style.display='none';document.getElementById('btnShowKunjDown1').style.display='inline';">
                                                                                </legend>
                                                                                <div id="pAnak" style="overflow: auto; height: 0px;" align="center">
                                                                                    <table width="80%">
                                                                                        <tbody>
                                                                                            <tr>
                                                                                                <div class="form-group row">
                                                                                                    <div class="col-sm-3" style="margin-left:10px; ">
                                                                                                        <label for="comment">Riwayat Kelahiran</label>
                                                                                                        <textarea class="form-control" rows="1" style="width:160px;"></textarea>
                                                                                                    </div>
                                                                                                    <div class="col-sm-3" style="margin-left:-30px;">
                                                                                                        <label for="comment">Riwayat Imunisasi</label>
                                                                                                        <textarea class="form-control" rows="1" style="width:160px;"></textarea>
                                                                                                    </div>
                                                                                                    <div class="col-sm-2" style="margin-left:-20px;">
                                                                                                        <label for="comment">Riwayat Nutrisi</label>
                                                                                                        <textarea class="form-control" rows="1" style="width:160px;"></textarea>
                                                                                                    </div>
                                                                                                    <div class="col-sm-3" style="margin-left:30px;">
                                                                                                        <label for="comment">Riwayat Tumbuh Kembang</label>
                                                                                                        <textarea class="form-control" rows="1" style="width:160px;"></textarea>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </tr>
                                                                                        </tbody>
                                                                                    </table>
                                                                                </div>
                                                                            </fieldset>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>

                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="4" style="padding-bottom:10px;padding-top:10px;" align="center">
                                            <input type="hidden" id="id_anamnesa" name="id_anamnesa" value="">
                                            <button type="button" class="btn-success" id="btnSimpanAnamnesa" name="btnSimpanAnamnesa" value="tambah" onclick="saveAnamnesa(this.value)" style="cursor:pointer;padding-left:10px;padding-right:10px;">
                                                <span style="">➕ Add &nbsp;</span></button>
                                            <button type="button" class="btn-danger" id="btnDeleteAnamnesa" name="btnDeleteAnamnesa" onclick="deleteAnamnesa()" style="cursor:pointer;">
                                                <span style="">❌ Delete</span>
                                            </button>
                                            <button type="button" class="btn-primary" id="btnBatalAnamnesa" name="btnBatalAnamnesa" onclick="batalAnamnesa()" style="cursor:pointer">
                                                <span style="">↩ Cancel</span>
                                            </button>
                                            <input id="anamnesa" type="button" value="CETAK RESUME MEDIS" onclick="cetak_resume();">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="4" align="center">
                                            <div class="overflow">
                                                <table class="table table-bordered table-striped table-hover">
                                                    <tr>
                                                        <td colspan="3">
                                                            <center>DATA ANAMNESA
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="alert danger" width="20px">NO</td>
                                                        <td class="alert danger">TANGGAL</td>
                                                        <td class="alert danger">DOKTER</td>
                                                        </center>
                                                    </tr>
                                                </table>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </form>
                    </fieldset>
                    </fieldset>
                </div>
            </div>
        </div>