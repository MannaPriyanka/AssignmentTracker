<?php
include('header.php');
?>

<?php if($assignment_submission){ ?>

    <section class="list" id="list">

        <header class="list__row list__header">
            <h1>Submissions Marks</h1>
            <form action="." method="get" id="list__header_select" class="list__header_select " >
            <input type="hidden" name="action" value="view_marks"/>
            <select name="course_id" required>
                <option value="0">View All</option>
                <?php
                    foreach($courses as $course): ?>
                    <?php  if($course_id == $course['courseID']){ ?>
                        
                        <option value="<?= $course['courseID'] ?>" selected>
                   
                    <?php } else{  ?>
                   
                        <option value="<?= $course['courseID'] ?>">
                    <?php  } ?>
                    <?= $course['courseName']?>
                    </option>
               <?php endforeach; ?>
            </select>
            <button class="add-button bold"> <i class="fa fa-search" aria-hidden="true"></i> </button>
        </form>
        </header>

        <?php foreach($assignment_submission as $submission): 
            if($submission['is_checked'] !== '0'){ ?>
        <div class="list__row">
           
            <div class="list_item">
            <small>
                        <div>
                        <b>Course Name: </b>
                        <span class="bold">
                        <?=$submission['courseName']?></span>
                        </div> 
                       <div>
                        <b>Enrollment ID:</b>
                        <?=$submission['EnrollmentNo']?>
                        </div>
                        <div>
                        <b>Due Date:</b>
                        <?=$submission['duedate']?>
                        </div>
                       <div >
                        <b>Marks:</b>
                        <?=$submission['marks']?>
                        </div>
            </small>
                                                        
            </div>

            <div class="list__item ">
                        <small>
                        <div>
                        <b>Course Name: </b>                    
                        <span class="bold">
                        <?=$submission['Description']?>
                        </span>
                        </div> 
                         <div>
                        <b> Submitted File:</b>
                        <?php  $file = $submission['assignmentFile'];?>
                        <a href="<?php echo "../../AssignmentTracker/submissions/".$file;?>"> <?php echo $file;?></a>
                        </div>
                        <div>
                        <b> Submitted on:</b>
                        <?=$submission['date']?>
                        </div> 
                        <div>
                        <b>Comments:</b>
                        <?=$submission['comments']?>

                       </div>

                        </small> 
           
            </div>
    
        </div>
       

        <?php 
            } 
            endforeach; ?>

    </section>

    <?php } else { ?>
        <section class="list" id="list">

        <header class="list__row list__header">
            <h1>Submissions</h1>
            <form action="." method="get" id="list__header_select" class="list__header_select " >
            <input type="hidden" name="action" value="view_marks"/>
            <select name="course_id" required>
                <option value="0">View All</option>
                <?php
                    foreach($courses as $course): ?>
                    <?php  if($course_id == $course['courseID']){ ?>
                        
                        <option value="<?= $course['courseID'] ?>" selected>
                   
                    <?php } else{  ?>
                   
                        <option value="<?= $course['courseID'] ?>">
                    <?php  } ?>
                    <?= $course['courseName']?>
                    </option>
               <?php endforeach; ?>
            </select>
            <button class="add-button bold"> <i class="fa fa-search" aria-hidden="true"></i> </button>
        </form>
        </header>
        <br><br>
        <p class="b">No submission done on this course</p>
        <br>
        </section>
    <?php } ?>
    

<br>
<p><a class="viewcourse" href=".">View Assignments </a></p>
<br>
<br>

<?php
include('view/footer.php');
?>

