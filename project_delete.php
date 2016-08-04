<?php
  require_once 'projectlogin.php';
  $conn = new mysqli($hn, $un, $pw, $db);
  if ($conn->connect_error) die($conn->connect_error);
  

  
  function get_post($conn, $var)
  {
    return $conn->real_escape_string($_POST[$var]);
  }
  if (isset($_POST['delete']))
  {
    $multiple = $_POST['multiple'];
	$query = "DELETE FROM project WHERE id = ";
	for($i = 0; $i < count($multiple); $i++){
		if($i == 0){
		    $query .=$multiple[$i];
		} else {
			$query .= " OR id = ". $multiple[$i];
		} 
	}
    $result = $conn->query($query);
    if (!$result) echo "DELETE failed: $query<br>" .
      $conn->error . "<br><br>";
  }
   
   
  
  $query  = "SELECT * FROM project";
  $result = $conn->query($query);
  if (!$result) die ("Database access failed: " . $conn->error);

  $rows = $result->num_rows;
  
 

?>