<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<body>
<?php
session_start();
class db{
	public $host="localhost";
	public $user="root";
	public $pass="";
	public $db_name="quiz_in_php";
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
/*  	public function abc(array $data)
	{
		$dt=array_keys($data);
		$re=join(",",$dt);		
		//print_r($dt);
		//print_r($data);
		//$order=join(",",$keys);
		echo $query="select * from questions where id IN($re) ORDER BY FIELD(id,$re)"; 
		echo "<pre>";
		$ft=$this->conn->query($query);
		while($row=$ft->fetch_object())
		{
			echo $row->answer;
		}
	}  */
 	public function answer()
	{

 		$qu=$this->conn->query("select * from questions where id IN(1,2,3,5) ORDER BY FIELD(id,1,2,3,5)");
 		// 1,2,3,2
		echo "<pre>";
		echo "<table class='table table-bordered'>
			    <thead>
				  <tr>
					<th>id</th>
			
					<th>ans</th>
					
				  </tr>
				</thead>";
		while($ques=$qu->fetch_array())
		{	
			echo "<tbody>
				<tr height='60px'>
					<td>".$ques['id']."</td>
				
					<td>".$ques['answer']."</td>
					
				</tr>
				<tbody>";
			

		}
		echo "</table>";
	} 
	
}
 $db=new db;
$db->answer(); 


?>
</body>
</html>