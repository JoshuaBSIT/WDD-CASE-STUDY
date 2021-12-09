<?php
    require_once('connect.php');

    //establish html form to php - name value pairing
    if(isset($_POST['update'])){
        $firstname = $_POST['first_name'];
        $lastname = $_POST['last_name'];
        $gender = $_POST['gender'];
        $date_of_birth = $_POST['date_of_birth'];
        $email = $_POST['email'];
        $address = $_POST['addres'];
        $id = $_GET['id'];

        //update query
        $query = "UPDATE users SET first_name ='$firstname', last_name ='$lastname', gender ='$gender', date_of_birth ='$date_of_birth', email ='$email',addres ='$address' WHERE id ='$id'";
    
        //execute the query
        $res = $con-> query($query);

        if($res == TRUE){
            echo "<script> alert ('Record Successfully updated...') </script>";
            //header('Location: view.php');
            include('view.php');
            exit();
        }else{
            echo "<script> alert ('Error updating...') </script>";
        }
    }else if(isset($_POST['cancel'])){
        header('Location: view.php');
    }

    if(isset($_GET['id'])){
        $id = $_GET['id'];

        //query
        $q = "SELECT * FROM users WHERE id = '$id' ";
        
        //execute the query
        $result = $con-> query($q);

        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
                $firstname = $row['first_name'];
                $lastname = $row['last_name'];
                $gender = $row['gender'];
                $date_of_birth = $row['date_of_birth'];
                $email = $row['email'];
                $address = $row['addres'];
                
            }// end of while

            ?>

        <!-- HTML form to update the single student recorc -->
        <html>
        <head> 
        <title>Student Record Lists</title> 
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    </head>
        <body>
            <div class="container">
        <h3> Update Student Record </h3>
        <form action="" method="post">
            <fieldset>
                    <legend>Student Information:</legend>
                    First Name: <input type="text" name="first_name" value="<?php echo $firstname?>" ></br></br>
                    Last Name: <input type="text" name="last_name" value="<?php echo $lastname?>"></br></br>
                    Gender: <input type="radio" name="gender" value="Male" <?php if($gender=='Male') {echo "checked";}?> >Male &nbsp
                            <input type="radio" name="gender" value="Female" <?php if($gender=='Female') {echo "checked";}?> >Female </br></br>
                    Email: <input type="text" name="email" value="<?php echo $email?>"></br></br> 
                    Date of Birth: <input type="date" name="date_of_birth" value="<?php echo $date_of_birth?>"></br></br>       
                    Address: <input type="text" name="addres" value="<?php echo $address?>"></br></br>
                    <input type="submit" value="Update" name="update"> &nbsp
                    <input type="submit" value="Cancel" name="cancel">
                </fieldset>
        </form>
        </div>
        </body>
        </html>
<?php
        } //end of if select rows
        else{
            //if the id is not valid
           header('Location: view.php');
        }
    }//end of if $_GET statement
?>