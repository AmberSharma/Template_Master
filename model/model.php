<?php


ini_set ( "display_errors", "1" );

require_once 'singleton.php';
abstract class model {
	protected $db = "";
	function __construct() {
		$this->db = DBConnection::Connect ();
	}
}
class result extends model {
	public function Save() {
		if ($_REQUEST ['type'] === "checkbox" || $_REQUEST ['type'] === "radio" || $_REQUEST ['type'] === "dropdown") {
			$opt = implode ( ",", $_REQUEST ['opt'] );
		}
		static $i = 0;
		static $j =0;
		$bool1 = "false";
		if ($i == 0) {
			
			$this->db->Create ( "create table " . $_REQUEST ['tempname'] . "( fid int primary key auto_increment , type varchar(20) , def varchar(30) , label varchar(30) , options varchar(100));" );
			$this->db->Create ( "create table " . $_REQUEST ['tempname'] . "values ( fid int primary key auto_increment);" );
			$i ++;
		}
		if ($i <> 0) {
			
			$this->db->Create ( "Alter table " . $_REQUEST ['tempname'] . "values add Column " . $_REQUEST ['fl'] . " " . $_REQUEST ['dt'] . ";" );
			
		}
		echo $this->db->lastQuery();
		if ($_REQUEST ['type'] === "checkbox" || $_REQUEST ['type'] === "radio" || $_REQUEST ['type'] === "dropdown")
			$this->db->Fields ( array (
					"type" => $_REQUEST ['type'],
					"def" => $_REQUEST ['def'],
					"label" => $_REQUEST ['fl'],
					"options" => $opt 
			) );
		else
			$this->db->Fields ( array (
					"type" => $_REQUEST ['type'],
					"def" => $_REQUEST ['def'],
					"label" => $_REQUEST ['fl'],
					"options" => "NUll" 
			) );
		$this->db->From ( $_REQUEST ['tempname'] );
		if ($j == 0) {
			$bool1 = $this->db->Insert ();
			$j ++;
		} else {
			$bool1 = $this->db->Update ();
		}
		
		if ($bool1) {
			
			$this->db->Fields ( array (
					"type",
					"def",
					"label",
					"fid",
					"options" 
			) );
			//session['table']= $_REQUEST ['tempname'];
			$this->db->From ( $_REQUEST ['tempname'] );
			$id = $this->db->lastInsertId ();
			$this->db->Where ( array (
					"fid" => $id 
			) );
			$this->db->Select ();
			$result = $this->db->resultArray ();
		}
		if ($result)
			return $result;
	}
	public function Fetch() {
		$sql = "Show tables";
		$a = mysql_query ( $sql );
		while ( $row = mysql_fetch_array ( $a ) ) {
			$result [] = $row ['Tables_in_templatemaster'];
		}
		
		// echo $this->db->lastQuery();die;
		/*
		 * $this->db->Fields(array("tmpname")); $this->db->From("inputfield"); $this->db->GroupBy("tmpname"); $this->db->Select(); $result = $this->db->resultArray ();
		 */
		return $result;
	}
	public function temp($val) {
		// echo $val;
		
		$this->db->Fields ( array (
				"type",
				"def",
				"label",
				"fid",
				"options" 
		) );
		$this->db->From ( $val );
		// $this->db->Where(array("tmpname"=>$val));
		// $this->db->GroupBy("tmpname");
		$this->db->Select ();
		//echo $this->db->lastQuery();
		$result = $this->db->resultArray ();
		return $result;
	}

	public function editTemplate($val) {
		$this->db->Fields (array ("type","def","label","fid","options" ));
		$this->db->From ($val);
		$this->db->Select();
		$result = $this->db->resultArray ();
		//echo $this->db->lastQuery();
		return $result;
	}

	public function saveuserresult() {
		// echo $val;
		$val = array();
		$tab = $_SESSION['table']. "values";
		$sql = mysql_query("SHOW columns FROM $tab");
// 		echo $this->db->lastQuery();die;
		
		while ($cols = mysql_fetch_array($sql)){
			//print_r($cols);
			if($cols[0] == 'fid'){
				continue;
			}
			array_push($val, $cols[0]);
			 
		}
		$new1=$_POST;
		$bcd = array_combine($val, $new1);
		
		$this->db->Fields ($bcd);
		$this->db->From ($tab);
		$this->db->Insert ();
		$result = $this->db->resultArray ();
				//echo $result;
		if(count($result) <> 0)
		{
			echo "your records have been inserted";
		}
	}
	
	public function findTemplate() {
		$sql = "Show tables like '".$_REQUEST['strval']."%'";
		$a = mysql_query ( $sql );
		while ( $row = mysql_fetch_array ( $a ) ) {
			echo "<pre>";
			$result [] = $row ['Tables_in_templatemaster ('. $_REQUEST["strval"].'%)' ];
		}
		return $result;
	}
	
	public function SaveTemplate() {
		if ($_REQUEST ['type'] === "checkbox" || $_REQUEST ['type'] === "radio" || $_REQUEST ['type'] === "dropdown") {
			$opt = implode ( ",", $_REQUEST ['opt'] );
		}
		static $i = 0;
		static $j =0;
		$bool1 = "false";
		if ($i == 0) {
			
			$this->db->Create ( "create table " . $_REQUEST ['tempname'] . "( fid int primary key auto_increment , type varchar(20) , def varchar(30) , label varchar(30) , options varchar(100));" );
			$this->db->Create ( "create table " . $_REQUEST ['tempname'] . "values ( fid int primary key auto_increment);" );
			$i ++;
		}
		if ($i <> 0) {
			
			$this->db->Create ( "Alter table " . $_REQUEST ['tempname'] . "values add Column " . $_REQUEST ['fl'] . " " . $_REQUEST ['dt'] . ";" );
			
		}
		echo $this->db->lastQuery();
		if ($_REQUEST ['type'] === "checkbox" || $_REQUEST ['type'] === "radio" || $_REQUEST ['type'] === "dropdown")
			$this->db->Fields ( array (
					"type" => $_REQUEST ['type'],
					"def" => $_REQUEST ['def'],
					"label" => $_REQUEST ['fl'],
					"options" => $opt 
			) );
		else
			$this->db->Fields ( array (
					"type" => $_REQUEST ['type'],
					"def" => $_REQUEST ['def'],
					"label" => $_REQUEST ['fl'],
					"options" => "NUll" 
			) );
		$this->db->From ( $_REQUEST ['tempname'] );
		if ($j == 0) {
			$bool1 = $this->db->Insert ();
			$j ++;
		} else {
			$bool1 = $this->db->Update ();
		}
		
		if ($bool1) {
			
			$this->db->Fields ( array (
					"type",
					"def",
					"label",
					"fid",
					"options" 
			) );
			//session['table']= $_REQUEST ['tempname'];
			$this->db->From ( $_REQUEST ['tempname'] );
			$id = $this->db->lastInsertId ();
			$this->db->Where ( array (
					"fid" => $id 
			) );
			$this->db->Select ();
			$result = $this->db->resultArray ();
		}
		if ($result)
			return $result;
	}
}
?>
