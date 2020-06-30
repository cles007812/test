<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>無標題文件</title>
</head>
	<?php
		include("db.php");
		$db=new db();
	    $isok=$db->delete();
		if($isok=="False"){
			echo "Code:2","<br>";
			echo "刪除失敗","<br>";
			echo "IsOK=",$isok,"<br>";
		}else if($isok=="Ture"){
			echo "Code:0","<br>";
			echo "刪除成功","<br>";
			echo "IsOK=",$isok;
		}
	?>	
<body>
	<script  language=javascript>
	function url(){
		location.href='../index.php';
	}
	</script>
	<br>
	<button onclick="url()">回首頁</button>
</body>
</html>