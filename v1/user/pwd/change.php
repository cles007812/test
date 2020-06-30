<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>無標題文件</title>
</head>
	
	
	<?php
		include("../db.php");
		$db=new db();
		$isok=$db->update();
		if($isok=="False"){
			echo "Code:2","<br>";
			echo "修改失敗","<br>";
			echo "IsOK=",$isok,"<br>";
		}else if($isok=="Ture"){
			echo "Code:0","<br>";
			echo "修改成功","<br>";
			echo "IsOK=",$isok;
		}
	?>	
	
<body>
</body>
</html>