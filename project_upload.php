<!doctype html>
<html lang="en">
<head>
    <meta name="description" content="Project 1 for ISTM 6205">
    <link rel="stylesheet" href="Index&Inputpage-mobile.css" media="screen and (max-width:480px)" />
    <link rel="stylesheet" href="Index&Inputpage-desktop.css" media="screen and (min-width:481px)" />
    <title>Project 2 </title>
</head>
<body>

  <header> 
    <h1>Project Two for ISTM 6205 </h1>
     <nav>
        <ul class="menu-list">
          <li class="menu-home"><a href="#" class="menu-link-homepage">Home</a></li>
          <li class="menu-Content"><a href="project_content.php" class="menu-link-contentpage">Content</a></li>
          <li class="-menu-about"><a href="#" class="menu-link">About</a></li>
          <ul style="float:right;list-style-type:none;">
              <li><a class="menu-Upload" href="project_upload.php" class="menu-link-uploadpage">Upload</a></li>
          </ul>
        </ul>
     </nav>
   </header>
   <?php include 'project_validation_upload.php'; ?>
   <?php 
  require_once 'projectlogin.php';
  $conn = new mysqli($hn, $un, $pw, $db);
  
  if ($conn->connect_error) die($conn->connect_error);

  if (isset($_POST['add']) && !$error)
	  
  {
    $Firstname   = $_POST['Firstname'];
    $Lastname = $_POST['Lastname'];
	$gender = $_POST['gender'];
	$Email = $_POST['Email'];
	$Tel = $_POST['Tel'];
	$League = $_POST['League'];
	$Photo = $_POST['Photo'];
    $query = "INSERT INTO project (Firstname, Lastname, Gender, Email,  League, Tel, Photo)  VALUES" .
      "('$Firstname', '$Lastname', '$gender', '$Email', '$League' , '$Tel' , '$Photo')";
    $result   = $conn->query($query);
    if (!$result) echo "INSERT failed: $query<br>" .
     $conn->error . "<br><br>";
	  
    echo "<h2>Your Input:</h2>";
    echo "Firstname: $Firstname";
    echo "<br>";
    echo "Lastname: $Lastname";
    echo "<br>";
    echo "Gender: $gender";
    echo "<br>";
    echo "Email: $Email";
    echo "<br>";
    echo "Tel: $Tel";
    echo "<br>";
    echo "League: $League";
    echo "<br>";
    echo "Photo: $Photo";
  }else{
  ?>
   
   

<form id="upload" action="project_upload.php" enctype="multipart/form-data" method="post">
<span>*</span>First name:<br>
               <input type="text" name="Firstname" value="<?php echo $Firstname;?>" id="firstname" placeholder = "your first name" size="30">
               <span class="error"> <?php echo $FirstnameErr;?></span><br>	  
	      <br>
<span>*</span>Last name:<br>
              <input type="text" name="Lastname" value="<?php echo $Lastname;?>" id="lastname" placeholder = "your last name"  size="30" >
	          <span class="error"> <?php echo $LastnameErr;?></span><br>	  
	      <br>
<span>*</span>Gender:<br>
	          <input type="radio" name="gender" <?php if (isset($gender) && $gender=="male") echo "checked";?> value="male"> Male
              <input type="radio" name="gender" <?php if (isset($gender) && $gender=="female") echo "checked";?> value="female"> Female
		      <span class="error"> <?php echo $genderErr;?></span><br>
	      <br>
		      League:<br>
	           <select name="League"  id="league" > 
	              <option value="NBA" <?php if (isset($League) && $League=="NBA") echo "selected";?>>NBA</option>
                  <option value="NFL" <?php if (isset($League) && $League=="NFL") echo "selected";?>>NFL</option>
                  <option value="MLB" <?php if (isset($League) && $League=="MLB") echo "selected";?>>MLB</option>
	           </select><br>	
	      <br>
<span>*</span>E-mail:<br>
	          <input type="email" name="Email" value="<?php echo $Email;?>" id="email" placeholder="example:123@example.com" size="30"> 
	          <span class="error"><?php echo $emailErr;?></span><br>	   
	      <br>
		      Tel:<br>
	          <input type="tel" name="Tel" value="<?php echo $Tel;?>" id="tel" placeholder="example:1111111111" size="30"><br>
              <span class="error"> <?php echo $TelErr;?></span><br>  
	          Choose your Photo:<br>
	          <input type="file" name="Photo" value="<?php echo $Photo;?>" id="image" accept="image/*" size="30"><br>
              <span class="error"> <?php echo $PhotoErr;?></span><br>
	   <br>
	          <input type="submit" name="add" value = "Submit">
	          <input type="reset" value="Reset">
	</form>
 <?php } ?>
   <footer>
       <nav>
	      <a href="#">Home</a> 
		  <a href="#">Browse</a> 
		  <a href="#">Search</a></p>
	   </nav>
       <p><em>Copyright &copy; 2016 RAN LI</em></p>
    </footer>
</body>
</html>
<?php
  $result->close();
  $conn->close();
?>