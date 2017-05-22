
	<?php 
	function Execute($statement,$values,$dbName="phonebook")
{
	$servername = "localhost";
	$username = "martin";
	$password = "workpass";
	try {
    $conn = new PDO("mysql:host=$servername;dbname=".$dbName, $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }
    $sth=$conn->prepare($statement,array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
    $sth->execute($values);
    $conn = null;
    return $sth;
	}

function Update($type,$object,$ID)
{
	Execute("Update ".$type."Set :values Where ID = :ID ",array(":values"=>$values));
}
function FetchAll($statement,$values=array())
{
	    return Execute($statement,$values)->fetchAll();
}	
function Find($ID, $type)
{
	return FetchAll("Select * from ". $type ." WHERE ID=:id",array(":id"=>$ID));
}
function FindAll($type)
{
	return FetchAll("Select * FROM ". $type);
}
function FindAllFiltered($type,$filter,$values=array())
{
	return FetchAll("Select * FROM ". $type ." WHERE ".$filter,	$values);
}
function Delete($ID,$type)
{
	Execute("DELETE FROM ".$type." WHERE ID =:id ",array(":id"=>$ID));
}
	
$getKey=function($key,$value){ return $key;};
$getValue=function($key,$value){ return $value;}; 	
function PrintRow($data,$function,$specialCheck,$extraHeaders=array())
	{
			print "<tr>";
			foreach($data as $key=>$value)
			if(!is_numeric($key) && strpos($key,"ID")===false && $specialCheck($key,$value) )
			print "<th>".$function($key,$value)."</th>";
			foreach($extraHeaders as $header)
			print "<th>".$header."</th>";
			print"</tr>";
		}
	
	?>

