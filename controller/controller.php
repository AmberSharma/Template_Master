<?php
session_start ();
ini_set ( "display_errors", "1" );

$route = array ();
class MyClass {
	public function temp() {
		$arr = array ();
		require_once ("../model/model.php");
		//print_r($_REQUEST);
		static $table;
		$result = new result ();
		$fetchResult = $result->temp ( $_REQUEST ['val'] );
		
		$_SESSION ['table'] = $_REQUEST ['val'];
		echo "<form id='frm' method='post' action='http://localhost/Template_Master/trunk/controller/controller.php?method=saveuserresult'>";
		echo "<pre>";
		
		for($i = 0; $i < count ( $fetchResult ); $i ++) {
			if ($fetchResult [$i] ['options'] != "NUll") {
				$arr = explode ( ",", $fetchResult [$i] ['options'] );
			}
		}
		
		for($i = 0; $i < count ( $fetchResult ); $i ++) {
			
			// echo "<select name='" .$fetchResult[$i]['fid']. "' id='" . $fetchResult[$i]['fid'];"'>";
			for($i = 0; $i < count ( $fetchResult ); $i ++) {
				
				if ($fetchResult [$i] ['type'] === "checkbox" || $fetchResult [$i] ['type'] === "radio") {
					echo $fetchResult [$i] ['label'] . "<br />";
					for($j = 0; $j < count ( $arr ); $j ++) {
						
						echo $arr [$j] . "<input type='" . $fetchResult [$i] ['type'] . "' class='required' value='" . $arr [$j] . "' name='" . $fetchResult [$i] ['fid'] . "' ></input><br /><br />";
					}
				} else if ($fetchResult [$i] ['type'] === "dropdown") {
					
					echo $fetchResult [$i] ['label'];
					echo "<select name='" . $fetchResult [$i] ['fid'] . "' class='required'>";
					for($j = 0; $j < count ( $arr ); $j ++) {
						
						echo "<option value='" . $arr [$j] . "'>";
						echo $arr [$j];
						echo "</option>";
					}
					echo "</select>";
				} else if ($fetchResult [$i] ['type'] === "text") {
					echo $fetchResult [$i] ['label'] . "<input type='" . $fetchResult [$i] ['type'] . "' value='" . $fetchResult [$i] ['def'] . "' class='required' name='" . $fetchResult [$i] ['fid'] . "' ></input><br /><br />";
				} else if ($fetchResult [$i] ['type'] === "textarea") {
					echo $fetchResult [$i] ['label'] . "<" . $fetchResult [$i] ['type'] . " class='required' rows='5' cols='15' border='1px solid red;'></" . $fetchResult [$i] ['type'] . "><br /><br />";
				}
			}
			// echo "</select>";
			echo "<input type='submit' value='Save' id='btnSubmit' />";
		}
		echo "</form>";
	}
	public function edittemplate() {
		$arr = array ();
		require_once ("../model/model.php");
		// print_r($_REQUEST);
		static $table;
		$result = new result ();
		$fetchResult = $result->editTemplate ( $_REQUEST ['val'] );
		$_SESSION ['table'] = $_REQUEST ['val'];
		for($i = 0; $i < count ( $fetchResult ); $i ++) {
			if ($fetchResult [$i] ['options'] != "NUll") {
				$arr = explode ( ",", $fetchResult [$i] ['options'] );
			}
		}
		echo "<form id='frmid'>";
		for($i = 0; $i < count ( $fetchResult ); $i ++) {
			for($i = 0; $i < count ( $fetchResult ); $i ++) {
				if ($fetchResult [$i] ['type'] === "checkbox" || $fetchResult [$i] ['type'] === "radio") {
					echo $fetchResult [$i] ['label'] . "<br />";
					for($j = 0; $j < count ( $arr ); $j ++) {
						echo $arr [$j] . "<input type='" . $fetchResult [$i] ['type'] . "' value='" . $arr [$j] . "' name='" . $fetchResult [$i] ['fid'] . "' ></input><br /><br />";
					}
				} else if ($fetchResult [$i] ['type'] === "dropdown") {
					echo $fetchResult [$i] ['label'];
					echo "<select name='" . $fetchResult [$i] ['fid'] . "'>";
					for($j = 0; $j < count ( $arr ); $j ++) {
						echo "<option value='" . $arr [$j] . "'>";
						echo $arr [$j];
						echo "</option>";
					}
					echo "</select>";
				} else if ($fetchResult [$i] ['type'] === "text") {
					echo $fetchResult [$i] ['label'] . "<input type='" . $fetchResult [$i] ['type'] . "' value='" . $fetchResult [$i] ['def'] . "' name='" . $fetchResult [$i] ['fid'] . "' ></input><br /><br />";
				} else {
					echo $fetchResult [$i] ['label'] . "<" . $fetchResult [$i] ['type'] . " rows='5' cols='15' border='1px solid red;'></" . $fetchResult [$i] ['type'] . "><br /><br />";
				}
			}
			echo "<a href='javascript:void(0)' onclick='selectfield()'>Add Field</a>";
		}
		echo "</form>";
	}
	public function addresult() {
		
		require_once ("../model/model.php");
		
		$result = new result ();
		$fetchResult = $result->Save ();
		if ($fetchResult [0] ['options'] != "NUll") {
			$arr = explode ( ",", $fetchResult [0] ['options'] );
		}
		
		for($i = 0; $i < count ( $fetchResult ); $i ++) {
			
			if ($fetchResult [$i] ['type'] === "checkbox" || $fetchResult [$i] ['type'] === "radio") {
				echo $fetchResult [$i] ['label'] . "<br />";
				for($j = 0; $j < count ( $arr ); $j ++) {
					
					echo $arr [$j] . "<input type='" . $fetchResult [$i] ['type'] . "' value='" . $arr [$j] . "' name='" . $fetchResult [$i] ['fid'] . "' ></input><br /><br />";
				}
			} else if ($fetchResult [$i] ['type'] === "dropdown") {
				echo $fetchResult [$i] ['label'];
				echo "<select name='" . $fetchResult [$i] ['fid'] . "'>";
				for($j = 0; $j < count ( $arr ); $j ++) {
					echo "<option value='" . $arr [$j] . "'>";
					echo $arr [$j];
					echo "</option>";
				}
				echo "</select>";
			} 

			else if ($fetchResult [$i] ['type'] === "text") {
				echo $fetchResult [$i] ['label'] . "<input type='" . $fetchResult [$i] ['type'] . "' value='" . $fetchResult [$i] ['def'] . "' name='" . $fetchResult [$i] ['fid'] . "' ></input><br /><br />";
			} else {
				echo $fetchResult [$i] ['label'] . "<" . $fetchResult [$i] ['type'] . " rows='5' cols='15' border='1px solid red;'></" . $fetchResult [$i] ['type'] . "><br /><br />";
			}
		}
		// echo "</select>";
	}
	public function saveuserresult() {
		require_once ("../model/model.php");
		
		$result = new result ();
		$fetchResult = $result->saveuserresult ();
		// print_r($fetchResult);
		for($i = 0; $i < count ( $fetchResult ); $i ++) {
			echo "<select name='temp' id='temp' onchange='fetchtemplate()'>";
			for($i = 0; $i < count ( $fetchResult ); $i ++) {
				echo "<option value='" . $fetchResult [$i] . "'>" . $fetchResult [$i] . "</option>";
			}
			echo "</select>";
		}
	}
	public function findtemplate() {
		require_once ("../model/model.php");
		$result = new result ();
		$fetchResult = $result->findTemplate ();
		// print_r($fetchResult);die;
		if ($fetchResult) {
			echo "<table>";
			echo "<tr><td>S no.</td><td>Template Name</td><td colspan='2'>Options</td></tr>";
			
			for($i = 0, $j = 0; $i < count ( $fetchResult ); $i ++) {
				$pos = strpos ( $fetchResult [$i], "values" );
				if ($pos) {
					continue;
				} else {
					$j ++;
					echo "<tr><td>" . $j . "</td><td>" . $fetchResult [$i] . "</td><td><a href='javascript:void(0)' onclick=edit('" . $fetchResult [$i] . "')>Edit</a><br /></td><td><a href='javascript:void(0)' onclick=del('" . $fetchResult[$i] . "')>Delete</a><br /></td></tr>";
					//echo "<tr><td>" . $j . "</td><td>" . $fetchResult [$i] . "</td><td><a href='javascript:void(0)' onclick=edit('" . $fetchResult [$i] . "')>Edit</a><br /></td><td><a href='javascript:void(0)' onclick=del('" . $fetchResult [$i] . "')>Delete</a><br /></td></tr>";
				}
			}
		} else
			echo "No Template Found";
	}
	
