<?php
/*
 * Create.php
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
	<form method="post" action="Register.php" enctype="multipart/form-data">

<label for="firstName" class="label">First Name</label>
				<input type="text" name="firstName" class="firstName" /><br>
<label for="familyName" class="label">Family Name</label>
				<input type="text" name="familyName" class="familyName"/><br>

<label for="sex" class="label">Sex</label>
<select name="sex">
		<option value="Male" checked>Male</option>
			<option value="Female">Female</option>
			<option value="Other">Other</option>
			<option value="Apache Helicopter">Apache Helicopter</option>
		</select><br>

<label for="email" class="label">Email</label>
				<input type="text" name="email" class="email"/><br>

<label for="number" class="label">Phone Number</label>
				<input type="text" name="number" class="number" ><br>

<label for="City" class="label">City</label>
				<input type="text" name="city" class="city" ><br>
				
<label for="note" class="label">Notes</label>
					<textarea rows="4" cols="50" name="note"> </textarea><br>

									<input type="file" name="Picture"/>
<label for="addPicture" class="label">Add Picture</label>
<input type="checkbox" name="addPicture" value="Yes"> 
<input type="submit" class="button" value="Register" /> 
</form>

</body>

</html>
