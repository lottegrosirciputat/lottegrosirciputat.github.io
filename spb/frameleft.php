<!--
     (Please keep all copyright notices.)
     This frameset document includes the Treeview script.
     Script found at: http://www.treeview.net
     Author: Marcelino Alves Martins

     Instructions:
	 - Through the style tag you can change the colors and types
	   of fonts to the particular needs of your site. 
	 - A predefined block has been made for stylish people with
	   black backgrounds.
-->

<?php 

session_start();

if (!isset($_SESSION["login"])) {
  header("Location: login.php");
  exit;
}

?>

<html>

<head>

<!-- if you want black backgound, remove this style block -->
<style>
   BODY {background-color: white}
   TD {
      font-size: 10pt; 
      font-family: verdana,helvetica; 
      text-decoration: none;
      white-space:nowrap;}
   A  {text-decoration: none;
       color: black}
   
    .specialClass {font-family:garamond; font-size:12pt;color:green;font-weight:bold;text-decoration:underline}

    footer {
      font-family: verdana,helvetica;
      font-size: 15px;
      font-weight: 400;
      position: absolute;
      bottom: 100;
      text-align: center;
    }
</style>

<!-- if you want black backgound, remove this line and the one marked XXXX and keep the style block below 

<style>
   BODY {background-color: black}
   TD {font-size: 10pt; 
       font-family: verdana,helvetica 
	   text-decoration: none;
	   white-space:nowrap;}
   A  {text-decoration: none;
       color: white}
</style>

XXXX -->


<!-- NO CHANGES PAST THIS LINE -->


<!-- Code for browser detection -->
<script src="include/assets/js/ua.js"></script>

<!-- Infrastructure code for the tree -->
<script src="include/assets/js/ftiens4.js"></script>

<!-- Execution of the code that actually builds the specific tree.
     The variable foldersTree creates its structure with calls to
	 gFld, insFld, and insDoc -->
<input type="hidden" id="session" value="<?= $_SESSION['div'] ?>">
<script src="all.js"></script>

<script type="text/javascript">

        // TTS
        aux2 = insFld(aux1, gFld("TTS", "javascript:undefined"))
            insDoc(aux2, gLnk("R", "Upload", "app/tts/upload.php?cat="))
            insDoc(aux2, gLnk("R", "Summary", "app/tts/summary.php"))

        // CST
        aux2 = insFld(aux1, gFld("CST", "javascript:undefined"))
            insDoc(aux2, gLnk("R", "Schedule", "app/cst/schedule.php"))
            insDoc(aux2, gLnk("R", "Input Data", "app/cst/input_sector.php"))
            insDoc(aux2, gLnk("R", "Summary", "app/cst/summary.php"))
            insDoc(aux2, gLnk("R", "Sector", "app/cst/sector.php"))
    // Tele
    aux1 = insFld(foldersTree, gFld("Tele", "javascript:undefined"))

    // OINP
    aux2 = insFld(aux1, gFld("OINP", "javascript:undefined"))
        insDoc(aux2, gLnk("R", "Input", "app/oinp/input.php"))
        insDoc(aux2, gLnk("R", "Reprint", "app/oinp/reprint.php"))
        <?php 
        if( $_SESSION['ip'] == '::1' OR $_SESSION['ip'] == '10.167.180.18' OR $_SESSION['ip'] == '10.167.180.13' OR $_SESSION['ip'] == '10.167.180.26' OR $_SESSION['ip'] == '10.167.180.52' ) {
        echo 'insDoc(aux2, gLnk("R", "Summary", "app/oinp/summary.php"))
              insDoc(aux2, gLnk("R", "Report", "app/oinp/report/report.php"))';
        }
// Application
//aux1 = insFld(foldersTree, gFld("Patrol", "javascript:undefined"))


          // NOT SOLD
  // aux2 = insFld(aux1, gFld("ALC Patrol", "javascript:undefined"))
  //     insDoc(aux2, gLnk("R", "Upload Patrol", "app/alc-patrol/upload.php"))
  //     insDoc(aux2, gLnk("R", "Summary", "app/alc-patrol/summary.php"))
        ?>
</script>
<script src="all2.js"></script>

</head>

<body topmargin=16 marginheight=16>

<!-- By making any changes to this code you are violating your user agreement.
     Corporate users or any others that want to remove the link should check 
	 the online FAQ for instructions on how to obtain a version without the link -->
<!-- Removing this link will make the script stop from working -->
<div style="position:absolute; top:0; left:0; "><table border=0><tr><td><font size=-2><a style="font-size:7pt;text-decoration:none;color:silver" href="http://www.treemenu.net/" target=_blank>JavaScript Tree Menu</a></font></td></tr></table></div>

<!-- Build the browser's objects and display default view of the 
     tree. -->
<script>initializeDocument()</script>
<noscript>
A tree for site navigation will open here if you enable JavaScript in your browser.
</noscript>

<footer>
  <p>Welcome, <?= "<b><i>".$_SESSION['login']."</i></b>"; ?><br>
  </p>
</footer>

</html>
