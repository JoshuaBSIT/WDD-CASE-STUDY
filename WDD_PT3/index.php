<?php
//including the database connection file
include_once("connect.php");

//fetching data in descending order (lastest entry first)
//$result = mysql_query("SELECT * FROM users ORDER BY id DESC"); // mysql_query is deprecated
$query = "SELECT * FROM users ORDER BY id DESC";
$result = $con->query($query);
// using mysqli_query instead
?>

<html>
<head>  
    <title>Homepage</title>
</head>

<body>
    <a href="home.html">Insert New Data</a><br/><br/>

    <table width='80%' border=0>
        <tr bgcolor='#CCCCCC'>
            <td>First Name</td>
            <td>last Name</td>
            <td>Date of Birth</td>
            <td>Email</td>
            <td>Address</td>
            <td>Regs Date</td>
            
        </tr>
        <?php 
        //while($res = mysql_fetch_array($result)) { // mysql_fetch_array is deprecated, we need to use mysqli_fetch_array 
        while($res = mysqli_fetch_array($result)) {         
            echo "<tr>";
            echo "<td>".$res['first_name']."</td>";
            echo "<td>".$res['last_name']."</td>";
            echo "<td>".$res['date_of_birth']."</td>";
            echo "<td>".$res['email']."</td>";  
            echo "<td>".$res['addres']."</td>";  
            echo "<td>".$res['reg_date']."</td>";    
            echo "<td><a href=\"update.php?id=$res[id]\">Edit</a> | <a href=\"delete.php?id=$res[id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";       
        }
        ?>
    </table>
</body>
</html>