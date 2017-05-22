<?php

function UploadValid($info)
{
	if($info["name"]==="")return false;

	$targetPosition=basename($info["name"]);
	$imageFileType = pathinfo($targetPosition,PATHINFO_EXTENSION);
	$uploadOk = true;

    	if(getimagesize($info["tmp_name"])===false)
		$uploadOk = false;
	if (file_exists($targetPosition) && filesize($targetPosition)!= $info["size"]) {
	    	print 'Sorry, file with same name and different size already exists.';
	    	$uploadOk = false;
	}
	
	$mime=explode("/",mime_content_type($info['tmp_name']));
	if ($mime[0]!='image' && ($mime[1]==='jpg' || $mime[1]==='png' || $mime[1]==='jpeg' || $mime==='gif'))
	{
		print "File is not a jpg/png/gif image.";
	$uploadOk=false;
	}
	if(strlen($info["name"])>45)
	{
		print "Name Too big.";
		$uploadOK=false;
	}
	return $uploadOk;
}

$pictures='pictures/';

include 'DB.php';

function EmailValid($email)
{
	if(filter_var($email,FILTER_VALIDATE_EMAIL) && strlen($email)<46)
		return true;
	else return false;
}
function NameValid($name)
{
	if(preg_match
	("/^([\pL]+[,.]?[ ]?|[\pL]]+['-]?)+$/u",$name) && strlen($name)<46)
	return true;
	return false;
	}
function NumberValid($number)
{
	if(preg_match("/^(\+)[0-9]{12}$/",$number))
	return true;
	return false;
	}
function NoteValid($note)
{
	if(strlen($note)<201)
	return true;
	return false;
	}

function CityValid($city)
{
	if(preg_match("/^([\pL]+(?:. |-| |'))*[\pL]*$/",$city))
	return true;
	return false;
}	
function ErrorCheck(&$errors)
{
	NameCheck($errors);
	DataCheck($errors);
}
function DataCheck(&$errors)
{
	if(!NumberValid($_POST['number']))
	array_push($errors,'Invalid phone number');
	if(isset($_POST['addPicture']) && !UploadValid($_FILES["Picture"]))
	array_push($errors,'Sorry, there was an error uploading your file.');
	if(isset($_POST['city']) && CityValid($_POST['city']))
	array_push($errors,'Invalid City');
	if(!EmailValid($_POST['email']))
	array_push($errors,'Invalid email');
	if(!NoteValid($_POST['note']))
	array_push($errors,'Too Big Note');
}
function NameCheck(&$errors)
{
	if(!NameValid($_POST['firstName']))
	array_push($errors,'Invalid first name');
	if(!NameValid($_POST['familyName']))
	array_push($errors,'Invalid family name');
	}
	
function InsertContact($firstName,$familyName,$city,$number,$email,$gender,$note,$picture){
	Execute("Insert into ContactInformation (FirstName,FamilyName,PhoneNumber,City,Note,PictureName,Gender,Email) VALUES
	(:firstName,:familyName,:phoneNumber,:city,:note,:picture,:gender,:email)",
	array(":firstName"=>$firstName,":familyName"=>$familyName,":phoneNumber"=>$number,":note"=>$note,":city"=>$city,":gender"=>$gender,":picture"=>$picture,":email"=>$email));
	}
function UpdateContact($ID,$number,$city,$email,$note,$picture)
{
	Execute("Update ContactInformation SET PhoneNumber=:phoneNumber,Email=:email,City=:city,Note=:note,PictureName=:picture Where ID=:id",
	array(":phoneNumber"=>$number,":city"=>$city,":email"=>$email,":note"=>$note,":id"=>$ID,":picture"=>$picture));
}
function DeleteContact($ID)
{
	Execute ("Delete from ContactInformation Where ID=:id",array(":id"=>$ID));
}
function TrimPost($namesIncluded=true)
{
	if($namesIncluded)
	{$_POST['firstName']=trim($_POST['firstName']);
	$_POST['familyName']=trim($_POST['familyName']);
	}
	$_POST['email']=trim($_POST['email']);
	$_POST['city']=trim($_POST['city']);
	$_POST['number']=trim($_POST['number']);
	
	}	
?>
