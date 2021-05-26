<?php
function get_doubts(){
   global $db;
   $query ='SELECT doubts.ID,doubts.enrollment,doubts.Questions,courses.courseName,doubts.is_seen FROM doubts JOIN courses ON doubts.courseID = courses.courseID   ';
   $statement = $db->prepare($query);
   $statement->execute();
   $doubts = $statement->fetchAll();
   $statement->closeCursor();
   return $doubts;

}
function solve_doubt($doubt_id,$answer){
   global $db;
   $query = 'UPDATE `doubts` SET `Answers`=:answer ,`is_seen`=1 WHERE `ID` = :doubt_id';
   $statement = $db->prepare($query);
   $statement->bindValue(':doubt_id', $doubt_id);
   $statement->bindValue(':answer', $answer);
   $statement->execute();
   $statement->closeCursor(); 

}
?>
