<title>Kartu Pasien</title>
<script type="text/JavaScript" language="JavaScript" src="../theme/js/formatPrint.js"></script>
<link type="text/css" rel="stylesheet" href="../theme/print.css">
<table width="500" border="0" cellpadding="0" cellspacing="1" class="kwi" style="font-size: 10px">
     <tr>
            <td colspan="5" align="center">&nbsp;</td>
    </tr>
    <tr>
        <td colspan="5" align="center">&nbsp;</td>
    </tr>
    <tr>
        <td colspan="5" align="center">&nbsp;</td>
    </tr>
    <tr id="header">
        <td colspan="5" align="center">RUMAH SAKIT PRIMA HUSADA CIPTA MEDAN<br><b>KOTAMADYA MEDAN</b><br><span style="font-size:12px">Telp. (061) 6941927 - 6940120</span></td>
    </tr>
    <tr id="header1">
        <td width="15%">&nbsp;</td>
        <td colspan="3" style="border-top:2px solid; font-weight:400;padding-top:10px;" align="center">KARTU IDENTITAS BEROBAT</td>
        <td width="8%">&nbsp;</td>
    </tr>
    <tr>
        <td colspan="2" style="font-size:16px">&nbsp;&nbsp;&nbsp;Nomor</td>
        <td width="2%" style="font-size:146x">:&nbsp;</td>
        <td colspan="2" width="62%" style="font-size:16px">&nbsp;<b>00060862</b></td>
        <!--<td>&nbsp;</td>-->
    </tr>
    <tr>
        <td colspan="2" style="font-size:16px">&nbsp;&nbsp;&nbsp;Nama</td>
        <td style="font-size:16px">:&nbsp;</td>
        <td colspan="2" style="text-transform:uppercase;font-size: 16px">&nbsp;Krisna</td>
        <!--<td>&nbsp;</td>-->
    </tr>
    <tr>
        <td colspan="2" style="font-size:16px" >&nbsp;&nbsp;&nbsp;Tgl Lahir</td>
        <td style="font-size:16px">:&nbsp;</td>
        <td colspan="2" style="font-size:16px">&nbsp;08 Februari 2007</td>
        <!--<td>&nbsp;</td>-->
    </tr>
    <tr>
        <td colspan="2" style="font-size:16px">&nbsp;&nbsp;&nbsp;Jenis Kelamin</td>
        <td style="font-size:16px">:&nbsp;</td>
        <td colspan="2" style="font-size:16px">&nbsp;L</td>
        <!--<td>&nbsp;</td>-->
    </tr>
    <tr>
        <td colspan="2" style="font-size:16px">&nbsp;&nbsp;&nbsp;Alamat</td>
        <td style="font-size:16px">:&nbsp;</td>
        <td colspan="2" rowspan="2" style="text-transform:uppercase; font-size: 10px" valign="top">&nbsp;Jl klambir 5&nbsp;RT /,&nbsp;KOTA MEDAN</td>
        <!--<td>&nbsp;</td>-->
    </tr>
    <tr>
        <td>&nbsp;</td>
        <td width="18%">&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
    </tr>
    <tr>
      <td colspan="4" class="noline" align="center"><img src="../../barcode/create.php?norm=00060862" /></td>
    </tr>
    <tr id="trTombol">
        <td colspan="4" class="noline" align="center">
            <input id="btnPrint" type="button" value="Print/Cetak" onClick="cetak(document.getElementById('trTombol'));"/>
            <input id="btnTutup" type="button" value="Tutup" onClick="window.close();"/>
        </td>
    </tr>
</table>
<script type="text/JavaScript">
	/*try{
	formatKartu();
	}catch(e){
	window.location='../addon/jsprintsetup.xpi';
	}*/
    function cetak(tombol){
        tombol.style.visibility='collapse';
		header.style.visibility='hidden';
		header1.style.visibility='hidden';
		document.getElementById("header1").style.visibility='hidden';
        if(tombol.style.visibility=='collapse'){
            //if(confirm('Anda yakin mau mencetak Kartu Pasien ini?')){
               // window.print();
			   cetakKartu12();
               //window.close();
				//cetakB();
            //}
            //else{
                //tombol.style.visibility='visible';
				//header.style.visibility='visible';
				//header1.style.visibility='visible';
            //}
	    /*try{
		    mulaiPrint();		  
	    }
	    catch(e){
		    window.print();
	    }
	    */
        }
    }
</script>