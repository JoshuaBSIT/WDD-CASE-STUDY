<?php
    require_once('connect.php');

    $input = file_get_contents('php://input');
    $data = json_decode($input,true);
    $student_no = $data['student_no'];
    $student_name = $data['student_name'];
    $student_add = $data['student_add'];
    $message = array();

    //create q query to add records to the database
    $query = "INSERT INTO students(student_no, student_name, student_add) VALUES ('$student_no','$student_name','$student_add')";
    $result = mysqli_query($con, $query);

    if($result){
        http_response_code(201);
        $message['status'] = "Success";
    }else{
        http_response_code(422);
        $message['status'] = "error";
    }

    echo json_encode($message);
    echo mysqli_error($con);
?>