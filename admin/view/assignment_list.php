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
            <button class="add-button bold"> <i class="fa fa-search" aria-hidden="true"></i>
 </button>
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
            <div class="list__removeItem">
                <form action="." method="post" >
                <input type="hidden" name="action" value="delete_assignment">
                <input type="hidden" name="assignment_id" value="<?=$assignment['ID']?>">
                <button class="remove-button"> ✖</button>

                </form>
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

<p><a class="viewcourse" href=".?action=get_submission">Review Submission</a></p>

<section id="add" class="add">
    <h2>Add Assignments</h2>
    
    <form action="." method="post" id="add__form" class="add__form" enctype="multipart/form-data">
        <input type="hidden" name="action" value="add_assignment">
       
        <div class="add__inputs">
            
          
            <select name="course_id" required>
                <option value="">Please Select Course</option>
                <?php foreach($courses as $course): ?>
                <option value="<?= $course['courseID']?>">
                <?= $course['courseName']?>
                </option>  
                <?php endforeach; ?>
            </select>
            
          
            <input type="text" name="description" maxlength="120" placeholder="Description" required> 
            Due Date:
            <input type="date" name="duedate" >
            Upload Assignment:
           
            <label class="file">
            <input type="file" name="file" class="file">
            </label>

            
                    
        </div>
        <div class="add__addItem">
            <button class="add-button bold">Add </button>
        </div>

    </form>
        
</section>
<br>
<p><a class="viewcourse" href=".?action=list_courses">View / Edit Courses</a></p>
<?php
include('footer.php');
?>