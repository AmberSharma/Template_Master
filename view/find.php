<style>
	table td{
		border:1px solid red;
	}
</style>
<?php
$host = "localhost";
$user = "root";
$pass = "amber@321";
$databaseName = "pc";
$tableName = "pcrel";
$con = mysql_connect ( $host, $user, $pass ) or die ( mysql_error () );
$dbs = mysql_select_db ( $databaseName, $con ) or die ( mysql_error () );
$sql = "SELECT * from ".$tableName .";";
//echo $sql;
$result = mysql_query ( $sql );
$count=mysql_num_rows($result);
if ($count%2<>0)
{
	$count= $count+2;
}
//echo $count;
	$arr = array();
	$k=0;
	$parent=1;
	$done=0;
	$m=0;
	$arr[$k] =$_REQUEST["strval"];
	//print_r( $arr );
		echo "<table>";
		while(!empty($arr[$k]))
		{
			//print_r ($arr[$k]);
			$sql = "SELECT * from ".$tableName ." where parent = '" . $arr[$k] ."';";
			//echo $sql;
			$result = mysql_query ( $sql );
			//echo $result;
			
			
			$child=1;
			$j=0;
			if(mysql_num_rows($result) ==0)
			{
				break;
			}
			$abc = array();
			if (mysql_num_rows($result)>0)
			{
				$str = "";
				if($parent ==1)
				{
				$str .="<tr>";
				}
				$count1=mysql_num_rows($result);
				//echo $count;
				
				while ($row = mysql_fetch_row($result))
				{
					//echo "<pre>";
					//print_r($row);
					//echo "</pre>";
					if($parent==1)
					{
						//echo hi;
						for($i=0 ; $i< floor($count/2) ;$i++)
						{
							//echo $count/2;
							//echo floor($count/2);
							$str .= "<td></td>";
							//echo hello;
						}
					
						$str .= "<td>" .$row[1] ."</td>";
						//echo "$str";
						$parent ++;
				
						for($i=$count/2;$i<$count;$i++)
						{
							$str .= "<td></td>";
						}
						$str .= "</tr>";
						$count =$count/2;
					}
					//echo $m;
					if($child ==1)
					{
						$str .= "<tr>" ;
					}
					if(($child <= $count1))
					{
						for($i=0;$i<floor($count/2);$i++)
						{
							//echo $count;
							$str .= "<td></td>";
							//echo hello;
						}
						$str .= "<td>" . $row[2] . "</td>";
						//for($i=0;$i<$count/4;$i++)
						//{
						//	$str .= "<td></td>";
						//}
						$abc[$j] = $row[2];
						$j ++;
						if($child == $count1)
						{
							$str .= "</tr>";
						}
						
						$child ++;
					}
				}
				
				for($i=0;$i<$count ;$i++)
				{
					array_push($arr , $abc[$i]);
//$arr[$i + 1] = $abc[$i];
				}
				
				
				
			}
			
			print_r ($abc);
				$k ++;
				$m=$count1;
				$count = $count /2;
				//echo $k;
				//print_r ($arr[$k]);
				echo $str;
			
		}
		echo "</table>";
?>
