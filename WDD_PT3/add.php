<html>
<head>
    <title>Add Data</title>
</head>

<body>
<?php
//including the database connection file
include_once("connect.php");

if(isset($_POST['Submit'])) {   
    $fname = $_POST['first_name'];
    $lname = $_POST['last_name'];
    $bday = $_POST['date_of_birth'];
    $email = $_POST['email'];
    $addre = $_POST['addre'];
    $pass = $_POST['pass'];
    $regs_date = $_POST['regs_date'];
    
    
   

        
    // checking empty fields
    if(empty($fname) || empty($lname) || empty($bday) || empty($email) || empty($addre)){              
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
        
        
        //link to the previous page
        echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
    } else { 
        // if all the fields are filled (not empty)             
        //insert data to database
        $query = "INSERT INTO users (first_name,last_name,date_of_birth,email,addres,pass,reg_date) VALUES('$fname','$lname','$bday','$email','$addre','$pass','$regs_date')";
        $result = $con->query($query);
       
        //display success message
        echo "<font color='green'>Data added successfully.";
        echo "<br/><a href='index.php'>View Result</a>";
    }
}
?>
</body>
</html>