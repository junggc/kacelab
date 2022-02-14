<?
header("Content-Type: text/html; charset=UTF-8");
$data = array();
 $valid_extensions = array('jpeg', 'jpg', 'png', 'gif', 'bmp' , 'pdf' , 'doc' , 'ppt', 'pptx', 'docx', 'xls','xlsx','hwp'); 
if(isset($_GET['files']))//앞에서 주소뒤에 files를 추가했기 떄문에, 확인.
{  
 $error = false; 
 $files = array();
 
 //경로 설정
 $uploaddir = '../upfile/';
 $error_msg="업로드 불가";
 $max_file_size = 2242880;

 //경로확인
 if(!is_dir($uploaddir)){
  //없다면 생성
  mkdir($uploaddir);
 }



 //파일이 여러 개 일 수 있으므로, 각각 저장
 foreach($_FILES as $file)
 {

	if($file["size"] > $max_file_size) {
		$error = true;
		$error_msg="2메가 이하로 업로드해주세요.";
		break;
	}
   $ext = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION)); 
		
   $new_filename=rand(1000,1000000).date("ymdhis").".".$ext;
	if(in_array($ext, $valid_extensions)) {
		  if(move_uploaded_file($file['tmp_name'], $uploaddir.$new_filename))
		  {
		   $files[] = $uploaddir .$file['name'];
		  }
		  else
		  {
			  $error = true;
		  }
	}else{
		$error = true;
		$error_msg="지원불가 확장자입이다.";
	}
 }
 //업로드 성공 여부에 따른 예외처리
if($error){

	 $data=array('error' => $error_msg);
 }else{
		 $data["files"]=$files;
		 $data["files_name"]=$file['name'];
		 $data["new_filename"]=$new_filename;
	}
}

//json_encode후 page1.php의 ajax로 응답 
echo json_encode($data);


?>