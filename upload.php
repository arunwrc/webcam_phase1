<?php

define('UPLOAD_DIR', 'uploads/');
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$mobile = $_POST['mobile'];
$address_1 = $_POST['address_1'];
$address_2 = $_POST['address_2'];
$street = $_POST['street'];
$province = $_POST['province'];
$country = $_POST['country'];
$remarks = $_POST['remarks'];

$img = $_POST['base64image'];
$img = str_replace('data:image/jpeg;base64,', '', $img);
$img = str_replace(' ', '+', $img);
$data = base64_decode($img);
$file = UPLOAD_DIR . $first_name._.uniqid() . '.jpg';
$success = file_put_contents($file, $data);
//print $success ? $file : 'Unable to save the file.';

$link = mysqli_connect("localhost", "root", "root", "webcam_phase1");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Attempt insert query execution
$sql = "INSERT INTO customer_data (first_name,last_name,mobile,address_1,address_2,street,province,country,remarks,img_file) VALUES ('$first_name','$last_name','$mobile','$address_1','$address_2','$street','$province','$country','$remarks','$file')";
if(mysqli_query($link, $sql)){
    echo "Records added successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
// Close connection
mysqli_close($link);
	
//$result = mysql_query("INSERT INTO $table(first_name,last_name,mobile) VALUES('$host','$username','$database'");
/*$mysql = "INSERT INTO $table(first_name,last_name,mobile,address_1,address_2,street,province,country,remarks,img_file)
VALUES('$first_name','$last_name','$mobile','$address_1','$address_2','$street','$province','$country','$remarks','$file'";*/


?>