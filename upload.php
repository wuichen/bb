<?php
$ds          = DIRECTORY_SEPARATOR;  //1

$storeFolder = 'uploads';   //2

if (!empty($_FILES)) {

	$pieces = explode(".", $_FILES['file']['name']);

	$_FILES['file']['name'] = uniqid().".".$pieces[count($pieces)-1];

	$fileName = $_FILES['file']['name'];

    $tempFile = $_FILES['file']['tmp_name'];          //3

    $targetPath = dirname( __FILE__ ) . $ds. $storeFolder . $ds;  //4

    $targetFile =  $targetPath. $_FILES['file']['name'];  //5

    move_uploaded_file($tempFile,$targetFile); //6

	$con=mysqli_connect("db.cbn7hdryrize.us-west-2.rds.amazonaws.com","wuichen01","wuichen01","bb");
	// Check connection
	if (mysqli_connect_errno()) {
	  echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}

	$sql="INSERT INTO pictures (pic_name,description)
	VALUES ('$fileName','')";

	if (!mysqli_query($con,$sql)) {
	  die('Error: ' . mysqli_error($con));
	}
	echo "1 record added";

	mysqli_close($con);

}


?>
