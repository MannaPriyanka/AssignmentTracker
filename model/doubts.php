<?php

function get_doubts(){
    global $db;
    $query = 'SELECT doubts.ID ,doubts.enrollment,doubts.Questions,doubts.Answers,doubts.is_seen,doubts.likes,doubts.dislikes,courses.courseName FROM doubts JOIN courses ON courses.courseID = doubts.courseID ORDER BY doubts.is_seen DESC'   ;
    $statement = $db->prepare($query);
    $statement->execute();
    $doubts = $statement->fetchAll();
    $statement->closeCursor();
    return $doubts;
 
 }

function get_like($doubt_id){
    global $db;
    $query = 'SELECT `likes`FROM `doubts` WHERE `ID`= :doubt_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':doubt_id', $doubt_id);
    $statement->execute();
    $like = $statement->fetchAll(); 
    return $like;
    $statement->closeCursor();
 }
 
 function set_like($doubt_id,$like){
    global $db;
    $query = 'UPDATE `doubts` SET `likes`=:likes WHERE `ID` = :doubt_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':doubt_id', $doubt_id);
    $statement->bindValue(':likes', $like);
    $statement->execute();
    $statement->closeCursor();
 }
 function get_dislike($doubt_id){
    global $db;
    $query = 'SELECT `dislikes` FROM `doubts` WHERE `ID`= :doubt_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':doubt_id', $doubt_id);
    $statement->execute();
    $dislike = $statement->fetchAll(); 
    return $dislike;
    $statement->closeCursor();
 }
 function set_dislike($doubt_id,$dislike){
    global $db;
    $query = 'UPDATE `doubts` SET `dislikes`=:dislike WHERE `ID` = :doubt_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':doubt_id', $doubt_id);
    $statement->bindValue(':dislike', $dislike);
    $statement->execute();
    $statement->closeCursor();
 }
 ?>