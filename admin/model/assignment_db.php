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

 function delete_assignment($assignment_id){
    global $db;
    $query = 'DELETE FROM assignments WHERE id = :assign_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':assign_id', $assignment_id);
    $statement->execute();
    $statement->closeCursor();
   
 }
 function add_assignment($course_id, $description , $duedate , $fileName){
    global $db;
    //echo $course_id.$description.$duedate; echo  $fileName;
    //exit();
    $query = 'INSERT INTO assignments (description, courseID , duedate ,filename) VALUES (:descr, :courseID ,:due , :filename) ';    
    $statement = $db->prepare($query);
    $statement->bindValue(':descr', $description);
    $statement->bindValue(':courseID', $course_id);
    $statement->bindValue(':due', $duedate);
    $statement->bindValue(':filename', $fileName);
    $statement->execute();
    $statement->closeCursor();
    
   // exit();
 }
 

?>