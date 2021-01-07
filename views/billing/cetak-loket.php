<title>Loket</title>
<link type="text/css" rel="stylesheet" href="../theme/print.css">
<table border="0" cellpadding="2" cellspacing="2" align="left" class="kwi">
    <tr>
        <td width="60">&nbsp;</td>
        <td width="200">&nbsp;</td>
        <td width="67">&nbsp;</td>
        <td width="200">&nbsp;</td>
    </tr>
    <tr>
        <td colspan="4" style="border-bottom:1px solid; font-family: verdana">
            <b>
                <br>
                RUMAH SAKIT PRIMA HUSADA CIPTA MEDAN<br>
                JL. Stasiun No. 92<br>
                Telepon (061) 6941927 - 6940120            </b>
        </td>
    </tr>
        <tr>
        <td style="font-size:14px; font-weight: bold; font-family: verdana;">NRM</td>
        <td style="font-size:14px; font-weight: bold; font-family: verdana;">:&nbsp;00060862</td>
        <td style="font-size:10px; font-family: verdana;">No. Billing</td>
        <td style="font-size:10px; font-family: verdana;">:&nbsp;140228</td>
    </tr>
    <tr>
        <td style="font-size:13px; font-family: verdana; font-weight: bold">Nama</td>
        <td colspan="3" style="text-transform:uppercase; font-family: verdana; font-size:13px; font-weight: bold">:&nbsp;Krisna</td>
    </tr>
    <tr>
        <td style="font-size:10px; font-family: verdana">Alamat</td>
        <td colspan="3" style="text-transform:uppercase; font-family: verdana; font-size:10px">:&nbsp;Jl klambir 5&nbsp;rt &nbsp;rw </td>
    </tr>
    <tr>
        <td style="font-size:12px; font-weight:bold; font-family: verdana">Kunjungan</td>
        <td colspan="2" style="font-size:12px; font-weight:bold; font-family: verdana">:&nbsp;MCU</td>
        <td>&nbsp;</td>
    </tr>
    <tr>
        <td style="border-bottom:1px solid; font-size:10px; font-family: verdana">Tgl</td>
        <td style="border-bottom:1px solid; font-size:10px; font-family: verdana">:&nbsp;20-02-2020</td>
       
    </tr>
    <tr>
        <td colspan="4">
            <table width="580" border="0" cellpadding="0" cellspacing="0" class="kwi">
                <tr>
                    <td height="28" width="58" align="center" style="font-weight:bold; border-bottom:1px solid; font-size:10px; font-family: verdana">No</td>
                    <td width="342" style="font-weight:bold; border-bottom:1px solid; font-size:10px; font-family: verdana">&nbsp;Uraian</td>
                    <td width="180" style="font-weight:bold; border-bottom:1px solid; font-size:10px; font-family: verdana" align="center">Total&nbsp;</td>
                </tr>
                                <tr>
                    <td height="28" style="border-bottom:2px groove; font-size:10px; font-family: verdana" align="center">1</td>
                    <td style="border-bottom:2px groove; font-size:10px; font-family: verdana">&nbsp;Retribusi</td>
                    <td style="border-bottom:2px groove; font-size:10px; font-family: verdana; padding-right:5px" align="right">171.000&nbsp;</td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td align="right" style="font-size:10px; font-family: verdana">Jumlah Total&nbsp;</td>
                    <td align="right" style="font-size:10px; font-family: verdana; padding-right:5px"><b>171.000</b>&nbsp;</td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td colspan="2" align="center" style="font-size:10px; font-family: verdana;">Medan,&nbsp;&nbsp;20-02-2020</td>
    </tr>
    <tr>
        <td height="50">&nbsp;</td>
        <td>&nbsp;</td>
        <td colspan="2">&nbsp;</td>
    </tr>
        <!--tr>
        <td>&nbsp;</td>
        <td colspan="3" style="text-decoration:underline; font-family: verdana; font-size:10px; padding-right:50px" align="right">(Administrator)</td>
    </tr-->
    <tr>
        <td>&nbsp;</td>
        <td align="center" style="font-family: verdana; font-size:10px;">&nbsp;(&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;)</td>
        <td colspan="2" style="text-decoration:underline; font-family: verdana; font-size:10px;" align="center">(Administrator)</td>
    </tr>
    <tr>
        <td>11:48</td>
        <td align="center">&nbsp;Kasir</td>
        <td colspan="2" align="center" style="font-family: verdana">Petugas</td>
    </tr>
    <!--tr>
        <td>&nbsp;< ?php echo $jam;?></td>
        <td colspan="3" align="right">&nbsp;Operator&nbsp;&nbsp;&nbsp;< ?php echo $rwPeg['nama'];?></td>
    </tr-->
    <tr>
        <td colspan="4" style="font-weight:bold; font-size:10px; font-family: verdana" align="center">"Bukti pembayaran ini juga berlaku sebagai kuitansi"</td>
    </tr>
    <tr id="trTombol">
        <td colspan="4" class="noline" align="center">
            <input id="btnPrint" type="button" value="Print/Cetak" onClick="cetak(document.getElementById('trTombol'));"/>
            <input id="btnTutup" type="button" value="Tutup" onClick="window.close();"/>
        </td>
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
