<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>無標題文件</title>
</head>
<?php
		include("db.php");
		$db=new db();
		$db->login($_GET['account'],$_GET['password']);
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