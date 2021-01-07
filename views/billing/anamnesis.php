<div class="col">
    <div id="elemen1">
      <div class="card card-body">
          <fieldset id="fieldset1">
            <br>
            <button type="submit" class="btn btn-success" id="tambah" data-toggle="modal" data-target="#myModal">➕ Tambah</button><button class="btn btn-alert" id="tambah">🖨 CETAK</button>
  <!-- Trigger the modal with a button -->

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-body">
            	<div id="hslAnamnesa" style="display:none"></div>
<div id="hsl_RA_terakhir" style="display:none"></div>
<div id="hsl_cmb_PF" style="display:none"></div>
          <button type="button" class="btn btn-danger" data-dismiss="modal" style="float:right;">X Close</button>
          <fieldset id="fieldset1" style="width:20px;margin-left:-10px">
    <legend id="lgnIsiDataRM">ANAMNESA &amp; PEMERIKSAAN FISIK</legend>
    <div id=""></div>
    <form id="form_isi_anamnesa" name="form_isi_anamnesa">
    <table width="300" cellspacing="0" cellpadding="0" border="0" align="center" style="margin-left:-10px">
    <tbody><tr id="trtglAnam" style="display: none;">
           <td colspan="4">Tgl &nbsp;:&nbsp; <input type="text" class="txtcenter" readonly="readonly" name="TglAnamB" id="TglAnamB" size="11" value="10-03-2020">
                            <input type="button" id="btnTglKrs" name="btnTglAnamB" value=" V " class="txtcenter" onclick="gfPop.fPopCalendar(document.getElementById('TglAnamB'),depRange,fungsikosong);">&nbsp;:&nbsp;
            Jam&nbsp;:&nbsp; <input id="jamAnamB" name="jamAnamB" size="11" class="txtcenter" type="text" value="">
           </td>
    </tr>
    <tr>
            <td colspan="4" style="padding-left:10px;">Nama Pasien&nbsp;:&nbsp; <label id="nmPA" class="nmPA"><div id="namapasien">a</div></label>&nbsp;:&nbsp;
            No RM&nbsp;:&nbsp; <label id="nmRM" class="nmRM"><div id="nomorm">00060872</div></label>
            </td>
        </tr>
        <tr>
            <td colspan="4" style="padding-left:10px;">Umur&nbsp;:&nbsp; <label id="umrPA" class="umrPA"><div id="umur">-1 th, 11 bl, 15 hr</div></label>&nbsp;&nbsp;
            <br>
            Alamat&nbsp;:&nbsp; <label id="almt" class="almt">a Desa HELVETIA Kec. MEDAN HELVETIA Kab. KOTA MEDAN</label>
            </td>
        </tr>
        <tr>
            <td colspan="4" style="padding-left:10px;">Pelaksana&nbsp;:&nbsp;
                <select id="cmbDokAnamnesa"  name="cmbDokAnamnesa" disabled="" ><option value="732" label="Administrator" selected=""><div id="pelaksana">Administrator</div></option>
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
        <!-- <tr>
        <td colspan="4">Flag&nbsp;&nbsp;&nbsp;:&nbsp; -->
            <input type="hidden" disabled="" class="txtinputreg" name="flag" id="flag" size="10" tabindex="3" value="1">
            <!-- </td>
        </tr> -->
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
                    <tbody><tr>
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
                            </tbody></table>
                        </td>
                        <td width="65%" style="">
                            <table width="100%">
                                            <!--<tr>
                                                <td width="35">Tensi</td>
                                                <td width="55" align="center"><input type="text" size="5" id="txtTensi" name="txtTensi" /></td>
                                                <td width="55">mmHg</td>
                                                <td width="100"></td>
                                                <td width="35">Nadi</td>
                                                <td width="55" align="center"><input type="text" size="5" id="txtNadi" name="txtNadi" /></td>
                                                <td width="55">/Mnt</td>
                                                <td width="100"></td>
                                                <td width="35">BB</td>
                                                <td width="55" align="center"><input type="text" size="5" id="txtBB" name="txtBB" /></td>
                                                <td width="55">Kg</td>
                                            </tr>-->
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
                                        </tbody></table>
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
                                        <textarea class="form-control" rows="1" style="width:160px;" ></textarea>
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
                                        <textarea class="form-control" rows="1" style="width:160px;" ></textarea>
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
                                        <textarea class="form-control" rows="1" style="width:160px;" ></textarea>
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
                                        <textarea class="form-control" rows="1" style="width:160px;" ></textarea>
                                </div>
                                </div>
                                </tr>                                                         

                            </tbody></table>
                            <table width="100%">
                            <tbody><tr>
                                <td>
                                	<fieldset style="width:869px;">
    									<legend id="lgnIsiDataRM">III. Pemeriksaan Neurologi
                            <input type="button" size="3" id="btnShowKunjDown" value="∨" style="display: inline; cursor: pointer;" onclick="document.getElementById('pNeurologi').style.height='400px';this.style.display='none';document.getElementById('btnShowKunjUp').style.display='inline';">
                            <input type="button" size="3" id="btnShowKunjUp" value="∧" style="display: none; cursor: pointer;" onclick="document.getElementById('pNeurologi').style.height='0px';this.style.display='none';document.getElementById('btnShowKunjDown').style.display='inline';">
                            </legend>
                             <div id="pNeurologi" style="overflow: auto; height: 0px;" align="center">
                        		<table width="100%">
                                    <tbody><tr>
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
                                            	<tbody><tr>
                                                	<td style="border-bottom:1px solid #000; border-right:1px solid #000;"><input type="text" id="mkiriatasP" class="mkiriatasP" value=""></td>
                                                    <td style="border-bottom:1px solid #000;"><input type="text" id="mkananatasP" class="mkananatasP" value=""></td>
                                                </tr>
                                                <tr>
                                                	<td style="border-right:1px solid #000;"><input type="text" id="mkiribawahP" class="mkiribawahP" value=""></td>
                                                    <td style=""><input type="text" id="mkananbawahP" class="mkananbawahP" value=""></td>
                                                </tr>
                                            </tbody></table>
                                        </td>                                            
                                    </tr>
                                    <tr>
                                        <td>Reflek Fisiologis</td>
                                        <td>
                                        <table width="100%">
                                            	<tbody><tr>
                                                	<td style="border-bottom:1px solid #000; border-right:1px solid #000;"><input type="text" id="rkiriatasP" class="rkiriatasP" value=""></td>
                                                    <td style="border-bottom:1px solid #000;"><input type="text" id="rkananatasP" class="rkananatasP" value=""></td>
                                                </tr>
                                                <tr>
                                                	<td style="border-right:1px solid #000;"><input type="text" id="rkiribawahP" class="rkiribawahP" value=""></td>
                                                    <td style=""><input type="text" id="rkananbawahP" class="rkananbawahP" value=""></td>
                                                </tr>
                                            </tbody></table>
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
                                    <tr >
                                        <td>Pemeriksaan Khusus</td>
                                        <td>
                                        &nbsp;<textarea id="cmbPKhusus" name="cmbPKhusus" cols="35" class="form-control"></textarea>
                                        </td>
                                        <td id="ab"></td>
                                        <td id="ab"></td>   
                                    </tr>
                                </tbody></table>
                            </div>      
                                    </fieldset>
                                </td>
                            </tr>
                            </tbody></table>
                            <table width="100%">
                            <tbody><tr>
                                <td>
                                	<fieldset style="width:869px;">
    									<legend id="lgnIsiDataRM">IV. Pemeriksaan Anak *
                            <input type="button" size="3" id="btnShowKunjDown1" value="∨" style="display: inline; cursor: pointer;" onclick="document.getElementById('pAnak').style.height='150px';this.style.display='none';document.getElementById('btnShowKunjUp1').style.display='inline';">
                            <input type="button" size="3" id="btnShowKunjUp1" value="∧" style="display: none; cursor: pointer;" onclick="document.getElementById('pAnak').style.height='0px';this.style.display='none';document.getElementById('btnShowKunjDown1').style.display='inline';">
                            </legend>
                             <div id="pAnak" style="overflow: auto; height: 0px;" align="center">
                        		<table width="80%">
                                    <tbody><tr>
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
                                        <textarea class="form-control" rows="1" style="width:160px;" ></textarea>
                                </div>
                                </div>                            
                                    </tr>
                                    <!--<tr>
                                        <td>&nbsp;</td>
                                      <td>&nbsp;</td>
                                        <td id="ab">&nbsp;</td>
                                        <td id="ab">&nbsp; </td>                                            
                                    </tr>
                                    <tr>
                                        <td>&nbsp;</td>
                                        <td><br /></td>
                                        <td id="ab">&nbsp;</td>
                                        <td id="ab">
                                        &nbsp; </td>                                            
                                    </tr>
                                    <tr>
                                        <td>&nbsp;</td>
                                        <td>
                                        &nbsp; </td>
                                        <td id="ab"></td>
                                        <td id="ab"></td>   
                                    </tr>-->
                                </tbody></table>
                            </div>      
                                    </fieldset>
                                </td>
                            </tr>
                            </tbody></table>
                            
                        </td>
                    </tr>
                </tbody></table>
            </td>							
        </tr>
        <tr>                        	
            <td colspan="4" style="padding-bottom:10px;padding-top:10px;" align="center">
                <input type="hidden" id="id_anamnesa" name="id_anamnesa" value="">
                <button type="button" class="btn-success" id="btnSimpanAnamnesa" name="btnSimpanAnamnesa" value="tambah" onclick="saveAnamnesa(this.value)" style="cursor:pointer;padding-left:10px;padding-right:10px;">
                <span style="">➕ Add &nbsp;</span></button>
                <button type="button"  class="btn-danger" id="btnDeleteAnamnesa" name="btnDeleteAnamnesa" onclick="deleteAnamnesa()" style="cursor:pointer;"> 
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
            <table class="table table-bordered table-striped table-hover" style='width:800px;margin-left:20px;'>
                <tr>
                    <td colspan="3"><center>DATA ANAMNESA</td>
                </tr>
                <tr>
                    <td class="alert danger" width="20px">NO</td>
                    <td class="alert danger">TANGGAL</td>
                    <td class="alert danger">DOKTER</td>
                    </center>
                </tr>
        </table>
            </td>
        </tr>
    </tbody></table>
    </form>
</fieldset>

<script>


</script>            
        </div>
        </div>
        </div>
        </div>
            <div class="row"></div>
            <table class="table table-bordered table-striped table-hover">
                <tr>
                    <td colspan="3"><center>DATA ANAMNESA</td>
                </tr>
                <tr>
                    <td class="alert danger" width="20px">NO</td>
                    <td class="alert danger">TANGGAL</td>
                    <td class="alert danger">DOKTER</td>
                    </center>
                </tr>
        </table>
        </fieldset>
    </div>
  </div>
        </div>