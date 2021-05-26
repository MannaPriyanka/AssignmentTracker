<?php
    require('model/database.php');
    require('model/assignment_db.php');
    require('model/course_db.php');
    require('model/submission_db.php');
    require('model/doubt_db.php');

    $assignment_id = filter_input(INPUT_POST ,'assignment_id',FILTER_VALIDATE_INT);
    $description = filter_input(INPUT_POST ,'description',FILTER_SANITIZE_STRING);
    $duedate = filter_input(INPUT_POST ,'duedate',FILTER_SANITIZE_STRING);
    $submissionno = filter_input(INPUT_POST ,'submissionno',FILTER_VALIDATE_INT);
    $marks = filter_input(INPUT_POST ,'marks',FILTER_VALIDATE_INT);
    $comments = filter_input(INPUT_POST ,'comments',FILTER_SANITIZE_STRING);
    $course_name = filter_input(INPUT_POST ,'course_name',FILTER_SANITIZE_STRING);
    $doubt_id = filter_input(INPUT_POST ,'doubt_id',FILTER_VALIDATE_INT);
    $answer = filter_input(INPUT_POST ,'answer',FILTER_SANITIZE_STRING);
    
    $fileTmpPath = $_FILES['file']['tmp_name'];
    $fileName = $_FILES['file']['name'];
    $fileSize = $_FILES['file']['size'];
    $fileType = $_FILES['file']['type'];
    $uploadFileDir = 'uploaded_files/';
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
        case "list_courses": 
            $courses = get_courses();
          include('view/course_list.php');
            break;

        case "add_course":
            add_course($course_name);
            header('Location:.?action=list_courses');
            break;

        case "add_assignment";
            if($course_id && $description && $duedate){            
              add_assignment($course_id,$description,$duedate,$fileName);               
            header('Location:./?course_id='.$course_id);
            }else{
                $error = "Invalid assignment data. Try Again";
                include('view/error.php');
                exit();
            }
            break;

        case "delete_course": 
            if($course_id){
                try{
                    delete_course($course_id);
                }catch(PDOException $e){
                    $error = "You cannot delete a course if assignments exits in the course";
                    include('view/error.php');
                    exit();
                }
                header('Location: .?action=list_courses');
            }
            break;

        case "delete_assignment": 
            if($assignment_id){
                delete_assignment($assignment_id);
                header('Location: .?course_id=?$course_id');
            }else{
                $error="Missing or incorrect assignment id.";
                include('view/error.php');
            }
            break;

       
        case "review_assignment": 
                if($submissionno && $marks && $comments){
                    review_assignment($marks,$comments,$submissionno);  
                }
              

        case "solve_doubt":
                if($doubt_id && $answer){
                    solve_doubt($doubt_id,$answer);
                }
              
         case "get_submission":   
                 $courses = get_courses();  
                if($course_id){
                $assignment_submission = get_assignment_submission_by_id($course_id);
                }else{    
                $assignment_submission = get_assignment_submission();   
                }  
                $doubts = get_doubts();
                include('view/submission_list.php');
                break;
        
        default: 
            $course_name = get_course_name($course_id);
            $courses = get_courses();
            $assignments = get_assignment_by_course($course_id);
            include('view/assignment_list.php');      
      
    }

 

 
?>