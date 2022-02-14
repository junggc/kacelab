<script language="JavaScript">
<!--

function _CloseOnEsc() {
  if (event.keyCode == 27) { window.close(); return; }
}

function _getTextRange(elm) {
  var r = elm.parentTextEdit.createTextRange();
  r.moveToElementText(elm);
  return r;
}

window.onerror = HandleError

function HandleError(message, url, line) {
  var str = "An error has occurred in this dialog." + "\n\n"
  + "Error: " + line + "\n" + message;
  alert(str);
  window.close();
  return true;
}

function Init() {
  var elmSelectedImage;
  var htmlSelectionControl = "Control";
  var globalDoc = window.dialogArguments;
  var grngMaster = globalDoc.selection.createRange();
  
  // event handlers  
  document.body.onkeypress = _CloseOnEsc;
  btnOK.onclick = new Function("btnOKClick()");

  txtFileName.fImageLoaded = false;
  txtFileName.intImageWidth = 0;
  txtFileName.intImageHeight = 0;

  if (globalDoc.selection.type == htmlSelectionControl) {
    if (grngMaster.length == 1) {
      elmSelectedImage = grngMaster.item(0);
      if (elmSelectedImage.tagName == "IMG") {
        txtFileName.fImageLoaded = true;
        if (elmSelectedImage.src) {
          txtFileName.value          = elmSelectedImage.src.replace(/^[^*]*(\*\*\*)/, "$1");  // fix placeholder src values that editor converted to abs paths
          txtFileName.intImageHeight = elmSelectedImage.height;
          txtFileName.intImageWidth  = elmSelectedImage.width;
          txtVertical.value          = elmSelectedImage.vspace;
          txtHorizontal.value        = elmSelectedImage.hspace;
          txtBorder.value            = elmSelectedImage.border;
          txtAltText.value           = elmSelectedImage.alt;
          selAlignment.value         = elmSelectedImage.align;
        }
      }
    }
  }
  txtFileName.value = txtFileName.value || "http://";
  txtFileName.focus();
}

function _isValidNumber(txtBox) {
  var val = parseInt(txtBox);
  if (isNaN(val) || val < 0 || val > 999) { return false; }
  return true;
}

function btnOKClick() {
  
}


function img_up(tmp_upfilename)
{
  var txtFileName = tmp_upfilename;
  
  var elmImage;
  var intAlignment;
  var htmlSelectionControl = "Control";
  var globalDoc = window.dialogArguments;
  var grngMaster = globalDoc.selection.createRange();
  
  // error checking

  if (!txtFileName.value || txtFileName.value == "http://") { 
    alert("Image URL must be specified.");
    txtFileName.focus();
    return;
  }
  if (txtHorizontal.value && !_isValidNumber(txtHorizontal.value)) {
    alert("Horizontal spacing must be a number between 0 and 999.");
    txtHorizontal.focus();
    return;
  }
  if (txtBorder.value && !_isValidNumber(txtBorder.value)) {
    alert("Border thickness must be a number between 0 and 999.");
    txtBorder.focus();
    return;
  }
  if (txtVertical.value && !_isValidNumber(txtVertical.value)) {
    alert("Vertical spacing must be a number between 0 and 999.");
    txtVertical.focus();
    return;
  }

  // delete selected content and replace with image
  if (globalDoc.selection.type == htmlSelectionControl && !txtFileName.fImageLoaded) {
    grngMaster.execCommand('Delete');
    grngMaster = globalDoc.selection.createRange();
  }
    
  idstr = "\" id=\"556e697175657e537472696e67";     // new image creation ID
  if (!txtFileName.fImageLoaded) {
    grngMaster.execCommand("InsertImage", false, idstr);
    elmImage = globalDoc.all['556e697175657e537472696e67'];
    elmImage.removeAttribute("id");
    elmImage.removeAttribute("src");
    grngMaster.moveStart("character", -1);
  } else {
    elmImage = grngMaster.item(0);
    if (elmImage.src != txtFileName.value) {
      grngMaster.execCommand('Delete');
      grngMaster = globalDoc.selection.createRange();
      grngMaster.execCommand("InsertImage", false, idstr);
      elmImage = globalDoc.all['556e697175657e537472696e67'];
      elmImage.removeAttribute("id");
      elmImage.removeAttribute("src");
      grngMaster.moveStart("character", -1);
      txtFileName.fImageLoaded = false;
    }
    grngMaster = _getTextRange(elmImage);
  }

  if (txtFileName.fImageLoaded) {
    elmImage.style.width = txtFileName.intImageWidth;
    elmImage.style.height = txtFileName.intImageHeight;
  }

  if (txtFileName.value.length > 2040) {
    txtFileName.value = txtFileName.value.substring(0,2040);
  }
  
  elmImage.src = txtFileName.value;
  
  if (txtHorizontal.value != "") { elmImage.hspace = parseInt(txtHorizontal.value); }
  else                           { elmImage.hspace = 0; }

  if (txtVertical.value != "") { elmImage.vspace = parseInt(txtVertical.value); }
  else                         { elmImage.vspace = 0; }
  
  elmImage.alt = txtAltText.value;

  if (txtBorder.value != "") { elmImage.border = parseInt(txtBorder.value); }
  else                       { elmImage.border = 0; }

  elmImage.align = selAlignment.value;
  grngMaster.collapse(false);
  grngMaster.select();
  window.close();
  
  
  
  window.close();
}

function img_add()
{
  if(!document.select_image_frm.iupfilename.value) {

      alert('이미지경로를을 입력하세요!');

      document.select_image_frm.iupfilename.focus();

      return;

   }
	
var	imgurl=document.select_image_frm.iupfilename.value;
	top.img_up(imgurl);
	self.close();
}

function img_addin(imgurl)
{
	top.img_up(imgurl);
	self.close();
}
//-->
</script>
<?
	$today = time();
	$today = date("Ymdhi",$today);
	
	// 파일 업로드 처리
	if(!empty($Mfile))
	{
		if(strcmp($Mfile,"none")){
			
			if(file_exists("./img/$Mfile_name")){     	    		
  			$Mfile_name = $today."_".$Mfile_name;
  		}
			
			
			copy($Mfile,"./img/$Mfile_name");
			
			
		}
	}
	//echo("<meta http-equiv='Refresh' content=\"0; URL=javascript:img_addin('/admin/newediter/img/$Mfile_name')\">");	
	
?>

<script language="JavaScript">
<!--
	img_up('/contents/popups/img/<?=$Mfile_name?>');
//-->
</script>

<INPUT ID=txtHorizontal style="left: 24.92em; top: 8.8218em; width: 4.2em; height: 2.1294em; ime-mode: disabled;" type=text size=3 maxlength=3 value="11" tabIndex=25 onfocus="select()">

<DIV id=divBorder style="left: 1.82em; top: 12.0159em; width: 8.12em; height: 1.2168em; ">테두리:</DIV>
<INPUT ID=txtBorder style="left: 10.36em; top: 11.5596em; width: 6.72em; height: 2.1294em; ime-mode: disabled;" type=text size=3 maxlength=3 value="0" tabIndex=21 onfocus="select()">

<DIV id=divVert style="left: 19.88em; top: 12.0159em; width: 4.76em; height: 1.2168em; ">상하여백:</DIV>
<INPUT ID=txtVertical style="left: 24.92em; top: 11.5596em; width: 4.2em; height: 2.1294em; ime-mode: disabled;" type=text size=3 maxlength=3 value="0" tabIndex=30 onfocus="select()">