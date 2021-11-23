<?php
include('config.php'); 
if (!isset($_FILES['image']['tmp_name'])) {
echo "Input an Image";
}else{
$file=$_FILES['image']['tmp_name'];
$image= addslashes(file_get_contents($_FILES['image']['tmp_name']));
$image_name= addslashes($_FILES['image']['name']);
move_uploaded_file($_FILES["image"]["tmp_name"],"photos/".$_FILES["image"]["name"]);
$location= "photos/" . $_FILES["image"]["name"];
$caption=$_POST['caption']; 
$firstname=$_POST['fname'];
$lastname=$_POST['lname'];
$savephoto = ("INSERT INTO photos (first_name,last_name,image,caption,date) VALUES ('$firstname','$lastname','$location','$caption',NOW())");
$save=mysqli_query($dbc, $savephoto);
header("location: midterm.php");
exit();
}
?>