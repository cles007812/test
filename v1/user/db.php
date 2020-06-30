<?php

class db{
	
	public	$db_host = "localhost";
	public	$db_username = "root";
	public	$db_password = "a12345678";
	public	$user_con,$isok;
		
		function __construct(){
			$this->connect();
			
		}
		function connect(){
			$con=mysqli_connect($this->db_host,$this->db_username,$this->db_password);
			if(mysqli_connect_error($con)){
				die("請先設定mysql帳號密碼");
			}else if(!mysqli_select_db($con,"user")){
				$sql = "CREATE DATABASE user";
				mysqli_query($con,$sql);
				$this->user_con=mysqli_connect($this->db_host,$this->db_username,$this->db_password,"user");
				$sql = "CREATE TABLE user_account( `id` tinyint(2) NOT NULL AUTO_INCREMENT, `account` varchar(50) NOT NULL,
				`password` varchar(50) NOT NULL, PRIMARY KEY (`id`),UNIQUE (`account`) )";
				mysqli_query($this->user_con,$sql);
			}
			$this->user_con=mysqli_connect($this->db_host,$this->db_username,$this->db_password,"user");
		}
		function insert($account,$password){
			$this->account=$account;
			$this->password=$password;
			if($this->account=='' or $this->password==''){
				die("帳號或密碼不得為空");
			}else{
				$sql = "INSERT INTO user_account(`account`,`password`) VALUES ('$this->account', '$this->password')";
				$row = mysqli_query($this->user_con,$sql);
				if(!$row){
					$this->isok='False';
 					echo "Code:2","<br>";
					echo "帳號已重複","<br>";
					echo "IsOK=",$this->isok,"<br>";
				}else{
					$this->isok='Ture';
					echo "Code:0","<br>";
					echo "新增成功","<br>";
					echo "IsOK=",$this->isok;
			}
			}
		}
		function select(){
			$sql = "SELECT * FROM `user_account`";
			$row = mysqli_query($this->user_con,$sql);
			while($result=mysqli_fetch_array($row)){
					echo "<option value='".$result['account']."'>".$result['account']."</option>";
				}
			}
		function delete(){
			if(empty($_POST['account'])){
				die('請創立帳號');
			}
			$sql = "DELETE FROM user_account WHERE account='".$_POST['account']."'";
			$row = mysqli_query($this->user_con,$sql);
			if(!$row){
					$this->isok='False';
 					return($this->isok);
				}else{
					$this->isok='Ture';
					return($this->isok);
			}
		}
		function update(){
			if(!$_POST['account'] or !$_POST['password']){
				die('請創立帳號或輸入密碼');
			}
			$sql = "UPDATE user_account SET `password`='".$_POST['password']."' WHERE account='".$_POST['account']."'";
			$row = mysqli_query($this->user_con,$sql);
			if(!$row){
					$this->isok='False';
 					return($this->isok);
				}else{
					$this->isok='Ture';
					return($this->isok);
			}
		}
		function login($account,$password){
			$this->account=$account;
			$this->password=$password;
			if($this->account=='' or $this->password==''){
				die("帳號或密碼不得為空");
			}else{
				$sql = "SELECT * FROM `user_account` WHERE `password`='".$this->password."' AND `account`='".$this->account."'";
				$row = mysqli_num_rows(mysqli_query($this->user_con,$sql));
				if(!$row){
					$this->isok='False';
 					echo "Code:2","<br>";
					echo "Login Failed","<br>";
					echo "IsOK=",$this->isok,"<br>";
				}else{
					$this->isok='Ture';
					echo "Code:0","<br>";
					echo "IsOK=",$this->isok,"<br>";
					var_dump(http_response_code());
			}
			}
		}
}
?>