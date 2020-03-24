<?php
header('Content-Type: application/json');
session_start();
/* IF(!ISSET($SESSION['username'])){
	$respon  = "503";
	$message = "SESSION TIDAK ADA/HABIS SILAHKAN LOGIN KEMBALI";
	$result = '{ "respon":"'.$respon.'", "message":"'.$message.'", "records":"0"}';
	return $result;
} */
print_r($_POST);
die();
$data = (object)$_POST['data'];
$code = $_POST['code'];
$format = $_POST['format'];

//print_r($data);
if($code == '1'){
	$Proses = new Proses();
	
		if($format == '1'){
			$Proses->insert($data);
		}else if($format == '2'){
			$Proses->update($data);
		}else if($format == '3'){
			$Proses->deletes($data);
		}else{
			exit;
		}
}
else{
	exit;
	
}

class Proses {
	public $proses_sql;

 public function __construct($a, $b){
	 include "conn.php"; 
		$this->proses_sql = $conn;
 }

	
	public function insert($data){
		$username = $data->username;
		$password = md5($data->password);
		$q="INSERT INTO user (username,password) VALUES('$username','$password')";
		$result = $this->proses_sql->query($sql);
		if(!$this->proses_sql->query($sql)){
			$message = "Error :".$this->proses_sql->error;
			$respon  = "500";
			//$result = '{ "respon":"'.$respon.'", "message":"'.$message.'", "records":"0"}';
			//return result;			
			
		}else{
			$message = "SUKSES!";
			$respon  = "200";
			//$result = '{ "respon":"'.$respon.'", "message":"'.$message.'", "records":"0"}';
			//return result;			
		};
		$result = '{ "respon":"'.$respon.'", "message":"'.$message.'", "records":"0"}';
		return result;			
	}
	public function update($data){
		$username = $data->username;
		$id		  = $data->id;
		$password = md5($data->password);
		$q="UPDATE user SET username = '$username'
			,password=$password) WHERE id = '$id'";
		$result = $this->proses_sql->query($sql);
		if(!$this->proses_sql->query($sql)){
			$message = "Error :".$this->proses_sql->error;
			$respon  = "500";
			//$result = '{ "respon":"'.$respon.'", "message":"'.$message.'", "records":"0"}';
			//return result;			
			
		}else{
			$message = "SUKSES!";
			$respon  = "200";
			//$result = '{ "respon":"'.$respon.'", "message":"'.$message.'", "records":"0"}';
			//return result;
		};
		$result = '{ "respon":"'.$respon.'", "message":"'.$message.'", "records":"0"}';
		return result;		
	}
	public function deletes($data){
		$id		  = $data->id;
		$q="DELETE FROM user WHERE id = '$id'";
		$result = $this->proses_sql->query($sql);
		if(!$this->proses_sql->query($sql)){
			$message = "Error :".$this->proses_sql->error;
			$respon  = "500";
			//$result = '{ "respon":"'.$respon.'", "message":"'.$message.'", "records":"0"}';
			//return result;			
			
		}else{
			$message = "SUKSES!";
			$respon  = "200";
			//$result = '{ "respon":"'.$respon.'", "message":"'.$message.'", "records":"0"}';
			//return result;
		};
		$result = '{ "respon":"'.$respon.'", "message":"'.$message.'", "records":"0"}';
		return result;			
		
		
		
	}


	
	
	
}


?>