	public function deletetemplate() {
		
		require_once ("../model/model.php");
		$result = new result ();
		$fetchResult = $result->deleteTemplate ($_REQUEST['val']);
		if ($fetchResult) {
			die("1");
		} else{
			die("No Template Found");
		}
	}
	public function getresult() {
		require_once ("../model/model.php");
		
		$result = new result ();
		$fetchResult = $result->Fetch ();
		// print_r($fetchResult);
		for($i = 0; $i < count ( $fetchResult ); $i ++) {
			echo "<select name='temp' id='temp' onchange='fetchtemplate()'>";
			echo "<option value='-1'>-----Select----</option>";
			for($i = 0; $i < count ( $fetchResult ); $i ++) {
				$pos = strpos ( $fetchResult [$i], "values" );
				if ($pos) {
					continue;
				} else {
					echo "<option value='" . $fetchResult [$i] . "'>" . $fetchResult [$i] . "</option>";
				}
			}
			echo "</select>";
		}
	}
	public function Fetchresult() {
		if (isset ( $_SESSION ['uname'] )) {
			require_once ("../model/classes.viewResult.php");
			$result = new result ();
			$result->setUserName ( $_SESSION ['uname'] );
			$fetchResult = $result->viewResultStudent ();
			if ($fetchResult) {
				include ("../view/viewResults.php");
			} else {
				echo "No marks available";
			}
		}
	}
}

$request = "";
if (isset ( $_GET ["method"] )) {
	
	$request = $_GET ["method"];
}

$obj = new MyClass ();

if (! empty ( $request )) {
	$obj->$request ();
}
    
    
      
      
