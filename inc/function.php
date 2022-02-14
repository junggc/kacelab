<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/> 
<?


$arr_admin_level_gubun = array(1=>"마스터관리자",2=>"일반관리자");

function passwordCheck($_str){

	$pw = $_str;
	 $num = preg_match('/[0-9]/u', $pw);
	 $eng = preg_match('/[a-z]/u', $pw);
    $spe = preg_match("/[\!\@\#\$\%\^\&\*]/u",$pw);

	  if(strlen($pw) < 10 || strlen($pw) > 30)
    {
        return array(false,"비밀번호는 영문, 숫자, 특수문자를 혼합하여 최소 10자리 ~ 최대 30자리 이내로 입력해주세요.");
        exit;
    }
 
    if(preg_match("/\s/u", $pw) == true)
    {
        return array(false, "비밀번호는 공백없이 입력해주세요.");
        exit;
    }
 
    if( $num == 0 || $eng == 0 || $spe == 0)
    {
        return array(false, "영문, 숫자, 특수문자를 혼합하여 입력해주세요.");
        exit;
    }

	 return array(true);
}



if(isset($_SERVER['HTTPS'])){
	$http_ment="https://";
}else{
	$http_ment="http://";
}

$server_url = $http_ment.$_SERVER["HTTP_HOST"];

 $this_agent=MobileCheck();

 function MobileCheck() {

     $MobileArray  = array("iPhone","iphone","lgtelecom","skt","mobile","samsung","nokia","blackberry","android","android","sony","phone");


     $checkCount = 0;
  for($i=0; $i<sizeof($MobileArray); $i++){
      if(preg_match("/$MobileArray[$i]/", strtolower($_SERVER["HTTP_USER_AGENT"]))){ $checkCount++; break; }
  }
    return ($checkCount >= 1) ? "Mobile" : "Computer";
 } 


$arr_mon=Array(1=>"January",2=>"February",3=>"March",4=>"April",5=>"May",6=>"June",7=>"July",8=>"August",9=>"September",10=>"October",11=>"November",12=>"December");

function getStrCut( $str, $size, $last_str = "")
	{
		$substr = substr( $str, 0, $size * 2 );
		//$multi_size = preg_match_all( '/[\x80-\xff]/', $substr, $multi_chars );
		$multi_size = preg_match_all( '/[\\x80-\\xff]/', $substr, $multi_chars );
		if ( $multi_size > 0 ) {
			$size = $size + intval( $multi_size / 3 ) - 1;
		}

		if ( getLen( $str ) > $size ) {
			$str = substr( $str, 0, $size );
			//$str = preg_replace( '/(([\x80-\xff]{3})*?)([\x80-\xff]{0,2})$/', '$1', $str );
			$str = preg_replace( '/(([\\x80-\\xff]{3})*?)([\\x80-\\xff]{0,2})$/', '$1', $str );
			if ( $last_str )  $str .= $last_str;
		}

		return $str;

	}

	function getLen($STRING) {
		$STRING = trim($STRING);
		$STRING = str_replace(" ","",$STRING);
		$LEN = strlen($STRING);
		return $LEN;
	}


