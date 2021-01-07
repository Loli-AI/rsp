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
        .left{
            float:left;
            display:inline-block;
        }
    </style>
</head>
<body>
<input type="hidden" value='<?= $data['id']; ?>' id='idPasien'>
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
            <li><a href="#section3">RIWAYAT PASIEN</a></li>
            <li><a href="#section3">RESUME MEDIS</a></li>
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
                </div></li>
            <li><a data-toggle="modal" data-target="#suratketerangan" style="cursor:pointer;">SURAT KETERANGAN</a></li>
            <li><a data-toggle="modal" data-target="#hasillab" style="cursor:pointer;">HASIL LAB</a></li>
            <li><a >HISTORY HASIL LAB</a></li>
            <li><a href="#section3">HASIL RADIOLOGI</a></li>
            <li> <a class="dropdown-btn" style="cursor:pointer;" >REPORT RM 
                    <i class="fa fa-caret-down"></i>
                </a>
                <div class="dropdown-container">
                <ul>
                    <li><a data-toggle="modal" data-target="#konsen"  style="cursor:pointer;">INFORM KONSEN</a> </li>
                    <li><a data-toggle="modal" data-target="#persmedik"  style="cursor:pointer;">Persetujuan tind.medik</a> </li>
                    <li><a data-toggle="modal" data-target="#penmedik" style="cursor:pointer;">Penolakan tind.medik</a> </li>
                </ul>
                </div></li>
            <li><a data-toggle="modal" data-target="#mentel"  style="cursor:pointer;" >PERLAKUAN KHUSUS</a></li>
            <li><a href="#section3">CHECK OUT</a></li>
            <li><a data-toggle="modal" data-target="#krs" style="cursor:pointer;" >KRS</a></li>

            
            
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
                        <input class="form-control" id='tempatAsal' readonly value='<?= $temp_layanan['temp_layanan'] ?>'></div></div></b>
                    </td>   
                </tr>
            </table>
    </div>
        <tr>
                <label for="norm"><i class="fas fa-barcode"></i> No RM :<input type="text" readonly class="form-control" id="norm" value='<?= $data['no_rm'] ?>'></label>
                <label for="nama"><i class="fas fa-file-signature"></i> Nama : <input type="text" readonly class="form-control" id="nama" value='<?= $data['nama'] ?>'></label>
                <label for="lhr"><i class="fas fa-calendar-alt"></i> Tanggal Lahir : <input type="text" readonly class="form-control" id="lhr" value='<?= $data['tgl_lahir'] ?>'></label>
            </tr>
            <tr >
                <label for="umur"><i class="fas fa-sort-numeric-up-alt"></i> Umur &nbsp;: <input type="text" readonly class="form-control" id="umur" value='<?= $data['umur'] ?>'></label>
                <label for="ortu"><i class="fas fa-user-friends"></i> Ortu  &nbsp;&nbsp;:<input type="text" readonly class="form-control" id="ortu" value='<?= $data['ortu'] ?>'></label>
                <label for="lp"><i class="fas fa-venus-mars"></i> L/P &nbsp;:<input type="text" readonly class="form-control" id="lp" value="<?= $data['jenis_kelamin'] ?>"></label>
            </tr>
            <tr>
                <label for="agama"><i class="fas fa-praying-hands"></i> Agama :<input type="text" readonly class="form-control" id="agama" value='<?= $data['agama'] ?>'></label>
                <label for="notelp"><a data-toggle="modal" data-target="#myModal" class="telpon"><i class="fas fa-phone"></i> Telepon :</a>
                    <input type="text" readonly class="form-control" value='<?= $data['no_telepon'] ?>'></label>
                <label for="alamat"><i class="fas fa-sign"></i> Alamat :<textarea type="text" readonly class="form-control" cols='27' id="alamat"><?= $data['alamat'] . ' ' .   $data['kabupaten'] . ' ' .  $data['kecamatan'] . ' ' .  $data['kelurahan'] ?></textarea></label>
            </tr>

            <tr>
            <label for="alergi"><a data-toggle="modal" data-target="#alergi" ><i class="fas fa-allergies"></i> Riwayat Alergi :</a>
                        <textarea type="text"  readonly rows="2" class="form-control" id='Alergi' cols='27'><?= $alergi['alergi']; ?></textarea></label>
            <label  for="DPJP"><a data-toggle="modal" data-target="#dpjp"><i class="fas fa-stethoscope"></i> DPJP : </a>
               <br>  <textarea type="text"  readonly rows="2" class="form-control" id='Alergi' cols='27'><?= $data['dpjp']; ?></textarea> </label>
            </tr>
                <ul class="nav nav-tabs top">
                <li class="active"><a data-toggle="tab" href="#anamnesis">ANAMNEMSIS</a></li>
                <li><a  data-toggle="tab" href="#diagnosis">DIAGNOSIS</a></li>
                <li><a data-toggle="tab" href="#tindakan">TINDAKAN</a></li>
                <li><a data-toggle="tab" href="#gabut">RESEP</a></li>
                <li><a  data-toggle="tab" href="#bhp">PEMAKAIAN BHP</a></li>
                </ul><br>
        <div class="tab-content">
                <div class="tab-pane fade in active" id="anamnesis">
                    <br>
                    <button class="btn btn-success top" id="tambah">➕ Tambah</button>&nbsp;<button class="btn btn-alert top" id="tambah">🖨 CETAK</button>
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
                                <table class="borderless">
                                    <tr>
                                        <td>&emsp;</td>
                                        <td>&emsp;&nbsp;<input onclick='gantiManualDiag()' type="checkbox" id='checkManualDiag'>&nbsp;Diagnosa Manual</td>
                                    </tr>
                                    <tr>
                                        <td width="150px">Diagnosa</td>
                                        <td>:&nbsp;&nbsp;&nbsp;<div id='diagnosaTable' style='width:200px;display:inline-block;'><?= Select2::widget([
                                                        'name' => '',
                                                        'data' => $diagnosa,
                                                        'options' => [
                                                            'placeholder' => 'Pilih Diagnosa',
                                                            'allowClear' => true,
                                                            'id' => 'diagnosaData',
                                                            'class' => 'diagnosaTable',
                                                        ],
                                                    ]); ?></div>
                                                    <div id="diagnosaManual" style='display:inline-block'><input id='diagnosaData' class='diagnosaManual' type="text"></div>
                                                    </td>
                                    </tr>
                                    <tr>
                                        <td width="150px">Diagnosa Klinis</td>
                                        <td>:&emsp;<input type="checkbox" value='Ya' id='diagKlinis'> Ya</td>
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
                                        <td>:&emsp;<input id='diagBanding' type="text">&nbsp;
                                        <button onclick='tambahRow()' type="button" class="btn btn-success"><i class='fas fa-plus'></i></button>
                                        </td>
                                    </tr>

                                    <tbody id='diagBanding'></tbody>

                                    <tr>
                                        <td width="150px">Diagnosa Akhir</td>
                                        <td>:&emsp;<input value='Ya' id='diagAkhir' type="checkbox"> Ya</td>
                                    </tr>
                                    <tr>
                                        <td width="150px">Diagnosa Kematian</td>
                                        <td>:&emsp;<input value='Ya' id='diagMati' type="checkbox"> Ya</td>
                                    </tr>
                                    <tr>
                                        <td width="150px">Dokter</td>
                                        <td>:&nbsp;&nbsp;&nbsp;
                                        <div id="dokterDiag" style='display:inline-block'>
                                        <select class='dokterDiagnosa1' id="dokterDiagnosa">
                                            <option value="">Pilih Dokter</option>
                                                <?php foreach ($dokter as $data) { ?>
                                                    <option value="<?= $data['nama']; ?>"><?= $data['nama']; ?></option>
                                                <?php } ?>
                                            </select>
                                            </div>

                                            <div id="dokterGanti" style='display:inline-block'>
                                            <select class='dokterDiagnosa2' id="dokterDiagnosa">
                                                <option value="">Pilih Dokter Pengganti</option>
                                                <?php foreach ($dokterP as $data) { ?>
                                                    <option value="<?= $data['nama_dokter']; ?>"><?= $data['nama_dokter']; ?></option>
                                                <?php } ?>
                                            </select>
                                            </div>
                                            &emsp;<input onchange='gantiDokterDiag()' id='checkDokterDiag' type="checkbox"> Dokter Pengganti
                                        </td>
                                    </tr>
                                    <tr>
                                    <td colspan='3'><button onclick='TambahDiagnosa()' class="btn btn-success top"><i class='fas fa-plus'></i> Tambah</button>&nbsp;
                                    <button class="btn btn-danger top"><i class='fas fa-trash-alt'></i> Hapus</button>&nbsp;
                                    </td>
                                    </tr>
                                </table><br>
                            <div class="overflow">
                            <table class="table table-striped">
                                        <tr class="text-center">
                                            <td class="success">NO</td>
                                            <td class="success">TANGGAL</td>
                                            <td class="success" width="200px">DIAGNOSA</td>
                                            <td class="success">BANDING</td>
                                            <td class="success">DOKTER</td>
                                            <td class="success">PRIORITAS</td>
                                            <td class="success">AKHIR</td>
                                        </tr>
                                        <tbody id='dataDiagnosa'></tbody>
                                </table>
                            </div>
                                
                        </div>
    <div class="tab-pane fade" id="tindakan">
        <form>
            <table class="borderless">
                <tr>
                    <td>Tanggal </td>
                    <td>:&nbsp;<input type="date">&nbsp;&nbsp;</td>
                </tr>
                <tr>
                    <td width="150px">Tindakan</td>
                    <td>:&nbsp;<input type="search" width="200px">&nbsp;<button class="btn btn-success">cari</button></td>
                </tr>
                <tr>
                    <td width="150px">Kelas</td>
                    <td>:&nbsp;<input type="text" value="Non Kelas"> </td>
                </tr>
                <tr>
                    <td width="150px">Biaya</td>
                    <td>:&nbsp;<input type="text" width="90px">&emsp;Jumlah : <input type="text">
                    </td>
                </tr>
                <tr>
                    <td width="150px">Keterangan</td>
                    <td>:&nbsp;<input type="text" width="200px"></td>
                </tr>
                <tr>
                    <td width="150px">Diagnosa Akhir</td>
                    <td>:&nbsp;&nbsp;<input type="checkbox"> Ya</td>
                </tr>
                <tr>
                    <td width="150px">Pelaksana</td>
                    <td>:
                        <select value="1 Dipilih">1 Dipilih
                        <option value="Administrator">Administrator</option>
                        <option value="Ahmad-Rudyanto">Ahmad Rudyanto</option>
                        <option value="Akhdan-Fadhilah">Akhdan Fadhilah</option>
                        <option value="Krisna-Kumar">Krisna Kumar</option>
                        <option value="Melvin-Jouvano">Melvin Jouvano</option>
                        <option value="Novia-Cahaya">Novia Cahaya</option>
                        </select>
                        &nbsp;&nbsp;<input type="checkbox"> Dokter Pengganti
                    </td>
                </tr>
                <tr>
                <td></td>
                <td>&emsp;&nbsp;<button class="btn btn-success top">➕ Tambah</button>&nbsp;<button class="btn btn-danger top">❌ Hapus</button>&nbsp;<input type="reset" class="btn btn-primary top" value="↩ Batal" ></input></td>
                </tr>
            </table>
            </form>
            <div class="overflow top">
            <table class="table" >
                    <tr>
                        <td class=" success" colspan="9"><center>DATA TINDAKAN PASIEN</td>
                    </tr>
                    <tr>
                        <td class=" success" width="20px">NO</td>
                        <td class=" success" width="100px">TANGGAL</td>
                        <td class=" success" width="100px">TINDAKAN</td>
                        <td class=" success" width="100px">KELAS</td>
                        <td class=" success" width="100px">BIAYA</td>
                        <td class=" success" width="100px">JUMLAH</td>
                        <td class=" success" width="100px">SUBTOTAL</td>
                        <td class=" success" width="100px">DOKTER</td>
                        <td class=" success" width="100px">KETERANGAN</td>
                        </center>
                    </tr>
            </table>
            </div>
            
    </div>

    <div class="tab-pane fade" id="gabut">
            <table class="borderless">
                <tr>
                <td></td>
                <td></td>
                <td>
                <button type="button" class="btn btn-success"  data-toggle="modal" data-target="#tambahresep">➕tambah</button>&nbsp;
                <button type="button" class="btn btn-danger">📝Ubah</button>&nbsp;
                <button type="button" class="btn btn-primary">🖨 Cetak Resep</button>
                </tr>
            </table>
                <div class="panel-group top" id="accordion">
                <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                    <a data-toggle="collapse" data-paretn="#accordion" href="#collapse1"><center>DATA RESEP</center></a>
                    </h4>
                </div>
                <div id="collapse1" class="panel-collapse collapse in">
                    <div class="panel-body">
                    <div class="overflow">
                    <table class="table">
                    <tr>
                                    <td class="success" width="20px">NO</td>
                                    <td class="success" >NO RESEP</td>
                                    <td class="success" >ITER RESEP</td>
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
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse2"><center>DATA OBAT DALAM RESEP</center></a>
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
                        </table></div>
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
                    <td >:&nbsp;<input type="text" id="tambah3"></td>
                </tr>
                <tr>
                    <td width="150px">Jumlah </td>
                    <td>: <input type="text" id="tambah3"></input>
                    </td>
                </tr>
                <tr>
                    <td width="150px">Keterangan</td>
                    <td>:&nbsp;<input type="text" width="200px" id="tambah3"></input</td>
                </tr>
                <tr>
                <td></td>
                <td>&emsp;&nbsp;<button class="btn btn-success top">➕ Tambah</button>&nbsp;<button class="btn btn-danger top">❌ Hapus</button>&nbsp;<input type="reset" class="btn btn-primary top" value="↩ Batal"></input></td>
                </tr>
            </table>
            </form>
        <div class="overflow top">
        <table class="table">
                    <tr>
                        <td class="success" colspan="6"><center>DATA PEMAKAIAN BHP</td>
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
        
        
    <footer class="container-fluid top">
    </footer>
