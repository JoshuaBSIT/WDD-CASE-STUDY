<?php
// including the database connection file
include_once("connect.php");

if(isset($_POST['update']))
{   
    $id = $_POST['id'];
    $fname = $_POST['first_name'];
    $lname = $_POST['last_name'];
    $bday = $_POST['date_of_birth'];
    $email = $_POST['email'];
    $addre = $_POST['addres'];
    $pass = $_POST['pass'];
    $regs_date = $_POST['reg_date'];
    
    // checking empty fields
    if(empty($fname) || empty($lname) || empty($bday) || empty($email) || empty($addre) || empty($pass) || empty($regs_date)){              
        if(empty($fname)) {
            echo "<font color='red'>first name field is empty.</font><br/>";
        }
        
        if(empty($lname)) {
            echo "<font color='red'>last name field is empty.</font><br/>";
        }
        
        if(empty($bday)) {
            echo "<font color='red'>date of Birth field is empty.</font><br/>";
        }
        if(empty($email)) {
            echo "<font color='red'>Email field is empty.</font><br/>";
        }
        if(empty($addre)) {
            echo "<font color='red'>Address field is empty.</font><br/>";
        }
        if(empty($pass)) {
            echo "<font color='red'>Password field is empty.</font><br/>";
        }
        if(empty($regs_date)) {
            echo "<font color='red'>Registration Date field is empty.</font><br/>";
        }
    } else {    
        //updating the table
        $query = "UPDATE users SET first_name ='$fname', last_name='$lname',date_of_birth='$bday' , email='$email', addres='$addre',pass='$pass',reg_date='$regs_date' WHERE id=$id";
        $result = $con->query($query);
   
        
        //redirectig to the display page. In our case, it is index.php
        header("Location: index.php");
    }
}
?>
<?php
//getting id from url
$id = $_GET['id'];

//selecting data associated with this particular id
$query = "SELECT * FROM users WHERE id=$id";
$result = $con->query($query);

while($res = mysqli_fetch_array($result))
{
    
    $fname = $res['first_name'];
    $lname = $res['last_name'];
    $bday = $res['date_of_birth'];
    $email = $res['email'];
    $addre = $res['addres'];
    $pass = $res['pass'];
    $regs_date = $res['reg_date'];
}
?>
<html> 
<head>  
    <title>Edit Data</title>
</head>

<body>
    <a href="index.php">Home</a>
    <br/><br/>
    
    <form name="form1" method="post" action="update.php">
        <table border="0">
            <tr> 
                <td>First Name</td>
                <td><input type="text" name="first_name" value="<?php echo $fname;?>"></td>
            </tr>
            <tr> 
                <td>Last Name</td>
                <td><input type="text" name="last_name" value="<?php echo $lname;?>"></td>
            </tr>
            <tr> 
                <td>Date of Birth</td>
                <td><input type="date" name="date_of_birth" value="<?php echo $bday;?>"></td>
            </tr>
            <tr> 
                <td>Email</td>
                <td><input type="text" name="email" value="<?php echo $email;?>"></td>
            </tr>
            <tr> 
                <td>Address</td>
                <td><input type="text" name="addres" value="<?php echo $addres;?>"></td>
            </tr>
            <tr> 
                <td>Password</td>
                <td><input type="text" name="pass" value="<?php echo $pass;?>"></td>
            </tr>
            <tr> 
                <td>Registration date</td>
                <td><input type="date" name="reg_date" value="<?php echo $regs_date;?>"></td>
            </tr>
            <tr>
                <td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
                <td><input type="submit" name="update" value="Update"></td>
            </tr>
        </table>
    </form>
</body>
</html>