function RemoveXSS($val) {

 $val = preg_replace('/([\x00-\x08][\x0b-\x0c][\x0e-\x20])/', '', $val);


 $search = 'abcdefghijklmnopqrstuvwxyz';
   $search .= 'ABCDEFGHIJKLMNOPQRSTUVWXYZ'; 
   $search .= '1234567890!@#$%^&*()'; 
   $search .= '~`";:?+/={}[]-_|\'\\'; 
   for ($i = 0; $i < strlen($search); $i++) { 
 


 $val = preg_replace('/(&#[x|X]0{0,8}'.dechex(ord($search[$i])).';?)/i', $search[$i], $val);


 
 $val = preg_replace('/(&#0{0,8}'.ord($search[$i]).';?)/', $search[$i], $val); // with a ;
 }


 $ra1 = Array('javascript', 'vbscript', 'expression', 'applet', 'meta', 'xml', 'blink', 'link', 'style',
 'script', 'embed', 'object', 'iframe', 'frame', 'frameset', 'ilayer', 'layer', 'bgsound', 'title', 'base');
   $ra2 = Array('alert','onabort', 'onactivate', 'onafterprint', 'onafterupdate', 'onbeforeactivate', 'onbeforecopy', 'onbeforecut', 'onbeforedeactivate', 'onbeforeeditfocus', 'onbeforepaste', 'onbeforeprint', 'onbeforeunload', 'onbeforeupdate', 'onblur', 'onbounce', 'oncellchange', 'onchange', 'onclick', 'oncontextmenu', 'oncontrolselect', 'oncopy', 'oncut', 'ondataavailable', 'ondatasetchanged', 'ondatasetcomplete', 'ondblclick', 'ondeactivate', 'ondrag', 'ondragend', 'ondragenter', 'ondragleave', 'ondragover', 'ondragstart', 'ondrop', 'onerror', 'onerrorupdate', 'onfilterchange', 'onfinish', 'onfocus', 'onfocusin', 'onfocusout', 'onhelp', 'onkeydown', 'onkeypress', 'onkeyup', 'onlayoutcomplete', 'onload', 'onlosecapture', 'onmousedown', 'onmouseenter', 'onmouseleave', 'onmousemove', 'onmouseout', 'onmouseover', 'onmouseup', 'onmousewheel', 'onmove', 'onmoveend', 'onmovestart', 'onpaste', 'onpropertychange', 'onreadystatechange', 'onreset', 'onresize', 'onresizeend', 'onresizestart', 'onrowenter', 'onrowexit', 'onrowsdelete', 'onrowsinserted', 'onscroll', 'onselect', 'onselectionchange', 'onselectstart', 'onstart', 'onstop', 'onsubmit', 'onunload'); 
 $ra = array_merge($ra1, $ra2);
    
   $found = true; // keep replacing as long as the previous round replaced something 
 while ($found == true) {
 $val_before = $val;
 for ($i = 0; $i < sizeof($ra); $i++) {
 $pattern = '/';
 for ($j = 0; $j < strlen($ra[$i]); $j++) {
 if ($j > 0) {
  $pattern .= '(';
  $pattern .= '(&#[x|X]0{0,8}([9][a][b]);?)?';
  $pattern .= '|(&#0{0,8}([9][10][13]);?)?';
   $pattern .= ')?';
  }
   $pattern .= $ra[$i][$j];
         } 
         $pattern .= '/i'; 
   $replacement = substr($ra[$i], 0, 2).'<x>'.substr($ra[$i], 2); // add in <> to nerf the tag
   $val = preg_replace($pattern, $replacement, $val); // filter out the hex tags
   if ($val_before == $val) {
   // no replacements were made, so exit the loop
   $found = false;
 }
 }
}
return $val;
}
	function  SqlInjection($string)   {

		if($string){

			$str =    str_replace("~","",$string);
			$str =    str_replace("!","",$str);
			$str =    str_replace("@","",$str);
			$str =    str_replace("#","",$str);
			$str =    str_replace("$","",$str);
			$str =    str_replace("%","",$str);
			$str =    str_replace("^","",$str);
			$str =    str_replace("&","",$str);
			$str =    str_replace("*","",$str);
			$str =    str_replace("(","",$str);
			$str =    str_replace(")","",$str);
			$str =    str_replace("-","",$str);

			$str =    str_replace("+","",$str);
			$str =    str_replace("=","",$str);
			$str =    str_replace("|","",$str);
			$str =    str_replace("[","",$str);
			$str =    str_replace("]","",$str);
			$str =    str_replace("{","",$str);
			$str =    str_replace("}","",$str);
			$str =    str_replace(":","",$str);
			$str =    str_replace(";","",$str);
			$str =    str_replace("'","",$str);
			$str =    str_replace("/'","",$str);
			$str =    str_replace("?","",$str);
			$str =    str_replace("<","",$str);
			$str =    str_replace(">","",$str);
			$str =    str_replace(",","",$str);
			$str =    str_replace("..","",$str);
			$str =    str_replace("\\","",$str);
			$str =    str_replace("\"","",$str);

			return $str;
		}
	}

	function  XSSAttack($string)   {

		if ($string){

		$str =  str_replace("<xmp","<x-xmp",$string);
		$str =  str_replace("javascript","x-javascript",$str);
		$str =  str_replace("script","x-script",$str);
		$str =  str_replace("iframe","x-iframe",$str);
		$str =  str_replace("document","x-document",$str);
		$str =  str_replace("vbscript","x-vbscript",$str);
		$str =  str_replace("applet","x-applet",$str);
		$str =  str_replace("embed","x-embed",$str);
		$str =  str_replace("object","x-object",$str);
		$str =  str_replace("frame","x-frame",$str);
		$str =  str_replace("frameset","x-frameset",$str);
		$str =  str_replace("layer","x-layer",$str);
		$str =  str_replace("bgsound","x-bgsound",$str);
		$str =  str_replace("alert","x-alert",$str);

		$str =  str_replace("onblur","x-onblur",$str);
		$str =  str_replace("onchange","x-onchange",$str);
		$str =  str_replace("onclick","x-onclick",$str);
		$str =  str_replace("ondblclick","x-ondblclick",$str);
		$str =  str_replace("onerror","x-onerror",$str);
		$str =  str_replace("onfocus","x-onfocus",$str);
		$str =  str_replace("onload","x-onload",$str);
		$str =  str_replace("onmouse","x-onmouse",$str);
		$str =  str_replace("onscroll","x-onscrol",$str);
		$str =  str_replace("onsubmit'","x-onsubmit",$str);
		$str =  str_replace("onunload","x-onunload",$str);
		$str =  str_replace("onMouseOver","x-onmouse",$str);
		$str =  str_replace("onMouse","x-onmouse",$str);
		$str =  str_replace("alert","",$str);
		return $str;

		}

	}
	


