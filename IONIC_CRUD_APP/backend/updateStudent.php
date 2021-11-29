<?php

    require_once('connect.php');

    $input = file_get_contents('php://input');
    $data = json_decode($input,true);
    $student_no = $data['student_no'];
    $student_name = $data['student_name'];
    $student_add = $data['student_add'];
    $student_course = $data['student_course'];
    $student_year = $data['student_year'];
    $message = array();
    $id = $_GET['id'];
 

    //create the query for update
    $query = mysqli_query($con, "UPDATE students SET student_no ='$student_no', student_name ='$student_name', student_add ='$student_add', student_course ='$student_course', student_year ='$student_year' WHERE id ='$id' LIMIT 1");
    //$result = mysqli_query($con, $query);

    if($query){
        http_response_code(201);
        $message['status'] = "Success";
    }else{
        http_response_code(422);
        $message['status'] = "Error";
    }

    echo json_encode($message);
    echo mysqli_error($con);
?>