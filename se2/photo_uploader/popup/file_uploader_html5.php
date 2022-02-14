<?php
 	$sFileInfo = '';
	$headers = array();
	 
	foreach($_SERVER as $k => $v) {
		if(substr($k, 0, 9) == "HTTP_FILE") {
			$k = substr(strtolower($k), 5);
			$headers[$k] = $v;
		} 
	}
	
	$file = new stdClass;
	$file->name = rawurldecode($headers['file_name']);
	$file->size = $headers['file_size'];
	$file->content = file_get_contents("php://input");
	
	$filename_ext = strtolower(array_pop(explode('.',$file->name)));
	$allow_file = array("jpg", "png", "bmp", "gif"); 
	
	if(!in_array($filename_ext, $allow_file)) {
		echo "NOTALLOW_".$file->name;
	} else {
		$uploadDir = '../../upload/';
		if(!is_dir($uploadDir)){
			mkdir($uploadDir, 0777);
		}
		
		$newPath = $uploadDir.urlencode($file->name);

		if(file_exists($newPath)){
			$name = date("YmdHis").rand(0,20).".".$filename_ext;
			$newPath=$uploadDir.urlencode($name);

		}else{
			
			$name=$file->name;
		}
		
	

		if (!function_exists('file_put_contents')) {
			function file_put_contents($filename, $data) {
				$f = @fopen($filename, 'w');
				if (!$f) {
					return false;
				} else {
					$bytes = fwrite($f, $data);
					fclose($f);
					return $bytes;
				}
			}
		}



				//	$sFileInfo .= "&bNewLine=true";
				//		$sFileInfo .= "&sFileName=".$newPath ;
				//		$sFileInfo .= "&sFileURL=/se2/upload/".$name ;


	
		if(file_put_contents($newPath, $file->content)) {
			$sFileInfo .= "&bNewLine=true";
			$sFileInfo .= "&sFileName=".$newPath ;
			$sFileInfo .= "&sFileURL=/se2/upload/".$name ;
		}
		
		echo $sFileInfo;
	}
?>