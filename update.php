<?php
	$data = file_get_contents("php://input");
	$postData = json_decode($data);
	
	$id = ($postData->id);
	$pic_name = ($postData->pic_name);
	$description = ($postData->description);
	

	$con=mysqli_connect("db.cbn7hdryrize.us-west-2.rds.amazonaws.com","wuichen01","wuichen01","bb");
	// Check connection
	if (mysqli_connect_errno()) {
	  echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}

	mysqli_query($con,"UPDATE pictures SET description='$description'
	WHERE id='$id' AND pic_name='$pic_name'");

	mysqli_close($con);





	// $sql="INSERT INTO pictures (pic_name,description)
	// VALUES ('$fileName','')";

?>