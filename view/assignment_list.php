<?php
include('header.php');
?>

<section id="list" class="list">
    <header class="list__row list__header">
        <h1>Assignments</h1>
        <form action="." method="get" id="list__header_select" class="list__header_select " >
            <input type="hidden" name="action" value="list_assignments"/>
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
    <?php
    if($assignments){
        foreach($assignments as $assignment):?>
        <div class="list__row">
            <div class="list__item">
                <p class="bold">
                <?=$assignment['courseName'] ?>
                </p>

                <p><small>
                <?=$assignment['Description'] ?>
                </small>
                </p>
                <p>
                    <small><b class="b" >View Assignment :</b>
                <a href="uploaded_files/<?=$assignment['filename'] ?>">  <?=$assignment['filename'] ?></a>
                </small>
                </p>
                <p>
                    <small><b class="b">Due Date :</b>
                <?=$assignment['duedate'] ?>
                </small>
                </p>

            </div>
           

        </div>
    <?php
    endforeach;
    }else{
    ?>
        <br>
        <?php  if($course_id){  ?>

        <p>No assignments exits for this course yet</p>

        <?php  }else{ ?>

        <p>No assignments exits yet</p>

        <?php    }
    }
    ?>
</section>
<p><a class="viewcourse" href=".?action=view_marks">View Marks</a></p>

<section id="add" class="add">
    <h2>Upload Assignments</h2>
    
    <form action="." method="post" id="add__form" class="add__form" enctype="multipart/form-data">
        <input type="hidden" name="action" value="upload_assignment">
       
        <div class="add__inputs">
            
          
            <select name="course_id" required>
                <option value=""> Select Course</option>
                <?php foreach($courses as $course): ?>
                <option value="<?= $course['courseID']?>">
                <?= $course['courseName']?>
                </option>  
                <?php endforeach; ?>
            </select>

            <select name="assignment_id" required>
                <option value=""> Select Assignment</option>
                <?php foreach($assignments as $assignment): ?>
                <option value="<?=$assignment['ID']?>">
                <?=$assignment['Description']?>
                </option>  
                <?php endforeach; ?>
            </select>
            
          Enrollment No :
            <input type="Number" name="EnrollmentNo" maxlength="12" placeholder="Enter Enrollment No " required> 
           
            Upload Assignment:
           
            <label class="file">
            <input type="file" name="file" class="file" required>
            </label>            
                    
        </div>
        <div class="add__addItem">
        <br><br>
            <button class="add-button bold">Add</button>
        </div>

    </form>
        
</section>
<br>
<p><a class="viewcourse" href=".?action=discussion_forum">Discussion Forum</a></p>
<?php
include('footer.php');
?>