<?php


$filename_ori = urldecode($_GET["filename_o"]); 
$file = $_SERVER['DOCUMENT_ROOT']."/upfile/".$_GET["filename"];

$file_name_c = explode("/",$_GET["filename_o"]);
if(count($file_name_c) > 1){
   $dnurl = iconv('UTF-8','CP949',Trim($file_name_c[4]));
}else{
   $dnurl = iconv('UTF-8','CP949',$_GET["filename_o"]);
}

$dn = "1";
$dn_yn = ($dn) ? "attachment" : "inline";

$bin_txt = "1";
$bin_txt = ($bin_txt) ? "r" : "rb";

if(preg_match("/(MSIE 5.5|MSIE 6.0)/", $_SERVER[HTTP_USER_AGENT]))
{
  Header("Content-type: application/octet-stream");
  Header("Content-Length: ".filesize("$file"));
  Header("Content-Disposition: $dn_yn; filename=\"$dnurl\"");
  Header("Content-Transfer-Encoding: binary");
  //Header("Pragma: no-cache");
  Header("Expires: 0");
}
else
{
  Header("Content-type: file/unknown");
  Header("Content-Length: ".filesize("$file"));
  Header("Content-Disposition: $dn_yn; filename=\"$dnurl\"");
  Header("Content-Description: PHP4 Generated Data");
  //Header("Pragma: no-cache");
  Header("Expires: 0");
}

if (is_file($file))
{
   $fp = fopen($file, $bin_txt);
   if (!fpassthru($fp)){
       fclose($fp);
   } else {
     echo "해당 파일이나 경로가 존재하지 않습니다.";
     exit;
   }
}

?>
<script>self.close();</script>