<?php

function get_courses(){
    global $db;
    $query ='SELECT * FROM courses ORDER BY courseID';
    $statement = $db->prepare($query);
    $statement->execute();
    $courses = $statement->fetchAll();
    $statement->closeCursor();
    return $courses;
}

function get_course_name($course_id){
    if($course_id){
        return "All courses";
    }
    global $db;
    $query ='SELECT * FROM courses WHERE courseID = :course_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':course_id', $course_id);
    $statement->execute();
    $course = $statement->fetchAll();
    $statement->closeCursor();
    $course_name = $course['courseName'];
    return $course_name; 
}

function add_doubt($course_id,$EnrollmentNo, $Question){
    global $db;
    $query ='INSERT INTO `doubts`( `enrollment`, `courseID`, `Questions`) VALUES (:enroll,:courseid,:questions)';
    $statement = $db->prepare($query);
    $statement->bindValue(':courseid', $course_id);
    $statement->bindValue(':enroll', $EnrollmentNo);
    $statement->bindValue(':questions', $Question);
    $statement->execute();
    $statement->closeCursor();
  
}

?>