<?php
    require('model/database.php');
    require('model/assignment_db.php');
    require('model/course_db.php');
    require('model/submission_db.php');
    require('model/doubts.php');

    $assignment_id = filter_input(INPUT_POST ,'assignment_id',FILTER_VALIDATE_INT);
    $description = filter_input(INPUT_POST ,'description',FILTER_SANITIZE_STRING);
    $duedate = filter_input(INPUT_POST ,'duedate',FILTER_SANITIZE_STRING);
    $EnrollmentNo = filter_input(INPUT_POST ,'EnrollmentNo',FILTER_VALIDATE_INT);
    $course_name = filter_input(INPUT_POST ,'course_name',FILTER_SANITIZE_STRING);
    $Question =  filter_input(INPUT_POST ,'Question',FILTER_SANITIZE_STRING);
    $doubt_id = filter_input(INPUT_GET ,'doubt_id',FILTER_VALIDATE_INT);
    $fileTmpPath = $_FILES['file']['tmp_name'];
    $fileName = $_FILES['file']['name'];
    $fileSize = $_FILES['file']['size'];
    $fileType = $_FILES['file']['type'];
    $uploadFileDir = 'submissions/';
    $dest_path = $uploadFileDir . $fileName;
    move_uploaded_file($fileTmpPath, $dest_path);
        


    if($_POST['course_id']){
    $course_id =filter_input(INPUT_POST ,'course_id',FILTER_VALIDATE_INT);
    }
    if($_GET['course_id']){
    $course_id =filter_input(INPUT_GET ,'course_id',FILTER_VALIDATE_INT);
    }

    if($_POST['action']){
        $action =  filter_input(INPUT_POST ,'action',FILTER_SANITIZE_STRING);
    }
    if($_GET['action']){
        $action =  filter_input(INPUT_GET ,'action',FILTER_SANITIZE_STRING);
    }

    if(!$action){
        $action =filter_input(INPUT_GET ,'action',FILTER_VALIDATE_INT);
        if(!$action){
            $action ='list_assignments';
        }
    }
   
    switch($action){
        case "like":
            if($action == 'like'){
                $like = get_like($doubt_id);
                $like = ++$like[0]['likes'];
                set_like($doubt_id,$like);
                header('Location:.?action=discussion_forum');      
            }
            break;
        case "dislike":
                if($action == 'dislike'){
                    $dislike = get_dislike($doubt_id);
                   // print_r($dislike);
                   // exit();
                    $dislike = ++$dislike[0]['dislikes'];
                    echo $dislike;
                    set_dislike($doubt_id,$dislike);
                    header('Location:.?action=discussion_forum');  
            }
            break;
        
        case "discussion_forum": 
            $courses = get_courses();
            $doubts = get_doubts();

          include('view/discussion_forum.php');
            break;

        case "add_doubt":
            add_doubt($course_id,$EnrollmentNo,$Question);
            header('Location:.?action=discussion_forum');
            break;

        case "upload_assignment":
            if($course_id && $assignment_id && $EnrollmentNo){            
            echo $course_id.$assignment_id.$EnrollmentNo;
            upload_assignment($course_id,$assignment_id,$EnrollmentNo,$fileName);               
            header('Location:./?action=list_assignments&course_id=0');
            }else{
                $error = "Invalid assignment data. Try Again";
                include('view/error.php');
                exit();
            }
            break;
        case "view_marks": 
            if($course_id){
                $assignment_submission = get_assignment_submission_by_id($course_id);
            }else{
                $assignment_submission = get_assignment_submission();
            }
            $courses = get_courses();
            include('view/mark_list.php');      
            break;
        
        case "/": 
            $course_name = get_course_name($course_id);
            $courses = get_courses();
            $assignments = get_assignment_by_course($course_id);
            include('view/assignment_list.php'); 
            break;
        default: 
            $course_name = get_course_name($course_id);
            $courses = get_courses();
            $assignments = get_assignment_by_course($course_id);
            include('view/assignment_list.php');      
      
    }

 

 
?>