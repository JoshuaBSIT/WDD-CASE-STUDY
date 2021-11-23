<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style type="text/css">
<!--
.ed{ border-style:solid;
border-width:thin;
border-color:#00CCFF;
padding:5px; marginbottom: 4px;
}
#button1{ text-align:center;
font-family:Arial, Helvetica, sansserif; border-style:solid; borderwidth:thin; border-color:#00CCFF;
padding:5px;
background-color:#00CCFF;
height: 34px;
}
#imagelist{ border: thin
solid silver;
float:left;
padding:5px;
width:auto;
margin: 0 5px 0 0;
} p{ margin:0;
padding:0; text-align:
center; font-style:
italic; font-size:
smaller; text-indent: 0;
}
#caption{
 margin-top: 5px;
}
img{
 height: 225px;
}
--> 
</style>
</head>
<body>
<center> <h1> Midterm exam </h1>

<form action="addphoto.php" method="post" enctype="multipart/form-data" name="addphoto"> 
First name: <br> <input name="fname" type="text" class="ed" /> <br/>
Last name: <br> <input name="lname" type="text" class="ed" /> <br/>
Select Image: <br />
<input type="file" name="image" class="ed"><br />
Caption<br />
<input name="caption" type="text" class="ed" id="brnu" /><br />
<input type="submit" name="Submit" value="Upload" id="button1" />
</form> <br />
 Photo Archieve 
 <br /> <br />
 
 <?php
include('config.php');
$query = ("SELECT * FROM photos");
$result = mysqli_query($dbc, $query);
while($row = mysqli_fetch_array($result)){
echo '<center>';
echo '<div id="imagelist">';
echo '<p> <img src="'.$row['image'].'"></p>';
echo'<p id="caption">'.'Caption: '.$row['caption'].' </p>';
echo 'Uploader:'.'<p id="fname">'.$row['first_name'].' '.$row['last_name']. '</p>';
echo 'Date Uploaded: ' .'<p id="date_up"> '.$row['date'].' </p>';
echo '</div';
}
?>
</body>
</html>
