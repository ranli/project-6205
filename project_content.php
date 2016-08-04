<!doctype html>
<html lang="en">
<head>
    <meta name="description" content="Project 1 for ISTM 6205">
    <link rel="stylesheet" href="Content-desktop.css" media="screen and (min-width:481px)" />
	<link rel="stylesheet" href="Content-mobile.css" media="screen and (max-width:480px)" />
	<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <title>Project 2 </title>
</head>
<body>
  <header> 
    <h1>Project Two for ISTM 6205 </h1>
    <nav id="mainnav">
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
   <?php include "project_validation_update.php" ; ?>
   <?php include 'project_delete.php'; ?>
   <?php
	   if (isset($_POST['submit']) && (!$error) )
	  
           {   $id = $_POST['id'];
			   $Firstname = $_POST['Firstname'];
			   $Lastname = $_POST['Lastname'];
	           $gender = $_POST['gender'];
	           $Email = $_POST['Email'];
	           $Tel = $_POST['Tel'];
	           $League = $_POST['League'];
	           $Photo = $_POST['Photo'];
			
               $query = "UPDATE project SET Firstname = '$Firstname', Lastname = '$Lastname', Gender = '$gender', Email = '$Email',  League = '$League', Tel = '$Tel', Photo = '$Photo' WHERE id = $id" ;
			   $result = $conn->query($query);
               if (!$result){echo "UPDATE failed: $query<br>" . $conn->error . "<br><br>";
			   }else{
				echo "update successfullly!";
			   }
		   } 
	?>
   <form action="project_content.php" method="POST">
    <table id="data">
	  <thead>
	     <tr>
		    <th></th>
		    <th>FirstName</th>
			<th>Lastname</th>
			<th>Gender</th>
			<th>Email</th>
			<th>League</th>
			<th>Tel</th>
			<th>Photo</th>	
         </tr>
	  </thead>
	  <tfoot>
	     <tr>
		    <td></td>
		    <td colspan="3" align="right">
	           <div><input type="submit" name="delete" value="DELETE RECORDS"></div>
	        </td>
			<td colspan="4" align="left">
			   <div><input type="submit" name="update" value="UPDATE RECORDS"></div>
			</td>
		</tr>
	  </tfoot>
	  <?php if ($rows>0) { ?>
	     <tbody></tbody>
	  <?php }else{?>
	        <tbody><tr><td><?php echo "NO DATA TO DISPLAY";?></td></tr></tbody>
	  <?php } ?>
	   
	 </table>
	</form>
	
	<?php if((isset($_POST['update'])&& isset($_POST['multiple'])) || $error){ 
	       if($error){
			  $multiple[0] = $_POST["id"];
		   }else{
		   $multiple = $_POST['multiple'];}
		   $query  = "SELECT * FROM project WHERE id = '$multiple[0]'";
           $result = $conn->query($query);
           if (!$result) die ("Database access failed: " . $conn->error);
		   $row = $result->fetch_array(MYSQLI_NUM);
		   
		   ?>
	<form id="update" action="project_content.php" method="POST">
	           <input type="hidden" name="id" value="<?php echo $row[0]; ?>">
  <span>*</span>First name:<br>
               <input type="text" name="Firstname" value="<?php echo $row[1];?>" id="firstname" placeholder = "your first name" size="30" class="required">
               <span class="error"> <?php echo $FirstnameErr;?></span><br>
  <br>
<span>*</span>Last name:<br>
              <input type="text" name="Lastname" value="<?php echo $row[2];?>" id="lastname" placeholder = "your last name"  size="30" class="required">
	          <span class="error"> <?php echo $LastnameErr;?></span><br>  
	      <br>
<span>*</span>Gender:<br>
	          <input type="radio" name="gender" <?php if ($row[3] == "male") echo "checked";?> value="male" class="required"> Male
              <input type="radio" name="gender" <?php if ($row[3]== "female") echo "checked";?> value="female" class="required"> Female
		      <span class="error"> <?php echo $genderErr;?></span><br>  
	      <br>
		      League:<br>
	           <select name="League"  id="league" > 
	              <option value="NBA" <?php if ($row[5]=="NBA") echo "selected";?>>NBA</option>
                  <option value="NFL" <?php if ($row[5]=="NFL") echo "selected";?>>NFL</option>
                  <option value="MLB" <?php if ($row[5]=="MLB") echo "selected";?>>MLB</option>
	           </select><br>
	      <br>
<span>*</span>E-mail:<br>
	          <input type="email" name="Email" value="<?php echo $row[4];?>" id="email" placeholder="example:123@example.com" size="30" class="required"> 
	          <span class="error"><?php echo $emailErr;?></span><br>			   
	      <br>
		      Tel:<br>
	          <input type="tel" name="Tel" value="<?php echo $row[6];?>" id="tel" placeholder="example:1111111111" size="30"><br>
              <span class="error"> <?php echo $TelErr;?></span><br>  	      
	          Choose your Photo:<br>
	          <input type="file" name="Photo" value="<?php echo $row[7];?>" id="image" accept="image/*" size="30"><br>
              <span class="error"> <?php echo $PhotoErr;?></span><br>
	   <br>
       <input type="submit" name="submit" value = "Submit">
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
	
    <script type="text/javascript" language="javascript" src="project_ajax_table.js"></script>

</body>
</html>
<?php
  $result->close();
  $conn->close();
?>