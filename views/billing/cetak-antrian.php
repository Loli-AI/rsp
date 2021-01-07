<title>Loket</title>
<link type="text/css" rel="stylesheet" href="../theme/print.css">
<table width="266" border="0" align="left" cellpadding="2" cellspacing="2" class="kwi">
    
    <tr>
      <td width="45" align="center" style="border-bottom:1px solid; font-size:12px; font-family: Arial, Helvetica, sans-serif"><img src="../images/logo.png" width="39" height="37" />                  </td>
      <td width="207" style="border-bottom:1px solid; font-weight:bold; font-size:13px; font-family: Arial, Helvetica, sans-serif">&nbsp;&nbsp;&nbsp;RUMAH SAKIT PRIMA HUSADA CIPTA MEDAN<br/>JL. Stasiun No. 92&nbsp;Belawan</td>
    </tr>
        <tr>
      <td style=" font-size:12px; font-weight:bold; font-family: Arial, Helvetica, sans-serif">Tgl</td>
      <td style="  font-size:12px; font-weight:bold; font-family: Arial, Helvetica, sans-serif">:&nbsp;24-02-2020 Jam : 11:48</td>
    </tr>
    <tr>
        <td style="font-size:12px; font-weight:bold;  font-family: Arial, Helvetica, sans-serif;">No RM</td>
        <td style="font-size:12px; font-weight:bold; font-family: Arial, Helvetica, sans-serif;">:&nbsp;00060862</td>
    </tr>
    <tr>
        <td style="font-size:12px; font-weight:bold; font-family: Arial, Helvetica, sans-serif; ">Nama</td>
        <td style="text-transform:uppercase; font-weight:bold; font-family: Arial, Helvetica, sans-serif; font-size:13px; ">:&nbsp;Krisna</td>
    </tr>
    <tr>
        <td style="font-size:12px; font-weight:bold; font-family: Arial, Helvetica, sans-serif">Dokter</td>
        <td style="text-transform:uppercase;  font-weight:bold; font-family: Arial, Helvetica, sans-serif; font-size:12px">:&nbsp;Dr. ADE IRHAMNI, SpKK<!--Jl klambir 5&nbsp;rt &nbsp;rw --></td>
    </tr>
    <tr>
        <td style="font-size:12px; font-weight:bold;  font-family: Arial, Helvetica, sans-serif">Klinik</td>
        <td style="font-size:12px; font-weight:bold;  font-family: Arial, Helvetica, sans-serif">:&nbsp;MCU</td>
    </tr>
 
    <tr>
      <td colspan="2" align="center" style=" border-bottom:1px solid; font-weight:bold; border-top:1px solid; border-left:1px solid; border-right:1px solid; solid; font-size:12px;  font-family: Arial, Helvetica, sans-serif">UMUM</td>
    </tr>
    <tr>
      <td colspan="2" align="center" style="font-size:15px; font-weight:bold; font-family: Arial, Helvetica, sans-serif">No Antrian : </td>
    </tr>
    <tr>
      <td colspan="2" align="center" style="font-size:60px; font-weight:bold; font-family: Arial, Helvetica, sans-serif">02</td>
    </tr>
	<tr>
      <td colspan="2" align="center" style="font-size:16px; border-bottom:1px dashed; font-weight:bold; font-family: Arial, Helvetica, sans-serif">MCU </td>
    </tr>

    <!--tr>
        <td>&nbsp;</td>
        <td colspan="3" style="text-decoration:underline; font-family: Arial, Helvetica, sans-serif; font-size:10px; padding-right:50px" align="right">()</td>
    </tr-->
    <!--tr>
        <td>&nbsp;< ?php echo $jam;?></td>
        <td colspan="3" align="right">&nbsp;Operator&nbsp;&nbsp;&nbsp;< ?php echo $rwPeg['nama'];?></td>
    </tr-->
    <tr>
      <td colspan="2" style="border-bottom:1px dashed; font-weight:bold; font-size:13px; border-right:15px; font-family: Arial, Helvetica, sans-serif"  b><div align="justify">Bila nomor antrian anda terlewat, mohon menghubungi petugas Poliklinik untuk mendapatkan nomor antrian baru</div></td>
    </tr>
    <tr>
        <td colspan="2" style=" font-size:11px; font-weight:bold; font-family: Arial, Helvetica, sans-serif" align="center">Administrator <br/>24-02-2020 Jam : 11:48&nbsp;&nbsp;</td>
    </tr>
    <tr id="trTombol">
        <td colspan="2" class="noline" align="center">
            <input id="btnPrint" type="button" value="Print/Cetak" onClick="cetak(document.getElementById('trTombol'));"/>
            <input id="btnTutup" type="button" value="Tutup" onClick="window.close();"/>        </td>
    </tr>
