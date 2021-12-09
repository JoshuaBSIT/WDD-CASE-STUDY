<?php 
        $mysqli = new mysqli('localhost', 'root', '', 'it15_database') or die('Cannot Connect to Database');
        $search = $_POST['search'];

        if($_POST['submit']){
            $result = $mysqli -> query("SELECT * FROM users WHERE first_name LIKE '%".$search."%'") or die($mysqli->error);
            if (isset($search)){ 
                echo '<h1>Record Search</h1>';
                while($row = $result->FETCH_ASSOC()):
                    echo '<table>';
                    echo '<tr>';
                    echo '<td>'.$row['first_name'].'</td>';
                    echo '<td>'.$row['last_name'].'</td>';
                    echo '</tr>';
                    echo '<table>';
                endwhile;
            
            }else{
                echo "No Records Found...";
            }
        }
        echo "<br/><a href='home.html'>Add User</a>";
?>