</div>

 <!-- hidden menu -->
 <!-- no telpon -->
 <div class="modal fade" id="myModal">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Masukkan Nomor Telepon</h4>
            <form>
            <input type="hidden" name='id' value='<?= $data['id']; ?>' id='idPasien'>
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
                    <td width="150px" >Jenis Layanan</td>
                    <td>:
                        <select value="Layanan"  id="tambah3">
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
                        <select value="Layanan"  id="tambah3">
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
                        <select value="Layanan"  id="tambah3">
                        <option value="K-VIP">VIP</option>
                        </select>
                    </td>
                </tr>
                </div>
                <div class="tambah3">
                <tr>
                    <td width="150px">Kamar</td>
                    <td>:
                        <select value="Layanan"  id="tambah3">
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
                        <textarea name="keterangan" id="" cols="20" rows="1"  id="tambah3"></textarea>
                    </td>
                </tr>
                <tr>
                    <td width="150px"  >Dokter Penunjuk</td>
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
                        <select value="dokter"  id="tambah3">
                        <option value="Administrator">Administrator</option>
                        <option value="Ahmad-Rudyanto">Ahmad Rudyanto</option>
                        <option value="Akhdan-Fadhilah">Akhdan Fadhilah</option>
                        <option value="Krisna-Kumar">Krisna Kumar</option>
                        <option value="Melvin-Jouvano">Melvin Jouvano</option>
                        <option value="Novia-Cahaya">Novia Cahaya</option>
                        </select>
                        &nbsp;&nbsp;<input type="checkbox"  id="tambah3"> Dokter Pengganti<div class="row"></div>
                    </td>
                    <div class="row"></div>
                </tr>
                <tr>
                <td></td>
                <td>&nbsp;<button class="btn btn-success top" id="tambah3">➕ Tambah</button>&nbsp;<button class="btn btn-danger top"  id="tambah3">❌ Hapus</button>&nbsp;<input type="reset" class="btn btn-primary top" value="↩ Batal" id="tambah3"></input></td>
                </tr>
                <tr>
                <td></td>
                <td>&nbsp;<button class="btn btn-alert top"id="tambah3" >SURAT PERINTAH INAP</button></td>
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
                        <td colspan="5"><center>DATA RUJUK UNIT</td>
                    </tr>
                    <tr>
                        <td class="alert danger" width="20px">NO</td>
                        <td class="alert danger">TANGGAL</td>
                        <td class="alert danger">UNIT</td>
                        <td class="alert danger">DOKTER</td>
                        <td class="alert danger">DOKTER TUJUAN</td>
                    </tr>
                
            </table></div>
            </fieldset>
        
        
        </div>
    </div>