</table>
<script type="text/JavaScript">
    // define progress listener object
    var progressListener = {
	stateIsRequest:false,
	QueryInterface : function(aIID) {
	    if (aIID.equals(Components.interfaces.nsIWebProgressListener) ||
	    aIID.equals(Components.interfaces.nsISupportsWeakReference) ||
	    aIID.equals(Components.interfaces.nsISupports))
	    return this;
	    throw Components.results.NS_NOINTERFACE;
	},
	onStateChange : function(aWebProgress, aRequest, aStateFlags, aStatus) {
	alert('State Change -> State Flags:'+aStateFlags+' Status:'+aStatus);
	return 0;
	},
	onLocationChange : function(aWebProgress, aRequest, aLocation) {
	return 0;
	},
	onProgressChange : function(aWebProgress, aRequest,
	aCurSelfProgress, aMaxSelfProgress,
	aCurTotalProgress, aMaxTotalProgress){
	alert('Self Current:'+aCurSelfProgress+' Self Max:'+aMaxSelfProgress
	+' Total Current:'+aCurTotalProgress+' Total Max:'+aMaxTotalProgress);
	},
	onStatusChange : function(aWebProgress, aRequest, aStateFlags, aStatus) {
	alert('Status Change -> State Flags:'+aStateFlags+' Status:'+aStatus);
	},
	onSecurityChange : function(aWebProgress, aRequest, aState){}
	// onLinkIconAvailable : function(a){}
    };

    function cetak(tombol){
        tombol.style.visibility='collapse';
        if(tombol.style.visibility=='collapse'){
            /*if(confirm('Anda yakin mau mencetak Kwitansi ini?')){
		// set portrait orientation
		jsPrintSetup.setOption('orientation', jsPrintSetup.kPortraitOrientation);
		// set top margins in millimeters
		jsPrintSetup.setOption('marginTop', 15);
		jsPrintSetup.setOption('marginBottom', 15);
		jsPrintSetup.setOption('marginLeft', 20);
		jsPrintSetup.setOption('marginRight', 10);
		// set page header
		jsPrintSetup.setOption('headerStrLeft', 'My custom header');
		jsPrintSetup.setOption('headerStrCenter', '');
		jsPrintSetup.setOption('headerStrRight', '&PT');
		// set empty page footer
		jsPrintSetup.setOption('footerStrLeft', '');
		jsPrintSetup.setOption('footerStrCenter', '');
		jsPrintSetup.setOption('footerStrRight', '');
		// clears user preferences always silent print value
		// to enable using 'printSilent' option
		jsPrintSetup.clearSilentPrint();
		// Suppress print dialog (for this context only)
		jsPrintSetup.setOption('printSilent', 1);
		// Do Print
		// When print is submitted it is executed asynchronous and
		// script flow continues after print independently of completetion of print process!
		
		// next commands

		jsPrintSetup.setPrinter('EPSON LX-300+ /II');
		//jsPrintSetup.setPrinter('PDF Complete');
		//jsPrintSetup.setPrintProgressListener(progressListener);
		jsPrintSetup.setSilentPrint(true);
		jsPrintSetup.print();
		jsPrintSetup.setSilentPrint(false);
		window.close();
            }
            else{
                tombol.style.visibility='visible';
            }*/
                window.print();
                window.close();
        }
    }
</script>
