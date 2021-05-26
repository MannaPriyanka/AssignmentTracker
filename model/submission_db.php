<?php
function get_assignment_submission(){
   global $db;
   $query = 'SELECT submission.ID,submission.EnrollmentNo,submission.date,submission.assignmentFile,submission.is_checked ,submission.marks,submission.comments, courses.courseName ,assignments.duedate, assignments.Description FROM submission JOIN courses on submission.courseID = courses.courseID JOIN assignments ON submission.Assignment_id = assignments.ID  ';
   $statement = $db->prepare($query);
   $statement->execute();
   $assignment_submission = $statement->fetchAll();
   $statement->closeCursor();
   return $assignment_submission;
}
function get_assignment_submission_by_id($course_id){
   global $db;
   $query = 'SELECT submission.ID,submission.EnrollmentNo,submission.date,submission.assignmentFile,submission.is_checked ,submission.marks,submission.comments, courses.courseName ,assignments.duedate, assignments.Description FROM submission JOIN courses on submission.courseID = courses.courseID JOIN assignments ON submission.Assignment_id = assignments.ID WHERE submission.courseID = :courseid';
   $statement = $db->prepare($query);
   $statement->bindValue(':courseid', $course_id);
   $statement->execute();
   $assignment_submission = $statement->fetchAll();
   $statement->closeCursor();
   return $assignment_submission;
}

?>