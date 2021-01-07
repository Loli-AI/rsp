<html>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!--head>
<title>Loket</title>
<link type="text/css" rel="stylesheet" href="../theme/print.css">
</head-->
<body onLoad="">
<table border="0" cellpadding="2" cellspacing="2" width="300" height="4cm" align="left" class="kwi">
    <tr>
        <td width="100">&nbsp;</td>
        <td width="100">&nbsp;</td>
        <td width="75">&nbsp;</td>
        <td>&nbsp;</td>
    </tr>
    
    
    
        <tr>
        <td colspan="4" style="font-size:22px;" align="center"><b>00060862</b></td>
    </tr>
    <tr>
        <td colspan="4" align="center" style="font-size:19px;"><b>Krisna</b></td>
    </tr>
    <tr>
        <td colspan="4" align="center" style="font-size:19px;"><b></b></td>
    </tr>
    <tr>
        <td colspan="4" align="center" style="font-size:14px;">Jl klambir 5, MEDAN SUNGGAL</td>
    </tr>
    <tr>
        <td colspan="4" align="center"><img width="160mm" src="../../barcode/create.php?norm=00060862" /></td>
    </tr>
    <tr id="trTombol">
        <td colspan="4" class="noline" align="center">
            <input id="btnPrint" type="button" value="Print/Cetak" onClick="cetak(document.getElementById('trTombol'));"/>
            <input id="btnTutup" type="button" value="Tutup" onClick="window.close();"/>
        </td>
    </tr>
</table>
</body>
<script type="text/JavaScript">
    // define progress listener object
    /*var progressListener = {
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
*/
	
	
    function cetak(tombol){
		var tmpShrinkToFit;
        tombol.style.visibility='collapse';
        /*if(tombol.style.visibility=='collapse'){
			//if(confirm('Anda yakin mau mencetak Kwitansi ini?')){*/
			try{
				// set portrait orientation
				//jsPrintSetup.setOption('orientation', jsPrintSetup.kPortraitOrientation);
				// set top margins in millimeters
				jsPrintSetup.setOption('marginTop', 0);
				jsPrintSetup.setOption('marginBottom', 0);
				jsPrintSetup.setOption('marginLeft', 0);
				jsPrintSetup.setOption('marginRight', 0);
				// set page header
				jsPrintSetup.setOption('headerStrLeft', '');
				jsPrintSetup.setOption('headerStrCenter', '');
				jsPrintSetup.setOption('headerStrRight', '');
				// set empty page footer
				jsPrintSetup.setOption('footerStrLeft', '');
				jsPrintSetup.setOption('footerStrCenter', '');
				jsPrintSetup.setOption('footerStrRight', '');
    
				//jsPrintSetup.setOption('paperHeight','4');
				//jsPrintSetup.setOption('paperWidth','5');
				// clears user preferences always silent print value
				// to enable using 'printSilent' option
				jsPrintSetup.clearSilentPrint();
				jsPrintSetup.setOption('printSilent', 0);
				// Suppress print dialog (for this context only)
				//jsPrintSetup.setOption('printSilent', 1);
				// Do Print
				// When print is submitted it is executed asynchronous and
				// script flow continues after print independently of completetion of print process!
				
				// next commands
				tmpShrinkToFit=jsPrintSetup.getOption('shrinkToFit');
				//alert(tmpShrinkToFit);
				jsPrintSetup.setOption('shrinkToFit','1');
		
				//jsPrintSetup.setPrinter('EPSON LX-300+ /II');
				//jsPrintSetup.setPrinter('PDF Complete');
				//jsPrintSetup.setPrintProgressListener(progressListener);
				//jsPrintSetup.setSilentPrint(true);
				jsPrintSetup.print();
				//alert(jsPrintSetup.getOption('shrinkToFit'));
				jsPrintSetup.setOption('shrinkToFit',tmpShrinkToFit);
				//alert(jsPrintSetup.getOption('shrinkToFit'));
				//jsPrintSetup.clearSilentPrint();
				window.close();
			//}else{
            //    tombol.style.visibility='visible';
            //}*/
			}catch(e){
				window.location='../addon/jsprintsetup-0.9.2.xpi';
                //window.print();
                //window.close();
			}
        //}
    }
</script>
</html>