</div>
</div>

<!--konsul-->
<div class="modal fade " id="konsul" role="dialog">
    <div class="modal-dialog ">
    <div class="modal-content ">
    <div class="modal-header ">  <button type="button" class="close" data-dismiss="modal">&times;</button><h4 class="modal-title">Konsul</h4></div>
    <div class="modal-body"><center>
          <table class='table'>
          <input type="hidden" id='idPasien' value='<?= $data['id'] ?>'>
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
                <?php foreach($tempat_layanan_rj as $value) { ?>
                <option value='<?= $value['nama_tempat_layanan'] ?>'><?= $value['nama_tempat_layanan'] ?></option>
                <?php } ?></select>
                </div></td>
        </tr>
            <tr>
                <td>Tanggal Rujuk</td>
                <td>:</td>
                <td><div class='text'>
                     <?= DatePicker::widget([
    'name' => '',
    'removeButton' => false,
    'options' => ['id' => 'tglKonsul', 'placeholder' => 'Tanggal ...'],
    'pluginOptions' => [
        'autoclose'=>true,
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
                <td><select id="dokterPenunjukKonsul">
                <?php foreach ($dokter as $value) { ?>
                    <option value="<?= $value['nama'] ?>"><?= $value['nama'] ?></option>.
               <?php } ?>
                </select>
                    &emsp;<input type="checkbox"> Dokter Pengganti
                </td>
            </tr>
            <tr>
                <td>Dokter Tujuan</td>
                <td>:</td>
                <td><select id="dokterTujuanKonsul">
                <?php foreach ($dokter as $value) { ?>
                    <option value="<?= $value['nama'] ?>"><?= $value['nama'] ?></option>.
               <?php } ?>
                </select>
                    &emsp;<input type="checkbox"> Dokter Pengganti<div class="row"></div>
                </td>
                <div class="row"></div>
            </tr>
            <tr>
            <td colspan='3'><center>
            <button class="btn btn-primary top" id='tambahKonsul'><i class='fas fa-plus'></i> Tambah Konsul</button>&emsp;
            <button disabled id='hpusKonsul' class='btn btn-danger top'><i class='fas fa-trash-alt'></i> Hapus Konsul</button><br><br>
            <button disabled target='_blank' id='cetakKonsul' class='btn btn-warning'><i class="fas fa-print"></i> Cetak</button>&emsp;
            <button disabled id='dataMRSKonsul' class='btn btn-warning'><i class="fas fa-print"></i> Data MRS</button>&emsp;
            <button disabled id='permohonanKonsul' class='btn btn-warning'><i class="fas fa-print"></i> Permohonan Konsul</button></center>
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
        <div class="modal-header"><button type="button" class="close" data-dismiss="modal">&times;</button><h4 class="modal-title">Surat Keterangan</h4></div>
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
            <td ><div class="row top"></div><button class="btn btn-primary top"  id="tambah1">🖨 Cetak Surat Keterangan</button></td>
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
        <div class="modal-header"><button type="button" class="close" data-dismiss="modal">&times;</button><h4 class="modal-title">Riwayat Alergi</h4></div>
        <div class="modal-body">
        <table class="borderless">
            <tr>
                <td><center>
                &emsp;<textarea id="alergiInput" cols="92" placeholder='Masukkan Alergi' rows="3"></textarea> </center>
                </td>
            </tr>
            <tr>
            <td><center><button class="btn btn-success top" id="tambahAlergi"><i class='fas fa-plus'></i> Tambah Alergi</button></td>
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
        </table></div>
        </div>
        </div>
    </div>
</div>
<!--krs-->
<div class="modal fade" id="krs" >
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header"><button type="button" class="close" data-dismiss="modal">&times;</button><br><h4 class="modal-title">Pasien Keluar</h4></h4></div>
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
                <td width="150px"  >Dokter</td>
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
            <td>&nbsp;<button class="btn btn-success top" id="tambah3">➕ Tambah</button>&nbsp;<button class="btn btn-danger top"  id="tambah3">❌ Hapus</button>&nbsp;<input type="reset" class="btn btn-primary top" value="↩ Batal" id="tambah3"></input>&nbsp;<button class="btn btn-alert"id="tambah3" >Check List Pasien Pulang</button></td>
            </tr>

            <tr>
            <td></td>
            <td>&nbsp; <select value="pernyataan"  id="tambah3">
                    <option value="SPI">SP Inap</option>
                    <option value="SKM">Surat Keterangan Meninggal</option>
                    <option value="CLPL">Check List Pasien Pulang</option>
                    <option value="APS">APS</option>
                    <option value="Rujukan">Rujukan</option>
                    </select>&emsp;<button class=""btn btn-alert" >🖨 Cetak</button></td>
            </tr>
        </table>
        </form>
            <div class="overflow">
            <table class="table table-bordered table-striped table-hover">
                <tr>
                    <td colspan="5"><center>DATA KELUAR RUMAH SAKIT</td>
                </tr>
                <tr>
                    <td class="alert danger" width="20px">NO</td>
                    <td class="alert danger">TANGGAL</td>
                    <td class="alert danger">CARA KELUAR</td>
                    <td class="alert danger">KEADAAN KELUAR</td>
                    <td class="alert danger">KASUS</td>
                    </center>
                </tr>
        </table></div>
        </div>
        </div>
    </div>
</div>
<!--carakeluar-->
<div class="modal fade" id="carakeluar">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header"><button type="button" class="close" data-dismiss="modal">&times;</button><h4 class="modal-title">cara keluar</h4></div>
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
            <td>&nbsp;<button class="btn btn-success" id="tambah3">➕ Tambah</button>&nbsp;<button class="btn btn-danger"  id="tambah3">❌ Hapus</button>&nbsp;<input type="reset" class="btn btn-primary" value="↩ Batal" id="tambah3"></input>&nbsp;</td>
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
            
        </table></div>
            </div>
        </div>
    </div>
</div>
<!--keadaankeluar-->
<div class="modal fade" id="keadaankeluar">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header"><button type="button" class="close" data-dismiss="modal">&times;</button><h4 class="modal-title">keadaan keluar</h4></div>
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
                <td>: <input type="text" name="" id="" >
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
            <td>&nbsp;<button class="btn btn-success top" id="tambah3">➕ Tambah</button>&nbsp;<button class="btn btn-danger top"  id="tambah3">❌ Hapus</button>&nbsp;<input type="reset" class="btn btn-primary top" value="↩ Batal" id="tambah3"></input>&nbsp;</td>
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
            
        </table></div>
        
        </div>
        </div>
    </div>
</div>
<!--perlakuankhusus-->
<div class="modal fade" id="mentel">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header"><button type="button" class="close" data-dismiss="modal">&times;</button><h4 class="modal-title">Perlakuan Khusus</h4></div>
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
            <div class="modal-header"><button type="button" class="close" data-dismiss="modal">&times;</button><h4 class="modal-title">Inform Konsen</h4></div>
            <div class="modal-body">
                    <table class="borderless">
                    <tr>
                    <td></td>
                    <td></td>
                    <td>
                    <button type="submit" class="btn btn-success" id="tambah" >➕ Tambah</button>
                    <button class="btn btn-primary"  id="tambah">🖨 Cetak </button></td>
                    </tr>
                </table>
                <div class="overflow top">
            <table class="table table-bordered table-striped table-hover">
                        <tr>
                            <td class="alert success" colspan="4"><center>DATA INFORM KONSEN</td>
                        </tr>
                        <tr>
                            <td class="alert success" width="30px">NO</td>
                            <td class="alert success" width="220px">TINDAKAN</td>
                            <td class="alert success" width="220px">PEMBERI KUASA</td>
                            <td class="alert success">KONSEN</td>
                            </center>
                        </tr>
                </table></div>
        </div>
            
            </div>
        </div>
    </div>
</div>

<!--reportRm*persmedik-->
<div class="modal fade" id="persmedik">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header"><button type="button" class="close" data-dismiss="modal">&times;</button><h4 class="modal-title">Persetujuan Tindakan Medis</h4></div>
        <div class="modal-body">
        <table class="borderless">
            <tr>
            <td><button type="submit" class="btn btn-success">➕ Tambah</button>
            <input type="submit" class="btn btn-primary" value="Edit">
            <button class="btn btn-danger"  >❌ Hapus</button>&nbsp;
            </td>
            <td>   
            <button class="btn btn-primary"  id="tambah">🖨 Cetak </button></td>
            </tr>
        </table>
        <div class="overflow top">
      <table class="table table-bordered table-striped table-hover">
                <tr>
                    <td class="alert success" colspan="6"><center>DATA PERSETUJUAN TINDAK MEDIS</td>
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
        <div class="modal-header"><button type="button" class="close" data-dismiss="modal">&times;</button><h4 class="modal-title">Penolakan Tindakan Medis</h4></div>
        <div class="modal-body">
        <table class="borderless">
            <tr>
            <td><button type="submit" class="btn btn-success">➕ Tambah</button>
            <input type="submit" class="btn btn-primary" value="Edit"></input>
            <button class="btn btn-danger"  >❌ Hapus</button>&nbsp;
            </td>
            <td>   
            <button class="btn btn-primary"  id="tambah">🖨 Cetak </button></td>
            </tr>
        </table>
        <div class="overflow top">
      <table class="table table-bordered table-striped table-hover">
                <tr>
                    <td class="alert success" colspan="4"><center>DATA CHECKLIST ENDOKOPI SALURAN CERNA</td>
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
        <div class="modal-header"><button type="button" class="close" data-dismiss="modal">&times;</button><h4 class="modal-title">Tambah Resep</h4></div>
        <div class="modal-body">
        <form>
                                    <table class="borderless">
                                    <center>
                                    <tr>
                                        <td>Tanggal Resep</td>
                                        <td>:&nbsp;<input type="date" name=""  value="">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Diagnosa</td>
                                        <td>:&nbsp;<select name="" >
                                            <option value=" "></option>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Apotek</td>
                                        <td>: <select name=">DEPO OBAT RUMAH SAKIT" id="tambah3" disabled>
                                            <option value="DEPO OBAT RUMAH SAKIT" >DEPO OBAT RUMAH SAKIT</option>
                                        </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Nama Obat</td>
                                        <td>:&nbsp;<input type="text" name="" id="input-obat">&emsp;<a href="#">List Obat</a>
                                        </td>
                                    </tr>
                                    <tr>
                                    <td>Manual</td>
                                        <td>:&nbsp;<input type="checkbox" name="" id="manual-off"></td>
                                    </tr>
                                    <tr>
                                        <td>Racikan</td>
                                        <td>:&nbsp;<input type="checkbox" name="" id="check-racikan"></td>
                                    </tr>
                                    <tr>
                                        <td>DTD</td>
                                        <td>:&nbsp;<input type="checkbox" value=""></td>   
                                    </tr>
                                    <tr >
                                        <td>Jumlah</td>
                                        <td>:&nbsp;<input type="text" name="" id="tambah3">
                                        </td>
                                    </tr>
                                    <tr >
                                        <td width="150px" >Ket Dosis</td>
                                        <td id="dosis" >:
                                            <select value="Administrator" id="dosis">
                                            <option value="3x1">3x1 hari sesudah makan</option>
                                            <option value="3x1">3x1 hari sebelum makan</option>
                                            <option value="3x1">3x1 hari</option>
                                            <option value="3x1">2x1 hari sesudah makan</option>
                                            <option value="3x1">2x1 hari sebelum makan</option>
                                            <option value="3x1">2x1 hari</option>
                                            <option value="3x1">1x1 hari sesudah makan</option>
                                            <option value="3x1">1x1 hari sebelum makan</option>
                                            <option value="3x1">1x1 hari</option>
                                            <option value="3x1">1x2 hari sebelum makan</option>
                                            <option value="3x1">1x2 hari sesudah makan</option>
                                            <option value="3x1">1x3 hari sebelum makan</option>
                                            <option value="3x1">1x3 hari sesudah makan</option>
                                            <option value="3x1">1x4 hari sebelum makan</option>
                                            <option value="3x1">1x4 hari sesudah makan</option>
                                            <option value="3x1">4x1 hari sebelum makan</option>
                                            <option value="3x1">4x1 hari sesudah makan</option>
                                            <option value="3x1">2x2 hari sebelum makan</option>
                                            <option value="3x1">2x2 hari sesudah makan</option>
                                            <option value="3x1">2x2 hisap sebelum makan</option>
                                            <option value="3x1">2x1 hisap sesudah makan</option>
                                            </select>
                                            &nbsp;&nbsp;<input type="checkbox" id="check"> Lainnya <div class="row"></div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Digunakan Selama<br>(hari)</td>
                                        <td>:&nbsp;<input type="text" name="" id="tambah3">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="150px"  >Dokter</td>
                                        <td>:
                                            <select value="Administrator" id="tambah3" disabled>
                                            <option value="Administrator">Administrator</option>
                                            </select>
                                            &nbsp;&nbsp;<input type="checkbox" disabled> Dokter Pengganti <div class="row"></div>
                                        </td>
                                    </tr>
                                    </table>
                                    <table>
                                    <tr>
                                    <td width="240px"></td>
                                    <td>&nbsp;<button type="submit" class="btn btn-success" id="tambah3">➕ Tambah</button>&nbsp;<button class="btn btn-danger"  id="tambah3">❌ Hapus</button>&nbsp;<input type="reset" class="btn btn-primary" value="↩ Batal" id="tambah3">&nbsp;</td>
                                    </tr>
                                </table>
                                </form>
                                    <div class="overflow">
                                    <table class="table table-bordered table-striped table-hover">
                                </center>
                                    <tr>
                                            <td colspan="6"><center>DATA RESEP PASIEN</td>
                                        </tr>
                                        <tr>
                                            <td class="alert danger" width="20px">NO</td>
                                            <td class="alert danger">NAMA OBAT </td>
                                            <td class="alert danger">JUMLAH</td>
                                            <td class="alert danger" >RACIKAN</td>
                                            <td class="alert danger">DOSIS </td>
                                            <td class="alert danger">DOKTER</td>
                                        </tr>
                                    
                                </table></div>
        </div>
        </div>
    </div>
</div>

<!--dpjp-->
<div class="modal fade" id="dpjp">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header"><button type="button" class="close" data-dismiss="modal">&times;</button><h4 class="modal-title">DPJP</h4></div>
        <div class="modal-body">
        <table class="borderless top">
            <center>
            <tr>
            <td width="150px">DPJP</td>
                <td>:
                    <select id='dpjpInput' class="form-control-lg">
                    <option value="">~ Pilih Dokter ~</option>
                    <?php foreach ($dokter as $value) { ?>
                    <option value="<?= $value['nama']; ?>"><?= $value['nama']; ?></option>
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
        <div class="modal-header"><button type="button" class="close" data-dismiss="modal">&times;</button><h4 class="modal-title">Hasil Lab</h4></div>
        <div class="modal-body">
        <table class="bordrless">
        <tr>
            <td width="150px">Tindakan</td>
            <td>:&nbsp;<input type="text" ></td>
        </tr>
        <tr>
            <td width="150px">Normal</td>
            <td>:&nbsp;<select value=""><option></option></select></td>
        </tr>
        <tr>
            <td width="150px"> Hasil</td>
            <td>&nbsp;&nbsp;<textarea type="text"></textarea></td>
        </tr>
        <tr>
            <td>Keterangan</td>
            <td>:&nbsp;<input type="text"></td>
        </tr>
        <tr>
            <td>Dokter</td>
            <td>:&nbsp;<select><option>administrator</option></select></td>
        </tr>
        <tr>
            <td></td>
            <td>&nbsp;<button type="submit" class="btn btn-success top" id="tambah3">➕ Tambah</button>&nbsp;<button class="btn btn-danger top"  id="tambah3">❌ Hapus</button>&nbsp;<input type="reset" class="btn btn-primary top" value="↩ Batal" id="tambah3">&nbsp;</td>
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
</body>

</html>

<?php 
$script = <<< JS

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