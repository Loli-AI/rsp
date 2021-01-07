<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */ 
/* @var $model app\models\ContactForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;
use kartik\select2\Select2;

$date = date('Y/m/d');

$this->title = 'Pembayaran';

?>
<input type="hidden" value='<?= $date ?>' id='todayDate'>
<input type="hidden" value='' id='pasienId'>
<div class="container">
         <div class="col-sm-6"> 
              <table class='borderless'>
                   <tr>
                         <td width='100px'><label for="rm">No. RM</label></td>
                          <td>:&emsp;<input type="text" id="rm"></td>
                   </tr>
                   <tr>
                         <td><label for="nama">Nama</label></td>
                          <td>:&emsp;<div id="diagnosaTable" style='width:200px;display:inline-block;'><?= Select2::widget([                                               'name' => '',
                                            'data' => $search,
                                            'options' => [
                                            'placeholder' => 'Cari Pasien',
                                            'allowClear' => true,
                                            'id' => 'nama'
                                            ],
                                            ]); ?></div></td></tr>
                   <tr>
                         <td><label for="alamat">Alamat</label></td>
                         <td>:&emsp;<textarea disabled id="alamat"></textarea></td>
                    </tr>
              </table>
         
         </div>
         <div class="col-sm-6">
             <table>
                 <tr>
                    <td width='100px'><label for="bill">No. Billing</label></td>
                    <td>:&emsp;<input disabled type="text" id="bill"></td>
               </tr>
                 <tr>
                    <td><label for="terima">Terima Dari</label></td>
                    <td>:&emsp;<input type="text" id="terima"></td>
                 </tr>
             </table>
         </div>
</div>
<hr>

<div class="row">
         <div class="col-sm-4" style='margin-left:40px'>
              <table>
                   <tr>
                        <td width='160px'><label for="kasir">Kasir</label></td>
                        <td>:&emsp;<select id="kasir">
                                <option>Kasir IGD</option>
                                <option>Kasir Rawat Jalan</option>
                                <option>Kasir Rawat Inap</option>
                                <option>Kasir Rawat Jalan Krakatau</option>
                            </select>
                        </td>
                   </tr>
                   <tr>
                        <td><label for="piltagih">Pilihan Tagihan</label></td>
                        <td>:&emsp;<input type="checkbox" id="piltagih" data-toggle="modal" data-target="#tagihan">&nbsp;Pilih Tagihan</td>
                   </tr>
                   <tr>
                        <td><label for="total">Total Bayar</label></td>
                        <td>:&emsp;<input disabled type="text" value='0' id="totalbyr"></td>
                   </tr>
                   <tr>
                        <td><label for="keringanan">Keringanan</label></td>
                        <td>:&emsp;<input type="text" value='0' id="keriganan"></td>
                   </tr>
                   <tr>
                        <td><label for="sudah">Sudah Bayar</label></td>
                        <td>:&emsp;<input disabled type="text" value='0' id="sudah"></td>
                   </tr>
                   <tr>
                        <td><label for="pembayaran"><b>Pembayaran</b></label></td>
                        <td>:&emsp;<input  type="text" value='0' id="pembayaran"></td>
                   </tr>
                   <tr>
                    <td><br></td>
                   </tr>
                   <tr>
                        <td><label for="terimaUang">Jumlah Uang Diterima</label></td>
                        <td>:&emsp;<input type="text" value='0' id="terimaUang"></td>
                   </tr>
                   <tr>
                    <td><br></td>
                   </tr>
                   <tr>
                        <td><label for="kembali">Jumlah Uang Kembali</label></td>
                        <td>:&emsp;<input disabled type="text" value='0' id="kembali"></td>
                   </tr>
              </table>
         </div>

         <div class="col-sm-6">
              <div class="overflow top">
                   <table class="table table-hover">
                   <thead class='btn-success'>
                        <tr>
                             <td colspan="7"><center><b> Pembayaran </b></td>
                         </tr>
                        <tr>
                             <td>No</td>
                             <td>Tanggal</td>
                             <td>No. Bukti Bayar</td>
                             <td>Jumlah</td>
                             <td>Status</td>
                             <td>Terima Dari</td>
                        </tr>
                    </thead>
                        <tbody id='dataP'></tbody>
                   </table>
         </div>
</div>
</div><br>
<div class="row">
     
     <div class="col-sm-4" style='margin-left:30px'>
          <button type="submit" class="btn btn-success" onclick='TambahPembayaran()'><i class='fas fa-plus'></i> Tambah</button>&emsp;
          <button type="reset" class="btn btn-danger"><i class='fas fa-trash-alt'></i> Hapus</button>&emsp;
          <button type="reset" class="btn btn-info" onclick='PulangPasien()'><i class='fas fa-home'></i> KRS</button>
     </div>
</div>
</div>
     <hr>
<div class="row">

     <div class="col-sm-2"></div>
     <div class="col-sm-9">
        <nav class="navbar navbar-default ">
              <div class="container-fluid">
                 
      <ul class="nav navbar-nav">
      
      <li><a href="" >Cetak</a></li>
      <li> <a href="">Kwitansi</a></li>
      <li><a href="" data-toggle="modal" data-target="#tagihan">View Detail Tagihan</a></li>
      <li><a href="">Hapus Konsul/MRS</a></li>
      
      <li class="dropdown"><a onclick='RincianPasien()'>Rincian Tindakan</a>
     </li>
      <li class="dropdown"><a href="" data-toggle="dropdown" class="dropdown-toggle">Cetak Penunjang & Obat</a>
          <ul class="dropdown-menu">
          <li><a href="#" data-toggle="modal" data-target="#labpk">Lab PK</a></li>
          <li><a href="#" data-toggle="modal" data-target="#labpa">Lab PA</a></li>
          <li><a href="#" data-toggle="modal" data-target="#radiologi">Radiologi</a></li>
          <li><a href="#">Rincian Obat RJ/RD + RI</a></li>
        </ul>
     </li>
    </ul>
  </div>
</nav>

<!--modal Lab PK-->
<div class="modal fade" id="labpk" role="dialog">
      <div class="modal-dialog modal-sm">
               <!--modal content Lab PK-->
            <div class="modal-content">
                  <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        
                  </div>
                  <div class="modal-body">
                  <div class="form-group">
                         
                         <select id="sel1">
                           <option>1</option>
                           <option>2</option>
                           <option>3</option>
                           <option>4</option>
                         </select>

                     </div>
                     <center><a href="" class="btn btn-success">Cetak</a></center>
                  </div>
                  <div class="modal-footer"></div>
            </div>
      </div>
</div>

<!--modal Lab PA-->
<div class="modal fade" id="labpa" role="dialog">
      <div class="modal-dialog modal-sm">
               <!--modal content Lab PA-->
            <div class="modal-content">
                  <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        
                  </div>
                  <div class="modal-body">
                       <div class="form-group">
                         
                           <select id="sel1">
                             <option>1</option>
                             <option>2</option>
                             <option>3</option>
                             <option>4</option>
                           </select>

                       </div>
                       <center><a href="" class="btn btn-success">Cetak</a></center>
                  </div>
                  <div class="modal-footer"></div>
            </div>
      </div>
</div>

<!--modal Radiologi-->
<div class="modal fade" id="radiologi" role="dialog">
      <div class="modal-dialog modal-sm">
               <!--modal content Radiologi-->
            <div class="modal-content">
                  <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        
                  </div>
                  <div class="modal-body">
                  <div class="form-group">
                         
                         <select id="sel1">
                           <option>1</option>
                           <option>2</option>
                           <option>3</option>
                           <option>4</option>
                         </select>

                     </div>
                     <center><a href="" class="btn btn-success">Cetak</a></center>
                  </div>
                  <div class="modal-footer"></div>
            </div>
      </div>
</div>

<!--modal Pilihan Tagihan-->
<div class="modal fade" id="tagihan" role="dialog">
      <div class="modal-dialog modal-lg">
               <!--modal content Pilihan Tagihan-->
            <div class="modal-content">
                  <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        
                  </div>
                  <div class="modal-body">
                       <div class="col-sm-5">
                            <form action="" class="form-horizontal">
                                 <div class="form-group">
                                      <label for="rm" class="control-label col-sm-4">No.RM</label>
                                      <div class="col-sm-5">
                                           <input type="text" id="rm" >
                                      </div>
                                 </div>
                                 <div class="form-group">
                                      <label for="nama" class="control-label col-sm-4">Nama</label>
                                      <div class="col-sm-8">
                                           <input type="text" id="nama">
                                      </div>
                                 </div>
                                 <br>
                                 <div class="form-group">
                                      <label for="billing" class="control-label col-sm-4">Billing</label>
                                      <div class="col-sm-5">
                                           <input type="text" id="billing" >
                                      </div>
                                 </div>
                                 <div class="form-group">
                                      <label for="obat" class="control-label col-sm-4">Obat</label>
                                      <div class="col-sm-5">
                                           <input type="text" id="obat" >
                                      </div>
                                 </div>
                                 <hr>
                                 <div class="form-group">
                                      <label for="total" class="control-label col-sm-4">Total Tagihan</label>
                                      <div class="col-sm-5">
                                           <input type="text" id="total" >
                                      </div>
                                 </div>
                                 <br>
                                 <div class="form-group">
                                      <label for="totalobat" class="control-label col-sm-4">Total Obat</label>
                                      <div class="col-sm-5">
                                           <input type="text" id="totalobat" >
                                      </div>
                                 </div>
                                 <br>
                                 <div class="form-group">
                                      <label for="pembayaran" class="control-label col-sm-4">Pembayaran</label>
                                      <div class="col-sm-5">
                                           <input type="text" id="pembayaran" >
                                      </div>
                                 </div>
                                 
                            </form>
                       </div>
                       <div class="col-sm-7">
                            <table class="table-bordered table-hover"></table>
                       </div>
                  </div>
                  <div class="modal-footer"></div>
            </div>
      </div>
</div>

     </div>
     <div class="col-sm-2"></div>
</div>
<div class="row">
     <br>
     <br>
</div>
</div>

<?php
$script = <<< JS

DataPembayaran();

JS;
$this->registerJs($script);
?>