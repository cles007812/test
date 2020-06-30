<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>無標題文件</title>
</head>
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
	<?php 
	include("user/db.php");
	$db=new db;
	?>
	 <script> 
    $(function(){
      $("#submit").click(function() {
        $.ajax({
          type: "POST",
          url: "user/pwd/change.php",
          dataType: "html",
          data: {account: $("#account").val(),password: $("#password").val()},
          success: function(data) {
            $("#change").html(data);
            },   
          });
        });
      });
  </script>
<body>
	<div style="text-align: center">
		<h1>新增會員</h1>
		<hr>
		<form method="post" action="user/create.php">
		<p>帳號:<input type="text" name="account"></p>
		<p>密碼:<input type="password" name="password"></p>
		<input type="submit">
		<hr>	
		</form>
	</div>
	
	<div style="text-align: center;">
		<h1>刪除會員</h1>
		<form method="post" action="user/delete.php">
		帳號:<select name="account">
			<?php $db->select(); ?>
		</select><br><br>	
		<input type="submit" value="刪除">
 		<hr>
		</form>
	</div>
	<div style="text-align: center;">
		<h1>修改密碼</h1>
		帳號:<select id="account">
			<?php $db->select(); ?>
		</select><br><br>	
		新密碼:<input type="text" id="password"/><br><br>	
		<input type="submit" id ="submit" value="修改"><br>
		</form>
	</div>
	<div id="change" style="text-align: center;"></div><hr>
	<div style="text-align: center;">
		<h1>驗證帳號</h1>
		<form method="get" action="user/login.php">
		<p>帳號:<input type="text" name="account"></p>
		<p>密碼:<input type="password" name="password"></p>
		<input type="submit">	
		</form>
	</div>
	<div id="change" style="text-align: center;"></div><hr>
</body>
</html>
