<?php

session_start();


class users{

	public $host="localhost";
	public $user="root";
	public $pass="";
	public $db_name="quiz_new";
	public $conn;
	
	public $dbconn;
	public $match;
	public $data;
	public $pro;
	public $ques_show;
	public $ans;

	
	public function __construct()
	{
		$this->dbconn=new mysqli($this->host,$this->user,$this->pass,$this->db_name);
		//return $this->conn;
		if($this->dbconn->connect_errno)
		{
			die('Connect Error: ' . $this->dbconn->connect_errno);
		}

	}
	
	// this function is used for regsiteration for users
	public function regsiter($f,$l,$e,$p,$n)
	{
		$match=$this->dbconn->query("select email from register where email='$e'");
		$row=$match->fetch_array();
		
		if($row[0]==$e)
		{
			$this->url("index.php?succ=already_regis");
		}
		else
		{
			//echo $f.$l.$e.$p;
			//var_dump($this->dbconn);
			$stmt=$this->dbconn->prepare("INSERT INTO register (fname,lname,email,pass,nick_name) VALUES(?,?,?,?,?)");
			$stmt->bind_param("sssss",$f,$l,$e,$p,$n);
			$stmt->execute();
			return $this->success="Your Registration successfull";

	    }		
	}
	
	
	
	
	public function login($email,$pass)
	{
		$log=$this->dbconn->query("SELECT * FROM register WHERE email='$email' AND pass='$pass'");
		$abc=$log->fetch_array(MYSQLI_ASSOC);
		
 		if($log->num_rows > 0)
		{	
			$_SESSION['email']=$email;
			$_SESSION['id'] = $abc['id'];
			return true;
		}
		else
		{
			return false;
			
		} 
		
	}
	
	
	
	public function profile($em)
	{
	
		$profile=$this->dbconn->query("SELECT * FROM register WHERE email='$em'");
		$pr=$profile->fetch_object();
		$this->pro[]=$pr;
		return $this->pro;
				
	}
	

	
	public function session()
	{
		if(isset($_SESSION['email']))
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	
	public function add_category($category)
	{
		$this->dbconn->query("insert into category values ('','$category')");
		
	}
	
	public function delete_category($cat_id)
	{
		$this->dbconn->query("DELETE FROM category WHERE id='$cat_id'");
		return true;
	}

	public function add_quiz_questions($query)
	{
		$this->dbconn->query($query);
		return true;
	}
	
	public function category($user_id='')
	{

		if($user_id){
			
		$ft=$this->dbconn->query("select * from category AS c WHERE id NOT IN(SELECT cat_id FROM `quiz_result` AS qr WHERE qr.user_id='".$user_id."')");
		}else{
			
		}
		
		$ft=$this->dbconn->query("select * from category");
		while($row=$ft->fetch_array())
		{
			$this->data[]=$row;
		   /* echo "<pre>";
			print_r($row); */
		}
		return $this->data;
		//return $a;
		//print_r($data);
	}
	// show dropdown
	public function categoryShow()
	{

		$ft=$this->dbconn->query("select * from category");
		while($row=$ft->fetch_array())
		{
			$this->data[]=$row;
		   /* echo "<pre>";
			print_r($row); */
		}
		return $this->data;
		//print_r($data);
	}


	public function question_shows()
	{
		$show=$this->dbconn->query("select * from questions");
		while($sh=$show->fetch_array())
		{
			$ques[]=$sh;
		 
		}
		return $ques;
	}
	
	public function delete_question($user_id)
	{
		
		$this->dbconn->query("DELETE FROM questions WHERE id='$user_id'");
		$this->url("index.php?suc=true");
	}

	
	public function questions_show($category_id)
	{
		$ques=$this->dbconn->query("select * from questions where cat_id='$category_id'");
		while($ft=$ques->fetch_array())
		{
			$this->ques_show[]=$ft;
		}
		return $this->ques_show;
	}

	
	
	public function answer($choice)
	{
 		$right=0;
		$wrong=0;
		$no_answer=0;
		
		$key=array_keys($choice);
		
		$j=join(",",$key); 
		
 		$qu=$this->dbconn->query("select id,answer from questions where id IN($j) ORDER BY FIELD(id,$j)");
 		//$qu=$this->dbconn->query("select id,answer from questions where cat_id='$catid'");
 		while($ques=$qu->fetch_array())
		{	
	        
			if($ques['answer']==$_POST[$ques['id']])
			{
				 $right++;
			}
 			elseif($_POST[$ques['id']]==5)
			{
				 $no_answer++;
			}  
  			else
			{
				$wrong++;
			}  
		}
		$result=array();
		$result['right']=$right;
		$result['wrong']=$wrong;
		$result['no_answer']=$no_answer;
		return $result;
		//return $ques;
	}
	
	

	
	public function admin_login($email,$pass)
	{
		$log=$this->dbconn->query("SELECT * FROM quiz_admin WHERE email='$email' AND pass='$pass'");
		$abc=$log->fetch_array(MYSQLI_ASSOC);
		//echo "<pre>";
		//print_r($abc);
 		if($log->num_rows > 0)
		{	
			$_SESSION['admin']=$email;
			return true;
		}
		else
		{
			return false;
			//echo "not match";
		} 
		
	}
	
	//admin login session
	public function admin_session()
	{
		if(isset($_SESSION['admin']))
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	//url for redirections
	public function url($location)
	{
		header("location:".$location);
	}

	public function result_insertdb($t,$a,$r,$w,$na,$p,$user_id,$cat_id)
	{
		//echo $t.'--'.$a.'---'.$r.'--'.$w.'--'.$na.'----'.$p;
$this->dbconn->query("INSERT INTO quiz_result (user_id,total_number_of_ques,attempt_ques,right_ans,wrong_ans,no_ans,total_percentage,cat_id) VALUES('$user_id','$t','$a','$r','$w','$na','$p','$cat_id')");
	}
	public function result_shows()
	{
		$show=$this->dbconn->query("SELECT * FROM register INNER JOIN quiz_result ON quiz_result.user_id = register.id");
		while($sh=$show->fetch_array())
		{
			$ques[]=$sh;
		   /* echo "<pre>";
			print_r($row); */
		}
		return $ques;
		//print_r($data);
	}
	public function show_user_quiz_result($id)
	{
		$show=$this->dbconn->query("select * from quiz_result WHERE user_id = '$id' ");
		return $show->fetch_row();
		//print_r($data);
	}

	public function delete_user($id)
	{
		//$this->dbconn->query("DELETE FROM register WHERE id='$id'");
		if ($this->dbconn->query("DELETE FROM register WHERE id='$id'") === TRUE) {
		  return  "Record deleted successfully";
		} else {
		  return "Error deleting record: " .$this->dbconn->error;
		}
	}
}

?>