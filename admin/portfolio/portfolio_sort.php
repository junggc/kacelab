<?
include ("../../inc/dbconn.php");
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>:: 순서정렬 ::</title>
<link rel="stylesheet" href="http://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<style type="text/css">
    body { text-align:center; }
    .line_t { list-style-type:none;margin:0;padding:0;width:100%; }
    .line_t li { margin:3px;padding:0.4em;font-size:1em;height:18px;text-align:center; }
    .memberRow { border:solid 1px #C5C5C5;background:#F6F6F6; }
</style>
<script type="text/JavaScript" src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script type="text/JavaScript" src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script type="text/javascript">
    jQuery(document).ready(function() {

        // sortable은 객체의 순서를 재배치 할 수 있다.
        jQuery(".line_t").sortable();

        jQuery(".memberRow").mouseover(function() {

            jQuery(".memberRow").css("border", "solid 1px #C5C5C5").css("background", "#F6F6F6");

            var idx = jQuery(".memberRow").index(this);
            jQuery(".memberRow").eq(idx).css("border", "solid 3px #FF0000").css("background", "#FFC0CB");
        });
    });

    function send_() {

        var sort_num = "";




       // memberRow의 개수만큼 반복문을 돌리면서 enName값을 콤마로 구분하여 하나의 문자열로 만든다.
        jQuery(".memberRow").each(function(idx) {

            // 한글 이름을 전송
            // girls += jQuery(".memberRow").eq(idx).text + ", ";

            // 영문 이름을 전송
            sort_num += jQuery(".memberRow").eq(idx).attr("enName") + ",";
        });

        // 마지막 콤마 제거 후, 값을 sort_num 에 담는다.
        jQuery("#sort_num").val(sort_num.slice(0, -1));

        jQuery("#sortTableForm").attr("action", "./portfolio_proc.php");
        jQuery("#sortTableForm").submit();
    }
</script>
</head>
<body>
<form method="post" id="sortTableForm" name="sortTableForm">
<input type="hidden" id="sort_num" name="sort_num" value=""/>
<input type="hidden" id="mode" name="mode" value="sort"/>

    <h1>프로젝트 순서정렬</h1>
    <ul class="line_t">
		<?
		$sql = "select * from TB_portfolio where 1=1   order by sort_num asc,idx desc ";
		$result= mysqli_query($dbconn,$sql);
		while($row=mysqli_fetch_array($result)){
		?>
      <li class="memberRow" enName="<?=$row["idx"]?>"><?=$row["title"]?></li>
	  <?}?>
     
    </ul>
    <br/>
    <input type="button" onClick="send_();" value="전송"/>
</form>
</body>
</html>
