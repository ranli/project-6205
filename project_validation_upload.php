<?php
// define variables and set to empty values
$FirstnameErr = $LastnameErr = $emailErr = $genderErr = $telErr = $photoErr = "";
$Firstname = $Lastname = $Email = $gender = $Tel = $League = $Photo = "";
$error = False;

if (isset($_POST["add"])) {
   if (empty($_POST["Firstname"])) {
     $FirstnameErr = "Firstname is required";
	 $error = True;
   } else {
     $Firstname = test_input($_POST["Firstname"]);
     // check if name only contains letters
     if (!preg_match("/^[a-zA-Z]*$/",$Firstname)) {
       $FirstnameErr = "Only letters allowed for Firstname"; 
	   $error = True;
     }
   }
   
   if (empty($_POST["Lastname"])) {
     $LastnameErr = "Lastname is required";
	 $error = True;
   } else {
     $Lastname = test_input($_POST["Lastname"]);
     // check if name only contains letters
     if (!preg_match("/^[a-zA-Z]*$/",$Lastname)) {
       $LastnameErr = "Only letters allowed for Lastname"; 
	   $error = True;
     }
   }
   
   if (empty($_POST["Email"])) {
     $emailErr = "Email is required";
	 $error = True;
   } else {
     $Email = test_input($_POST["Email"]);
     // check if e-mail address is well-formed
     if (!filter_var($Email, FILTER_VALIDATE_EMAIL)) {
       $emailErr = "Invalid email format! example: 123@example.com"; 
	   $error = True;
     }
   }
     
   if (empty($_POST["gender"])) {
     $genderErr = "Gender is required";
	 $error = True;
   } else {
     $gender = test_input($_POST["gender"]);
   }
   
   $League = test_input($_POST["League"]);
   
   
   if (!empty($_POST["Tel"])) {
	   $Tel = test_input($_POST["Tel"]);
	   if(!preg_match("/^\d{10}$/", $Tel)){
	   $TelErr = "only 10-dit number accepted fro tel example: 1111111111";
	   $error = True;
	   }
   }
   
   
   if (!empty($_POST["Photo"])){
	 $Photo =  test_input($_POST["Photo"]);
   
   $type = substr($Photo, strpos($Photo, ".", -1)+1);
   if ($type == "gif" || $type == "GIF" || $type == "JPEG" || $type == "jpeg" || $type == "jpg" || $type == "JPG") {
	   return True;
   }else {
	   $PhotoErr = "Only accept gif or jpeg for photo!";
	   $error = True;
   }
   }
   
}


function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}
?>