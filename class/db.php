<?php
session_start();
class db {
	public $host="127.0.0.1";
	public $user="root";
	public $pass="";
	public $db_name="quiz_new";
	public $conn;
	public function __construct()
	{
		$this->conn=new mysqli($this->host,$this->user,$this->pass,$this->db_name);
		return $this->conn;
		if($this->conn->connect_errno)
		{
			die('Connect Error: ' . $this->conn->connect_errno);
		}
	}
 	public function abc()
	{
		
		$query="select fname from register where fname REGEXP '^[A-C].*$'"; 
		echo "<pre>";
		$ft=$this->conn->query($query);
		while($row=$ft->fetch_object())
		{
			print_r($row);
			//echo $row->answer;
		}
	}  

}
 $db=new db;
$db->abc(); 


?>
</body>
</html>