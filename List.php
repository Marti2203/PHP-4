<?php
/*
 * List.php
 * 
 * Copyright 2017 "" <Martin@DESKTOP-2T5PNPN>
 * 
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 * 
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 * 
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston,
 * MA 02110-1301, USA.
 * 
 * 
 */

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
	<title>untitled</title>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
		<link rel="stylesheet" type="text/css" href="styles.css">
	<meta name="generator" content="Geany 1.27" />
</head>

<body>
	<?php 
	include 'Base.php';

	$rows=FindAll("ContactInformation");
		
	print '<form method="get" action="List.php"> 
	<input type="submit" class="button" value="Filter" /> 
	<label for="timestamp" class="label">TimeStamp</label>
	<input type="datetime-local" name="timestamp" value="'.(isset($_GET['timestamp'])? $_GET['timestamp'] : "").'">
	<label for="City" class="label">City</label>
	<input type="text" name="City" value="'.(isset($_GET['City'])? $_GET['City'] : "").'"/></form>';
	
	
	$validTimestamp=isset($_GET['timestamp']) && $_GET['timestamp']!="";
	if($validTimestamp)$timestamp=new DateTime(str_replace("T"," ",$_GET['timestamp']));
	
	$currentCount=count($rows);
	for($i=0;$i<$currentCount;$i++)
	if (($validTimestamp && (new DateTime($rows[$i]['DateAdded']) <= $timestamp))   ||  
		(isset($_GET['City']) && $_GET['City']!="" && $_GET['City']!==$rows[$i]['City']))
	unset($rows[$i]);
	
	print "<table style=\"width:100%\">";
	if(count($rows)==0){print "No Contacts";die;}
	
	function CreateForm($ID,$action,$value)
	{
		return "<form method=\"post\" action=\"".$action."\"> <input type=\"hidden\" name=\"ID\" value=\"".$ID."\"/>
		<input type=\"submit\" class=\"button\" value=\"".$value."\"/></form>"; 
	}
	$alwaysTrue=function($key,$value){return true;};
	
	foreach($rows as $row){PrintRow($row,$getKey,$alwaysTrue); break;}
	
	foreach($rows as $row)
	PrintRow($row,$getValue,$alwaysTrue,array(CreateForm($row['ID'],"Edit.php","Edit"),CreateForm($row['ID'],"Remove.php","Delete"),"<img height=\"300\" width=\"300\" src=\"".$pictures.$row['PictureName']."\"/>"));
	print "</table>";
	?>
</body>

</html>