function quote_smart( $value )
{
  // Stripslashes
  if ( get_magic_quotes_gpc() ) {
   $value = stripslashes( $value );
  }
  // Quote if not a number or a numeric string
  if ( !is_numeric( $value ) ) {
   $value = "'" . mysql_real_escape_string( $value ) . "'";
  }
  return $value;
}



function connectDB()
{
	// Connect to DB
	$nLinkID = mysql_connect("", "fallman", "abcd1234");
	if ($nLinkID < 0)
		die(mysqlErr(__FILE__, __LINE__));
	$nResult = mysql_select_db("fallmandb", $nLinkID);
	if ($nResult == FALSE)
		die(mysqlErr(__FILE__, __LINE__));
}

function err_chk($states){
			if(!$states){
				$errno = mysql_errno();
				$errmsg = mysql_error();
				
//				echo $errno . " : " . $errmsg . "<br>";
				echo "<script language='javascript'>alert('쿼리 에러');history.back();</script>";
				exit;
			}
		}

function select_table2($table_name, $sub_query){
		$query = "select * from $table_name $sub_query ";
		$result = mysql_query($query);
		err_chk($result);
		
		$row = mysql_fetch_array($result);
		
		return $row;
	}

// 페이지 이동
function Msg_Meta($Msg,$Href)
{
	echo "<script language='javascript'>
			 alert('$Msg');
		  </script>";
	echo("<meta http-equiv='Refresh' content='0; URL=$Href'>");
}

function print_title_image($code) {
   $img_title = $code . ".gif";
   echo("<center><img src=\"$img_title\" border=0></center><p>");
}


