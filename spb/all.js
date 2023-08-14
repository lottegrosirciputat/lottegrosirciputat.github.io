

// You can find instructions for this file at http://www.treeview.net

//Environment variables are usually set at the top of this file.
USETEXTLINKS = 1
STARTALLOPEN = 0
USEFRAMES = 0
USEICONS = 0
WRAPTEXT = 1
PRESERVESTATE = 1
ICONPATH = 'include/assets/images/' //change if the gif's folder is a subfolder, for example: 'images/'


foldersTree = gFld("Home", "index.php")

      let div = document.getElementById('session').value;

       // ALC
      if ( div == 'ALC' ) {

        aux1 = insFld(foldersTree, gFld("ALC", "javascript:undefined"))
          aux2 = insFld(aux1, gFld("SPB", "javascript:undefined"))
                  insDoc(aux2, gLnk("R", "Input", "alc/spb/index.php"))
                  insDoc(aux2, gLnk("R", "Summary", "alc/spb/summary.php"))
                  insDoc(aux2, gLnk("R", "List Item", "alc/spb/item.php"))
      
      }

      // OPL
      aux1 = insFld(foldersTree, gFld("OPL", "javascript:undefined"))
              insDoc(aux1, gLnk("R", "OPL Today", "opl/index.php"))
              insDoc(aux1, gLnk("R", "Ordered List", "opl/ordered_list.php"))
              insDoc(aux1, gLnk("R", "Update OPL", "opl/update_opl.php"))
              insDoc(aux1, gLnk("R", "Update OPL V.2", "opl/update_opl2.php"))

	   // Stock Management
	   aux1 = insFld(foldersTree, gFld("Stock Mgt", "javascript:undefined"))
        aux2 = insFld(aux1, gFld("Stock-Adj", "javascript:undefined"))
       		  insDoc(aux2, gLnk("R", "Register", "stock_mgt/stock-adj/index.php"))
      		  insDoc(aux2, gLnk("R", "List", "stock_mgt/stock-adj/list.php"))

     // Application
     aux1 = insFld(foldersTree, gFld("Application", "javascript:undefined"))
        aux2 = insFld(aux1, gFld("Penitipan", "javascript:undefined")) 
   		         insDoc(aux2, gLnk("R", "Request Penitipan", "app/penitipan/req_titipan.php"))
               insDoc(aux2, gLnk("R", "Reprint Penitipan", "app/penitipan/reprint_req_titip.php"))
               insDoc(aux2, gLnk("R", "Request Pengeluaran", "app/penitipan/req_titipan_out.php"))
               insDoc(aux2, gLnk("R", "Reprint Pengeluaran", "app/penitipan/reprint_titip_out.php"))
               insDoc(aux2, gLnk("R", "Revisi Pengeluaran", "app/penitipan/revisi_titip_out.php"))
  		         insDoc(aux2, gLnk("R", "List Penitipan", "app/penitipan/list_titipan.php"))

        aux2 = insFld(aux1, gFld("Lotte Mail Upload Display", "javascript:undefined"))
        insDoc(aux2, gLnk("R", "Upload Picture", "app/lm/upload.php"))
        insDoc(aux2, gLnk("R", "Summary", "app/lm/summary.php"))

        aux2 = insFld(aux1, gFld("BDP Upload Display", "javascript:undefined")) 
            insDoc(aux2, gLnk("R", "Upload Picture", "app/bdp/upload.php"))
            insDoc(aux2, gLnk("R", "Summary", "app/bdp/summary.php"))

        aux2 = insFld(aux1, gFld("Promo Hits Upload Display", "javascript:undefined")) 
            insDoc(aux2, gLnk("R", "Upload Picture", "app/promo_hits/upload.php"))
            insDoc(aux2, gLnk("R", "Summary", "app/promo_hits/summary.php"))    

        aux2 = insFld(aux1, gFld("Exp Product Mgt", "javascript:undefined"))
        insDoc(aux2, gLnk("R", "Floor Input", "app/exp/input.php"))
        insDoc(aux2, gLnk("R", "Input List", "app/exp/input_list.php"))
        insDoc(aux2, gLnk("R", "BM Acquisition Summary", "app/exp/acq_summary.php"))

        // SGM PATROL
        // aux2 = insFld(aux1, gFld("SGM PATROL", "javascript:undefined"))
        //     insDoc(aux2, gLnk("R", "Upload Picture", "app/sgm-patrol/upload.php"))
        //     insDoc(aux2, gLnk("R", "Summary", "app/sgm-patrol/summary.php"))

        aux2 = insFld(aux1, gFld("Logo Halal Check", "javascript:undefined"))
            insDoc(aux2, gLnk("R", "Check Form", "app/logo-halal/cek_logo.php"))
            insDoc(aux2, gLnk("R", "Check Summary", "app/logo-halal/cek_summary.php"))

        // NOT SOLD
        aux2 = insFld(aux1, gFld("Not Sold", "javascript:undefined"))
            insDoc(aux2, gLnk("R", "Upload Data", "app/notsold/upload_data.php"))
            insDoc(aux2, gLnk("R", "Upload Notsold", "app/notsold/upload_img.php"))
            insDoc(aux2, gLnk("R", "Data", "app/notsold/data.php"))
            insDoc(aux2, gLnk("R", "Summary", "app/notsold/summary.php"))



 

