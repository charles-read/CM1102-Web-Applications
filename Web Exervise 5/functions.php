<?php
class DBController {
	private $host = "csmysql.cs.cf.ac.uk";
	private $user = "c1646151";
	private $password = "bocnukdeg5";
	private $database = "c1646151";
	private $conect;
	
	function __construct() {
		$this->conect = $this->connectDB();
	}
	



	
	function connectDB() {
		$conect = mysqli_connect($this->host,$this->user,$this->password,$this->database);
		return $conect;
	}
	



	function runQuery($query) {
		$result = mysqli_query($this->conect,$query);
		while($row = mysqli_fetch_assoc($result)) {
			$resultset[] = $row;
		}		
		if(!empty($resultset))
			return $resultset;
	}
	


	function numRows($query) {
		$result  = mysqli_query($this ->conect,$query);
		$rowcount = mysqli_num_rows($result);
		return $rowcount;	
	}
}
?>