function popup_msg($msg) {
   echo("<script language=\"javascript\"> 
   <!--
   alert('$msg');
   history.back();
   //-->   
   </script>");
}

function popup_msg1($msg) {
   echo("<script language=\"javascript\"> 
   <!--
   alert('$msg');   
   //-->   
   </script>");
}

function popup_msg2($msg) {
   echo("<script language=\"javascript\"> 
   <!--   
   alert('$msg');   
   location = 'javascript:window.close();'
   opener.window.location.reload(); 
   //opener.location = 'http://naver.com'
   //-->   
   </script>");
}

function popup_msg3($msg) {
   echo("<script language=\"javascript\"> 
   <!--
   alert('$msg');   
   opener.window.location.reload(); 
   history.back();
   //-->   
   </script>");
}
function popup_msg4($msg) {
   echo("<script language=\"javascript\"> 
   <!--
   alert('$msg');
   location = '/'
   //-->   
   </script>");
}
function popup_msg5($msg) {
   echo("<script language=\"javascript\"> 
   <!--
   alert('$msg');
   history.back();
   //-->   
   </script>");
}
function popup_msg6($msg) {
   echo("<script language=\"javascript\"> 
   <!--
   alert('$msg');
   location = '/index.php?uid=21'
   //-->   
   </script>");
}

function popup_msg_go($msg,$src) {
   echo("<script language=\"javascript\"> 
   <!--
   alert('$msg');
   location = '$src'
   //-->   
   </script>");
}

	function str_cut($str, $number){
		$str = html_move($str);
		$length = strlen($str);
		
		for($k = 0; $k < $number; $k++)
			if(ord(substr($str, $k, 1)) > 127)
		    	$k++;
		
		if($length > $number)
			$return_str = substr($str, 0, $k)."...";
		else
			$return_str = $str;
		
		return $return_str;
	}
	
	
	function str_br($str, $number){
		$str = html_move($str);
		$length = strlen($str);
		
		for($k = 0; $k < $number; $k++)
			if(ord(substr($str, $k, 1)) > 127)
		    	$k++;
		
		if($length > $number)
			$return_str = substr($str, 0, $k) . "<br>" . substr($str, $k, $length);
		else
			$return_str = $str;
		
		return $return_str;
	}
	
	//제목에 태그 들어가 있을때 자르는것 
	function html_str_cut($str, $number){
		$len = 0;
		for($K = 0; $K <= strlen($str) -1;$K++){
			$tag_str = mb_substr($str, $K, 1);
			if($tag_str == "<") $tag = 1;

			if($tag && $tag_str == ">") {$tag = 0; continue;	}
			if($tag) continue;	
			
			$len = $len + 1;
		}
		
		if($len > $number)
			$return_str = substr($str, 0, $number)."...";
		else
			$return_str = $str;
		
		return $return_str;
	}
	
	function html_move($comment){
	$comment = strip_tags(eregi_replace("&nbsp;", " ", stripslashes($comment)));
	
	return $comment;
	}


function error($errcode) {
   switch ($errcode) {      
      case ("INVALID_COLOR") :
         popup_msg("입력하신 색상은 허용되지 않는 색상입니다.\\n\\n올바른 색상명을 입력하여 주십시오.");
         break;
      case ("INVALID_ID") :
         popup_msg("입력하신 아이디는 허용되지 않는 문자열입니다.\\n\\n아이디는 5 ~ 10자의 영문소문자나 숫자 또는 조합된 문자열이어야 합니다.");
         break;         
      
      case ("MEMBER_NOT_FOUND") :
         popup_msg("일치하는 회원정보가 없습니다. \\n\\n다시한번 확인하시고 입력하여 주십시오.");
         break;   
         
      case ("LOGIN_ID_NOT_FOUND") :
         popup_msg("입력하신 아이디(ID)는 등록되어 있지 않습니다. \\n\\n다시한번 확인하시고 입력하여 주십시오.");
         break;   
      
      case ("LOGIN_INVALID_PW") :
         popup_msg("입력하신 비밀번호가 틀렸습니다. \\n\\n다시한번 확인하시고 입력하여 주십시오.");
         break;   
      
      case ("INVALID_NAME") :
         popup_msg("입력하신 이름은 허용되지 않는 문자열입니다.\\n\\n올바른 이름을 입력하여 주십시오.");
         break;
         
      case ("INVALID_SUBJECT") :
         popup_msg("입력하신 제목은 허용되지 않는 문자열입니다. \\n\\n올바른 제목을 입력하여 주십시오.");
         break;
      
      case ("INVALID_EMAIL") :
         popup_msg("입력하신 주소는 올바른 전자우편주소가 아닙니다. \\n\\n다시 입력하여 주십시오.");
         break;        
         
      case ("INVALID_HOMEPAGE") :
         popup_msg("입력하신 주소는 올바른 홈페이지주소가 아닙니다. \\n\\n다시 입력하여 주십시오.");
         break;                 
         
      case ("INVALID_INFO") :
         popup_msg("입력하신 정보가 정확하지 않습니다.");
         break;                 
      case ("NO_MONEY") :
         popup_msg("보유금액이 부족합니다.");
         break;         
      case ("NO_VOTE") :
         popup_msg("투표결과가 없습니다.");
         break;                 
              
      case ("INVALID_PASSWD") :
         popup_msg("암호는 최소 4자이상의 영문자 또는 숫자여야 합니다. \\n\\n다시입력하여 주십시오.");
         break;
         
      case ("INVALID_COMMENT") :
         popup_msg("본문을 입력하지 않으셨습니다. \\n\\n다시입력하여 주십시오.");   
         break;
         
      case ("QUERY_ERROR") :      
         $err_no = mysql_errno();
         $err_msg = mysql_error();         
         $error_msg = "ERROR CODE " . $err_no . " : $err_msg";                           
         $error_msg = addslashes($error_msg);         
         popup_msg($error_msg);  
         break;

      case ("DB_ERROR") :      
         $err_no = mysql_errno();
         $err_msg = mysql_error();         
         $error_msg = "ERROR CODE " . $err_no . " : $err_msg";                           
         echo("$error_msg");
         break;
      
       case ("NO_ACCESS") :   
         popup_msg("회원 전용입니다.");
         break;
       
       case ("NO_ACCESS1") :   
         popup_msg("글읽기 권한이 없습니다.\\n\\n 해당 동호회 주인/운영자에게 문의 해주세요");
         break;
       
       case ("NO_LOGIN") :   
         popup_msg("먼저 로그인을 해주세요.");
         break;
       
       case ("NO_ADMIN") :   
         popup_msg3("관리자 전용입니다.");
         break;
       case ("NO_MODIFY") :   
         popup_msg("수정 권한이 없습니다.");
         break;
       case ("NO_DELETE") :   
         popup_msg("삭제 권한이 없습니다.");
         break;
      
      
      case ("NO_ACCESS_MODIFY") :   
         popup_msg("해당글의 수정 권한이 없습니다!!!");
         break;

      case ("NO_ACCESS_DELETE") :   
         popup_msg("해당글의 삭제 권한이 없습니다!!!");
         break;

      case ("NO_ACCESS_DELETE_THREAD") :   
         popup_msg("답변이 있는 글은 삭제하실 수 없습니다. \\n\\n답변글을 모두 삭제하신 후 삭제하십시오.");
         break;

      case ("No_Admin") :   
         popup_msg("관리자 로그인에 실패하였습니다. \\n\\n다시입력해주세요!");
         break;
                           
      default :
   }
}

?>
