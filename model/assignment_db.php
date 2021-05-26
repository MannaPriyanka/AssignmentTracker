<?php 
 function get_assignment_by_course($course_id){
    global $db;   
    if($course_id){
        $query ='SELECT A.ID ,A.Description, A.duedate,A.filename, C.courseName FROM assignments A LEFT JOIN courses C ON A.courseID = C.courseID WHERE A.courseID = :course_id ORDER BY A.ID';
    }else{
       $query ='SELECT A.ID ,A.Description,  A.duedate,A.filename, C.courseName FROM assignments A LEFT JOIN courses C ON A.courseID = C.courseID ORDER BY C.courseID';
    }

    $statement = $db->prepare($query);
    $statement->bindValue(':course_id', $course_id);
    $statement->execute();
    $assignments = $statement->fetchAll();
    $statement->closeCursor();
    return $assignments;
 }

 
 function upload_assignment($course_id,$assignment_id,$EnrollmentNo,$fileName){            
    global $db;
    //echo $course_id.$description.$duedate; echo  $fileName;
    //exit();
   
    $query = 'INSERT INTO `submission`( `Assignment_id`, `courseID`, `EnrollmentNo`, `assignmentFile`) VALUES ( :assignid , :courseid, :enrollid, :filename) ';    
    $statement = $db->prepare($query);
    $statement->bindValue(':assignid', $assignment_id);
    $statement->bindValue(':courseid', $course_id);
    $statement->bindValue(':enrollid', $EnrollmentNo);
    $statement->bindValue(':filename', $fileName);
    $statement->execute();
    $statement->closeCursor();
    
   // exit();
 }



?>